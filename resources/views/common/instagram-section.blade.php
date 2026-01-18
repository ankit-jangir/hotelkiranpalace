    <!-- Instagram Section -->
<section class="instagram-section py-5 position-relative">
    <div class="instagram-background-pattern position-absolute top-0 start-0 w-100 h-100"></div>
    <div class="container position-relative">
        <!-- Section Header -->
        <div class="row align-items-center mb-5 position-relative">
            <div class="col-12 col-md-8 offset-md-2 text-center mb-4 mb-md-0">
                <h2 class="instagram-heading mb-2">
                    Follow Us on Instagram
                </h2>
                <p class="instagram-subheading mb-0">@hotel.kiranpalace</p>
            </div>
            <div class="col-12 col-md-2 d-none d-md-flex justify-content-end">
                <a href="https://www.instagram.com/hotel.kiranpalace" target="_blank" rel="noopener noreferrer" class="btn btn-instagram-follow">
                    <span>Follow Us</span>
                    <i class="fab fa-instagram ms-2"></i>
                </a>
            </div>
        </div>

        <!-- Desktop: Static Grid (5 Circles) -->
        <div class="instagram-desktop-grid d-none d-lg-block">
            <div class="row g-4 justify-content-center">
                <!-- Circle 1 -->
                <div class="col-lg-2 col-md-4">
                    <div class="instagram-circle-card position-relative">
                        <div class="instagram-circle-wrapper">
                            <img src="{{ asset('images/hero_section_img1.png') }}" alt="Instagram Post 1" class="instagram-circle-image" loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- Circle 2 -->
                <div class="col-lg-2 col-md-4">
                    <div class="instagram-circle-card position-relative">
                        <div class="instagram-circle-wrapper">
                            <video class="instagram-circle-image" muted loop playsinline autoplay preload="auto">
                                <source src="{{ asset('videos/home-page-new-video-35-sec-web.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>

                <!-- Circle 3 -->
                <div class="col-lg-2 col-md-4">
                    <div class="instagram-circle-card position-relative">
                        <div class="instagram-circle-wrapper">
                            <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Instagram Post 3" class="instagram-circle-image" loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- Circle 4 -->
                <div class="col-lg-2 col-md-4">
                    <div class="instagram-circle-card position-relative">
                        <div class="instagram-circle-wrapper">
                            <img src="{{ asset('images/hero_section_img3.jpg') }}" alt="Instagram Post 4" class="instagram-circle-image" loading="lazy">
                        </div>
                    </div>
                </div>

                <!-- Circle 5 -->
                <div class="col-lg-2 col-md-4">
                    <div class="instagram-circle-card position-relative">
                        <div class="instagram-circle-wrapper">
                            <video class="instagram-circle-image" muted loop playsinline autoplay preload="auto">
                                <source src="{{ asset('videos/home-page-new-video-35-sec-web.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tablet: Carousel (3 per slide) -->
        <div id="instagramTabletCarousel" class="carousel slide d-none d-md-block d-lg-none" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row g-4 justify-content-center">
                        <div class="col-md-4">
                            <div class="instagram-circle-card position-relative">
                                <div class="instagram-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img1.png') }}" alt="Instagram Post 1" class="instagram-circle-image" loading="lazy">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="instagram-circle-card position-relative">
                                <div class="instagram-circle-wrapper">
                                    <video class="instagram-circle-image" muted loop playsinline autoplay preload="auto">
                                        <source src="{{ asset('videos/home-page-new-video-35-sec-web.mp4') }}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="instagram-circle-card position-relative">
                                <div class="instagram-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Instagram Post 3" class="instagram-circle-image" loading="lazy">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row g-4 justify-content-center">
                        <div class="col-md-4">
                            <div class="instagram-circle-card position-relative">
                                <div class="instagram-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img3.jpg') }}" alt="Instagram Post 4" class="instagram-circle-image" loading="lazy">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="instagram-circle-card position-relative">
                                <div class="instagram-circle-wrapper">
                                    <video class="instagram-circle-image" muted loop playsinline autoplay preload="auto">
                                        <source src="{{ asset('videos/home-page-new-video-35-sec-web.mp4') }}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="instagram-circle-card position-relative">
                                <div class="instagram-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img1.png') }}" alt="Instagram Post 5" class="instagram-circle-image" loading="lazy">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-indicators instagram-indicators">
                <button type="button" data-bs-target="#instagramTabletCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#instagramTabletCarousel" data-bs-slide-to="1"></button>
            </div>
        </div>

        <!-- Phone: Carousel (2 per slide) with Dots -->
        <div id="instagramPhoneCarouselOuter" class="carousel slide d-block d-md-none" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="instagram-circle-card position-relative" data-bs-toggle="modal" data-bs-target="#instagramPhoneModal">
                                <div class="instagram-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img1.png') }}" alt="Instagram Post 1" class="instagram-circle-image" loading="lazy">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="instagram-circle-card position-relative" data-bs-toggle="modal" data-bs-target="#instagramPhoneModal">
                                <div class="instagram-circle-wrapper">
                                    <video class="instagram-circle-image" muted loop playsinline autoplay preload="auto">
                                        <source src="{{ asset('videos/home-page-new-video-35-sec-web.mp4') }}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="instagram-circle-card position-relative" data-bs-toggle="modal" data-bs-target="#instagramPhoneModal">
                                <div class="instagram-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Instagram Post 3" class="instagram-circle-image" loading="lazy">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="instagram-circle-card position-relative" data-bs-toggle="modal" data-bs-target="#instagramPhoneModal">
                                <div class="instagram-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img3.jpg') }}" alt="Instagram Post 4" class="instagram-circle-image" loading="lazy">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="instagram-circle-card position-relative" data-bs-toggle="modal" data-bs-target="#instagramPhoneModal">
                                <div class="instagram-circle-wrapper">
                                    <video class="instagram-circle-image" muted loop playsinline autoplay preload="auto">
                                        <source src="{{ asset('videos/home-page-new-video-35-sec-web.mp4') }}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="instagram-circle-card position-relative" data-bs-toggle="modal" data-bs-target="#instagramPhoneModal">
                                <div class="instagram-circle-wrapper">
                                    <img src="{{ asset('images/hero_section_img1.png') }}" alt="Instagram Post 5" class="instagram-circle-image" loading="lazy">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-indicators instagram-phone-indicators">
                <button type="button" data-bs-target="#instagramPhoneCarouselOuter" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#instagramPhoneCarouselOuter" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#instagramPhoneCarouselOuter" data-bs-slide-to="2"></button>
            </div>
        </div>

        <!-- Mobile Follow Button -->
        <div class="text-center d-block d-md-none mt-4">
            <a href="https://www.instagram.com/hotel.kiranpalace" target="_blank" rel="noopener noreferrer" class="btn btn-instagram-follow">
                <span>Follow Us</span>
                <i class="fab fa-instagram ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Phone Instagram Modal -->
<div class="modal fade" id="instagramPhoneModal" tabindex="-1" aria-labelledby="instagramPhoneModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content bg-dark">
            <div class="modal-header border-0">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div id="instagramPhoneCarousel" class="carousel slide h-100" data-bs-ride="carousel">
                    <div class="carousel-inner h-100">
                        <!-- Slide 1 - Rooms -->
                        <div class="carousel-item active h-100">
                            <div class="instagram-modal-rectangle">
                                <img src="{{ asset('images/hero_section_img1.png') }}" alt="Luxury Rooms" class="instagram-modal-image" loading="lazy">
                                <div class="instagram-modal-content p-4">
                                    <h4 class="instagram-modal-heading mb-3">✨ Our Royal Rooms ✨</h4>
                                    <p class="instagram-modal-description">Step into a world of elegance and comfort! Our premium rooms are designed to make your stay unforgettable. From cozy interiors to stunning city views, every detail is crafted for your perfect getaway. Book now and experience luxury like never before! 🏨💫</p>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 2 - Reels Video -->
                        <div class="carousel-item h-100">
                            <div class="instagram-modal-rectangle">
                                <video class="instagram-modal-image" muted loop playsinline autoplay preload="auto">
                                    <source src="{{ asset('videos/home-page-new-video-35-sec-web.mp4') }}" type="video/mp4">
                                </video>
                                <div class="instagram-modal-content p-4">
                                    <h4 class="instagram-modal-heading mb-3">🎬 Behind the Scenes Reel</h4>
                                    <p class="instagram-modal-description">Get a sneak peek into the magic behind Hotel Kiran Place! Watch our latest reel to see what makes us special. From our amazing team to our beautiful spaces, there's so much to explore. Don't forget to like, share, and follow for more exciting content! 📱✨</p>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 3 - Hotel Experience -->
                        <div class="carousel-item h-100">
                            <div class="instagram-modal-rectangle">
                                <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Hotel Experience" class="instagram-modal-image" loading="lazy">
                                <div class="instagram-modal-content p-4">
                                    <h4 class="instagram-modal-heading mb-3">🌟 Your Perfect Stay Awaits</h4>
                                    <p class="instagram-modal-description">Welcome to Hotel Kiran Place, where every moment is crafted with care! Whether you're here for business or leisure, we promise an experience that's nothing short of extraordinary. Come, relax, and let us take care of everything! 🎉🏖️</p>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 4 - Amenities -->
                        <div class="carousel-item h-100">
                            <div class="instagram-modal-rectangle">
                                <img src="{{ asset('images/hero_section_img3.jpg') }}" alt="Hotel Amenities" class="instagram-modal-image" loading="lazy">
                                <div class="instagram-modal-content p-4">
                                    <h4 class="instagram-modal-heading mb-3">💎 Premium Amenities</h4>
                                    <p class="instagram-modal-description">Indulge in our world-class amenities designed for your comfort and convenience! From 24/7 room service to fine dining restaurants, we've got everything you need for a perfect stay. Your comfort is our priority! 🍽️🛎️</p>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 5 - Reels Video 2 -->
                        <div class="carousel-item h-100">
                            <div class="instagram-modal-rectangle">
                                <video class="instagram-modal-image" muted loop playsinline autoplay preload="auto">
                                    <source src="{{ asset('videos/home-page-new-video-35-sec-web.mp4') }}" type="video/mp4">
                                </video>
                                <div class="instagram-modal-content p-4">
                                    <h4 class="instagram-modal-heading mb-3">🎥 Explore Our Hotel</h4>
                                    <p class="instagram-modal-description">Take a virtual tour with our latest reel! See the beautiful spaces, meet our friendly staff, and discover why guests love staying with us. Share this with your friends and plan your next visit! Tag us in your photos for a chance to be featured! 📸❤️</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#instagramPhoneCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#instagramPhoneCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <div class="carousel-indicators instagram-modal-indicators">
                        <button type="button" data-bs-target="#instagramPhoneCarousel" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#instagramPhoneCarousel" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#instagramPhoneCarousel" data-bs-slide-to="2"></button>
                        <button type="button" data-bs-target="#instagramPhoneCarousel" data-bs-slide-to="3"></button>
                        <button type="button" data-bs-target="#instagramPhoneCarousel" data-bs-slide-to="4"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

