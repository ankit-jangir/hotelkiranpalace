<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('website.gallery');
    }

    public function contact()
    {
        return view('website.contact');
    }

    public function contactSubmit(Request $request)
    {
        return back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }

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
}
