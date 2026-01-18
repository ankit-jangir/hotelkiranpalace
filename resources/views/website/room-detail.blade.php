@extends('common.layout')

@section('title', $room['title'] . ' - Hotel Kiran Place')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 mb-4">
            <!-- Room Image -->
            <div class="room-detail-image mb-4">
                <img src="{{ $room['image'] }}" alt="{{ $room['title'] }}" class="img-fluid rounded shadow-sm">
            </div>

            <!-- Room Description -->
            <div class="room-detail-description">
                <h2 class="mb-3">{{ $room['title'] }}</h2>
                <p class="lead">{{ $room['description'] }}</p>
                <p>Experience the perfect blend of comfort and luxury in our {{ $room['title'] }}. This elegantly designed space offers everything you need for a memorable stay, from premium furnishings to modern amenities that ensure your comfort throughout your visit.</p>
            </div>

            <!-- Room Features -->
            <div class="room-detail-features mt-4">
                <h3 class="mb-3">Room Features</h3>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-wifi text-primary me-2"></i>
                            <span>Free Wi-Fi</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-tv text-primary me-2"></i>
                            <span>32" LED TV with satellite channels</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-snowflake text-primary me-2"></i>
                            <span>Air Conditioning</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-bed text-primary me-2"></i>
                            <span>King Size Bed</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-bath text-primary me-2"></i>
                            <span>Private Bathroom</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-coffee text-primary me-2"></i>
                            <span>Tea/Coffee Maker</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Booking Sidebar -->
        <div class="col-lg-4">
            <div class="room-booking-card p-4 rounded shadow-sm">
                <h3 class="mb-3">Book This Room</h3>
                <div class="room-price-display mb-4">
                    <p class="text-muted mb-1">Member Rates starting from</p>
                    <h2 class="text-primary mb-0">{{ $room['price'] }}/Night</h2>
                </div>
                <div class="room-availability-alert mb-3">
                    <p class="text-danger mb-0"><strong>Last 2 Rooms Available / Night</strong></p>
                </div>
                <a href="{{ route('contact') }}" class="btn btn-primary w-100 mb-3 btn-room-detail-book"><span>Book Your Stay</span></a>
                <a href="{{ route('rooms') }}" class="btn btn-outline-primary w-100">View All Rooms</a>
            </div>
        </div>
    </div>
</div>
@endsection

