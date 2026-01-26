<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Cache;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Gallery;
use App\Models\Subscription;
use App\Models\HeroSection;
use App\Models\Room;
use App\Models\Contact;
use App\Models\AdminSetting;
use App\Models\StaffUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
        $loginType = $request->input('login_type', 'admin'); // admin or staff
        $key = 'login_attempts_' . $request->ip();

        // Rate limiting: 4 attempts per minute (60 seconds)
        $attempts = RateLimiter::attempts($key);
        if ($attempts >= 4) {
            $seconds = RateLimiter::availableIn($key);
            $minutes = ceil($seconds / 60);
            $message = $minutes > 1 
                ? "Too many login attempts. Please try again in {$minutes} minutes." 
                : "Too many login attempts. Please try again in 1 minute.";
            
            // Return JSON for AJAX requests
            if ($request->ajax() || $request->wantsJson() || $request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'error' => $message,
                    'rate_limited' => true,
                    'seconds_remaining' => $seconds
                ], 429);
            }
            
            return back()->with('error', $message)->withInput($request->except('password'));
        }

        if ($loginType === 'staff') {
            // Staff login: use StaffUser table (login_email or login_number)
            $staff = StaffUser::where('login_email', $username)
                ->orWhere('login_number', $username)
                ->first();

            if ($staff && $staff->is_active && Hash::check($password, $staff->password)) {
                RateLimiter::clear($key);
                Session::put('admin_logged_in', true);
                Session::put('admin_role', 'staff');
                Session::put('staff_id', $staff->id);
                Session::put('admin_username', $staff->name ?? 'Staff');
                Session::put('admin_email', $staff->login_email ?? '');
                Session::put('admin_login_time', now());

                return redirect()->route('admin.dashboard')->with('success', 'Welcome back, ' . ($staff->name ?? 'Staff') . '!');
            }
        } else {
            // Admin login (existing behaviour)
            $adminSettings = AdminSetting::first();
            
            if ($adminSettings && $adminSettings->admin_email && $adminSettings->admin_password) {
                if ($username === $adminSettings->admin_email && Hash::check($password, $adminSettings->admin_password)) {
                    RateLimiter::clear($key);
                    Session::put('admin_logged_in', true);
                    Session::put('admin_role', 'admin');
                    Session::put('admin_username', $adminSettings->admin_name ?? 'Admin');
                    Session::put('admin_email', $adminSettings->admin_email);
                    Session::put('admin_password_hash', $adminSettings->admin_password);
                    Session::put('admin_login_time', now());

                    return redirect()->route('admin.dashboard')->with('success', 'Welcome back, ' . ($adminSettings->admin_name ?? 'Admin') . '!');
                }
            } else {
                // Fallback default admin for first time
                if ($username === 'admin@gmail.com' && $password === 'Admin@123') {
                    if (!$adminSettings) {
                        $adminSettings = AdminSetting::create([
                            'admin_name' => 'admin',
                            'admin_email' => 'admin@gmail.com',
                            'admin_password' => 'Admin@123',
                        ]);
                    }
                    RateLimiter::clear($key);
                    Session::put('admin_logged_in', true);
                    Session::put('admin_role', 'admin');
                    Session::put('admin_username', 'admin');
                    Session::put('admin_email', 'admin@gmail.com');
                    Session::put('admin_password_hash', $adminSettings->admin_password);
                    Session::put('admin_login_time', now());

                    return redirect()->route('admin.dashboard')->with('success', 'Welcome back, Admin!');
                }
            }
        }

            // Increment rate limiter on failed attempt
            RateLimiter::hit($key, 60); // 60 seconds = 1 minute

        // Check if rate limited after failed attempt
        $attempts = RateLimiter::attempts($key);
        if ($attempts >= 4) {
            $seconds = RateLimiter::availableIn($key);
            $minutes = ceil($seconds / 60);
            $message = $minutes > 1 
                ? "Too many login attempts. Please try again in {$minutes} minutes." 
                : "Too many login attempts. Please try again in 1 minute.";
            return back()->with('error', $message)->withInput($request->except('password'));
        }

        return back()->with('error', 'Invalid email or password.')->withInput($request->except('password'));
    }

    public function logout()
    {
        Session::forget([
            'admin_logged_in',
            'admin_role',
            'admin_username',
            'admin_email',
            'admin_password_hash',
            'admin_login_time',
            'staff_id',
        ]);
        return redirect()->route('admin.login')->with('success', 'You have been logged out successfully.');
    }

    public function dashboard()
    {

        // Get counts from database
        $totalBlogs = Blog::count();
        $totalImages = Gallery::where('type', 'image')->count();
        $totalRooms = Room::count();
        $totalInquiries = Contact::count();

        // Get current month start and end dates
        $currentMonthStart = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();

        // Get subscribe users from current month only
        $subscribeUsers = Subscription::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        $totalSubscribes = Subscription::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count();

        // Get form submissions from current month only
        $formSubmissions = Contact::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
        $totalFormSubmissions = Contact::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count();

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

        $adminSettings = AdminSetting::first();
        return view('admin.profile', compact('adminSettings'));
    }

    public function profileUpdate(Request $request)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $request->validate([
                'admin_name' => 'nullable|string|max:255',
                'admin_email' => 'nullable|email|max:255',
                'admin_email_1' => 'nullable|email|max:255',
                'admin_email_2' => 'nullable|email|max:255',
                'admin_number_1' => 'nullable|string|max:50',
                'admin_number_2' => 'nullable|string|max:50',
                'admin_password' => 'nullable|string|min:6|max:255',
                'current_password' => 'nullable|string',
            ]);

            $adminSettings = AdminSetting::first();
            if (!$adminSettings) {
                $adminSettings = AdminSetting::create([]);
            }

            $updateData = [];

            // Update name if provided
            if ($request->has('admin_name')) {
                $updateData['admin_name'] = $request->admin_name;
            }

            // Update email if provided
            if ($request->has('admin_email') && $request->admin_email) {
                $updateData['admin_email'] = $request->admin_email;
            }

            // Update admin emails and numbers
            if ($request->has('admin_email_1')) {
                $updateData['admin_email_1'] = $request->admin_email_1;
            }
            if ($request->has('admin_email_2')) {
                $updateData['admin_email_2'] = $request->admin_email_2;
            }
            if ($request->has('admin_number_1')) {
                $updateData['admin_number_1'] = $request->admin_number_1;
            }
            if ($request->has('admin_number_2')) {
                $updateData['admin_number_2'] = $request->admin_number_2;
            }

            // Check if password is being changed
            $passwordChanged = false;
            if ($request->admin_password) {
                // Verify current password if provided
                if ($request->current_password && $adminSettings->admin_password) {
                    if (!Hash::check($request->current_password, $adminSettings->admin_password)) {
                        return response()->json(['success' => false, 'message' => 'Current password is incorrect'], 422);
                    }
                }
                $updateData['admin_password'] = $request->admin_password;
                $passwordChanged = true;
            }

            $adminSettings->update($updateData);

            // Update session
            if (isset($updateData['admin_name'])) {
                Session::put('admin_username', $updateData['admin_name']);
            }
            if (isset($updateData['admin_email'])) {
                Session::put('admin_email', $updateData['admin_email']);
            }
            
            // If password changed, update session password hash (this will invalidate other sessions)
            if ($passwordChanged) {
                Session::put('admin_password_hash', $adminSettings->fresh()->admin_password);
            }

            return response()->json([
                'success' => true, 
                'message' => $passwordChanged ? 'Profile and password updated successfully! Please login again on other devices.' : 'Profile updated successfully!'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error updating profile: ' . $e->getMessage()], 500);
        }
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

        // Newest items first (so newly added appears on top)
        $rooms = $query->orderBy('created_at', 'desc')->orderBy('order')->paginate($perPage)->appends($request->query());

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

        // Newest items first (so newly added appears on top)
        $heroSections = $query->orderBy('created_at', 'desc')->orderBy('order')->paginate($perPage)->appends($request->query());

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

        // Handle form submission
public function contactSubmit(Request $request)
{
    try {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'country_code' => 'required|string|max:5',
            'phone' => 'required|string|max:12',
            'room_type' => 'required|string',
            'checkin_date' => 'required|date',
            'checkout_date' => 'nullable|date|after_or_equal:checkin_date',
            'comments' => 'nullable|string|max:2000',
            'privacy_agreement' => 'accepted',
        ]);

        // Check for duplicate email
        $existing = Contact::where('email', $validated['email'])->first();
        if ($existing) {
            return redirect()->back()->with('error', 'You have already submitted a request with this email.');
        }

        // Save to DB inside transaction
        DB::beginTransaction();

        Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'country_code' => $validated['country_code'],
            'phone' => $validated['phone'],
            'room_type' => $validated['room_type'],
            'checkin_date' => $validated['checkin_date'],
            'checkout_date' => $validated['checkout_date'] ?? null,
            'comments' => $validated['comments'] ?? null,
        ]);

        DB::commit();

        return redirect()->back()->with('success', 'Thank you! Your request has been submitted successfully.');

    } catch (\Illuminate\Validation\ValidationException $e) {
        // Validation errors
        return redirect()->back()
            ->withErrors($e->errors())
            ->withInput()
            ->with('error', 'Please fix the highlighted errors.');

    } catch (\Exception $e) {
        // DB or unexpected errors
        DB::rollBack();
        return redirect()->back()->with('error', 'Something went wrong! Please try again later.');
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


public function subscribeStore(Request $request)
{
    try {
        $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        Subscription::create([
            'email' => $request->email,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Thanks for subscribing!',
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'message' => $e->errors()['email'][0],
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Something went wrong. Try again.',
        ], 500);
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

        // Get or create single settings record
        $settings = AdminSetting::first();
        if (!$settings) {
            $settings = AdminSetting::create([]);
        }

        return view('admin.settings', compact('settings'));
    }

    public function settingsStore(Request $request)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $request->validate([
                // Staff
                'staff_email_1' => 'nullable|email|max:255',
                'staff_email_2' => 'nullable|email|max:255',
                'staff_email_3' => 'nullable|email|max:255',
                'staff_number_1' => 'nullable|string|max:50',
                'staff_number_2' => 'nullable|string|max:50',
                'staff_number_3' => 'nullable|string|max:50',
                // Admin (at least 1 email and 1 number required)
                'admin_email_1' => 'nullable|email|max:255',
                'admin_email_2' => 'nullable|email|max:255',
                'admin_number_1' => 'nullable|string|max:50',
                'admin_number_2' => 'nullable|string|max:50',
                // Address
                'address' => 'nullable|string|max:500',
            ]);

            // Custom validation: At least 1 admin email and 1 admin number required
            $adminEmails = array_filter([
                $request->admin_email_1,
                $request->admin_email_2,
            ]);
            
            $adminNumbers = array_filter([
                $request->admin_number_1,
                $request->admin_number_2,
            ]);

            if (empty($adminEmails)) {
                return response()->json([
                    'success' => false,
                    'message' => 'At least one admin email is required',
                    'errors' => ['admin_email_1' => ['At least one admin email is required']]
                ], 422);
            }

            if (empty($adminNumbers)) {
                return response()->json([
                    'success' => false,
                    'message' => 'At least one admin number is required',
                    'errors' => ['admin_number_1' => ['At least one admin number is required']]
                ], 422);
            }

            // Get or create settings record
            $settings = AdminSetting::first();
            if (!$settings) {
                $settings = AdminSetting::create([]);
            }

            $settings->update($request->only([
                'staff_email_1', 'staff_email_2', 'staff_email_3',
                'staff_number_1', 'staff_number_2', 'staff_number_3',
                'admin_email_1', 'admin_email_2',
                'admin_number_1', 'admin_number_2',
                'address'
            ]));

            return response()->json(['success' => true, 'message' => 'Settings saved successfully!', 'settings' => $settings]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error saving settings: ' . $e->getMessage()], 500);
        }
    }

    public function settingsShow($id)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $settings = AdminSetting::findOrFail($id);
            return response()->json(['success' => true, 'settings' => $settings]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Settings not found'], 404);
        }
    }

    public function settingsUpdate(Request $request, $id)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $settings = AdminSetting::findOrFail($id);

            $request->validate([
                // Staff
                'staff_email_1' => 'nullable|email|max:255',
                'staff_email_2' => 'nullable|email|max:255',
                'staff_email_3' => 'nullable|email|max:255',
                'staff_number_1' => 'nullable|string|max:50',
                'staff_number_2' => 'nullable|string|max:50',
                'staff_number_3' => 'nullable|string|max:50',
                // Admin (at least 1 email and 1 number required)
                'admin_email_1' => 'nullable|email|max:255',
                'admin_email_2' => 'nullable|email|max:255',
                'admin_number_1' => 'nullable|string|max:50',
                'admin_number_2' => 'nullable|string|max:50',
                // Address
                'address' => 'nullable|string|max:500',
            ]);

            // Custom validation: At least 1 admin email and 1 admin number required
            $adminEmails = array_filter([
                $request->admin_email_1,
                $request->admin_email_2,
            ]);
            
            $adminNumbers = array_filter([
                $request->admin_number_1,
                $request->admin_number_2,
            ]);

            if (empty($adminEmails)) {
                return response()->json([
                    'success' => false,
                    'message' => 'At least one admin email is required',
                    'errors' => ['admin_email_1' => ['At least one admin email is required']]
                ], 422);
            }

            if (empty($adminNumbers)) {
                return response()->json([
                    'success' => false,
                    'message' => 'At least one admin number is required',
                    'errors' => ['admin_number_1' => ['At least one admin number is required']]
                ], 422);
            }

            $settings->update($request->only([
                'staff_email_1', 'staff_email_2', 'staff_email_3',
                'staff_number_1', 'staff_number_2', 'staff_number_3',
                'admin_email_1', 'admin_email_2',
                'admin_number_1', 'admin_number_2',
                'address'
            ]));

            return response()->json(['success' => true, 'message' => 'Settings updated successfully!', 'settings' => $settings]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error updating settings: ' . $e->getMessage()], 500);
        }
    }

    public function sendOTP(Request $request)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $request->validate([
                'phone_number' => 'required|string|max:50',
            ]);

            $adminSettings = AdminSetting::first();
            if (!$adminSettings) {
                return response()->json(['success' => false, 'message' => 'Admin settings not found'], 404);
            }

            // OTP is sent only to main admin number from DB
            $mainNumber = $adminSettings->admin_number_1;
            if (empty(trim((string) $mainNumber))) {
                return response()->json(['success' => false, 'message' => 'Please add your main phone number in Profile first.'], 422);
            }
            $normalized = $this->normalizePhoneForTwilio($request->phone_number);
            $normalizedMain = $this->normalizePhoneForTwilio($mainNumber);
            if ($normalized !== $normalizedMain) {
                return response()->json(['success' => false, 'message' => 'Phone number does not match your main admin number. OTP is sent only to the number in your profile.'], 422);
            }

            if (!preg_match('/^\+\d{10,15}$/', $normalized)) {
                return response()->json(['success' => false, 'message' => 'Invalid phone format. Use E.164 (e.g. +917877829435).'], 422);
            }

            $verifyServiceSid = config('services.twilio.verify_service_sid');
            if (!empty($verifyServiceSid)) {
                // Use Twilio Verify API (sends OTP itself)
                try {
                    $this->startTwilioVerify($normalized);
                    Session::put('otp_phone_to', $normalized);
                    return response()->json([
                        'success' => true,
                        'message' => 'OTP sent successfully to your phone number!',
                    ]);
                } catch (\Exception $e) {
                    \Log::error('Twilio Verify Error: ' . $e->getMessage());
                    $msg = 'Could not send OTP. ';
                    if (config('app.debug')) {
                        $msg .= $e->getMessage();
                    } else {
                        $msg .= 'Check TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN, TWILIO_VERIFY_SERVICE_SID in .env.';
                    }
                    return response()->json(['success' => false, 'message' => $msg], 500);
                }
            }

            // Fallback: generate OTP and send via Messages API
            $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $otpExpiresAt = Carbon::now()->addHours(24);
            $adminSettings->update([
                'otp' => $otp,
                'otp_expires_at' => $otpExpiresAt,
            ]);
            try {
                $this->sendTwilioSMS($mainNumber, "Your one time password for admin is: {$otp}");
            } catch (\Exception $e) {
                \Log::error('Twilio SMS Error: ' . $e->getMessage());
                $msg = 'Could not send OTP. ';
                if (config('app.debug')) {
                    $msg .= $e->getMessage();
                } else {
                    $msg .= 'Set TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN, TWILIO_PHONE_NUMBER in .env.';
                }
                return response()->json(['success' => false, 'message' => $msg], 500);
            }
            return response()->json([
                'success' => true,
                'message' => 'OTP sent successfully to your phone number!',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error sending OTP: ' . $e->getMessage()], 500);
        }
    }

    public function verifyOTP(Request $request)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $request->validate([
                'otp' => 'required|string|min:4|max:10',
            ]);

            $adminSettings = AdminSetting::first();
            if (!$adminSettings) {
                return response()->json(['success' => false, 'message' => 'Admin settings not found'], 404);
            }

            // Twilio Verify: check using VerificationCheck API
            $otpPhoneTo = Session::get('otp_phone_to');
            if (!empty($otpPhoneTo) && config('services.twilio.verify_service_sid')) {
                try {
                    $approved = $this->checkTwilioVerify($otpPhoneTo, $request->otp);
                    if ($approved) {
                        Session::forget('otp_phone_to');
                        Session::put('otp_verified', true);
                        Session::put('otp_verified_at', now());
                        return response()->json(['success' => true, 'message' => 'OTP verified successfully!']);
                    }
                } catch (\Exception $e) {
                    \Log::error('Twilio Verify Check Error: ' . $e->getMessage());
                    return response()->json(['success' => false, 'message' => 'Invalid or expired OTP. Please request a new one.'], 422);
                }
                return response()->json(['success' => false, 'message' => 'Invalid OTP. Please try again.'], 422);
            }

            // Fallback: DB OTP
            if (!$adminSettings->otp || !$adminSettings->otp_expires_at) {
                return response()->json(['success' => false, 'message' => 'No OTP found. Please request a new OTP.'], 422);
            }
            if (Carbon::now()->gt($adminSettings->otp_expires_at)) {
                return response()->json(['success' => false, 'message' => 'OTP has expired. Please request a new OTP.'], 422);
            }
            if ($adminSettings->otp !== $request->otp) {
                return response()->json(['success' => false, 'message' => 'Invalid OTP. Please try again.'], 422);
            }
            Session::put('otp_verified', true);
            Session::put('otp_verified_at', now());
            return response()->json(['success' => true, 'message' => 'OTP verified successfully!']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error verifying OTP: ' . $e->getMessage()], 500);
        }
    }

    public function resetPasswordOTP(Request $request)
    {
        if (!Session::has('admin_logged_in')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 401);
        }

        try {
            $request->validate([
                'password' => 'required|string|min:6|max:255',
                'confirm_password' => 'required|string|same:password',
            ]);

            // Check if OTP was verified
            if (!Session::get('otp_verified')) {
                return response()->json(['success' => false, 'message' => 'Please verify OTP first'], 422);
            }

            $adminSettings = AdminSetting::first();
            if (!$adminSettings) {
                return response()->json(['success' => false, 'message' => 'Admin settings not found'], 404);
            }

            // Update password
            $adminSettings->update([
                'admin_password' => $request->password, // Will be auto-hashed by model
                'otp' => null, // Clear OTP after use
                'otp_expires_at' => null,
            ]);

            // Clear OTP verification session
            Session::forget(['otp_verified', 'otp_verified_at', 'otp_phone_to']);

            // Logout user (password changed, need to login again)
            Session::flush();

            return response()->json([
                'success' => true, 
                'message' => 'Password reset successfully! Please login with your new password.'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error resetting password: ' . $e->getMessage()], 500);
        }
    }

    /** Twilio Verify API: start SMS verification. Twilio sends the OTP. */
    private function startTwilioVerify(string $to): void
    {
        $sid = config('services.twilio.account_sid');
        $token = config('services.twilio.auth_token');
        $serviceSid = config('services.twilio.verify_service_sid');
        if (!$sid || !$token || !$serviceSid) {
            throw new \Exception('Set TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN, TWILIO_VERIFY_SERVICE_SID in .env.');
        }
        $url = "https://verify.twilio.com/v2/Services/" . trim($serviceSid) . "/Verifications";
        // CustomMessage supports {{code}} placeholder in Verify templates
        $data = [
            'To' => $to,
            'Channel' => 'sms',
            'CustomFriendlyName' => 'Hotel Admin',
            'CustomMessage' => 'Hotel admin one time password is: {{code}}. Valid for 1 minute.',
        ];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "{$sid}:{$token}");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($httpCode < 200 || $httpCode >= 300) {
            $err = json_decode($response, true);
            $msg = $err['message'] ?? $err['error_message'] ?? 'Verify API error';
            throw new \Exception($msg);
        }
    }

    /** Twilio Verify API: check the code. Returns true if status is approved. */
    private function checkTwilioVerify(string $to, string $code): bool
    {
        $sid = config('services.twilio.account_sid');
        $token = config('services.twilio.auth_token');
        $serviceSid = config('services.twilio.verify_service_sid');
        if (!$sid || !$token || !$serviceSid) {
            throw new \Exception('Verify not configured.');
        }
        $url = "https://verify.twilio.com/v2/Services/" . trim($serviceSid) . "/VerificationCheck";
        $data = ['To' => $to, 'Code' => $code];
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "{$sid}:{$token}");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $body = json_decode($response, true);
        if ($httpCode === 404 || ($body && ($body['status'] ?? '') !== 'approved')) {
            return false;
        }
        return ($body['status'] ?? '') === 'approved' || ($body['valid'] ?? false) === true;
    }

    private function sendTwilioSMS($to, $message)
    {
        $accountSid = config('services.twilio.account_sid');
        $authToken = config('services.twilio.auth_token');
        $fromNumber = config('services.twilio.phone_number');

        if (!$accountSid || !$authToken || !$fromNumber) {
            throw new \Exception('Twilio credentials not configured. Set TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN, TWILIO_PHONE_NUMBER in .env.');
        }

        $to = $this->normalizePhoneForTwilio($to);
        if (!preg_match('/^\+\d{10,15}$/', $to)) {
            throw new \Exception('Phone number must be E.164 (e.g. +917877829435) or 10 digits.');
        }
        $fromNumber = preg_replace('/\s+/', '', trim((string) $fromNumber));

        $url = "https://api.twilio.com/2010-04-01/Accounts/{$accountSid}/Messages.json";
        $data = [
            'From' => $fromNumber,
            'To' => $to,
            'Body' => $message,
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "{$accountSid}:{$authToken}");
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 201) {
            $error = json_decode($response, true);
            $twilioMsg = $error['message'] ?? $error['error_message'] ?? 'Unknown error';
            $code = $error['code'] ?? null;
            throw new \Exception('Twilio: ' . ($code ? "{$code} - " : '') . $twilioMsg);
        }

        return true;
    }

    /** Normalize phone to E.164 for comparison and Twilio (strip spaces; 10 digits => +91). */
    private function normalizePhoneForTwilio($num): string
    {
        $n = preg_replace('/\s+/', '', trim((string) $num));
        if (preg_match('/^\d{10}$/', $n)) {
            return '+91' . $n;
        }
        if (preg_match('/^\+?\d{10,15}$/', $n)) {
            return (str_starts_with($n, '+') ? $n : '+' . $n);
        }
        return $n;
    }
}