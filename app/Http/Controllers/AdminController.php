<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Gallery;
use App\Models\Subscription;
use App\Models\HeroSection;
use App\Models\Room;
use Carbon\Carbon;
class AdminController extends Controller
{
    public function showLogin()
    {
        if (Session::has('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Hardcoded credentials
        if ($username === 'admin@gmail.com' && $password === 'Admin@123') {
            Session::put('admin_logged_in', true);
            Session::put('admin_username', $username);
            Session::put('admin_login_time', now());

            return redirect()->route('admin.dashboard')->with('success', 'Welcome back, Admin!');
        }

        return back()->with('error', 'Invalid email or password.')->withInput($request->except('password'));
    }

    public function logout()
    {
        Session::forget(['admin_logged_in', 'admin_username', 'admin_login_time']);
        return redirect()->route('admin.login')->with('success', 'You have been logged out successfully.');
    }

    public function dashboard()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login to access admin panel.');
        }

        // Get counts
        $totalBlogs = Blog::count();
        $totalImages = Gallery::where('type', 'image')->count();
        $totalRooms = 8; // Dummy data - replace when Room model exists
        $totalInquiries = 23; // Dummy data - replace when Inquiry model exists

        // Get recent subscribe users (dummy data - replace when Subscribe model exists)
        $subscribeUsers = [
            ['id' => 1, 'email' => 'user1@example.com', 'created_at' => now()->subDays(5)],
            ['id' => 2, 'email' => 'user2@example.com', 'created_at' => now()->subDays(4)],
            ['id' => 3, 'email' => 'user3@example.com', 'created_at' => now()->subDays(3)],
            ['id' => 4, 'email' => 'user4@example.com', 'created_at' => now()->subDays(2)],
            ['id' => 5, 'email' => 'user5@example.com', 'created_at' => now()->subDays(1)],
        ];
        $totalSubscribes = 15; // Dummy count

        // Get recent form submissions (dummy data - replace when FormSubmission model exists)
        $formSubmissions = [
            ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'phone' => '+91 98765 43210', 'created_at' => now()->subDays(5), 'status' => 'pending'],
            ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'phone' => '+91 98765 43211', 'created_at' => now()->subDays(4), 'status' => 'responded'],
            ['id' => 3, 'name' => 'Mike Johnson', 'email' => 'mike@example.com', 'phone' => '+91 98765 43212', 'created_at' => now()->subDays(3), 'status' => 'responded'],
            ['id' => 4, 'name' => 'Sarah Williams', 'email' => 'sarah@example.com', 'phone' => '+91 98765 43213', 'created_at' => now()->subDays(2), 'status' => 'pending'],
            ['id' => 5, 'name' => 'David Brown', 'email' => 'david@example.com', 'phone' => '+91 98765 43214', 'created_at' => now()->subDays(1), 'status' => 'responded'],
        ];
        $totalFormSubmissions = 23; // Dummy count

        return view('admin.dashboard', compact(
            'totalBlogs',
            'totalImages',
            'totalRooms',
            'totalInquiries',
            'subscribeUsers',
            'totalSubscribes',
            'formSubmissions',
            'totalFormSubmissions'
        ));
    }

    public function profile()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login to access admin panel.');
        }

        return view('admin.profile');
    }

    public function blogs(Request $request)
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login to access admin panel.');
        }

        $perPage = $request->get('per_page', 10);
        $search = $request->get('search', '');
        
        $query = Blog::orderBy('created_at', 'desc');
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('slug', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }
        
        $blogs = $query->paginate($perPage)->appends($request->query());
        
        return view('admin.blogs', compact('blogs', 'search'));
    }

    public function blogStore(Request $request)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:blogs,slug',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:max_width=1200,max_height=800',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }

        try {
            $imagePath = $request->file('image')->store('blogs', 'public');
            
            // Parse points if provided
            $points = [];
            if ($request->has('points') && is_string($request->points)) {
                $points = json_decode($request->points, true) ?? [];
            } elseif ($request->has('points') && is_array($request->points)) {
                $points = $request->points;
            }
            
            $blog = Blog::create([
                'name' => $request->name,
                'slug' => Str::slug($request->slug),
                'description' => $request->description,
                'points' => $points,
                'image' => $imagePath,
                'is_active' => true,
            ]);

            return response()->json(['success' => true, 'message' => 'Blog created successfully!', 'blog' => $blog]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error creating blog: ' . $e->getMessage()], 500);
        }
    }

    public function blogUpdate(Request $request, $id)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        $blog = Blog::findOrFail($id);

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:blogs,slug,' . $id,
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:max_width=1200,max_height=800',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }

        try {
            $data = [
                'name' => $request->name,
                'slug' => Str::slug($request->slug),
                'description' => $request->description,
            ];

            // Parse points if provided
            $points = [];
            if ($request->has('points') && is_string($request->points)) {
                $points = json_decode($request->points, true) ?? [];
            } elseif ($request->has('points') && is_array($request->points)) {
                $points = $request->points;
            }
            $data['points'] = $points;

            if ($request->hasFile('image')) {
                // Delete old image
                if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                    Storage::disk('public')->delete($blog->image);
                }
                $data['image'] = $request->file('image')->store('blogs', 'public');
            }

            $blog->update($data);

            return response()->json(['success' => true, 'message' => 'Blog updated successfully!', 'blog' => $blog]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error updating blog: ' . $e->getMessage()], 500);
        }
    }

    public function blogShow($id)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $blog = Blog::findOrFail($id);
            return response()->json(['success' => true, 'blog' => $blog]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error loading blog: ' . $e->getMessage()], 500);
        }
    }

    public function blogDelete($id)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $blog = Blog::findOrFail($id);
            
            // Delete image
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
            
            $blog->delete();

            return response()->json(['success' => true, 'message' => 'Blog deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting blog: ' . $e->getMessage()], 500);
        }
    }

    public function blogToggleActive($id)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $blog = Blog::findOrFail($id);
            $blog->is_active = !$blog->is_active;
            $blog->save();

            return response()->json([
                'success' => true, 
                'message' => $blog->is_active ? 'Blog activated successfully!' : 'Blog deactivated successfully!',
                'is_active' => $blog->is_active
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error updating blog status: ' . $e->getMessage()], 500);
        }
    }

public function gallery(Request $request)
{
    if (!Session::has('admin_logged_in')) {
        return redirect()->route('admin.login')
            ->with('error', 'Please login to access admin panel.');
    }

    $perPage = $request->get('per_page', 10);
    $search = $request->get('search', '');
    
    $query = Gallery::orderBy('created_at', 'desc');
    
    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%')
              ->orWhere('description', 'like', '%' . $search . '%');
        });
    }
    
    $galleries = $query->paginate($perPage)->appends($request->query());

    return view('admin.gallery', compact('galleries', 'search'));
}

public function store(Request $request)
{
    if (!Session::has('admin_logged_in')) {
        return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
    }

    try {
        $type = $request->input('type', 'image');
        
        if ($type === 'image') {
            $request->validate([
                'name' => 'required|string|max:255',
                'heading' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'main_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'images' => 'nullable|array',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            
            // Store main image
            $mainImagePath = $request->file('main_image')->store('gallery', 'public');
            
            // Store sub images
            $subImages = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $subImages[] = 'storage/' . $image->store('gallery/sub', 'public');
                }
            }
            
            Gallery::create([
                'name' => $request->name,
                'heading' => $request->heading,
                'description' => $request->description,
                'main_image' => 'storage/' . $mainImagePath,
                'sub_images' => $subImages,
                'type' => 'image',
            ]);
        } else if ($type === 'video') {
            $request->validate([
                'name' => 'required|string|max:255',
                'heading' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'main_video' => 'required|mimes:mp4,avi,mov,wmv|max:10240',
            ]);
            
            // Store main video
            $mainVideoPath = $request->file('main_video')->store('gallery', 'public');
            
            Gallery::create([
                'name' => $request->name,
                'heading' => $request->heading,
                'description' => $request->description,
                'main_image' => 'storage/' . $mainVideoPath, // Store video path in main_image for compatibility
                'type' => 'video',
            ]);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid type'], 422);
        }

        return response()->json(['success' => true, 'message' => 'Gallery created successfully!']);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Error creating gallery: ' . $e->getMessage()], 500);
    }
}

public function galleryShow($id)
{
    if (!Session::has('admin_logged_in')) {
        return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
    }

    try {
        $gallery = Gallery::findOrFail($id);
        
        // Process sub_images to extract paths
        $subImages = [];
        if ($gallery->sub_images && is_array($gallery->sub_images)) {
            foreach ($gallery->sub_images as $item) {
                if (is_array($item) && isset($item['path'])) {
                    $subImages[] = $item['path'];
                } elseif (is_string($item)) {
                    $subImages[] = $item;
                }
            }
        }
        
        return response()->json([
            'success' => true,
            'gallery' => [
                'id' => $gallery->id,
                'name' => $gallery->name,
                'heading' => $gallery->heading ?? null,
                'description' => $gallery->description,
                'type' => $gallery->type,
                'main_image' => $gallery->main_image,
                'sub_images' => $subImages,
                'created_at' => $gallery->created_at,
            ]
        ]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Error loading gallery: ' . $e->getMessage()], 500);
    }
}

public function galleryDelete($id)
{
    if (!Session::has('admin_logged_in')) {
        return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
    }

    try {
        $gallery = Gallery::findOrFail($id);
        
        // Delete file from storage
        if ($gallery->file_path && Storage::disk('public')->exists(str_replace('storage/', '', $gallery->file_path))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $gallery->file_path));
        }
        
        $gallery->delete();

        return response()->json(['success' => true, 'message' => 'Media deleted successfully!']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Error deleting media: ' . $e->getMessage()], 500);
    }
}







    public function rooms(Request $request)
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login to access admin panel.');
        }

        $search = $request->input('search', '');
        $perPage = $request->input('per_page', 10);

        $query = Room::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('type', 'like', '%' . $search . '%');
            });
        }

        $rooms = $query->orderBy('order')->orderBy('created_at', 'desc')->paginate($perPage)->appends($request->query());

        return view('admin.rooms', compact('rooms', 'search'));
    }

    public function roomStore(Request $request)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:rooms,slug',
                'price' => 'required|numeric|min:0',
                'available_rooms' => 'required|integer|min:0',
            ]);

            $data = [
                'title' => $request->title,
                'slug' => Str::slug($request->slug),
                'description' => $request->description,
                'price' => $request->price,
                'discount_price' => $request->discount_price ?? null,
                'type' => $request->type,
                'available_rooms' => $request->available_rooms,
                'facilities' => json_decode($request->facilities, true) ?? [],
                'edit_message' => $request->edit_message,
                'is_active' => $request->has('is_active') ? true : false,
                'order' => $request->order ?? 0,
            ];

            // Handle main image - save to public/img/rooms
            if ($request->hasFile('main_image')) {
                $file = $request->file('main_image');
                $filename = time() . '_main.' . $file->getClientOriginalExtension();
                $imgPath = public_path('img/rooms');
                if (!file_exists($imgPath)) {
                    mkdir($imgPath, 0755, true);
                }
                $file->move($imgPath, $filename);
                $data['main_image'] = 'img/rooms/' . $filename;
            }

            // Handle sub images - save to public/img/rooms
            $subImages = [];
            if ($request->hasFile('sub_images')) {
                $imgPath = public_path('img/rooms');
                if (!file_exists($imgPath)) {
                    mkdir($imgPath, 0755, true);
                }
                foreach ($request->file('sub_images') as $file) {
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move($imgPath, $filename);
                    $subImages[] = 'img/rooms/' . $filename;
                }
            }
            $data['sub_images'] = $subImages;

            Room::create($data);

            return response()->json(['success' => true, 'message' => 'Room created successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function roomUpdate(Request $request, $id)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $room = Room::findOrFail($id);

            $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:rooms,slug,' . $id,
                'price' => 'required|numeric|min:0',
                'available_rooms' => 'required|integer|min:0',
            ]);

            $data = [
                'title' => $request->title,
                'slug' => Str::slug($request->slug),
                'description' => $request->description,
                'price' => $request->price,
                'discount_price' => $request->discount_price ?? null,
                'type' => $request->type,
                'available_rooms' => $request->available_rooms,
                'facilities' => json_decode($request->facilities, true) ?? [],
                'edit_message' => $request->edit_message,
                'is_active' => $request->has('is_active') ? true : false,
                'order' => $request->order ?? $room->order,
            ];

            // Handle main image - save to public/img/rooms
            if ($request->hasFile('main_image')) {
                // Delete old image
                if ($room->main_image) {
                    $oldPath = public_path($room->main_image);
                    if (file_exists($oldPath)) {
                        @unlink($oldPath);
                    }
                }
                $file = $request->file('main_image');
                $filename = time() . '_main.' . $file->getClientOriginalExtension();
                $imgPath = public_path('img/rooms');
                if (!file_exists($imgPath)) {
                    mkdir($imgPath, 0755, true);
                }
                $file->move($imgPath, $filename);
                $data['main_image'] = 'img/rooms/' . $filename;
            } elseif ($request->has('existing_main_image')) {
                $data['main_image'] = $request->existing_main_image;
            }

            // Handle sub images - merge existing with new, save to public/img/rooms
            $subImages = [];
            // Get existing sub images if provided
            if ($request->has('existing_sub_images') && $request->existing_sub_images) {
                $existing = json_decode($request->existing_sub_images, true);
                if (is_array($existing)) {
                    $subImages = $existing;
                }
            } else {
                // If no existing provided, keep current ones
                $subImages = $room->sub_images ?? [];
            }
            // Add new sub images
            if ($request->hasFile('sub_images')) {
                $imgPath = public_path('img/rooms');
                if (!file_exists($imgPath)) {
                    mkdir($imgPath, 0755, true);
                }
                foreach ($request->file('sub_images') as $file) {
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move($imgPath, $filename);
                    $subImages[] = 'img/rooms/' . $filename;
                }
            }
            $data['sub_images'] = $subImages;

            $room->update($data);

            return response()->json(['success' => true, 'message' => 'Room updated successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function roomShow($id)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $room = Room::findOrFail($id);
            
            // Ensure image paths are properly formatted
            if ($room->main_image) {
                // If path doesn't start with / or http, format it
                $mainImg = $room->main_image;
                if (strpos($mainImg, '/') !== 0 && strpos($mainImg, 'http') !== 0) {
                    if (strpos($mainImg, 'img/') !== 0) {
                        $room->main_image = 'img/rooms/' . $mainImg;
                    }
                }
            }
            
            if ($room->sub_images && is_array($room->sub_images)) {
                $room->sub_images = array_map(function($img) {
                    if (strpos($img, '/') !== 0 && strpos($img, 'http') !== 0) {
                        if (strpos($img, 'img/') !== 0) {
                            return 'img/rooms/' . $img;
                        }
                    }
                    return $img;
                }, $room->sub_images);
            }
            
            return response()->json(['success' => true, 'data' => $room]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function roomDelete($id)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $room = Room::findOrFail($id);
            
            // Delete main image
            if ($room->main_image) {
                $mainPath = public_path($room->main_image);
                if (file_exists($mainPath)) {
                    @unlink($mainPath);
                }
            }
            
            // Delete sub images
            if ($room->sub_images) {
                foreach ($room->sub_images as $img) {
                    $subPath = public_path($img);
                    if (file_exists($subPath)) {
                        @unlink($subPath);
                    }
                }
            }
            
            $room->delete();

            return response()->json(['success' => true, 'message' => 'Room deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function roomToggleActive($id)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $room = Room::findOrFail($id);
            $room->is_active = !$room->is_active;
            $room->save();

            $message = $room->is_active 
                ? 'Room activated successfully!' 
                : 'Room deactivated successfully!';

            return response()->json([
                'success' => true,
                'message' => $message,
                'is_active' => $room->is_active
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function heroSection(Request $request)
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login to access admin panel.');
        }

        $search = $request->input('search', '');
        $perPage = $request->input('per_page', 10);

        $query = HeroSection::query();

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // Ensure only one hero section is active at a time
        $activeCount = HeroSection::where('is_active', true)->count();
        if ($activeCount > 1) {
            // Keep only the first active one (by order, then by created_at)
            $firstActive = HeroSection::where('is_active', true)
                ->orderBy('order')
                ->orderBy('created_at', 'desc')
                ->first();
            if ($firstActive) {
                HeroSection::where('id', '!=', $firstActive->id)->update(['is_active' => false]);
            }
        }

        $heroSections = $query->orderBy('order')->orderBy('created_at', 'desc')->paginate($perPage)->appends($request->query());

        return view('admin.hero-section', compact('heroSections', 'search'));
    }

    public function heroSectionStore(Request $request)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $request->validate([
                'type' => 'required|in:image,video',
                'title' => 'nullable|string|max:255',
                'description' => 'nullable|string',
            ]);

            $data = [
                'type' => $request->type,
                'title' => $request->title,
                'description' => $request->description,
                'is_active' => $request->has('is_active') ? true : false,
                'order' => $request->order ?? 0,
            ];

            if ($request->type === 'image') {
                $images = [];
                for ($i = 1; $i <= 3; $i++) {
                    if ($request->hasFile("image_$i")) {
                        $file = $request->file("image_$i");
                        $filename = time() . '_' . $i . '.' . $file->getClientOriginalExtension();
                        $path = $file->storeAs('hero_sections', $filename, 'public');
                        
                        $images[] = [
                            'image' => 'storage/' . $path,
                            'title' => $request->input("image_title_$i", ''),
                            'description' => $request->input("image_description_$i", '')
                        ];
                    }
                }
                $data['images'] = $images;
            } else {
                if ($request->hasFile('video')) {
                    $file = $request->file('video');
                    $filename = time() . '_video.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('hero_sections', $filename, 'public');
                    $data['video'] = 'storage/' . $path;
                }
                $data['video_title'] = $request->video_title;
                $data['video_description'] = $request->video_description;
                $data['video_extra'] = $request->video_extra;
            }

            // If this hero section is being activated, deactivate all others
            if ($data['is_active']) {
                HeroSection::where('id', '!=', 0)->update(['is_active' => false]);
            }

            HeroSection::create($data);

            return response()->json(['success' => true, 'message' => 'Hero section created successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function heroSectionUpdate(Request $request, $id)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $heroSection = HeroSection::findOrFail($id);

            $request->validate([
                'type' => 'required|in:image,video',
                'title' => 'nullable|string|max:255',
                'description' => 'nullable|string',
            ]);

            $data = [
                'type' => $request->type,
                'title' => $request->title,
                'description' => $request->description,
                'is_active' => $request->has('is_active') ? true : false,
                'order' => $request->order ?? $heroSection->order,
            ];

            if ($request->type === 'image') {
                $images = [];
                for ($i = 1; $i <= 3; $i++) {
                    if ($request->hasFile("image_$i")) {
                        $file = $request->file("image_$i");
                        $filename = time() . '_' . $i . '.' . $file->getClientOriginalExtension();
                        $path = $file->storeAs('hero_sections', $filename, 'public');
                        
                        $images[] = [
                            'image' => 'storage/' . $path,
                            'title' => $request->input("image_title_$i", ''),
                            'description' => $request->input("image_description_$i", '')
                        ];
                    } elseif ($request->has("existing_image_$i")) {
                        $images[] = [
                            'image' => $request->input("existing_image_$i"),
                            'title' => $request->input("image_title_$i", ''),
                            'description' => $request->input("image_description_$i", '')
                        ];
                    }
                }
                $data['images'] = $images;
            } else {
                if ($request->hasFile('video')) {
                    $file = $request->file('video');
                    $filename = time() . '_video.' . $file->getClientOriginalExtension();
                    $path = $file->storeAs('hero_sections', $filename, 'public');
                    $data['video'] = 'storage/' . $path;
                } elseif ($request->has('existing_video')) {
                    $data['video'] = $request->existing_video;
                }
                $data['video_title'] = $request->video_title;
                $data['video_description'] = $request->video_description;
                $data['video_extra'] = $request->video_extra;
            }

            // If this hero section is being activated, deactivate all others
            if ($data['is_active']) {
                HeroSection::where('id', '!=', $id)->update(['is_active' => false]);
            }

            $heroSection->update($data);

            return response()->json(['success' => true, 'message' => 'Hero section updated successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function heroSectionDelete($id)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $heroSection = HeroSection::findOrFail($id);
            
            // Delete files
            if ($heroSection->type === 'image' && $heroSection->images) {
                foreach ($heroSection->images as $img) {
                    if (isset($img['image']) && Storage::disk('public')->exists(str_replace('storage/', '', $img['image']))) {
                        Storage::disk('public')->delete(str_replace('storage/', '', $img['image']));
                    }
                }
            } elseif ($heroSection->video && Storage::disk('public')->exists(str_replace('storage/', '', $heroSection->video))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $heroSection->video));
            }
            
            $heroSection->delete();

            return response()->json(['success' => true, 'message' => 'Hero section deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function heroSectionToggleActive($id)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $heroSection = HeroSection::findOrFail($id);
            $newState = !$heroSection->is_active;
            
            // If activating this hero section, deactivate all others
            if ($newState) {
                HeroSection::where('id', '!=', $id)->update(['is_active' => false]);
            }
            
            $heroSection->is_active = $newState;
            $heroSection->save();

            $message = $newState 
                ? 'Hero section activated successfully! All other hero sections have been deactivated.' 
                : 'Hero section deactivated successfully!';

            return response()->json([
                'success' => true,
                'message' => $message,
                'is_active' => $heroSection->is_active
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function heroSectionShow($id)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $heroSection = HeroSection::findOrFail($id);
            return response()->json(['success' => true, 'data' => $heroSection]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    public function userFormDetails(Request $request)
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login to access admin panel.');
        }

        $perPage = $request->get('per_page', 10);
        $search = $request->get('search', '');
        
        $query = \App\Models\Contact::orderBy('created_at', 'desc');
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('phone', 'like', '%' . $search . '%');
            });
        }
        
        $contacts = $query->paginate($perPage)->appends($request->query());

        return view('admin.user-form-details', compact('contacts', 'search'));
    }

    public function contactShow($id)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $contact = \App\Models\Contact::findOrFail($id);
            return response()->json([
                'success' => true,
                'contact' => $contact
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Contact not found'], 404);
        }
    }

    public function contactDelete($id)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $contact = \App\Models\Contact::findOrFail($id);
            $contact->delete();
            return response()->json([
                'success' => true,
                'message' => 'Contact deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting contact: ' . $e->getMessage()], 500);
        }
    }

    public function userSubscribeDetails(Request $request)
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login to access admin panel.');
        }

        $perPage = $request->get('per_page', 10);
        $search = $request->get('search', '');
        
        $query = Subscription::orderBy('created_at', 'desc');
        
        if ($search) {
            $query->where('email', 'like', '%' . $search . '%');
        }
        
        $subscriptions = $query->paginate($perPage)->appends($request->query());

        return view('admin.user-subscribe-details', compact('subscriptions', 'search'));
    }

    public function bulkDeleteSubscriptions(Request $request)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $ids = $request->input('ids', []);
            
            if (empty($ids)) {
                return response()->json(['success' => false, 'message' => 'No subscriptions selected'], 400);
            }
            
            Subscription::whereIn('id', $ids)->delete();
            
            return response()->json([
                'success' => true,
                'message' => count($ids) . ' subscription(s) deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting subscriptions: ' . $e->getMessage()], 500);
        }
    }

    public function settings()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login to access admin panel.');
        }

        return view('admin.settings');
    }
}