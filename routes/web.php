<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AdminController;

// Website Routes
Route::get('/', [WebsiteController::class, 'home'])->name('home');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/rooms', [WebsiteController::class, 'rooms'])->name('rooms');
Route::get('/room/{slug}', [WebsiteController::class, 'roomDetail'])->name('room.detail');
Route::get('/amenities', [WebsiteController::class, 'amenities'])->name('amenities');
Route::get('/gallery', [WebsiteController::class, 'gallery'])->name('gallery');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
Route::post('/contact', [AdminController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/terms', [WebsiteController::class, 'terms'])->name('terms');
Route::get('/privacy', [WebsiteController::class, 'privacy'])->name('privacy');
Route::get('/faq', [WebsiteController::class, 'faq'])->name('faq');
Route::get('/blog', [WebsiteController::class, 'blog'])->name('blog');
Route::get('/booking-policy', [WebsiteController::class, 'bookingPolicy'])->name('booking.policy');
Route::get('/cancellation-policy', [WebsiteController::class, 'cancellationPolicy'])->name('cancellation.policy');

// Admin Login Routes (Hardcoded URL pattern)
Route::get('/login/hotelkiranpalace/admin', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/login/hotelkiranpalace/admin', [AdminController::class, 'login'])->name('admin.login.submit');

// Admin Routes (Protected)
Route::prefix('admin')->middleware('admin.session')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/blogs', [AdminController::class, 'blogs'])->name('admin.blogs');
    Route::post('/blogs', [AdminController::class, 'blogStore'])->name('admin.blogs.store');
    Route::get('/blogs/{id}', [AdminController::class, 'blogShow'])->name('admin.blogs.show');
    Route::put('/blogs/{id}', [AdminController::class, 'blogUpdate'])->name('admin.blogs.update');
    Route::delete('/blogs/{id}', [AdminController::class, 'blogDelete'])->name('admin.blogs.delete');
    Route::post('/blogs/{id}/toggle-active', [AdminController::class, 'blogToggleActive'])->name('admin.blogs.toggle-active');
    Route::get('/gallery', [AdminController::class, 'gallery'])
        ->name('admin.gallery');

    Route::post('/gallery/store', [AdminController::class, 'store'])
        ->name('admin.gallery.store');
    
    Route::get('/gallery/{id}', [AdminController::class, 'galleryShow'])
        ->name('admin.gallery.show');

    Route::delete('/gallery/{id}', [AdminController::class, 'galleryDelete'])->name('admin.gallery.delete');
    Route::get('/rooms', [AdminController::class, 'rooms'])->name('admin.rooms');
    Route::post('/rooms', [AdminController::class, 'roomStore'])->name('admin.rooms.store');
    Route::get('/rooms/{id}', [AdminController::class, 'roomShow'])->name('admin.rooms.show');
    Route::put('/rooms/{id}', [AdminController::class, 'roomUpdate'])->name('admin.rooms.update');
    Route::delete('/rooms/{id}', [AdminController::class, 'roomDelete'])->name('admin.rooms.delete');
    Route::post('/rooms/{id}/toggle-active', [AdminController::class, 'roomToggleActive'])->name('admin.rooms.toggle-active');
    Route::get('/hero-section', [AdminController::class, 'heroSection'])->name('admin.hero-section');
    Route::post('/hero-section', [AdminController::class, 'heroSectionStore'])->name('admin.hero-section.store');
    Route::put('/hero-section/{id}', [AdminController::class, 'heroSectionUpdate'])->name('admin.hero-section.update');
    Route::delete('/hero-section/{id}', [AdminController::class, 'heroSectionDelete'])->name('admin.hero-section.delete');
    Route::post('/hero-section/{id}/toggle-active', [AdminController::class, 'heroSectionToggleActive'])->name('admin.hero-section.toggle-active');
    Route::get('/hero-section/{id}', [AdminController::class, 'heroSectionShow'])->name('admin.hero-section.show');
    Route::get('/user-form-details', [AdminController::class, 'userFormDetails'])->name('admin.user-form-details');
    Route::get('/contacts/{id}', [AdminController::class, 'contactShow'])->name('admin.contacts.show');
    Route::delete('/contacts/{id}', [AdminController::class, 'contactDelete'])->name('admin.contacts.delete');
    Route::get('/user-subscribe-details', [AdminController::class, 'userSubscribeDetails'])->name('admin.user-subscribe-details');
    Route::post('/subscribe', [AdminController::class, 'subscribeStore'])
    ->name('subscribe.store');
    Route::post('/subscriptions/bulk-delete', [AdminController::class, 'bulkDeleteSubscriptions'])->name('admin.subscriptions.bulk-delete');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('/settings', [AdminController::class, 'settingsStore'])->name('admin.settings.store');
    Route::put('/settings/{id}', [AdminController::class, 'settingsUpdate'])->name('admin.settings.update');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/profile', [AdminController::class, 'profileUpdate'])->name('admin.profile.update');
    Route::post('/send-otp', [AdminController::class, 'sendOTP'])->name('admin.send-otp');
    Route::post('/verify-otp', [AdminController::class, 'verifyOTP'])->name('admin.verify-otp');
    Route::post('/reset-password-otp', [AdminController::class, 'resetPasswordOTP'])->name('admin.reset-password-otp');
});

// Logout route (outside middleware so user can logout even if password changed)
Route::prefix('admin')->group(function () {
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});
