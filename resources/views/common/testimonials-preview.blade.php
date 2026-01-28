<style>
    .testimonials-background,
    .testimonials-background-image,
    .testimonials-bg-video {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
    }

    .testimonials-bg-video {
        object-fit: cover;
        z-index: 1;
    }

    .testimonials-background-image {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        z-index: 1;
    }
</style>
<!-- Testimonials Section -->
<section class="testimonials-preview-section py-5 position-relative">
    <div class="testimonials-background-image position-absolute top-0 start-0 w-100 h-100">
        {{-- VIDEO BACKGROUND --}}
        @if ($heroBgVideo)
            <video class="testimonials-bg-video" autoplay muted loop playsinline>
                <source src="{{ $heroBgVideo }}" type="video/mp4">
            </video>

            {{-- IMAGE BACKGROUND --}}
        @else
            <div class="testimonials-background-image w-100 h-100"
                style="background-image: url('{{ $heroBgImage ?? asset('images/hero_section_img1.png') }}');">
            </div>
        @endif

    </div>
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
                    <button class="btn-testimonial-nav" type="button" data-bs-target="#testimonialsCarousel"
                        data-bs-slide="prev" aria-label="Previous">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="btn-testimonial-nav" type="button" data-bs-target="#testimonialsCarousel"
                        data-bs-slide="next" aria-label="Next">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Bootstrap Carousel -->
        <div id="testimonialsCarousel" class="carousel slide position-relative" data-bs-ride="carousel"
            data-bs-interval="5000">
            <!-- Mobile Navigation Arrows (Left & Right of Cards) -->
            <div
                class="testimonials-mobile-nav-arrows d-md-none position-absolute w-100 d-flex justify-content-between align-items-center">
                <button class="btn-testimonial-nav-mobile btn-testimonial-nav-mobile-left" type="button"
                    data-bs-target="#testimonialsCarousel" data-bs-slide="prev" aria-label="Previous">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="btn-testimonial-nav-mobile btn-testimonial-nav-mobile-right" type="button"
                    data-bs-target="#testimonialsCarousel" data-bs-slide="next" aria-label="Next">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
            <div class="carousel-inner">
                <!-- Slide 1: Cards 1-4 -->
                @foreach ($testimonials->chunk(4) as $chunk)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <div class="row g-4">
                            @foreach ($chunk as $testimonial)
                                <div class="col-lg-3 col-md-4 col-12">
                                    <div class="testimonial-card">
                                        <div class="testimonial-profile mb-3">
                                            <img src="{{ asset('images/hero_section_img1.png') }}"
                                                alt="{{ $testimonial->name }}" class="testimonial-avatar"
                                                loading="lazy">
                                        </div>
                                        <h5 class="testimonial-name mb-2">{{ $testimonial->name }}</h5>
                                        <div class="testimonial-rating mb-3">
                                            @for ($i = 0; $i < $testimonial->star; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                        </div>
                                        <p class="testimonial-quote mb-0">"{{ $testimonial->description }}"</p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
