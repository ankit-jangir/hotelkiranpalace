@php
    function dotWords($text) {
        if (!$text) return '';
        $words = preg_split('/\s+/', trim($text));
        return collect($words)->map(fn($w) => '.' . $w)->implode(' ');
    }
@endphp


@extends('common.layout')

@section('title', 'Home - Hotel Kiran Place')

@section('content')
<!-- Hero Section with Slider -->
{{-- <section class="hero-slider-section position-relative">
    <!-- Video Background (Fallback when images not available) -->
    <div class="hero-video-background position-absolute top-0 start-0 w-100 h-100" style="display: none; z-index: 1;">
        <video autoplay muted loop playsinline class="w-100 h-100 hero-video" style="object-fit: cover;">
            <source src="{{ asset('videos/home-page-new-video-35-sec-web.mp4') }}" type="video/mp4">
        </video>
        <div class="position-absolute top-0 start-0 w-100 h-100 hero-video-overlay" style="z-index: 2;"></div>
        <!-- Video Overlay Content -->
        <div class="carousel-caption position-absolute top-50 start-50 translate-middle text-center w-100"
            style="z-index: 3;">
            <p class="hero-subtitle mb-2">5-STAR HOTEL</p>
            <h1 class="hero-title mb-3">Hotel Kiran Place</h1>
            <p class="hero-tagline mb-4">Luxury Stay • Premium Comfort • Royal Experience</p>
            <div class="hero-buttons d-flex gap-3 justify-content-center">
                <a href="{{ route('contact') }}" class="btn btn-hero-primary"><span>Book Now</span></a>
                <a href="{{ route('rooms') }}" class="btn btn-hero-outline"><span>Explore Rooms</span></a>
            </div>
        </div>
    </div>

    <!-- Bootstrap Carousel -->
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <!-- Carousel Indicators (3 Dots) -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Carousel Items -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active position-relative">
                <img src="{{ asset('images/hero_section_img1.png') }}"
                    class="d-block w-100 hero-slide-img d-none d-xl-block" alt="Hotel Exterior" loading="eager"
                    data-no-skeleton onerror="handleImageError(this, 0)">
                <video autoplay muted loop playsinline preload="auto"
                    class="d-block d-xl-none w-100 h-100 hero-slide-video"
                    style="object-fit: cover; width: 100%; height: 100%;">
                    <source src="{{ asset('videos/home-page-new-video-35-sec-web.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="carousel-overlay position-absolute top-0 start-0 w-100 h-100"></div>
                <div class="carousel-caption position-absolute top-50 start-50 translate-middle text-center w-100">
                    <p class="hero-subtitle mb-2">5-STAR HOTEL</p>
                    <h1 class="hero-title mb-3">Hotel Kiran Place</h1>
                    <p class="hero-tagline mb-4">Luxury Stay • Premium Comfort • Royal Experience</p>
                    <div class="hero-buttons d-flex gap-3 justify-content-center">
                        <a href="{{ route('contact') }}" class="btn btn-hero-primary"><span>Book Now</span></a>
                        <a href="{{ route('rooms') }}" class="btn btn-hero-outline"><span>Explore Rooms</span></a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item position-relative">
                <img src="{{ asset('images/hero_section_img2.jpg') }}"
                    class="d-block w-100 hero-slide-img d-none d-xl-block" alt="Hotel Interior" loading="eager"
                    data-no-skeleton onerror="handleImageError(this, 1)">
                <video autoplay muted loop playsinline preload="auto"
                    class="d-block d-xl-none w-100 h-100 hero-slide-video"
                    style="object-fit: cover; width: 100%; height: 100%;">
                    <source src="{{ asset('videos/home-page-new-video-35-sec-web.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="carousel-overlay position-absolute top-0 start-0 w-100 h-100"></div>
                <div class="carousel-caption position-absolute top-50 start-50 translate-middle text-center w-100">
                    <p class="hero-subtitle mb-2">LUXURY AWAITS</p>
                    <h1 class="hero-title mb-3">Experience Unmatched Elegance</h1>
                    <p class="hero-tagline mb-4">World-class amenities • Fine dining • Premium services • Unforgettable
                        memories</p>
                    <div class="hero-buttons d-flex gap-3 justify-content-center">
                        <a href="{{ route('amenities') }}" class="btn btn-hero-primary"><span>View Amenities</span></a>
                        <a href="{{ route('gallery') }}" class="btn btn-hero-outline"><span>Photo Gallery</span></a>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item position-relative">
                <img src="{{ asset('images/hero_section_img3.jpg') }}"
                    class="d-block w-100 hero-slide-img d-none d-xl-block" alt="Hotel Facilities" loading="eager"
                    data-no-skeleton onerror="handleImageError(this, 2)">
                <video autoplay muted loop playsinline preload="auto"
                    class="d-block d-xl-none w-100 h-100 hero-slide-video"
                    style="object-fit: cover; width: 100%; height: 100%;">
                    <source src="{{ asset('videos/home-page-new-video-35-sec-web.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="carousel-overlay position-absolute top-0 start-0 w-100 h-100"></div>
                <div class="carousel-caption position-absolute top-50 start-50 translate-middle text-center w-100">
                    <p class="hero-subtitle mb-2">PERFECT FOR COUPLES</p>
                    <h1 class="hero-title mb-3">Romantic Getaway Destination</h1>
                    <p class="hero-tagline mb-4">Intimate suites • Special packages • Candlelight dinners • Couple spa
                        treatments</p>
                    <div class="hero-buttons d-flex gap-3 justify-content-center">
                        <a href="{{ route('rooms') }}" class="btn btn-hero-primary"><span>Romantic Packages</span></a>
                        <a href="{{ route('contact') }}" class="btn btn-hero-outline"><span>Book Now</span></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="hero-scroll-indicator position-absolute bottom-0 start-50 translate-middle-x mb-3"
            style="z-index: 10;">
            <i class="fas fa-chevron-down text-white" style="font-size: 1.5rem; animation: bounce 2s infinite;"></i>
        </div>
    </div>
</section> --}}
{{-- ================= VIDEO TYPE ================= --}}
@if($heroType === 'video' && $heroVideo)

<section class="hero-slider-section position-relative" style="min-height:100vh; overflow:hidden;">

    {{-- VIDEO --}}
    <video autoplay muted loop playsinline
           class="position-absolute top-0 start-0 w-100 h-100"
           style="object-fit:cover; z-index:1;">
        <source src="{{ $heroVideo }}" type="video/mp4">
    </video>

    {{-- OVERLAY --}}
    <div class="position-absolute top-0 start-0 w-100 h-100 hero-video-overlay"
         style="z-index:2;"></div>

    {{-- TEXT SLIDER --}}
    <div id="heroVideoText"
         class="carousel slide position-relative"
         data-bs-ride="carousel"
         data-bs-interval="4000"
         style="z-index:3; min-height:100vh;">

        <div class="carousel-inner h-100">

            {{-- SLIDE 1 --}}
            <div class="carousel-item active h-100">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100 text-center">

                    <p class="hero-subtitle mb-2">
                        {{ $heroTexts['main_title'] }}
                    </p>

                    <h1 class="hero-title mb-3">
                        {{ $heroTexts['main_desc'] }}
                    </h1>

                    <p class="hero-tagline mb-4">
                        {{ dotWords($heroTexts['main_desc']) }}
                    </p>

                    <div class="hero-buttons d-flex gap-3 justify-content-center">
                        <a href="{{ route('contact') }}" class="btn btn-hero-primary">Book Now</a>
                        <a href="{{ route('rooms') }}" class="btn btn-hero-outline">Explore Rooms</a>
                    </div>
                </div>
            </div>

            {{-- SLIDE 2 --}}
            <div class="carousel-item h-100">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100 text-center">

                    <p class="hero-subtitle mb-2">
                        {{ $heroTexts['video_title'] }}
                    </p>

                    <h1 class="hero-title mb-3">
                        {{ $heroTexts['video_desc'] }}
                    </h1>

                    <p class="hero-tagline mb-4">
                        {{ dotWords($heroTexts['video_extra']) }}
                    </p>

                    <div class="hero-buttons d-flex gap-3 justify-content-center">
                        <a href="{{ route('rooms') }}" class="btn btn-hero-primary">Romantic Packages</a>
                        <a href="{{ route('contact') }}" class="btn btn-hero-outline">Book Now</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>


{{-- ================= IMAGE TYPE ================= --}}
@elseif($heroType === 'image' && !empty($heroImages))

    <div id="heroCarousel"
         class="carousel slide carousel-fade"
         data-bs-ride="carousel"
         data-bs-interval="5000">

        {{-- INDICATORS --}}
        <div class="carousel-indicators">
            @foreach($heroImages as $i => $img)
                <button type="button"
                        data-bs-target="#heroCarousel"
                        data-bs-slide-to="{{ $i }}"
                        class="{{ $i === 0 ? 'active' : '' }}"></button>
            @endforeach
        </div>

        {{-- SLIDES --}}
        <div class="carousel-inner">

            @foreach($heroImages as $i => $img)
            <div class="carousel-item {{ $i === 0 ? 'active' : '' }} position-relative">

                <img src="{{ asset('storage/'.$img['image']) }}"
                     class="d-block w-100"
                     style="min-height:100vh; object-fit:cover;">

                <div class="carousel-overlay position-absolute top-0 start-0 w-100 h-100"></div>

                <div class="carousel-caption position-absolute top-50 start-50 translate-middle text-center w-100">

                    <p class="hero-subtitle mb-2">
                        {{ $img['title'] }}
                    </p>

                    <h1 class="hero-title mb-3">
                        {{ $img['title'] }}
                    </h1>

                    <p class="hero-tagline mb-4">
                        {{ dotWords($img['description']) }}
                    </p>

                  <div class="hero-buttons d-flex gap-3 justify-content-center">
                        <a href="{{ route('rooms') }}" class="btn btn-hero-primary"><span>Romantic Packages</span></a>
                        <a href="{{ route('contact') }}" class="btn btn-hero-outline"><span>Book Now</span></a>
                    </div>

                </div>
            </div>
            @endforeach

        </div>

        {{-- SCROLL ICON --}}
        <div class="hero-scroll-indicator position-absolute bottom-0 start-50 translate-middle-x mb-3">
            <i class="fas fa-chevron-down text-white"
               style="font-size:1.5rem; animation:bounce 2s infinite;"></i>
        </div>
    </div>
@endif

</section>


<!-- Latest Blog Section (Common Component) -->
@include('common.latest-blog')

<!-- Welcome to Hotel Kiran Palace Section -->
<section class="welcome-section py-5">
    <div class="container">
        <div class="row align-items-center g-4">
            <!-- Image Column (Left on Desktop, Top on Mobile) -->
            <div class="col-lg-6 col-md-12 order-1 order-lg-1">
                <div class="welcome-image-container position-relative">
                    <img src="{{ asset('images/hero_section_img1.png') }}" alt="Hotel Kiran Palace Lobby"
                        class="welcome-image img-fluid rounded" loading="lazy">
                </div>
            </div>

            <!-- Content Column (Right on Desktop, Bottom on Mobile) -->
            <div class="col-lg-6 col-md-12 order-2 order-lg-2">
                <h2 class="welcome-heading mb-3">Welcome to Hotel Kiran Palace</h2>
                <p class="welcome-description mb-4">Experience unparalleled luxury and royal hospitality at Hotel Kiran
                    Palace. Our premium accommodations blend traditional elegance with modern comfort, offering you an
                    unforgettable stay in the heart of luxury.</p>

                <!-- Feature Boxes -->
                <div class="welcome-features">
                    <div class="welcome-feature-box mb-3">
                        <div class="d-flex align-items-start">
                            <div class="feature-icon-wrapper me-3">
                                <i class="fas fa-concierge-bell feature-icon"></i>
                            </div>
                            <div class="feature-content">
                                <h5 class="feature-title mb-1">24x7 Room Service</h5>
                                <p class="feature-description mb-0">Round-the-clock service for all your needs</p>
                            </div>
                        </div>
                    </div>

                    <div class="welcome-feature-box mb-3">
                        <div class="d-flex align-items-start">
                            <div class="feature-icon-wrapper me-3">
                                <i class="fas fa-crown feature-icon"></i>
                            </div>
                            <div class="feature-content">
                                <h5 class="feature-title mb-1">Premium Rooms</h5>
                                <p class="feature-description mb-0">Elegantly designed with luxury amenities</p>
                            </div>
                        </div>
                    </div>

                    <div class="welcome-feature-box mb-3">
                        <div class="d-flex align-items-start">
                            <div class="feature-icon-wrapper me-3">
                                <i class="fas fa-utensils feature-icon"></i>
                            </div>
                            <div class="feature-content">
                                <h5 class="feature-title mb-1">Fine Dining Restaurant</h5>
                                <p class="feature-description mb-0">Exquisite cuisine crafted by expert chefs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Royal Rooms Section (Common Component) -->
@include('common.rooms-preview')

<!-- Amenities Preview Section (Common Component) -->
@include('common.amenities-preview')

<!-- Testimonials Preview Section (Common Component) -->
@include('common.testimonials-preview')

<!-- Gallery Preview Section (Common Component) -->
@include('common.gallery-preview')

<!-- Instagram Section (Common Component) -->
{{-- @include('common.instagram-section') --}}
@include('common.instagram-section')

<!-- Visit Hotel Kiran Palace Section (Common Component) -->
@include('common.visit-section')
@endsection