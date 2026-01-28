<section class="gallery-section py-10 bg-gray-50">
    <div class="container mx-auto relative">

        <!-- MAIN GALLERY -->
        <div class="swiper gallery-main-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('images/hero_section_img1.png') }}" alt="Room 1">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/rooms-1.jpg') }}" alt="Room 2">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('images/rooms-2.jpg') }}" alt="Room 3">
                </div>
            </div>

            <!-- Navigation -->
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
<div id="galleryModal"
    class="gallery-modal hidden fixed inset-0 bg-black bg-opacity-80 z-50 flex items-center justify-center">
    <button id="closeGalleryModal"
        class="gallery-close absolute top-4 right-6 text-white text-4xl font-bold">&times;</button>

    <div class="swiper gallery-modal-swiper w-4/5 max-w-4xl">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('images/hero_section_img1.png') }}" alt="Room 1">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/rooms-1.jpg') }}" alt="Room 2">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/rooms-2.jpg') }}" alt="Room 3">
            </div>
        </div>

        <!-- Navigation -->
        <div class="swiper-button-prev modal-prev"></div>
        <div class="swiper-button-next modal-next"></div>
    </div>
</div>