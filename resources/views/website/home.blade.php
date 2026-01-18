@extends('common.layout')

@section('title', 'Home - Hotel Kiran Place')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary text-white text-center py-5 mb-5">
    <div class="container">
        <h1 class="display-4 mb-3">Welcome to Hotel Kiran Place</h1>
        <p class="lead">Your Comfortable Stay Destination</p>
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

