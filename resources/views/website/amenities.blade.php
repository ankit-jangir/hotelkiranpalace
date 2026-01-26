@extends('common.layout')

@section('title', 'Amenities - Hotel Kiran Place')

@section('content')


<!-- hero -->

<section class="amenities-royal-section">
    <div class="container">
        <div class="row align-items-center">

            <!-- Left Content -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="amenities-royal-content">
                    <h2>Designed for Royal Comfort</h2>
                    <p>
                        At Hotel Kiran Palace, every amenity is crafted to deliver
                        unmatched luxury, comfort and elegance. From indulgent
                        spa experiences to royal dining and grand banquet halls,
                        we ensure a majestic stay for every guest.
                    </p>
                </div>
            </div>

            <!-- Right Image -->
            <div class="col-lg-6">
                <div class="amenities-royal-image">
                    <img src="{{ asset('/images/kiran-1.jpg') }}" alt="Hotel Kiran Palace">
                </div>
            </div>

        </div>
    </div>
</section>

<section class="amenities-section">
    <div class="container">

        <div class="amenities-heading text-center mb-5">
            <span>Hotel Kiran Palace</span>
            <h1>Amenities & Facilities</h1>
        </div>

        <div class="row g-4">

            @php
            $amenities = [
            ['icon' => 'fa-wifi', 'title' => 'Free WiFi', 'desc' => 'High-speed internet access available throughout the
            hotel.'],
            ['icon' => 'fa-parking', 'title' => 'Free Parking', 'desc' => 'Safe and spacious parking facility for all
            guests.'],
            ['icon' => 'fa-utensils', 'title' => 'Restaurant', 'desc' => 'Enjoy delicious multi-cuisine meals prepared
            by expert chefs.'],
            ['icon' => 'fa-swimming-pool', 'title' => 'Swimming Pool', 'desc' => 'Relax and refresh yourself in our
            clean swimming pool.'],
            ['icon' => 'fa-dumbbell', 'title' => 'Fitness Center', 'desc' => 'Modern gym equipment to keep you fit
            during your stay.'],
            ['icon' => 'fa-concierge-bell', 'title' => '24×7 Room Service', 'desc' => 'Round-the-clock room service for
            your comfort.'],
            ['icon' => 'fa-spa', 'title' => 'Spa & Wellness', 'desc' => 'Rejuvenate your body and mind with relaxing spa
            services.'],
            ['icon' => 'fa-briefcase', 'title' => 'Business Center', 'desc' => 'Fully equipped space for meetings and
            work needs.'],
            ['icon' => 'fa-shuttle-van', 'title' => 'Airport Transfer', 'desc' => 'Pickup & drop facility available on
            request.'],
            ['icon' => 'fa-key', 'title' => 'Safe Deposit', 'desc' => 'Secure lockers available for your valuable
            belongings.'],
            ];
            @endphp

            @foreach($amenities as $item)
            <div class="col-lg-4 col-md-6">
                <div class="amenity-card">
                    <div class="amenity-icon">
                        <i class="fas {{ $item['icon'] }}"></i>
                    </div>
                    <h5>{{ $item['title'] }}</h5>
                    <p>{{ $item['desc'] }}</p>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>
@include('common.testimonials-preview')
@endsection