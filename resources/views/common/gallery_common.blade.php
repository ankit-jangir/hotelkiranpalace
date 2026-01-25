<section class="gallery-section py-10 bg-gray-50">
    <div class="container mx-auto relative">

        <!-- MAIN GALLERY -->
        <div class="swiper gallery-main-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('images/hero_section_img1.png') }}">
                </div>

                <div class="swiper-slide">
                    <img src="{{ asset('images/rooms-1.jpg') }}">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/rooms-2.jpg') }}">
                </div>
            </div>

            <div class="swiper-button-prev main-prev"></div>
            <div class="swiper-button-next main-next"></div>
        </div>

        <div class="text-center mt-6">
            <button id="openGalleryModal" class="gallery-btn">
                Fullscreen Gallery
            </button>
        </div>
    </div>
</section>

<!-- MODAL -->
<div id="galleryModal" class="gallery-modal hidden">
    <button id="closeGalleryModal" class="gallery-close">&times;</button>

    <div class="swiper gallery-modal-swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('images/hero_section_img1.png') }}">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/rooms-1.jpg') }}">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/rooms-2.jpg') }}">
            </div>
        </div>

        <div class="swiper-button-prev modal-prev"></div>
        <div class="swiper-button-next modal-next"></div>
    </div>
</div>


<!-- Swiper CSS & JS -->