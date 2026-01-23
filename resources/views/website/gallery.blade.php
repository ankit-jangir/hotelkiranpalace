@extends('common.layout')

@section('title', 'Photo & Video Gallery - Hotel Kiran Place')

@section('content')

<!-- PHOTO GALLERY -->
<div class="container gallery-container my-5">
    <h1 class="text-center mb-5">Photo Gallery</h1>

    <div class="row">
        @for ($i = 1; $i <= 6; $i++) <div class="col-md-4 mb-4">
            <div class="gallery-card" onclick="openGalleryModal({
                title: 'Luxury Room',
                desc: 'Elegant luxury room with premium amenities, king size bed and modern interior.',
                images: [
                    '{{ asset('images/hero_section_img1.png') }}',
                    '{{ asset('images/hero_section_img2.jpg') }}',
                    '{{ asset('images/hero_section_img1.png') }}'
                ]
            })">

                <img src="{{ asset('images/hero_section_img1.png') }}" class="gallery-img">

                <!-- Hover Overlay (Desktop) -->
                <div class="gallery-overlay">
                    <h5>Luxury Room</h5>
                    <p>Premium comfort & elegant interior</p>
                </div>
            </div>
    </div>
    @endfor
</div>
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
    <h1 class="text-center mb-5">Video Gallery</h1>

    <div class="row">
        @for ($i = 1; $i <= 3; $i++) <div class="col-md-4 mb-4">
            <div class="video-card position-relative" data-bs-toggle="modal" data-bs-target="#videoModal"
                onclick="setVideoSrc('https://www.w3schools.com/html/mov_bbb.mp4')">

                <img src="{{ asset('images/hero_section_img2.jpg') }}" class="video-thumbnail">
                <span class="video-play-icon">&#9658;</span>
            </div>
    </div>
    @endfor
</div>
</div>

<!-- VIDEO MODAL -->
<div class="modal fade" id="videoModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="stopVideo()"></button>
            </div>

            <div class="modal-body text-center">
                <video id="modalVideo" class="w-100" controls>
                    <source src="" type="video/mp4">
                </video>
            </div>

        </div>
    </div>
</div>

@endsection