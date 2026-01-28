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
                    <a href="https://www.instagram.com/hotel.kiranpalace" target="_blank" rel="noopener noreferrer"
                        class="btn btn-instagram-follow">
                        <span>Follow Us</span>
                        <i class="fab fa-instagram ms-2"></i>
                    </a>
                </div>
            </div>

            <!-- Desktop: Static Grid (5 Circles) -->
            <div class="instagram-desktop-grid d-none d-lg-block">
                <div class="row g-4 justify-content-center">
                    @foreach ($instagramVideos as $video)
                        <div class="col-lg-2 col-md-4">
                            <div class="instagram-circle-card position-relative">
                                <div class="instagram-circle-wrapper">

                                    <video class="instagram-circle-image" autoplay muted loop playsinline preload="metadata">
                                        <source src="{{ asset('storage/' . $video->main_image) }}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <!-- Tablet: Carousel (3 per slide) -->
            <div id="instagramTabletCarousel" class="carousel slide d-none d-md-block d-lg-none" data-bs-ride="carousel"
                data-bs-interval="4000">

                <div class="carousel-inner">

                    @foreach ($instagramVideos->chunk(3) as $chunkIndex => $videosChunk)
                        <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                            <div class="row g-4 justify-content-center">

                                @foreach ($videosChunk as $video)
                                    <div class="col-md-4">
                                        <div class="instagram-circle-card position-relative">
                                            <div class="instagram-circle-wrapper">

                                                <video class="instagram-circle-image" autoplay muted loop playsinline
                                                    preload="metadata">
                                                    <source src="{{ asset('storage/' . $video->main_image) }}"
                                                        type="video/mp4">
                                                </video>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- Indicators -->
                <div class="carousel-indicators instagram-indicators">
                    @foreach ($instagramVideos->chunk(3) as $index => $chunk)
                        <button type="button" data-bs-target="#instagramTabletCarousel"
                            data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}">
                        </button>
                    @endforeach
                </div>

            </div>


            <!-- Phone: Carousel (2 per slide) with Dots -->
            <div id="instagramPhoneCarouselOuter" class="carousel slide d-block d-md-none" data-bs-ride="carousel"
                data-bs-interval="4000">

                <div class="carousel-inner">

                    @foreach ($instagramVideos->chunk(2) as $chunkIndex => $videosChunk)
                        <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                            <div class="row g-3">

                                @foreach ($videosChunk as $video)
                                    <div class="col-6">
                                        <div class="instagram-circle-card position-relative" data-bs-toggle="modal"
                                            data-bs-target="#instagramPhoneModal">

                                            <div class="instagram-circle-wrapper">

                                                <video class="instagram-circle-image" muted loop autoplay playsinline
                                                    preload="metadata">
                                                    <source src="{{ asset('storage/' . $video->main_image) }}"
                                                        type="video/mp4">
                                                </video>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- Indicators -->
                <div class="carousel-indicators instagram-phone-indicators">
                    @foreach ($instagramVideos->chunk(2) as $index => $chunk)
                        <button type="button" data-bs-target="#instagramPhoneCarouselOuter"
                            data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}">
                        </button>
                    @endforeach
                </div>

            </div>


            <!-- Mobile Follow Button -->
            <div class="text-center d-block d-md-none mt-4">
                <a href="https://www.instagram.com/hotel.kiranpalace" target="_blank" rel="noopener noreferrer"
                    class="btn btn-instagram-follow">
                    <span>Follow Us</span>
                    <i class="fab fa-instagram ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Phone Instagram Modal -->
  <div class="modal fade" id="instagramPhoneModal" tabindex="-1"
    aria-labelledby="instagramPhoneModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content bg-dark">

            <div class="modal-header border-0">
                <button type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div class="modal-body p-0">
                <div id="instagramPhoneCarousel"
                    class="carousel slide h-100"
                    data-bs-ride="carousel">

                    <div class="carousel-inner h-100">

                        @foreach ($instagramVideos as $key => $video)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }} h-100">
                            <div class="instagram-modal-rectangle">

                                <video class="instagram-modal-image"
                                    muted
                                    loop
                                    autoplay
                                    playsinline
                                    preload="metadata">
                                    <source src="{{ asset('storage/'.$video->main_image) }}" type="video/mp4">
                                </video>

                                <div class="instagram-modal-content p-4">
                                    @if($video->heading)
                                    <h4 class="instagram-modal-heading mb-3">
                                        {{ $video->heading }}
                                    </h4>
                                    @endif

                                    @if($video->description)
                                    <p class="instagram-modal-description">
                                        {{ $video->description }}
                                    </p>
                                    @endif
                                </div>

                            </div>
                        </div>
                        @endforeach

                    </div>

                    <!-- Controls -->
                    <button class="carousel-control-prev"
                        type="button"
                        data-bs-target="#instagramPhoneCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next"
                        type="button"
                        data-bs-target="#instagramPhoneCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                    <!-- Indicators (DYNAMIC) -->
                    <div class="carousel-indicators instagram-modal-indicators">
                        @foreach($instagramVideos as $index => $video)
                        <button type="button"
                            data-bs-target="#instagramPhoneCarousel"
                            data-bs-slide-to="{{ $index }}"
                            class="{{ $index == 0 ? 'active' : '' }}">
                        </button>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

