@extends('common.layout')

@section('title', 'Rooms & Tariff - Hotel Kiran Place')

@section('content')

@php
$rooms = [
[
'slug' => 'deluxe-room',
'image' => '../../../images/hero_section_img3.jpg',
'price' => '₹2,500',
'title' => 'Deluxe Room',
'desc' => 'Beautifully designed room with modern furnishings, offering premium comfort for a relaxing stay.',
'features' => ['King Size Bed', 'Free WiFi', 'AC', '32” TV'],
],
[
'slug' => 'Suite room',
'image' => '../../../images/rooms-1.jpg',
'price' => '₹5,000',
'title' => 'Suite Room',
'desc' => 'Luxury suite with elegant interiors, separate seating area and premium amenities.',
'features' => ['King Size Bed', 'Living Area', 'Mini Bar', 'Free WiFi'],
],
[
'slug' => 'Double room',
'image' => '../../../images/rooms-2.jpg',
'price' => '₹8,000',
'title' => 'Double Room',
'desc' => 'Luxury suite with elegant interiors, separate seating area and premium amenities.',
'features' => ['King Size Bed', 'AC', 'TV', 'Free WiFi'],
],
];
@endphp

<div class="container my-5">
    <h1 class="text-center mb-5">Rooms & Tariff</h1>

    @foreach($rooms as $index => $room)
    <div class="room-row mb-5 {{ $index % 2 !== 0 ? 'reverse' : '' }}">
        <div class="room-image">
            <img src="{{ asset($room['image']) }}" alt="{{ $room['title'] }}">
        </div>

        <div class="room-card">
            <span class="room-price">From {{ $room['price'] }} / night</span>
            <h3>{{ $room['title'] }}</h3>
            <p>{{ $room['desc'] }}</p>

            <div class="room-features">
                @foreach($room['features'] as $feature)
                <span>{{ $feature }}</span>
                @endforeach
            </div>

            <div class="room-actions">
                <a href="{{ route('contact') }}" class="btn-book">Book Now</a>
                <a href="{{ route('room.detail', $room['slug']) }}" class="btn-link">
                    Read more →
                </a>

            </div>
        </div>
    </div>

    @endforeach

</div>
<!-- MAIN FACILITIES -->
<section class="main-facilities">
    <div class="facilities-overlay"></div>

    <div class="container">
        <div class="facilities-heading text-center">
            <span>Hotel Kiran Palace</span>
            <h2>Main Facilities</h2>
        </div>

        <div class="row text-center facilities-row">

            <div class="col-md-3 col-6 mb-4">
                <div class="facility-item">
                    <i class="fas fa-parking"></i>
                    <h6>Private Parking</h6>
                </div>
            </div>

            <div class="col-md-3 col-6 mb-4">
                <div class="facility-item">
                    <i class="fas fa-wifi"></i>
                    <h6>High Speed Wifi</h6>
                </div>
            </div>

            <div class="col-md-3 col-6 mb-4">
                <div class="facility-item">
                    <i class="fas fa-utensils"></i>
                    <h6>Bar & Restaurant</h6>
                </div>
            </div>

            <div class="col-md-3 col-6 mb-4">
                <div class="facility-item">
                    <i class="fas fa-headset"></i>
                    <h6>24×7 Service</h6>
                </div>
            </div>

        </div>
    </div>
</section>

@include('common.testimonials-preview')

@endsection