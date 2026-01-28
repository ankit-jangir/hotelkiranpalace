@extends('common.layout')

@section('title', 'Rooms & Tariff - Hotel Kiran Place')

@section('content')

<div class="container my-5">


    <!-- Our Royal Rooms Section -->
    <section class="royal-rooms-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="royal-rooms-heading mb-2">Rooms & Tariff</h2>
                <p class="royal-rooms-subtitle">Choose from our exclusive collection of luxury accommodations</p>
            </div>

            <div class="row g-4" id="roomsContainer">

                <!-- Room Card 1: Deluxe Room -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="royal-room-card position-relative">
                        <div class="room-image-wrapper position-relative">
                            <img src="{{ asset('images/hero_section_img1.png') }}" alt="Deluxe Room"
                                class="room-main-image" data-gallery="deluxe-room" loading="lazy">
                            <button type="button" class="room-gallery-icon" data-bs-toggle="modal"
                                data-bs-target="#roomGalleryModal" data-room="deluxe-room" aria-label="View Gallery">
                                <i class="fas fa-images"></i>
                            </button>
                        </div>
                        <div class="room-card-content">
                            <div class="d-flex align-items-start justify-content-between mb-2">
                                <h3 class="room-card-title mb-0">Deluxe Room</h3>
                                <span class="room-filling-badge">Filling fast</span>
                            </div>
                            <p class="room-availability-text mb-2" style="color: #dc3545;">Last 2 Rooms Available /
                                Night</p>
                            <div class="room-amenities mb-3">
                                <div class="room-amenity-item mb-2">
                                    <i class="fas fa-wifi me-2"></i>
                                    <span>Free Wi-Fi</span>
                                </div>
                                <div class="room-amenity-item">
                                    <i class="fas fa-tv me-2"></i>
                                    <span>32" LED TV with satellite channels</span>
                                </div>
                            </div>
                            <p class="room-member-rates mb-2">Member Rates starting from</p>
                            <div class="room-price-full mb-3">
                                <span class="room-price">₹3,500</span><span class="room-price-suffix">/Night</span>
                            </div>
                            <div class="room-card-actions d-flex justify-content-between align-items-center">
                                <a href="{{ route('room.detail', ['slug' => 'deluxe-room']) }}"
                                    class="room-details-link">Room Details</a>
                                <a href="{{ route('contact') }}" class="btn-room-book"><span>Book Your Stay</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Room Card 2: Super Deluxe Room -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="royal-room-card position-relative">
                        <div class="room-image-wrapper position-relative">
                            <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Super Deluxe Room"
                                class="room-main-image" data-gallery="super-deluxe-room" loading="lazy">
                            <button type="button" class="room-gallery-icon" data-bs-toggle="modal"
                                data-bs-target="#roomGalleryModal" data-room="super-deluxe-room"
                                aria-label="View Gallery">
                                <i class="fas fa-images"></i>
                            </button>
                        </div>
                        <div class="room-card-content">
                            <div class="d-flex align-items-start justify-content-between mb-2">
                                <h3 class="room-card-title mb-0">Super Deluxe Room</h3>
                                <span class="room-filling-badge">Filling fast</span>
                            </div>
                            <p class="room-availability-text mb-2" style="color: #dc3545;">Last 2 Rooms Available /
                                Night</p>
                            <div class="room-amenities mb-3">
                                <div class="room-amenity-item mb-2">
                                    <i class="fas fa-wifi me-2"></i>
                                    <span>Free Wi-Fi</span>
                                </div>
                                <div class="room-amenity-item">
                                    <i class="fas fa-tv me-2"></i>
                                    <span>32" LED TV with satellite channels</span>
                                </div>
                            </div>
                            <p class="room-member-rates mb-2">Member Rates starting from</p>
                            <div class="room-price-full mb-3">
                                <span class="room-price">₹5,000</span><span class="room-price-suffix">/Night</span>
                            </div>
                            <div class="room-card-actions d-flex justify-content-between align-items-center">
                                <a href="{{ route('room.detail', ['slug' => 'super-deluxe-room']) }}"
                                    class="room-details-link">Room Details</a>
                                <a href="{{ route('contact') }}" class="btn-room-book"><span>Book Your Stay</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Room Card 3: Suite Room -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="royal-room-card position-relative">
                        <div class="room-image-wrapper position-relative">
                            <img src="{{ asset('images/hero_section_img3.jpg') }}" alt="Suite Room"
                                class="room-main-image" data-gallery="suite-room" loading="lazy">
                            <button type="button" class="room-gallery-icon" data-bs-toggle="modal"
                                data-bs-target="#roomGalleryModal" data-room="suite-room" aria-label="View Gallery">
                                <i class="fas fa-images"></i>
                            </button>
                        </div>
                        <div class="room-card-content">
                            <div class="d-flex align-items-start justify-content-between mb-2">
                                <h3 class="room-card-title mb-0">Suite Room</h3>
                                <span class="room-filling-badge">Filling fast</span>
                            </div>
                            <p class="room-availability-text mb-2" style="color: #dc3545;">Last 2 Rooms Available /
                                Night</p>
                            <div class="room-amenities mb-3">
                                <div class="room-amenity-item mb-2">
                                    <i class="fas fa-wifi me-2"></i>
                                    <span>Free Wi-Fi</span>
                                </div>
                                <div class="room-amenity-item">
                                    <i class="fas fa-tv me-2"></i>
                                    <span>32" LED TV with satellite channels</span>
                                </div>
                            </div>
                            <p class="room-member-rates mb-2">Member Rates starting from</p>
                            <div class="room-price-full mb-3">
                                <span class="room-price">₹8,500</span><span class="room-price-suffix">/Night</span>
                            </div>
                            <div class="room-card-actions d-flex justify-content-between align-items-center">
                                <a href="{{ route('room.detail', ['slug' => 'suite-room']) }}"
                                    class="room-details-link">Room Details</a>
                                <a href="{{ route('contact') }}" class="btn-room-book">Book Your Stay</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Room Card 4: Executive Room -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="royal-room-card position-relative">
                        <div class="room-image-wrapper position-relative">
                            <img src="{{ asset('images/hero_section_img1.png') }}" alt="Executive Room"
                                class="room-main-image" data-gallery="executive-room" loading="lazy">
                            <button type="button" class="room-gallery-icon" data-bs-toggle="modal"
                                data-bs-target="#roomGalleryModal" data-room="executive-room" aria-label="View Gallery">
                                <i class="fas fa-images"></i>
                            </button>
                        </div>
                        <div class="room-card-content">
                            <div class="d-flex align-items-start justify-content-between mb-2">
                                <h3 class="room-card-title mb-0">Executive Room</h3>
                                <span class="room-filling-badge">Filling fast</span>
                            </div>
                            <p class="room-availability-text mb-2" style="color: #dc3545;">Last 2 Rooms Available /
                                Night</p>
                            <div class="room-amenities mb-3">
                                <div class="room-amenity-item mb-2">
                                    <i class="fas fa-wifi me-2"></i>
                                    <span>Free Wi-Fi</span>
                                </div>
                                <div class="room-amenity-item">
                                    <i class="fas fa-tv me-2"></i>
                                    <span>32" LED TV with satellite channels</span>
                                </div>
                            </div>
                            <p class="room-member-rates mb-2">Member Rates starting from</p>
                            <div class="room-price-full mb-3">
                                <span class="room-price">₹4,500</span><span class="room-price-suffix">/Night</span>
                            </div>
                            <div class="room-card-actions d-flex justify-content-between align-items-center">
                                <a href="{{ route('room.detail', ['slug' => 'executive-room']) }}"
                                    class="room-details-link">Room Details</a>
                                <a href="{{ route('contact') }}" class="btn-room-book"><span>Book Your Stay</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View More Link -->
            <div class="text-center mt-4">
                <button id="loadMoreBtn" class="room-view-more-link btn-room-book " onclick="loadMoreRooms()">

                    Load More
                </button>
            </div>
        </div>
    </section>

    <!-- Room Gallery Modal -->
    <div class="modal fade" id="roomGalleryModal" tabindex="-1" aria-labelledby="roomGalleryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 rounded-0">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <!-- Main Image -->
                    <div class="gallery-main-image-container mb-3">
                        <img id="galleryMainImage" src="" alt="Room Image" class="gallery-main-image w-100">
                    </div>

                    <!-- Thumbnail Images -->
                    <div class="gallery-thumbnails d-flex gap-2 justify-content-center px-3 pb-3">
                        <img src="{{ asset('images/hero_section_img1.png') }}" alt="Room Image 1"
                            class="gallery-thumbnail active" data-image="{{ asset('images/hero_section_img1.png') }}"
                            loading="lazy">
                        <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Room Image 2"
                            class="gallery-thumbnail" data-image="{{ asset('images/hero_section_img2.jpg') }}"
                            loading="lazy">
                        <img src="{{ asset('images/hero_section_img3.jpg') }}" alt="Room Image 3"
                            class="gallery-thumbnail" data-image="{{ asset('images/hero_section_img3.jpg') }}"
                            loading="lazy">
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
<script>
window.roomsData = [{
        title: "Deluxe Room",
        slug: "deluxe-room",
        price: "₹3,500",
        image: "{{ asset('images/hero_section_img1.png') }}",
        features: [{
                icon: "fa-wifi",
                text: "Free Wi-Fi"
            },
            {
                icon: "fa-tv",
                text: '32" LED TV'
            },
            {
                icon: "fa-snowflake",
                text: "Air Conditioning"
            }
        ]
    },
    {
        title: "Super Deluxe Room",
        slug: "super-deluxe-room",
        price: "₹5,000",
        image: "{{ asset('images/hero_section_img2.jpg') }}",
        features: [{
                icon: "fa-wifi",
                text: "High Speed Wi-Fi"
            },
            {
                icon: "fa-tv",
                text: '40" Smart TV'
            },
            {
                icon: "fa-coffee",
                text: "Tea/Coffee Maker"
            }
        ]
    },
    {
        title: "Suite Room",
        slug: "suite-room",
        price: "₹8,500",
        image: "{{ asset('images/hero_section_img3.jpg') }}",
        features: [{
                icon: "fa-couch",
                text: "Living Area"
            },
            {
                icon: "fa-bath",
                text: "Luxury Bathroom"
            },
            {
                icon: "fa-wifi",
                text: "Free Wi-Fi"
            }
        ]
    },
    {
        title: "Executive Room",
        slug: "executive-room",
        price: "₹4,500",
        image: "{{ asset('images/hero_section_img1.png') }}",
        features: [{
                icon: "fa-briefcase",
                text: "Work Desk"
            },
            {
                icon: "fa-wifi",
                text: "Free Wi-Fi"
            },
            {
                icon: "fa-tv",
                text: "LED TV"
            }
        ]
    }
];
</script>

@include('common.testimonials-preview')

@endsection