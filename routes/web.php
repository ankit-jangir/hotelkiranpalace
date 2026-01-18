<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AdminController;

// Website Routes
Route::get('/', [WebsiteController::class, 'home'])->name('home');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/rooms', [WebsiteController::class, 'rooms'])->name('rooms');
Route::get('/amenities', [WebsiteController::class, 'amenities'])->name('amenities');
Route::get('/gallery', [WebsiteController::class, 'gallery'])->name('gallery');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
Route::post('/contact', [WebsiteController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/terms', [WebsiteController::class, 'terms'])->name('terms');
Route::get('/privacy', [WebsiteController::class, 'privacy'])->name('privacy');
Route::get('/faq', [WebsiteController::class, 'faq'])->name('faq');
Route::get('/blog', [WebsiteController::class, 'blog'])->name('blog');

// Admin Login Routes (Hardcoded URL pattern)
Route::get('/login/hotelkiranpalace/admin', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/login/hotelkiranpalace/admin', [AdminController::class, 'login'])->name('admin.login.submit');

// Admin Routes (Protected)
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    
    // Add more admin routes here
    // Route::get('/content', [AdminController::class, 'content'])->name('admin.content');
    // Route::get('/rooms', [AdminController::class, 'rooms'])->name('admin.rooms');
    // Route::get('/gallery', [AdminController::class, 'gallery'])->name('admin.gallery');
});
