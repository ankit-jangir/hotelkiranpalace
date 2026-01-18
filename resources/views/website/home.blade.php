@extends('common.layout')

@section('title', 'Home - Hotel Kiran Place')

@section('content')
<!-- Hero Section with Slider -->
<section class="hero-slider-section position-relative">
    <!-- Video Background (Fallback when images not available) -->
    <div class="hero-video-background position-absolute top-0 start-0 w-100 h-100" style="display: none; z-index: 1;">
        <video autoplay muted loop playsinline class="w-100 h-100 hero-video" style="object-fit: cover;">
            <source src="{{ asset('videos/home-page-new-video-35-sec-web.mp4') }}" type="video/mp4">
        </video>
        <div class="position-absolute top-0 start-0 w-100 h-100 hero-video-overlay" style="z-index: 2;"></div>
        <!-- Video Overlay Content -->
        <div class="carousel-caption position-absolute top-50 start-50 translate-middle text-center w-100" style="z-index: 3;">
            <p class="hero-subtitle mb-2">5-STAR HOTEL</p>
            <h1 class="hero-title mb-3">Hotel Kiran Place</h1>
            <p class="hero-tagline mb-4">Luxury Stay • Premium Comfort • Royal Experience</p>
            <div class="hero-buttons d-flex gap-3 justify-content-center">
                <a href="{{ route('contact') }}" class="btn btn-hero-primary">Book Now</a>
                <a href="{{ route('rooms') }}" class="btn btn-hero-outline">Explore Rooms</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap Carousel -->
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <!-- Carousel Indicators (3 Dots) -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Carousel Items -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active position-relative">
                <img src="{{ asset('images/hero_section_img1.png') }}" class="d-block w-100 hero-slide-img d-none d-xl-block" alt="Hotel Exterior" onerror="handleImageError(this, 0)">
                <video autoplay muted loop playsinline preload="auto" class="d-block d-xl-none w-100 h-100 hero-slide-video" style="object-fit: cover; width: 100%; height: 100%;">
                    <source src="{{ asset('videos/home-page-new-video-35-sec-web.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="carousel-overlay position-absolute top-0 start-0 w-100 h-100"></div>
                <div class="carousel-caption position-absolute top-50 start-50 translate-middle text-center w-100">
                    <p class="hero-subtitle mb-2">5-STAR HOTEL</p>
                    <h1 class="hero-title mb-3">Hotel Kiran Place</h1>
                    <p class="hero-tagline mb-4">Luxury Stay • Premium Comfort • Royal Experience</p>
                    <div class="hero-buttons d-flex gap-3 justify-content-center">
                        <a href="{{ route('contact') }}" class="btn btn-hero-primary">Book Now</a>
                        <a href="{{ route('rooms') }}" class="btn btn-hero-outline">Explore Rooms</a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item position-relative">
                <img src="{{ asset('images/hero_section_img2.jpg') }}" class="d-block w-100 hero-slide-img d-none d-xl-block" alt="Hotel Interior" onerror="handleImageError(this, 1)">
                <video autoplay muted loop playsinline preload="auto" class="d-block d-xl-none w-100 h-100 hero-slide-video" style="object-fit: cover; width: 100%; height: 100%;">
                    <source src="{{ asset('videos/home-page-new-video-35-sec-web.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="carousel-overlay position-absolute top-0 start-0 w-100 h-100"></div>
                <div class="carousel-caption position-absolute top-50 start-50 translate-middle text-center w-100">
                    <p class="hero-subtitle mb-2">LUXURY AWAITS</p>
                    <h1 class="hero-title mb-3">Experience Unmatched Elegance</h1>
                    <p class="hero-tagline mb-4">World-class amenities • Fine dining • Premium services • Unforgettable memories</p>
                    <div class="hero-buttons d-flex gap-3 justify-content-center">
                        <a href="{{ route('amenities') }}" class="btn btn-hero-primary">View Amenities</a>
                        <a href="{{ route('gallery') }}" class="btn btn-hero-outline">Photo Gallery</a>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item position-relative">
                <img src="{{ asset('images/hero_section_img3.jpg') }}" class="d-block w-100 hero-slide-img d-none d-xl-block" alt="Hotel Facilities" onerror="handleImageError(this, 2)">
                <video autoplay muted loop playsinline preload="auto" class="d-block d-xl-none w-100 h-100 hero-slide-video" style="object-fit: cover; width: 100%; height: 100%;">
                    <source src="{{ asset('videos/home-page-new-video-35-sec-web.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="carousel-overlay position-absolute top-0 start-0 w-100 h-100"></div>
                <div class="carousel-caption position-absolute top-50 start-50 translate-middle text-center w-100">
                    <p class="hero-subtitle mb-2">PERFECT FOR COUPLES</p>
                    <h1 class="hero-title mb-3">Romantic Getaway Destination</h1>
                    <p class="hero-tagline mb-4">Intimate suites • Special packages • Candlelight dinners • Couple spa treatments</p>
                    <div class="hero-buttons d-flex gap-3 justify-content-center">
                        <a href="{{ route('rooms') }}" class="btn btn-hero-primary">Romantic Packages</a>
                        <a href="{{ route('contact') }}" class="btn btn-hero-outline">Book Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="hero-scroll-indicator position-absolute bottom-0 start-50 translate-middle-x mb-3" style="z-index: 10;">
            <i class="fas fa-chevron-down text-white" style="font-size: 1.5rem; animation: bounce 2s infinite;"></i>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="container mb-5">
    <div class="row">
        <div class="col-md-6">
            <h2>About Hotel Kiran Place</h2>
            <p>Experience luxury and comfort at Hotel Kiran Place. We provide exceptional service and amenities for your perfect stay.</p>
            <a href="{{ route('about') }}" class="btn btn-primary">Learn More</a>
        </div>
        <div class="col-md-6">
            <img src="https://via.placeholder.com/600x400" alt="Hotel" class="img-fluid rounded">
        </div>
    </div>
</section>

<!-- Rooms Preview Section -->
<section class="bg-light py-5 mb-5">
    <div class="container">
        <h2 class="text-center mb-4">Our Rooms</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Room">
                    <div class="card-body">
                        <h5 class="card-title">Deluxe Room</h5>
                        <p class="card-text">Comfortable and spacious rooms for your stay.</p>
                        <a href="{{ route('rooms') }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Room">
                    <div class="card-body">
                        <h5 class="card-title">Suite Room</h5>
                        <p class="card-text">Luxury suites with premium amenities.</p>
                        <a href="{{ route('rooms') }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Room">
                    <div class="card-body">
                        <h5 class="card-title">Executive Room</h5>
                        <p class="card-text">Perfect for business travelers.</p>
                        <a href="{{ route('rooms') }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Amenities Preview Section -->
<section class="container mb-5">
    <h2 class="text-center mb-4">Our Amenities</h2>
    <div class="row">
        <div class="col-md-3 text-center mb-4">
            <div class="mb-3">
                <i class="fas fa-wifi fa-3x text-primary"></i>
            </div>
            <h5>Free WiFi</h5>
        </div>
        <div class="col-md-3 text-center mb-4">
            <div class="mb-3">
                <i class="fas fa-parking fa-3x text-primary"></i>
            </div>
            <h5>Parking</h5>
        </div>
        <div class="col-md-3 text-center mb-4">
            <div class="mb-3">
                <i class="fas fa-utensils fa-3x text-primary"></i>
            </div>
            <h5>Restaurant</h5>
        </div>
        <div class="col-md-3 text-center mb-4">
            <div class="mb-3">
                <i class="fas fa-swimming-pool fa-3x text-primary"></i>
            </div>
            <h5>Swimming Pool</h5>
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('amenities') }}" class="btn btn-primary">View All Amenities</a>
    </div>
</section>
@endsection

