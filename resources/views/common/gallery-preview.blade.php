   @php
    $latestVideo = $galleryImages->where('type', 'video')->first();
@endphp

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
                    @foreach ($galleryImages->take(4) as $img)
                        <div class="col-lg-3">
                            <div class="gallery-circle-card position-relative">
                                <div class="gallery-circle-wrapper">
                                    <img src="{{ asset('storage/' . $img->main_image) }}" alt="{{ $img->heading }}"
                                        class="gallery-circle-image" loading="lazy">
                                    <div class="gallery-circle-overlay">
                                        <div class="gallery-circle-content">
                                            <h4 class="gallery-circle-heading">{{ $img->heading }}</h4>
                                            <p class="gallery-circle-description">{{ $img->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="gallery-circle-label text-center mt-3">{{ $img->heading }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- Rectangle Card (Desktop) -->
                <div class="row g-4 mt-2">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="gallery-rectangle-card position-relative">
                            
                            <div class="gallery-rectangle-wrapper">
                                <video class="gallery-rectangle-image" muted loop playsinline autoplay preload="auto">
                                    <source src="{{ asset('videos/home-page-new-video-35-sec-web.mp4') }}"
                                        type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="gallery-rectangle-content position-absolute bottom-0 start-0 w-100 p-4">
                                    <div class="d-flex align-items-start mb-2">
                                        <span class="gallery-bullet me-2" style="color: #e91e63;">•</span>
                                        <h4 class="gallery-rectangle-heading mb-2">Intuitive and High Energy</h4>
                                    </div>
                                    <p class="gallery-rectangle-description">Our attentive team is dedicated to
                                        providing personalized service, ensuring your stay is comfortable and memorable.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tablet: Carousel (3 per slide) -->
            <div id="galleryTabletCarousel" class="carousel slide d-none d-md-block d-lg-none" data-bs-ride="carousel"
                data-bs-interval="4000">
                <div class="carousel-inner">
                    @foreach ($galleryImages->chunk(3) as $i => $chunk)
                        <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                            <div class="row g-4">
                                @foreach ($chunk as $img)
                                    <div class="col-md-4">
                                        <div class="gallery-circle-card position-relative">
                                            <div class="gallery-circle-wrapper">
                                                <img src="{{ asset('storage/' . $img->main_image) }}"
                                                    alt="{{ $img->heading }}" class="gallery-circle-image"
                                                    loading="lazy">
                                                <div class="gallery-circle-overlay">
                                                    <div class="gallery-circle-content">
                                                        <h4 class="gallery-circle-heading">{{ $img->heading }}</h4>
                                                        <p class="gallery-circle-description">{{ $img->description }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="gallery-circle-label text-center mt-3"> {{ $img->heading }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- Indicators --}}
                <div class="carousel-indicators gallery-indicators">
                    @foreach ($galleryImages->chunk(3) as $i => $chunk)
                        <button type="button" data-bs-target="#galleryTabletCarousel"
                            data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}">
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Phone: Carousel (2 per slide) with Dots -->
            <div id="galleryPhoneCarousel" class="carousel slide d-block d-md-none" data-bs-ride="carousel"
                data-bs-interval="4000">
                <div class="carousel-inner">
                    @foreach ($galleryImages->chunk(2) as $i => $chunk)
                        <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                            <div class="row g-3">
                                @foreach ($chunk as $img)
                                    <div class="col-6">
                                        <div class="gallery-circle-card position-relative" data-bs-toggle="modal"
                                            data-bs-target="#galleryPhoneModal"
                                            data-index="{{ $loop->parent->index * 2 + $loop->index }}">
                                            <div class="gallery-circle-wrapper">
                                                <img src="{{ asset('storage/' . $img->main_image) }}"
                                                    alt="{{ $img->heading }}" class="gallery-circle-image"
                                                    loading="lazy">
                                            </div>
                                            <p class="gallery-circle-label text-center mt-2">{{ $img->heading }}</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- Indicators --}}
                <div class="carousel-indicators gallery-indicators">
                    @foreach ($galleryImages->chunk(2) as $i => $chunk)
                        <button type="button" data-bs-target="#galleryTabletCarousel"
                            data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}">
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Phone Gallery Modal -->
    <div class="modal fade" id="galleryPhoneModal" tabindex="-1" aria-labelledby="galleryPhoneModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content bg-dark">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div id="galleryPhoneModalCarousel" class="carousel slide h-100" data-bs-ride="carousel">
                        <div class="carousel-inner h-100">
                            @foreach ($galleryImages as $k => $img)
                                <div class="carousel-item {{ $k == 0 ? 'active' : '' }} h-100">
                                    <div class="gallery-modal-rectangle">
                                        <img src="{{ asset('storage/' . $img->main_image) }}"
                                            alt="{{ $img->heading }}" class="gallery-modal-image">
                                        <div class="gallery-modal-content p-4">
                                            <h4 class="gallery-modal-heading mb-3">{{ $img->heading }}</h4>
                                            <p class="gallery-modal-description">{{ $img->description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                 @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#galleryPhoneModalCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#galleryPhoneModalCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="carousel-indicators gallery-modal-indicators">
                            @foreach ($galleryImages as $k => $img)
                                <button type="button" data-bs-target="#galleryPhoneModalCarousel"
                                    data-bs-slide-to="{{ $k }}" class="{{ $k == 0 ? 'active' : '' }}">
                                </button>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        const modal = document.getElementById('galleryPhoneModal');

        modal.addEventListener('shown.bs.modal', function(e) {
            const index = e.relatedTarget.getAttribute('data-index');

            const carousel = bootstrap.Carousel.getOrCreateInstance(
                document.getElementById('galleryPhoneModalCarousel')
            );

            carousel.to(index);
        });
    </script>
