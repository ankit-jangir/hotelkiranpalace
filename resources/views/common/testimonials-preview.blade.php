<!-- Testimonials Section -->
<section class="testimonials-preview-section py-5 position-relative">
    <div class="testimonials-background-image position-absolute top-0 start-0 w-100 h-100" style="background-image: url('{{ asset('images/hero_section_img1.png') }}');"></div>
    <div class="testimonials-background-overlay position-absolute top-0 start-0 w-100 h-100"></div>
    <div class="container position-relative">
        <!-- Section Header -->
        <div class="row align-items-center mb-5 position-relative">
            <div class="col-12 col-md-8 offset-md-2 text-center mb-4 mb-md-0">
                <h2 class="testimonials-preview-heading mb-2">What Our Guests Say</h2>
                <p class="testimonials-preview-subtitle mb-3">Testimonials from our valued guests</p>
                <div class="testimonials-divider-line mx-auto"></div>
            </div>
            <div class="col-12 col-md-2 d-none d-md-flex justify-content-end">
                <div class="testimonials-nav-arrows d-flex gap-2">
                    <button class="btn-testimonial-nav" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="prev" aria-label="Previous">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="btn-testimonial-nav" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="next" aria-label="Next">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Bootstrap Carousel -->
        <div id="testimonialsCarousel" class="carousel slide position-relative" data-bs-ride="carousel" data-bs-interval="5000">
            <!-- Mobile Navigation Arrows (Left & Right of Cards) -->
            <div class="testimonials-mobile-nav-arrows d-md-none position-absolute w-100 d-flex justify-content-between align-items-center">
                <button class="btn-testimonial-nav-mobile btn-testimonial-nav-mobile-left" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="prev" aria-label="Previous">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="btn-testimonial-nav-mobile btn-testimonial-nav-mobile-right" type="button" data-bs-target="#testimonialsCarousel" data-bs-slide="next" aria-label="Next">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            <div class="carousel-inner">
                <!-- Slide 1: Cards 1-4 -->
                <div class="carousel-item active">
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="testimonial-card">
                                <div class="testimonial-profile mb-3">
                                    <img src="{{ asset('images/hero_section_img1.png') }}" alt="Rahul Sharma" class="testimonial-avatar" loading="lazy" onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Ccircle cx=%2240%22 cy=%2240%22 r=%2240%22 fill=%22%23ddd%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23999%22 font-size=%2220%22 font-weight=%22bold%22%3ERS%3C/text%3E%3C/svg%3E';">
                                </div>
                                <h5 class="testimonial-name mb-2">Rahul Sharma</h5>
                                <div class="testimonial-rating mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="testimonial-quote mb-0">"Amazing stay! Royal experience and very comfortable rooms. The staff was incredibly helpful and the amenities were top-notch."</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="testimonial-card">
                                <div class="testimonial-profile mb-3">
                                    <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Priya Patel" class="testimonial-avatar" loading="lazy" onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Ccircle cx=%2240%22 cy=%2240%22 r=%2240%22 fill=%22%23ddd%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23999%22 font-size=%2220%22 font-weight=%22bold%22%3EPP%3C/text%3E%3C/svg%3E';">
                                </div>
                                <h5 class="testimonial-name mb-2">Priya Patel</h5>
                                <div class="testimonial-rating mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="testimonial-quote mb-0">"Absolutely luxurious! The attention to detail and premium service made our anniversary celebration truly memorable and special."</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="testimonial-card">
                                <div class="testimonial-profile mb-3">
                                    <img src="{{ asset('images/hero_section_img3.jpg') }}" alt="Arjun Mehta" class="testimonial-avatar" loading="lazy" onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Ccircle cx=%2240%22 cy=%2240%22 r=%2240%22 fill=%22%23ddd%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23999%22 font-size=%2220%22 font-weight=%22bold%22%3EAM%3C/text%3E%3C/svg%3E';">
                                </div>
                                <h5 class="testimonial-name mb-2">Arjun Mehta</h5>
                                <div class="testimonial-rating mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="testimonial-quote mb-0">"Perfect blend of tradition and modernity. The restaurant food was exceptional and the rooms exceeded all expectations. Highly recommend!"</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="testimonial-card">
                                <div class="testimonial-profile mb-3">
                                    <img src="{{ asset('images/hero_section_img1.png') }}" alt="Sneha Verma" class="testimonial-avatar" onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Ccircle cx=%2240%22 cy=%2240%22 r=%2240%22 fill=%22%23ddd%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23999%22 font-size=%2220%22 font-weight=%22bold%22%3ESV%3C/text%3E%3C/svg%3E';">
                                </div>
                                <h5 class="testimonial-name mb-2">Sneha Verma</h5>
                                <div class="testimonial-rating mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="testimonial-quote mb-0">"Outstanding hospitality! The room was spacious and beautifully decorated. The breakfast spread was amazing. Will definitely visit again!"</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2: Cards 5-8 -->
                <div class="carousel-item">
                    <div class="row g-4">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="testimonial-card">
                                <div class="testimonial-profile mb-3">
                                    <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Vikram Singh" class="testimonial-avatar" loading="lazy" onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Ccircle cx=%2240%22 cy=%2240%22 r=%2240%22 fill=%22%23ddd%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23999%22 font-size=%2220%22 font-weight=%22bold%22%3EVS%3C/text%3E%3C/svg%3E';">
                                </div>
                                <h5 class="testimonial-name mb-2">Vikram Singh</h5>
                                <div class="testimonial-rating mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="testimonial-quote mb-0">"Excellent service and comfortable stay. The location is perfect and the staff went above and beyond to make our stay memorable."</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="testimonial-card">
                                <div class="testimonial-profile mb-3">
                                    <img src="{{ asset('images/hero_section_img3.jpg') }}" alt="Anjali Desai" class="testimonial-avatar" loading="lazy" onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Ccircle cx=%2240%22 cy=%2240%22 r=%2240%22 fill=%22%23ddd%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23999%22 font-size=%2220%22 font-weight=%22bold%22%3EAD%3C/text%3E%3C/svg%3E';">
                                </div>
                                <h5 class="testimonial-name mb-2">Anjali Desai</h5>
                                <div class="testimonial-rating mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="testimonial-quote mb-0">"Beautiful property with elegant interiors. The spa services were rejuvenating and the dining experience was exceptional. Highly recommended!"</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="testimonial-card">
                                <div class="testimonial-profile mb-3">
                                    <img src="{{ asset('images/hero_section_img1.png') }}" alt="Rajesh Kumar" class="testimonial-avatar" loading="lazy" onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Ccircle cx=%2240%22 cy=%2240%22 r=%2240%22 fill=%22%23ddd%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23999%22 font-size=%2220%22 font-weight=%22bold%22%3ERK%3C/text%3E%3C/svg%3E';">
                                </div>
                                <h5 class="testimonial-name mb-2">Rajesh Kumar</h5>
                                <div class="testimonial-rating mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="testimonial-quote mb-0">"Perfect for business travelers. Fast WiFi, comfortable rooms, and excellent room service. The conference facilities are top-notch."</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="testimonial-card">
                                <div class="testimonial-profile mb-3">
                                    <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Meera Joshi" class="testimonial-avatar" loading="lazy" onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Ccircle cx=%2240%22 cy=%2240%22 r=%2240%22 fill=%22%23ddd%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23999%22 font-size=%2220%22 font-weight=%22bold%22%3EMJ%3C/text%3E%3C/svg%3E';">
                                </div>
                                <h5 class="testimonial-name mb-2">Meera Joshi</h5>
                                <div class="testimonial-rating mb-3">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="testimonial-quote mb-0">"Wonderful family vacation! Kids loved the pool and the staff was very accommodating. The rooms were clean and spacious. Great value for money!"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

