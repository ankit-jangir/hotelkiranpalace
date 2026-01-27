@extends('common.layout')

@section('title', 'Photo & Video Gallery - Hotel Kiran Place')

@section('content')
    @php
        $imageGalleries = $galleries->where('type', 'image');
        $videoGalleries = $galleries->where('type', 'video');
    @endphp

    <!-- PHOTO GALLERY -->
    <div class="container gallery-container my-5">
        <h1 class="text-center mb-2">Photo Gallery</h1>
        <p class="text-center main-text text-muted mb-5">
            Explore our luxury rooms, interiors, amenities and memorable moments.
        </p>

        @if ($imageGalleries->count())
            <div class="row">
                @foreach ($imageGalleries as $gallery)
                    @php
                        $images = $gallery->sub_images ?? [];
                    @endphp

                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <div class="gallery-card"
                            onclick='openGalleryModal({
                            title: "{{ $gallery->name }}",
                            desc: "{{ $gallery->description }}",
                            images: [
                                @foreach ($images as $img)
                                    "{{ asset('storage/' . $img) }}", @endforeach
                            ]
                        })'>

                            <img src="{{ asset('storage/' . $gallery->main_image) }}" alt="{{ $gallery->name }}"
                                class="gallery-img">

                            <div class="gallery-overlay">
                                <h5>{{ $gallery->heading }}</h5>
                                <p>{{ $gallery->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5 empty-gallery">
                <i class="far fa-images fa-4x mb-3 text-warning"></i>
                <h3 class="mt-3">Moments Coming Soon</h3>
                <p class="text-muted mt-2">
                    We’re curating beautiful memories for you.<br>
                    Our gallery will be updated very soon.
                </p>
            </div>
        @endif
    </div>



    </div>

    <!-- PHOTO DETAIL MODAL -->
    <div class="modal fade" id="galleryDetailModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content luxury-content">

                <!-- CLOSE -->
                <button class="luxury-close" data-bs-dismiss="modal">&times;</button>

                <!-- CAROUSEL -->
                <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" id="galleryImages"></div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>

                <!-- THUMBNAILS -->
                <div class="thumb-wrapper">
                    <button class="thumb-btn left" onclick="scrollThumbs(-1)">&#10094;</button>

                    <div class="thumb-container" id="thumbContainer"></div>

                    <button class="thumb-btn right" onclick="scrollThumbs(1)">&#10095;</button>
                </div>

                <!-- CONTENT (IMAGE KE BAAD) -->
                <div class="luxury-caption">
                    <h4 id="galleryTitle"></h4>
                    <p id="galleryDesc"></p>
                </div>

            </div>
        </div>
    </div>

    <!-- VIDEO GALLERY -->
    <div class="container gallery-container my-5">
        <h1 class="text-center mb-2">Video Gallery</h1>
        <p class="text-center main-text text-muted mb-5">
            Watch exclusive videos of our hotel, rooms, events and guest experiences.
        </p>

        @if ($videoGalleries->count())
            <div class="row">
                @foreach ($videoGalleries as $gallery)
                    <div class="col-6 col-md-4 col-lg-3 mb-4">
                        <div class="video-card position-relative" data-bs-toggle="modal" data-bs-target="#videoModal"
                            onclick="openVideoModal(
                            '{{ asset('storage/' . $gallery->main_image) }}',
                            '{{ e($gallery->heading) }}',
                            '{{ e($gallery->description) }}'
                         )">

                            <!-- AUTO PLAY VIDEO PREVIEW -->
                            <video class="video-thumbnail" autoplay muted loop playsinline preload="metadata">
                                <source src="{{ asset('storage/' . $gallery->main_image) }}" type="video/mp4">
                            </video>

                            <!-- PLAY ICON -->
                            <span class="video-play-icon">
                                <i class="fa-solid fa-circle-play"></i>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- EMPTY STATE -->
            <div class="text-center py-5 empty-gallery">
                <i class="far fa-images fa-4x mb-3 text-warning"></i>
                <h3 class="mt-3">Moments Coming Soon</h3>
                <p class="text-muted mt-2">
                    We’re curating beautiful memories for you.<br>
                    Our gallery will be updated very soon.
                </p>
            </div>
        @endif
    </div>




    <!-- VIDEO MODAL -->
<div class="modal fade" id="videoModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content video-luxury-modal">

            <div class="modal-header video-modal-header">
                <h4 id="videoModalHeading" class="mb-0"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    onclick="stopVideo()"></button>
            </div>

            <div class="modal-body video-modal-body">

                <div class="video-wrapper">
                    <video id="modalVideo" controls>
                        <source src="" type="video/mp4">
                    </video>
                </div>

                <div class="video-modal-content">
                    <h5 id="videoHeading"></h5>
                    <p id="videoDescription"></p>
                </div>

            </div>

        </div>
    </div>
</div>




@endsection


<script>
    function openVideoModal(videoUrl, heading, description) {
        const video = document.getElementById('modalVideo');
        const source = video.querySelector('source');

        source.src = videoUrl;
        video.load();

        setTimeout(() => {
            video.play().catch(() => {});
        }, 300);

        document.getElementById('videoModalHeading').innerText = heading || 'Video';
        document.getElementById('videoHeading').innerText = heading || '';
        document.getElementById('videoDescription').innerText = description || '';
    }

    function stopVideo() {
        const video = document.getElementById('modalVideo');
        video.pause();
        video.currentTime = 0;
    }
</script>
