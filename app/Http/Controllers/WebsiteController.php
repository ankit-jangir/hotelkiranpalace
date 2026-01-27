<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
class WebsiteController extends Controller
{
    public function home()
    {
        return view('website.home');
    }

    public function about()
    {
        return view('website.about');
    }

    public function rooms()
    {
        return view('website.rooms');
    }

    public function amenities()
    {
        return view('website.amenities');
    }

public function gallery()
{
    $galleries = Gallery::orderBy('created_at', 'desc')->get();

    $imageGalleries = $galleries->where('type', 'image');
    $videoGalleries = $galleries->where('type', 'video');

    return view('website.gallery', compact(
        'galleries',
        'imageGalleries',
        'videoGalleries'
    ));
}


    public function contact()
    {
        return view('website.contact');
    }

    // public function contactSubmit(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'phone' => 'required|string|max:20',
    //         'country_code' => 'required|string|max:10',
    //         'room_type' => 'nullable|string|max:255',
    //         'checkin_date' => 'nullable|date',
    //         'checkout_date' => 'nullable|date|after_or_equal:checkin_date',
    //         'comments' => 'nullable|string',
    //     ]);

    //     \App\Models\Contact::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'country_code' => $request->country_code ?? '+91',
    //         'phone' => $request->phone,
    //         'room_type' => $request->room_type,
    //         'checkin_date' => $request->checkin_date,
    //         'checkout_date' => $request->checkout_date,
    //         'comments' => $request->comments,
    //     ]);

    //     return back()->with('success', 'Thank you for your message. We will get back to you soon!');
    // }

    public function terms()
    {
        return view('website.terms');
    }

    public function privacy()
    {
        return view('website.privacy');
    }

    public function faq()
    {
        return view('website.faq');
    }

    public function blog()
    {
        return view('website.blog');
    }

    public function bookingPolicy()
    {
        return view('website.booking-policy');
    }

    public function cancellationPolicy()
    {
        return view('website.cancellation-policy');
    }

    public function roomDetail($slug)
    {
        $roomData = [
            'deluxe-room' => [
                'title' => 'Deluxe Room',
                'price' => '₹3,500',
                'description' => 'Spacious room with modern amenities and elegant decor for a comfortable stay.',
                'image' => asset('images/hero_section_img1.png'),
            ],
            'super-deluxe-room' => [
                'title' => 'Super Deluxe Room',
                'price' => '₹5,000',
                'description' => 'Enhanced luxury with additional space and premium furnishings for ultimate comfort.',
                'image' => asset('images/hero_section_img2.jpg'),
            ],
            'suite-room' => [
                'title' => 'Suite Room',
                'price' => '₹8,500',
                'description' => 'Our finest accommodation with separate living area and royal amenities.',
                'image' => asset('images/hero_section_img3.jpg'),
            ],
            'executive-room' => [
                'title' => 'Executive Room',
                'price' => '₹4,500',
                'description' => 'Business-class room designed for corporate travelers with work desk and high-speed internet.',
                'image' => asset('images/hero_section_img1.png'),
            ],
        ];

        $room = $roomData[$slug] ?? $roomData['deluxe-room'];
        $room['slug'] = $slug;

        return view('website.room-detail', compact('room'));
    }
}
