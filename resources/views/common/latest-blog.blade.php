<!-- Latest Blog Section (Blog Carousel) -->
<section class="offers-section py-5 position-relative">
    <div class="container-fluid px-4 position-relative">
        <!-- Section Header -->
        <div class="d-flex align-items-center justify-content-between mb-4 position-relative">
            <div style="flex: 1;"></div>
            <h2 class="offers-title mb-0 text-center" style="flex: 1; margin: 0 1rem;">Latest Blog</h2>
            <div class="offers-nav-arrows d-flex gap-2" style="flex: 1; justify-content: flex-end; margin-left: 1rem;">
                <button class="btn-offer-nav" type="button" data-bs-target="#offersCarousel" data-bs-slide="prev" aria-label="Previous">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="btn-offer-nav" type="button" data-bs-target="#offersCarousel" data-bs-slide="next" aria-label="Next">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <!-- Bootstrap Carousel -->
        <div id="offersCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                <!-- Slide 1: Cards 1-4 -->
                <div class="carousel-item active">
                    <div class="row g-0">
                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                            <div class="offer-card position-relative h-100">
                                <div class="offer-badge position-absolute">New</div>
                                <div class="offer-image-container position-relative">
                                    <img src="{{ asset('images/hero_section_img1.png') }}" alt="Celebrating Our Bond 2026" class="offer-image" loading="lazy">
                                </div>
                                <div class="offer-content">
                                    <h3 class="offer-title">Celebrating Our Bond 2026</h3>
                                    <p class="offer-description">Step into 2026 with a passport full of possibilities. It's not just an escape —it's your chance to explore, connect, and create stories worth sharing.... »</p>
                                    <div class="offer-buttons">
                                        <a href="{{ route('blog') }}" class="btn-offer-link">Know More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                            <div class="offer-card position-relative h-100">
                                <div class="offer-badge position-absolute">New</div>
                                <div class="offer-image-container position-relative">
                                    <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Simply Better Stays" class="offer-image" loading="lazy">
                                </div>
                                <div class="offer-content">
                                    <h3 class="offer-title">Simply Better Stays - Breakfast & More</h3>
                                    <p class="offer-description">Make your Ginger stay simply better. As a Taj InnerCircle NeuPass member, enjoy a complimentary breakfast upgrade plus exclusive savings on dining and... »</p>
                                    <div class="offer-buttons">
                                        <a href="{{ route('blog') }}" class="btn-offer-link">Know More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                            <div class="offer-card position-relative h-100">
                                <div class="offer-badge position-absolute" style="background: #fff; color: #333;">Round the year</div>
                                <div class="offer-image-container position-relative">
                                    <img src="{{ asset('images/hero_section_img3.jpg') }}" alt="Breakfast Inclusive Rate" class="offer-image" loading="lazy">
                                </div>
                                <div class="offer-content">
                                    <h3 class="offer-title">Breakfast Inclusive Rate</h3>
                                    <p class="offer-description">Wake up to a symphony of flavours with our delectable breakfast spread and enjoy seamless internet connectivity and flexible cancellation for that add... »</p>
                                    <div class="offer-buttons">
                                        <a href="{{ route('blog') }}" class="btn-offer-link">Know More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                            <div class="offer-card position-relative h-100">
                                <div class="offer-badge position-absolute" style="background: #fff; color: #333;">Round the year</div>
                                <div class="offer-image-container position-relative">
                                    <img src="{{ asset('images/hero_section_img1.png') }}" alt="Stay A Bit Longer" class="offer-image">
                                </div>
                                <div class="offer-content">
                                    <h3 class="offer-title">Stay A Bit Longer</h3>
                                    <p class="offer-description">Make the smart choice with our exclusive extended stay offer. When you stay for three nights or more, you'll enjoy special savings on your accommodati... »</p>
                                    <div class="offer-buttons">
                                        <a href="{{ route('blog') }}" class="btn-offer-link">Know More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2: Cards 5-8 -->
                <div class="carousel-item">
                    <div class="row g-0">
                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                            <div class="offer-card position-relative h-100">
                                <div class="offer-badge position-absolute">New</div>
                                <div class="offer-image-container position-relative">
                                    <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Luxury Weekend Getaway" class="offer-image">
                                </div>
                                <div class="offer-content">
                                    <h3 class="offer-title">Luxury Weekend Getaway</h3>
                                    <p class="offer-description">Escape to luxury this weekend. Enjoy premium accommodations, fine dining, and exclusive spa treatments. Perfect for couples and families seeking relaxation... »</p>
                                    <div class="offer-buttons">
                                        <a href="{{ route('blog') }}" class="btn-offer-link">Know More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                            <div class="offer-card position-relative h-100">
                                <div class="offer-badge position-absolute" style="background: #fff; color: #333;">Round the year</div>
                                <div class="offer-image-container position-relative">
                                    <img src="{{ asset('images/hero_section_img3.jpg') }}" alt="Business Traveler Package" class="offer-image">
                                </div>
                                <div class="offer-content">
                                    <h3 class="offer-title">Business Traveler Package</h3>
                                    <p class="offer-description">Designed for the modern professional. Enjoy high-speed WiFi, executive lounge access, complimentary breakfast, and flexible check-in/out times... »</p>
                                    <div class="offer-buttons">
                                        <a href="{{ route('blog') }}" class="btn-offer-link">Know More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                            <div class="offer-card position-relative h-100">
                                <div class="offer-badge position-absolute">New</div>
                                <div class="offer-image-container position-relative">
                                    <img src="{{ asset('images/hero_section_img1.png') }}" alt="Family Fun Package" class="offer-image">
                                </div>
                                <div class="offer-content">
                                    <h3 class="offer-title">Family Fun Package</h3>
                                    <p class="offer-description">Create unforgettable memories with your family. Special rates for families, kids' activities, family-friendly dining options, and spacious room accommodations... »</p>
                                    <div class="offer-buttons">
                                        <a href="{{ route('blog') }}" class="btn-offer-link">Know More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                            <div class="offer-card position-relative h-100">
                                <div class="offer-badge position-absolute" style="background: #fff; color: #333;">Round the year</div>
                                <div class="offer-image-container position-relative">
                                    <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Spa & Wellness Retreat" class="offer-image">
                                </div>
                                <div class="offer-content">
                                    <h3 class="offer-title">Spa & Wellness Retreat</h3>
                                    <p class="offer-description">Rejuvenate your mind, body, and soul. Includes spa treatments, yoga sessions, healthy meal options, and access to our state-of-the-art wellness center... »</p>
                                    <div class="offer-buttons">
                                        <a href="{{ route('blog') }}" class="btn-offer-link">Know More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel Indicators (Below Cards, Before View More) -->
        <div class="carousel-indicators offers-indicators">
            <button type="button" data-bs-target="#offersCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#offersCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>

        <!-- View More Link -->
        <div class="text-center mt-3">
            <a href="{{ route('blog') }}" class="offer-view-more">View More</a>
        </div>
    </div>
</section>

