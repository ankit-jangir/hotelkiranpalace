<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

        return view('admin.dashboard');
    }

    public function profile()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login to access admin panel.');
        }

        return view('admin.profile');
    }

    public function blogs()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login to access admin panel.');
        }

        return view('admin.blogs');
    }

    public function gallery()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login to access admin panel.');
        }

        return view('admin.gallery');
    }

    public function rooms()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login to access admin panel.');
        }

        return view('admin.rooms');
    }

    public function heroSection()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login to access admin panel.');
        }

        return view('admin.hero-section');
    }

    public function userFormDetails()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login to access admin panel.');
        }

        return view('admin.user-form-details');
    }

    public function userSubscribeDetails()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login to access admin panel.');
        }

        return view('admin.user-subscribe-details');
    }

    public function settings()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'Please login to access admin panel.');
        }

        return view('admin.settings');
    }
}
