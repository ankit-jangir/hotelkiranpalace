@extends('common.layout')

@section('title', 'Rooms & Tariff - Hotel Kiran Place')

@section('content')

<div class="container my-5">
    <h1 class="text-center mb-5">Rooms & Tariff</h1>

    <!-- Our Royal Rooms Section -->
    <section class="royal-rooms-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="royal-rooms-heading mb-2">Our Royal Rooms</h2>
                <p class="royal-rooms-subtitle">Choose from our exclusive collection of luxury accommodations</p>
            </div>

            @php
            $allRooms = [
                ['id'=>1, 'title'=>'Deluxe Room', 'slug'=>'deluxe-room', 'price'=>'3,500', 'available_rooms'=>2, 'description'=>'Beautifully designed room with modern furnishings.', 'main_image'=>'images/hero_section_img1.png', 'sub_images'=>['images/hero_section_img1.png','images/rooms-1.jpg','images/rooms-2.jpg'], 'facilities'=>['Free Wi-Fi', '32" LED TV with satellite channels', 'AC', 'King Size Bed']],
                ['id'=>2, 'title'=>'Super Deluxe Room', 'slug'=>'super-deluxe-room', 'price'=>'5,000', 'available_rooms'=>2, 'description'=>'Luxury room with premium amenities and comfort.', 'main_image'=>'images/hero_section_img2.jpg', 'sub_images'=>['images/hero_section_img2.jpg','images/hero_section_img3.jpg'], 'facilities'=>['Free Wi-Fi', '32" LED TV with satellite channels', 'AC', 'King Size Bed']],
                ['id'=>3, 'title'=>'Suite Room', 'slug'=>'suite-room', 'price'=>'8,500', 'available_rooms'=>2, 'description'=>'Elegant suite with separate living area.', 'main_image'=>'images/hero_section_img3.jpg', 'sub_images'=>['images/hero_section_img3.jpg','images/rooms-1.jpg'], 'facilities'=>['Free Wi-Fi', '32" LED TV with satellite channels', 'AC', 'King Size Bed', 'Mini Bar']],
                ['id'=>4, 'title'=>'Executive Room', 'slug'=>'executive-room', 'price'=>'4,500', 'available_rooms'=>2, 'description'=>'Premium executive room for business travelers.', 'main_image'=>'images/hero_section_img1.png', 'sub_images'=>['images/hero_section_img1.png','images/rooms-2.jpg','images/hero_section_img2.jpg'], 'facilities'=>['Free Wi-Fi', '32" LED TV with satellite channels', 'AC', 'King Size Bed', 'Work Desk']],
                ['id'=>5, 'title'=>'Standard Room', 'slug'=>'standard-room', 'price'=>'2,500', 'available_rooms'=>4, 'description'=>'Comfortable room perfect for budget travelers.', 'main_image'=>'images/rooms-1.jpg', 'sub_images'=>['images/rooms-1.jpg','images/hero_section_img3.jpg'], 'facilities'=>['Free Wi-Fi', 'LED TV', 'AC', 'Queen Size Bed']],
                ['id'=>6, 'title'=>'Luxury Suite', 'slug'=>'luxury-suite', 'price'=>'10,000', 'available_rooms'=>1, 'description'=>'Finest luxury suite with all premium facilities.', 'main_image'=>'images/rooms-2.jpg', 'sub_images'=>['images/rooms-2.jpg','images/hero_section_img1.png','images/hero_section_img2.jpg','images/hero_section_img3.jpg'], 'facilities'=>['Free Wi-Fi', '42" LED TV', 'AC', 'King Size Bed', 'Spa Bath', 'Lounge Area']],
                ['id'=>7, 'title'=>'Family Room', 'slug'=>'family-room', 'price'=>'6,500', 'available_rooms'=>3, 'description'=>'Spacious room ideal for families.', 'main_image'=>'images/hero_section_img2.jpg', 'sub_images'=>['images/hero_section_img2.jpg','images/rooms-1.jpg'], 'facilities'=>['Free Wi-Fi', '32" LED TV', 'AC', 'Double Beds', 'Kitchenette']],
                ['id'=>8, 'title'=>'Studio Room', 'slug'=>'studio-room', 'price'=>'3,000', 'available_rooms'=>5, 'description'=>'Compact studio with all essential amenities.', 'main_image'=>'images/rooms-1.jpg', 'sub_images'=>['images/rooms-1.jpg','images/hero_section_img3.jpg','images/rooms-2.jpg'], 'facilities'=>['Free Wi-Fi', 'LED TV', 'AC', 'Single Bed', 'Compact Kitchen']],
                ['id'=>9, 'title'=>'Premium Deluxe', 'slug'=>'premium-deluxe', 'price'=>'7,000', 'available_rooms'=>2, 'description'=>'Premium deluxe with enhanced features.', 'main_image'=>'images/hero_section_img3.jpg', 'sub_images'=>['images/hero_section_img3.jpg','images/hero_section_img1.png'], 'facilities'=>['Free Wi-Fi', '40" Smart TV', 'AC', 'King Size Bed', 'Jacuzzi']],
                ['id'=>10, 'title'=>'Honeymoon Suite', 'slug'=>'honeymoon-suite', 'price'=>'12,000', 'available_rooms'=>1, 'description'=>'Romantic suite perfect for honeymoon.', 'main_image'=>'images/rooms-2.jpg', 'sub_images'=>['images/rooms-2.jpg','images/hero_section_img2.jpg','images/hero_section_img1.png'], 'facilities'=>['Free Wi-Fi', 'Smart TV', 'AC', 'King Size Bed', 'Bathtub', 'Rose Petals']],
                ['id'=>11, 'title'=>'Business Room', 'slug'=>'business-room', 'price'=>'5,500', 'available_rooms'=>3, 'description'=>'Designed for business professionals.', 'main_image'=>'images/hero_section_img1.png', 'sub_images'=>['images/hero_section_img1.png','images/rooms-2.jpg'], 'facilities'=>['Free Wi-Fi', '32" LED TV', 'AC', 'Queen Size Bed', 'Large Desk', 'Conference Phone']],
                ['id'=>12, 'title'=>'Garden View Room', 'slug'=>'garden-view-room', 'price'=>'4,800', 'available_rooms'=>2, 'description'=>'Room with beautiful garden view.', 'main_image'=>'images/rooms-1.jpg', 'sub_images'=>['images/rooms-1.jpg','images/hero_section_img3.jpg','images/rooms-2.jpg'], 'facilities'=>['Free Wi-Fi', '32" LED TV', 'AC', 'King Size Bed', 'Balcony']],
            ];
            @endphp

            <!-- Store all room data in JavaScript -->
            <script>
                window.allRoomsData = {!! json_encode($allRooms) !!};
            </script>

            <div class="row g-4" id="roomsContainer">
                @foreach(array_slice($allRooms, 0, 6) as $room)
                <div class="col-xl-3 col-lg-6 col-md-6 col-12 room-card-wrapper">
                    <div class="royal-room-card position-relative" data-room-id="{{ $room['id'] }}">
                        <div class="room-image-wrapper position-relative">
                            <img src="{{ asset($room['main_image']) }}" alt="{{ $room['title'] }}"
                                class="room-main-image" loading="lazy">
                            <button type="button" class="room-gallery-icon" onclick="openRoomGalleryModal({{ $room['id'] }})" aria-label="View Gallery">
                                <i class="fas fa-images"></i>
                            </button>
                        </div>
                        <div class="room-card-content">
                            <div class="d-flex align-items-start justify-content-between mb-2">
                                <h3 class="room-card-title mb-0">{{ $room['title'] }}</h3>
                                <span class="room-filling-badge">{{ $room['available_rooms'] <= 2 ? 'Filling fast' : 'Available' }}</span>
                            </div>
                            <p class="room-availability-text mb-2" style="color: #dc3545;">Last {{ $room['available_rooms'] }} Rooms Available / Night</p>
                            <p class="room-description mb-3 text-muted">{{ $room['description'] }}</p>
                            <div class="room-amenities mb-3">
                                @foreach(array_slice($room['facilities'], 0, 2) as $facility)
                                <div class="room-amenity-item mb-2">
                                    <i class="fas fa-check me-2" style="color: #ff6600;"></i>
                                    <span>{{ $facility }}</span>
                                </div>
                                @endforeach
                            </div>
                            <p class="room-member-rates mb-2">Member Rates starting from</p>
                            <div class="room-price-full mb-3">
                                <span class="room-price">₹{{ $room['price'] }}</span><span class="room-price-suffix">/Night</span>
                            </div>
                            <div class="room-card-actions d-flex justify-content-between align-items-center">
                                <a href="{{ route('room.detail', ['slug' => $room['slug']]) }}"
                                    class="room-details-link">Room Details</a>
                                <a href="{{ route('contact') }}" class="btn-room-book"><span>Book Your Stay</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Load More Button -->
            @if(count($allRooms) > 6)
            <div class="text-center mt-5">
                <button onclick="loadMoreRooms()" class="btn btn-lg btn-primary" id="loadMoreBtn" style="background: #ff6600; border: none; padding: 12px 40px; border-radius: 5px; font-weight: 600;">
                    Load More Rooms
                </button>
            </div>
            @endif
        </div>
    </section>

    <!-- Room Gallery Modal -->
    <div class="modal fade" id="roomGalleryModal" tabindex="-1" aria-labelledby="roomGalleryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header border-0 pb-0 pt-3 px-3">
                    <h5 class="modal-title" id="roomGalleryTitle">Room Gallery</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <!-- Main Image -->
                    <div class="gallery-main-image-container mb-3">
                        <img id="galleryMainImage" src="" alt="Room Image" class="gallery-main-image w-100">
                        <!-- Image Navigation Buttons -->
                        <button class="gallery-nav-btn prev-btn" onclick="prevRoomImage()" style="left: 10px;">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="gallery-nav-btn next-btn" onclick="nextRoomImage()" style="right: 10px;">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>

                    <!-- Image Counter -->
                    <div class="text-center mb-3">
                        <span id="imageCounter" class="fw-bold">1 / 1</span>
                    </div>

                    <!-- Thumbnail Images -->
                    <div class="gallery-thumbnails d-flex gap-2 justify-content-center px-3 pb-3 flex-wrap" id="galleryThumbnails">
                    </div>
                </div>
            </div>
        </div>
    </div>

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
