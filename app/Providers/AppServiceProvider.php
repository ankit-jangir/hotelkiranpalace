<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use App\Models\Testimonial;
use App\Models\HeroSection;
use App\Models\AdminSetting;
use App\Models\Gallery;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Bootstrap pagination
        Paginator::useBootstrapFive();

        // GLOBAL admin setting (available everywhere)
        $adminSetting = AdminSetting::first(); 
        View::share('adminSetting', $adminSetting);

        // COMMON instagram section data
        View::composer('common.instagram-section', function ($view) {
            $instagramVideos = Gallery::where('type', 'video')
                ->latest()
                ->take(9)
                ->get();

            $view->with('instagramVideos', $instagramVideos);
        });
        
         View::composer('common.gallery-preview', function ($view) {
            // Fetch 12 latest images
        $galleryImages = Gallery::where('type', 'image')
            ->latest()
            ->take(12) 
            ->get();

                // Fetch the latest video
   $latestVideo = Gallery::where('type', 'video')
    ->whereYear('created_at', Carbon::now()->year)
    ->whereMonth('created_at', Carbon::now()->month)
    ->latest()
    ->first();

// fallback
if (!$latestVideo) {
    $latestVideo = Gallery::where('type', 'video')->latest()->first();
}
        $view->with([
        'galleryImages' => $galleryImages,
        'latestVideo' => $latestVideo,
    ]);
    });


    ////
    View::composer('common.testimonials-preview', function ($view) {
    // Fetch first active hero section image
    $heroSection = HeroSection::where('is_active', true)
        ->where('type', 'image')
        ->orderBy('order')
        ->first();

    $mainImage = $heroSection && isset($heroSection->images[0]['image']) 
        ? $heroSection->images[0]['image'] 
        : null;

    // Fetch all testimonials
    $testimonials = Testimonial::orderBy('id', 'asc')->get();

    $view->with([
        'mainImage' => $mainImage,
        'testimonials' => $testimonials,
    ]);
});


////Hero_section_all_pages
//// Hero section for all pages (image / video)
View::composer('*', function ($view) {

    $heroSection = HeroSection::where('is_active', 1)
        ->latest('created_at')
        ->first();

    $heroBgImage = null;
    $heroBgVideo = null;

    if ($heroSection) {

        // IMAGE TYPE
        if (
            $heroSection->type === 'image' &&
            is_array($heroSection->images) &&
            isset($heroSection->images[0]['image'])
        ) {
            $heroBgImage = asset('storage/' . $heroSection->images[0]['image']);
        }

        // VIDEO TYPE
        if (
            $heroSection->type === 'video' &&
            !empty($heroSection->video)
        ) {
            $heroBgVideo = asset('storage/' . $heroSection->video);
        }
    }

    $view->with([
        'heroBgImage' => $heroBgImage,
        'heroBgVideo' => $heroBgVideo,
    ]);
});

// HOME PAGE hero (full control)
View::composer('website.home', function ($view) {

    $hero = HeroSection::where('is_active', 1)
        ->latest('created_at')
        ->first();

    $data = [
        'heroType'      => null,
        'heroImages'    => [],
        'heroVideo'     => null,
        'heroTexts'     => [],
    ];

    if ($hero) {
        $data['heroType'] = $hero->type;

        // IMAGE TYPE
        if ($hero->type === 'image' && is_array($hero->images)) {
            $data['heroImages'] = $hero->images;
        }

        // VIDEO TYPE
        if ($hero->type === 'video') {
            $data['heroVideo'] = !empty($hero->video)
                ? asset('storage/' . $hero->video)
                : null;
        }

        // TEXT DATA (common)
        $data['heroTexts'] = [
            'main_title'   => $hero->title,
            'main_desc'    => $hero->description,
            'video_title'  => $hero->video_title,
            'video_desc'   => $hero->video_description,
            'video_extra'  => $hero->video_extra,
        ];
    }

    $view->with($data);
});


    }
    
}