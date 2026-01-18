@extends('common.layout')

@section('title', 'Rooms & Tariff - Hotel Kiran Place')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-5">Rooms & Tariff</h1>
    
    <div class="row">
        <!-- Room 1 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Deluxe Room">
                <div class="card-body">
                    <h5 class="card-title">Deluxe Room</h5>
                    <p class="card-text">Spacious and comfortable room with all modern amenities. Perfect for couples and families.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success"></i> King Size Bed</li>
                        <li><i class="fas fa-check text-success"></i> Free WiFi</li>
                        <li><i class="fas fa-check text-success"></i> AC</li>
                        <li><i class="fas fa-check text-success"></i> TV</li>
                    </ul>
                    <p class="h4 text-primary mt-3">₹2,500/night</p>
                </div>
            </div>
        </div>

        <!-- Room 2 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Suite Room">
                <div class="card-body">
                    <h5 class="card-title">Suite Room</h5>
                    <p class="card-text">Luxury suite with separate living area and premium amenities for an unforgettable experience.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success"></i> King Size Bed</li>
                        <li><i class="fas fa-check text-success"></i> Living Room</li>
                        <li><i class="fas fa-check text-success"></i> Free WiFi</li>
                        <li><i class="fas fa-check text-success"></i> Mini Bar</li>
                    </ul>
                    <p class="h4 text-primary mt-3">₹5,000/night</p>
                </div>
            </div>
        </div>

        <!-- Room 3 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Executive Room">
                <div class="card-body">
                    <h5 class="card-title">Executive Room</h5>
                    <p class="card-text">Business-class room designed for corporate travelers with work desk and high-speed internet.</p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success"></i> Queen Size Bed</li>
                        <li><i class="fas fa-check text-success"></i> Work Desk</li>
                        <li><i class="fas fa-check text-success"></i> High-Speed WiFi</li>
                        <li><i class="fas fa-check text-success"></i> Coffee Maker</li>
                    </ul>
                    <p class="h4 text-primary mt-3">₹3,500/night</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <div class="alert alert-info">
                <h5>Note:</h5>
                <p class="mb-0">Rates are subject to change. Please contact us for current pricing and availability. All rooms include complimentary breakfast and access to hotel facilities.</p>
            </div>
        </div>
    </div>
</div>
@endsection

