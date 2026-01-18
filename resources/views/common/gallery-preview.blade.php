<!-- Gallery Preview Section -->
<section class="gallery-preview-section py-5 position-relative">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <h2 class="gallery-preview-heading mb-3">Our Gallery</h2>
            <p class="gallery-preview-subtitle mb-4">Experience the elegance and luxury of Hotel Kiran Place</p>
            <a href="{{ route('gallery') }}" class="gallery-view-more-link"><span>View More</span></a>
        </div>

        <!-- Desktop: Static Grid (4 Circles + 1 Rectangle) -->
        <div class="gallery-desktop-grid d-none d-lg-block">
            <div class="row g-4">
                <!-- Circle 1 -->
                <div class="col-lg-3">
                    <div class="gallery-circle-card position-relative">
                        <div class="gallery-circle-wrapper">
                            <img src="{{ asset('images/hero_section_img1.png') }}" alt="Lean Luxe" class="gallery-circle-image" loading="lazy">
                            <div class="gallery-circle-overlay">
                                <div class="gallery-circle-content">
                                    <h4 class="gallery-circle-heading">Lean Luxe</h4>
                                    <p class="gallery-circle-description">Innovative, functional designs that blend style with practicality, transforming every corner into a welcoming retreat.</p>
                                </div>
                            </div>
                        </div>
                        <p class="gallery-circle-label text-center mt-3">Lean Luxe</p>
                    </div>
                </div>

                <!-- Circle 2 -->
                <div class="col-lg-3">
                    <div class="gallery-circle-card position-relative">
                        <div class="gallery-circle-wrapper">
                            <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Vibrant Spaces" class="gallery-circle-image" loading="lazy">
                            <div class="gallery-circle-overlay">
                                <div class="gallery-circle-content">
                                    <h4 class="gallery-circle-heading">Vibrant Spaces</h4>
                                    <p class="gallery-circle-description">Innovative, functional designs that blend style with practicality, transforming every corner into a welcoming retreat.</p>
                                </div>
                            </div>
                        </div>
                        <p class="gallery-circle-label text-center mt-3">Vibrant Spaces</p>
                    </div>
                </div>

                <!-- Circle 3 -->
                <div class="col-lg-3">
                    <div class="gallery-circle-card position-relative">
                        <div class="gallery-circle-wrapper">
                            <img src="{{ asset('images/hero_section_img1.png') }}" alt="Qmin - All Day Dining" class="gallery-circle-image" loading="lazy">
                            <div class="gallery-circle-overlay">
                                <div class="gallery-circle-content">
                                    <h4 class="gallery-circle-heading">Qmin - All Day Dining</h4>
                                    <p class="gallery-circle-description">Multi-cuisine dining experience with gourmet delicacies and exceptional service throughout the day.</p>
                                </div>
                            </div>
                        </div>
                        <p class="gallery-circle-label text-center mt-3" style="color: #e91e63;">Qmin - All Day Dining</p>
                    </div>
                </div>

                <!-- Circle 4 -->
                <div class="col-lg-3">
                    <div class="gallery-circle-card position-relative">
                        <div class="gallery-circle-wrapper">
                            <img src="{{ asset('images/hero_section_img3.jpg') }}" alt="Intuitive and High Energy" class="gallery-circle-image" loading="lazy">
                            <div class="gallery-circle-overlay">
                                <div class="gallery-circle-content">
                                    <h4 class="gallery-circle-heading">Intuitive and High Energy</h4>
                                    <p class="gallery-circle-description">Dynamic spaces designed to energize and inspire, perfect for modern travelers seeking vibrant experiences.</p>
                                </div>
                            </div>
                        </div>
                        <p class="gallery-circle-label text-center mt-3" style="color: #e91e63;">Intuitive and High Energy</p>
                    </div>
                </div>
            </div>

            <!-- Rectangle Card (Desktop) -->
            <div class="row g-4 mt-2">
                <div class="col-lg-6 offset-lg-3">
                    <div class="gallery-rectangle-card position-relative">
                        <div class="gallery-rectangle-wrapper">
                            <video class="gallery-rectangle-image" muted loop playsinline autoplay preload="auto">
                                <source src="{{ asset('videos/home-page-new-video-35-sec-web.mp4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <div class="gallery-rectangle-content position-absolute bottom-0 start-0 w-100 p-4">
                                <div class="d-flex align-items-start mb-2">
                                    <span class="gallery-bullet me-2" style="color: #e91e63;">•</span>
                                    <h4 class="gallery-rectangle-heading mb-2">Intuitive and High Energy</h4>
                                </div>
                                <p class="gallery-rectangle-description">Our attentive team is dedicated to providing personalized service, ensuring your stay is comfortable and memorable.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tablet: Carousel (3 per slide) -->
        <div id="galleryTabletCarousel" class="carousel slide d-none d-md-block d-lg-none" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="gallery-circle-card position-relative">
                                <div class="gallery-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img1.png') }}" alt="Lean Luxe" class="gallery-circle-image" loading="lazy">
                                    <div class="gallery-circle-overlay">
                                        <div class="gallery-circle-content">
                                            <h4 class="gallery-circle-heading">Lean Luxe</h4>
                                            <p class="gallery-circle-description">Innovative, functional designs that blend style with practicality.</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="gallery-circle-label text-center mt-3">Lean Luxe</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="gallery-circle-card position-relative">
                                <div class="gallery-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Vibrant Spaces" class="gallery-circle-image" loading="lazy">
                                    <div class="gallery-circle-overlay">
                                        <div class="gallery-circle-content">
                                            <h4 class="gallery-circle-heading">Vibrant Spaces</h4>
                                            <p class="gallery-circle-description">Innovative, functional designs that blend style with practicality.</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="gallery-circle-label text-center mt-3">Vibrant Spaces</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="gallery-circle-card position-relative">
                                <div class="gallery-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img1.png') }}" alt="Qmin - All Day Dining" class="gallery-circle-image" loading="lazy">
                                    <div class="gallery-circle-overlay">
                                        <div class="gallery-circle-content">
                                            <h4 class="gallery-circle-heading">Qmin - All Day Dining</h4>
                                            <p class="gallery-circle-description">Multi-cuisine dining experience with gourmet delicacies.</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="gallery-circle-label text-center mt-3" style="color: #e91e63;">Qmin - All Day Dining</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="gallery-circle-card position-relative">
                                <div class="gallery-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img3.jpg') }}" alt="Intuitive and High Energy" class="gallery-circle-image" loading="lazy">
                                    <div class="gallery-circle-overlay">
                                        <div class="gallery-circle-content">
                                            <h4 class="gallery-circle-heading">Intuitive and High Energy</h4>
                                            <p class="gallery-circle-description">Dynamic spaces designed to energize and inspire.</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="gallery-circle-label text-center mt-3" style="color: #e91e63;">Intuitive and High Energy</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="gallery-circle-card position-relative">
                                <div class="gallery-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img1.png') }}" alt="Thoughtful Amenities" class="gallery-circle-image" loading="lazy">
                                    <div class="gallery-circle-overlay">
                                        <div class="gallery-circle-content">
                                            <h4 class="gallery-circle-heading">Thoughtful Amenities</h4>
                                            <p class="gallery-circle-description">Carefully curated amenities that enhance your stay.</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="gallery-circle-label text-center mt-3">Thoughtful Amenities</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="gallery-circle-card position-relative">
                                <div class="gallery-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Convenient Locations" class="gallery-circle-image" loading="lazy">
                                    <div class="gallery-circle-overlay">
                                        <div class="gallery-circle-content">
                                            <h4 class="gallery-circle-heading">Convenient Locations</h4>
                                            <p class="gallery-circle-description">Strategically located properties in prime areas.</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="gallery-circle-label text-center mt-3">Convenient Locations</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-indicators gallery-indicators">
                <button type="button" data-bs-target="#galleryTabletCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#galleryTabletCarousel" data-bs-slide-to="1"></button>
            </div>
        </div>

        <!-- Phone: Carousel (2 per slide) with Dots -->
        <div id="galleryPhoneCarousel" class="carousel slide d-block d-md-none" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="gallery-circle-card position-relative" data-bs-toggle="modal" data-bs-target="#galleryPhoneModal">
                                <div class="gallery-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img1.png') }}" alt="Lean Luxe" class="gallery-circle-image" loading="lazy">
                                </div>
                                <p class="gallery-circle-label text-center mt-2">Lean Luxe</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="gallery-circle-card position-relative" data-bs-toggle="modal" data-bs-target="#galleryPhoneModal">
                                <div class="gallery-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Vibrant Spaces" class="gallery-circle-image" loading="lazy">
                                </div>
                                <p class="gallery-circle-label text-center mt-2">Vibrant Spaces</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="gallery-circle-card position-relative" data-bs-toggle="modal" data-bs-target="#galleryPhoneModal">
                                <div class="gallery-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img1.png') }}" alt="Qmin - All Day Dining" class="gallery-circle-image" loading="lazy">
                                </div>
                                <p class="gallery-circle-label text-center mt-2" style="color: #e91e63;">Qmin - All Day Dining</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="gallery-circle-card position-relative" data-bs-toggle="modal" data-bs-target="#galleryPhoneModal">
                                <div class="gallery-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img3.jpg') }}" alt="Intuitive and High Energy" class="gallery-circle-image" loading="lazy">
                                </div>
                                <p class="gallery-circle-label text-center mt-2" style="color: #e91e63;">Intuitive and High Energy</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="gallery-circle-card position-relative" data-bs-toggle="modal" data-bs-target="#galleryPhoneModal">
                                <div class="gallery-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img1.png') }}" alt="Thoughtful Amenities" class="gallery-circle-image" loading="lazy">
                                </div>
                                <p class="gallery-circle-label text-center mt-2">Thoughtful Amenities</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="gallery-circle-card position-relative" data-bs-toggle="modal" data-bs-target="#galleryPhoneModal">
                                <div class="gallery-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Convenient Locations" class="gallery-circle-image" loading="lazy">
                                </div>
                                <p class="gallery-circle-label text-center mt-2">Convenient Locations</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-indicators gallery-phone-indicators">
                <button type="button" data-bs-target="#galleryPhoneCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#galleryPhoneCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#galleryPhoneCarousel" data-bs-slide-to="2"></button>
            </div>
        </div>
    </div>
</section>

<!-- Phone Gallery Modal -->
<div class="modal fade" id="galleryPhoneModal" tabindex="-1" aria-labelledby="galleryPhoneModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content bg-dark">
            <div class="modal-header border-0">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div id="galleryPhoneModalCarousel" class="carousel slide h-100" data-bs-ride="carousel">
                    <div class="carousel-inner h-100">
                        <div class="carousel-item active h-100">
                            <div class="gallery-modal-rectangle">
                                <img src="{{ asset('images/hero_section_img1.png') }}" alt="Lean Luxe" class="gallery-modal-image">
                                <div class="gallery-modal-content p-4">
                                    <h4 class="gallery-modal-heading mb-3">Lean Luxe</h4>
                                    <p class="gallery-modal-description">Innovative, functional designs that blend style with practicality, transforming every corner into a welcoming retreat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item h-100">
                            <div class="gallery-modal-rectangle">
                                <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Vibrant Spaces" class="gallery-modal-image" loading="lazy">
                                <div class="gallery-modal-content p-4">
                                    <h4 class="gallery-modal-heading mb-3">Vibrant Spaces</h4>
                                    <p class="gallery-modal-description">Innovative, functional designs that blend style with practicality, transforming every corner into a welcoming retreat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item h-100">
                            <div class="gallery-modal-rectangle">
                                <img src="{{ asset('images/hero_section_img1.png') }}" alt="Qmin - All Day Dining" class="gallery-modal-image" loading="lazy">
                                <div class="gallery-modal-content p-4">
                                    <h4 class="gallery-modal-heading mb-3">Qmin - All Day Dining</h4>
                                    <p class="gallery-modal-description">Multi-cuisine dining experience with gourmet delicacies and exceptional service throughout the day.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item h-100">
                            <div class="gallery-modal-rectangle">
                                <img src="{{ asset('images/hero_section_img3.jpg') }}" alt="Intuitive and High Energy" class="gallery-modal-image" loading="lazy">
                                <div class="gallery-modal-content p-4">
                                    <h4 class="gallery-modal-heading mb-3">Intuitive and High Energy</h4>
                                    <p class="gallery-modal-description">Dynamic spaces designed to energize and inspire, perfect for modern travelers seeking vibrant experiences.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item h-100">
                            <div class="gallery-modal-rectangle">
                                <img src="{{ asset('images/hero_section_img1.png') }}" alt="Thoughtful Amenities" class="gallery-modal-image" loading="lazy">
                                <div class="gallery-modal-content p-4">
                                    <h4 class="gallery-modal-heading mb-3">Thoughtful Amenities</h4>
                                    <p class="gallery-modal-description">Carefully curated amenities that enhance your stay, from wellness facilities to recreational spaces.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item h-100">
                            <div class="gallery-modal-rectangle">
                                <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Convenient Locations" class="gallery-modal-image" loading="lazy">
                                <div class="gallery-modal-content p-4">
                                    <h4 class="gallery-modal-heading mb-3">Convenient Locations</h4>
                                    <p class="gallery-modal-description">Strategically located properties in prime areas, ensuring easy access to major attractions and business centers.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#galleryPhoneModalCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#galleryPhoneModalCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <div class="carousel-indicators gallery-modal-indicators">
                        <button type="button" data-bs-target="#galleryPhoneModalCarousel" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#galleryPhoneModalCarousel" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#galleryPhoneModalCarousel" data-bs-slide-to="2"></button>
                        <button type="button" data-bs-target="#galleryPhoneModalCarousel" data-bs-slide-to="3"></button>
                        <button type="button" data-bs-target="#galleryPhoneModalCarousel" data-bs-slide-to="4"></button>
                        <button type="button" data-bs-target="#galleryPhoneModalCarousel" data-bs-slide-to="5"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
