// ========================================
// Global Page Loader - Wait for actual page load
// ========================================
(function () {
    const pageLoader = document.getElementById("pageLoader");
    if (!pageLoader) return;

    let pageLoadStartTime = Date.now();
    let resourcesLoaded = false;
    let minDisplayTimeElapsed = false;

    // Track when minimum 1 second has passed
    setTimeout(function () {
        minDisplayTimeElapsed = true;
        hideLoaderIfReady();
    }, 1000);

    // Function to hide loader when both conditions are met
    function hideLoaderIfReady() {
        if (resourcesLoaded && minDisplayTimeElapsed) {
            pageLoader.classList.add("hidden");
            setTimeout(function () {
                pageLoader.style.display = "none";
            }, 500);
        }
    }

    // Wait for all resources to load (images, CSS, JS, etc.)
    window.addEventListener("load", function () {
        resourcesLoaded = true;
        hideLoaderIfReady();
    });

    // Fallback: If load event doesn't fire (shouldn't happen), hide after reasonable time
    setTimeout(function () {
        if (!resourcesLoaded) {
            resourcesLoaded = true;
            hideLoaderIfReady();
        }
    }, 10000); // 10 seconds max fallback
})();

// ========================================
// Global Toast Function
// Use anywhere: toast('success', 'Message here')
// ========================================
window.toast = function (type, message, duration = 5000) {
    // Get container based on screen size
    const isMobile = window.innerWidth < 768;
    const container = document.getElementById(
        isMobile ? "toastContainerMobile" : "toastContainerDesktop",
    );
    if (!container) return;

    const toastId = "toast-" + Date.now();

    const icons = {
        success: "fa-check-circle",
        error: "fa-exclamation-circle",
        warning: "fa-exclamation-triangle",
        info: "fa-info-circle",
    };

    // Full color backgrounds for different toast types
    const bgColors = {
        success: "bg-success",
        error: "bg-danger",
        warning: "bg-warning",
        info: "bg-info",
    };

    // Responsive text size - smaller on phone, normal on tablet/desktop
    const screenWidth = window.innerWidth;
    let textSizeClass = "";
    if (screenWidth < 576) {
        textSizeClass = "small"; // Small text on mobile
    }

    const toastHTML = `
        <div id="${toastId}" class="toast border-0 ${bgColors[type] || bgColors.info} text-white mb-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="${duration}">
            <div class="toast-body d-flex align-items-center justify-content-between ${textSizeClass}">
                <div class="d-flex align-items-center">
                    <i class="fas ${icons[type] || icons.info} me-2"></i>
                    <span>${message}</span>
                </div>
                <button type="button" class="btn-close btn-close-white ms-2 ms-md-3" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    `;

    container.insertAdjacentHTML("beforeend", toastHTML);
    const toastElement = document.getElementById(toastId);
    const toast = new bootstrap.Toast(toastElement);

    toast.show();

    toastElement.addEventListener("hidden.bs.toast", function () {
        toastElement.remove();
    });
};

// ========================================
// Mobile Menu Chevron Animation
// ========================================
document.addEventListener("DOMContentLoaded", function () {
    const moreCollapse = document.getElementById("mobileMoreCollapse");
    const roomsCollapse = document.getElementById("mobileRoomsCollapse");

    if (moreCollapse) {
        moreCollapse.addEventListener("show.bs.collapse", function () {
            const chevron = document.querySelector(
                '[data-bs-target="#mobileMoreCollapse"] .more-chevron',
            );
            if (chevron) chevron.style.transform = "rotate(180deg)";
        });
        moreCollapse.addEventListener("hide.bs.collapse", function () {
            const chevron = document.querySelector(
                '[data-bs-target="#mobileMoreCollapse"] .more-chevron',
            );
            if (chevron) chevron.style.transform = "rotate(0deg)";
        });
    }

    if (roomsCollapse) {
        roomsCollapse.addEventListener("show.bs.collapse", function () {
            const chevron = document.querySelector(
                '[data-bs-target="#mobileRoomsCollapse"] .fa-chevron-down',
            );
            if (chevron) chevron.style.transform = "rotate(180deg)";
        });
        roomsCollapse.addEventListener("hide.bs.collapse", function () {
            const chevron = document.querySelector(
                '[data-bs-target="#mobileRoomsCollapse"] .fa-chevron-down',
            );
            if (chevron) chevron.style.transform = "rotate(0deg)";
        });
    }

    // Scroll to Top Button with Progress Ring (Responsive)
    const scrollToTopBtn = document.getElementById("scrollToTop");
    if (scrollToTopBtn) {
        const progressCircle = scrollToTopBtn.querySelector(
            ".progress-ring-circle",
        );
        const progressSvg = scrollToTopBtn.querySelector(".progress-ring");

        // Get responsive radius and size based on screen size
        function getResponsiveValues() {
            const width = window.innerWidth;
            if (width <= 576) {
                // Phone: SVG 52px, circle radius 23
                return { svgSize: 52, radius: 23, center: 26 };
            } else if (width <= 991) {
                // Tablet: SVG 56px, circle radius 25
                return { svgSize: 56, radius: 25, center: 28 };
            } else {
                // Desktop: SVG 60px, circle radius 27
                return { svgSize: 60, radius: 27, center: 30 };
            }
        }

        function updateProgressRingSize() {
            const values = getResponsiveValues();
            const circumference = 2 * Math.PI * values.radius;

            if (progressSvg) {
                progressSvg.setAttribute("width", values.svgSize.toString());
                progressSvg.setAttribute("height", values.svgSize.toString());
                progressSvg.setAttribute(
                    "viewBox",
                    `0 0 ${values.svgSize} ${values.svgSize}`,
                );
            }

            if (progressCircle) {
                progressCircle.setAttribute("cx", values.center.toString());
                progressCircle.setAttribute("cy", values.center.toString());
                progressCircle.setAttribute("r", values.radius.toString());
                progressCircle.style.strokeDasharray = circumference;
                progressCircle.style.strokeDashoffset = circumference;
                progressCircle.style.transformOrigin = `${values.center}px ${values.center}px`;
            }

            return circumference;
        }

        let circumference = updateProgressRingSize();

        // Update on resize
        let resizeTimeout;
        window.addEventListener("resize", function () {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function () {
                circumference = updateProgressRingSize();
                updateScrollProgress();
            }, 100);
        });

        // Calculate and update scroll progress
        function updateScrollProgress() {
            const scrollTop =
                window.pageYOffset || document.documentElement.scrollTop;
            const scrollHeight =
                document.documentElement.scrollHeight - window.innerHeight;
            const progress = scrollHeight > 0 ? scrollTop / scrollHeight : 0;

            const offset = circumference - progress * circumference;

            if (scrollTop > 300) {
                scrollToTopBtn.classList.add("show");
                if (progressCircle) {
                    progressCircle.style.strokeDashoffset = offset;
                }
            } else {
                scrollToTopBtn.classList.remove("show");
                if (progressCircle) {
                    progressCircle.style.strokeDashoffset = circumference;
                }
            }
        }

        // Show/hide button and update progress
        window.addEventListener("scroll", updateScrollProgress);
        updateScrollProgress(); // Initial call

        // Scroll to top on click
        scrollToTopBtn.addEventListener("click", function () {
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        });
    }

    // ========================================
    // Subscribe Form Handler with Toast
    // ========================================
    const subscribeForm = document.getElementById("subscribeForm");
    const subscribeBtn = document.getElementById("subscribeBtn");

    if (subscribeForm && subscribeBtn) {
        subscribeForm.addEventListener("submit", function (e) {
            e.preventDefault();

            const emailInput = this.querySelector(".subscribe-input");
            const email = emailInput ? emailInput.value.trim() : "";

            // Basic email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!email) {
                toast("error", "Please enter your email address");
                return;
            }

            if (!emailRegex.test(email)) {
                toast("error", "Please enter a valid email address");
                return;
            }

            // Show loader
            subscribeBtn.classList.add("loading");
            subscribeBtn.disabled = true;

            // Simulate subscription (you can replace this with actual API call)
            // For now, show success toast
            setTimeout(function () {
                toast(
                    "success",
                    "Thank you! You have been successfully subscribed to our newsletter.",
                );
                emailInput.value = "";

                // Hide loader after toast appears
                setTimeout(function () {
                    subscribeBtn.classList.remove("loading");
                    subscribeBtn.disabled = false;
                }, 100);
            }, 500);
        });
    }

    // ========================================
    // Hero Section - Video Auto-play and Loop
    // ========================================
    function initializeHeroVideos() {
        const heroVideos = document.querySelectorAll(".hero-slide-video");

        heroVideos.forEach(function (video) {
            // Ensure video has loop attribute
            video.setAttribute("loop", "loop");
            video.setAttribute("autoplay", "autoplay");
            video.setAttribute("muted", "muted");
            video.setAttribute("playsinline", "playsinline");

            // Force play the video
            const playPromise = video.play();

            if (playPromise !== undefined) {
                playPromise
                    .then(function () {
                        // Video is playing successfully
                        console.log("Video is playing");
                    })
                    .catch(function (error) {
                        // Auto-play was prevented, try to play again on user interaction
                        console.log(
                            "Video autoplay prevented, will retry:",
                            error,
                        );

                        // Try to play on first user interaction
                        document.addEventListener(
                            "click",
                            function playVideoOnClick() {
                                video.play().catch(function (err) {
                                    console.log("Video play failed:", err);
                                });
                                document.removeEventListener(
                                    "click",
                                    playVideoOnClick,
                                );
                            },
                            { once: true },
                        );
                    });
            }

            // Ensure video loops when it ends (extra safety)
            video.addEventListener("ended", function () {
                video.currentTime = 0;
                video.play().catch(function (err) {
                    console.log("Video loop play failed:", err);
                });
            });

            // Ensure video continues playing if paused (auto-resume)
            video.addEventListener("pause", function () {
                // Only resume if it was auto-paused, not user-paused
                if (video.readyState >= 2) {
                    setTimeout(function () {
                        if (video.paused) {
                            video.play().catch(function (err) {
                                console.log("Video auto-resume failed:", err);
                            });
                        }
                    }, 100);
                }
            });
        });
    }

    // Initialize videos when DOM is ready
    document.addEventListener("DOMContentLoaded", function () {
        // Initialize videos immediately
        initializeHeroVideos();

        // Also initialize videos when carousel slide changes (if using carousel)
        const carousel = document.getElementById("heroCarousel");
        if (carousel) {
            carousel.addEventListener("slide.bs.carousel", function () {
                setTimeout(initializeHeroVideos, 100);
            });
        }
    });

    // ========================================
    // Hero Section - Image Error Handler & Video Fallback (Old code - keeping for compatibility)
    // ========================================
    let imageErrorCount = 0;
    const totalImages = 3;

    window.handleImageError = function (img, slideIndex) {
        imageErrorCount++;
        img.style.display = "none";
    };

    // ========================================
    // Room Gallery Modal - Image Thumbnail Click Handler
    // ========================================
    const roomGalleryModal = document.getElementById("roomGalleryModal");
    if (roomGalleryModal) {
        const galleryThumbnails =
            roomGalleryModal.querySelectorAll(".gallery-thumbnail");
        const galleryMainImage = document.getElementById("galleryMainImage");

        // Handle thumbnail clicks
        galleryThumbnails.forEach(function (thumbnail) {
            thumbnail.addEventListener("click", function () {
                const imageSrc = this.getAttribute("data-image");
                if (galleryMainImage && imageSrc) {
                    galleryMainImage.src = imageSrc;

                    // Update active thumbnail
                    galleryThumbnails.forEach(function (thumb) {
                        thumb.classList.remove("active");
                    });
                    this.classList.add("active");
                }
            });
        });

        // Handle card image or gallery icon clicks to open modal
        const roomCards = document.querySelectorAll(".royal-room-card");
        roomCards.forEach(function (card) {
            const cardImage = card.querySelector(".room-main-image");
            const galleryIcon = card.querySelector(".room-gallery-icon");

            if (cardImage) {
                cardImage.addEventListener("click", function () {
                    if (galleryIcon) {
                        galleryIcon.click();
                    }
                });
            }
        });

        // Initialize modal - set first thumbnail as active when modal opens
        roomGalleryModal.addEventListener("show.bs.modal", function () {
            const firstThumbnail = galleryThumbnails[0];
            if (firstThumbnail && galleryMainImage) {
                const firstImageSrc = firstThumbnail.getAttribute("data-image");
                galleryMainImage.src = firstImageSrc;
                galleryThumbnails.forEach(function (thumb) {
                    thumb.classList.remove("active");
                });
                firstThumbnail.classList.add("active");
            }
        });
    }

    // ========================================
    // Gallery Section - Video Auto-play
    // ========================================
    function initializeGalleryVideos() {
        const galleryVideos = document.querySelectorAll(
            ".gallery-circle-wrapper video, .gallery-circle-image, .gallery-modal-image video, .gallery-rectangle-wrapper video, .instagram-circle-wrapper video",
        );
        galleryVideos.forEach((video) => {
            // Skip if not a video element
            if (video.tagName !== "VIDEO") return;

            // Set attributes
            video.setAttribute("playsinline", "");
            video.setAttribute("muted", "");
            video.setAttribute("loop", "");
            video.setAttribute("autoplay", "");
            video.setAttribute("preload", "auto");

            // Ensure video properties
            video.muted = true;
            video.loop = true;

            // Try to play video
            const playVideo = () => {
                if (video.paused) {
                    const playPromise = video.play();
                    if (playPromise !== undefined) {
                        playPromise
                            .then(() => {
                                // Video playing successfully
                            })
                            .catch((error) => {
                                console.log(
                                    "Gallery video autoplay prevented:",
                                    error,
                                );
                            });
                    }
                }
            };

            // Try to play when video can play
            if (video.readyState >= 2) {
                playVideo();
            } else {
                video.addEventListener("canplay", playVideo, { once: true });
                video.addEventListener("loadeddata", playVideo, { once: true });
            }

            // Ensure loop works
            video.addEventListener("ended", function () {
                this.currentTime = 0;
                this.play().catch(() => {});
            });
        });
    }

    // Initialize on page load
    initializeGalleryVideos();

    // Also initialize after DOM is ready
    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", initializeGalleryVideos);
    } else {
        setTimeout(initializeGalleryVideos, 300);
    }

    // Initialize when window loads
    window.addEventListener("load", function () {
        setTimeout(initializeGalleryVideos, 200);
    });

    // Initialize videos in modal when it opens
    const galleryPhoneModalCarousel = document.getElementById(
        "galleryPhoneModalCarousel",
    );
    if (galleryPhoneModalCarousel) {
        galleryPhoneModalCarousel.addEventListener(
            "slide.bs.carousel",
            function () {
                // Pause all videos first
                galleryPhoneModalCarousel
                    .querySelectorAll("video")
                    .forEach((v) => {
                        v.pause();
                        v.currentTime = 0;
                    });

                // Play active video
                setTimeout(() => {
                    const activeVideo = galleryPhoneModalCarousel.querySelector(
                        ".carousel-item.active video",
                    );
                    if (activeVideo) {
                        activeVideo.play().catch((error) => {
                            console.log(
                                "Modal video autoplay prevented:",
                                error,
                            );
                        });
                    }
                }, 300);
            },
        );

        // Initialize video when modal opens
        const galleryModal = document.getElementById("galleryPhoneModal");
        if (galleryModal) {
            galleryModal.addEventListener("show.bs.modal", function () {
                setTimeout(() => {
                    initializeGalleryVideos();
                }, 100);
            });
        }
    }

    // Re-initialize videos when gallery carousel slides (tablet)
    const galleryTabletCarousel = document.getElementById(
        "galleryTabletCarousel",
    );
    if (galleryTabletCarousel) {
        galleryTabletCarousel.addEventListener("slid.bs.carousel", function () {
            setTimeout(() => {
                initializeGalleryVideos();
            }, 400);
        });
    }

    // Initialize videos when gallery section becomes visible
    const gallerySection = document.querySelector(".gallery-preview-section");
    if (gallerySection) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            initializeGalleryVideos();
                        }, 300);
                    }
                });
            },
            { threshold: 0.1 },
        );

        observer.observe(gallerySection);
    }

    // ========================================
    // Instagram Section - Video Auto-play
    // ========================================
    function initializeInstagramVideos() {
        const instagramVideos = document.querySelectorAll(
            ".instagram-circle-wrapper video, .instagram-modal-image video",
        );
        instagramVideos.forEach((video) => {
            // Set attributes
            video.setAttribute("playsinline", "");
            video.setAttribute("muted", "");
            video.setAttribute("loop", "");
            video.setAttribute("autoplay", "");
            video.setAttribute("preload", "auto");

            // Ensure video properties
            video.muted = true;
            video.loop = true;

            // Try to play video
            const playVideo = () => {
                if (video.paused) {
                    const playPromise = video.play();
                    if (playPromise !== undefined) {
                        playPromise
                            .then(() => {
                                // Video playing successfully
                            })
                            .catch((error) => {
                                console.log(
                                    "Instagram video autoplay prevented:",
                                    error,
                                );
                            });
                    }
                }
            };

            // Try to play when video can play
            if (video.readyState >= 2) {
                playVideo();
            } else {
                video.addEventListener("canplay", playVideo, { once: true });
                video.addEventListener("loadeddata", playVideo, { once: true });
            }

            // Ensure loop works
            video.addEventListener("ended", function () {
                this.currentTime = 0;
                this.play().catch(() => {});
            });
        });
    }

    // Initialize Instagram videos on page load
    initializeInstagramVideos();

    // Instagram Modal Video Handling
    const instagramPhoneCarousel = document.getElementById(
        "instagramPhoneCarousel",
    );
    if (instagramPhoneCarousel) {
        instagramPhoneCarousel.addEventListener(
            "slide.bs.carousel",
            function () {
                // Pause all videos first
                instagramPhoneCarousel
                    .querySelectorAll("video")
                    .forEach((v) => {
                        v.pause();
                        v.currentTime = 0;
                    });

                // Play active video
                setTimeout(() => {
                    const activeVideo = instagramPhoneCarousel.querySelector(
                        ".carousel-item.active video",
                    );
                    if (activeVideo) {
                        activeVideo.play().catch((error) => {
                            console.log(
                                "Instagram modal video autoplay prevented:",
                                error,
                            );
                        });
                    }
                }, 300);
            },
        );

        // Initialize video when modal opens
        const instagramModal = document.getElementById("instagramPhoneModal");
        if (instagramModal) {
            instagramModal.addEventListener("show.bs.modal", function () {
                setTimeout(() => {
                    initializeInstagramVideos();
                }, 100);
            });
        }
    }
});

// gallery page ui javascriptlet

let galleryCarousel;
let autoThumbInterval;

function openGalleryModal(data) {
    document.getElementById("galleryTitle").innerText = data.title;
    document.getElementById("galleryDesc").innerText = data.desc;

    let sliderHtml = "";
    let thumbHtml = "";

    data.images.forEach((img, i) => {
        sliderHtml += `
        <div class="carousel-item ${i === 0 ? "active" : ""}">
            <img src="${img}" class="d-block w-100 gallery-big-img">
        </div>`;

        thumbHtml += `
        <img src="${img}" class="thumb-img ${i === 0 ? "active" : ""}"
             onclick="goToSlide(${i})">`;
    });

    document.getElementById("galleryImages").innerHTML = sliderHtml;
    document.getElementById("thumbContainer").innerHTML = thumbHtml;

    const modal = new bootstrap.Modal(
        document.getElementById("galleryDetailModal"),
    );
    modal.show();

    galleryCarousel = new bootstrap.Carousel(
        document.getElementById("galleryCarousel"),
        { interval: 3500 },
    );

    autoThumbInterval = setInterval(() => {
        document
            .getElementById("thumbContainer")
            .scrollBy({ left: 120, behavior: "smooth" });
    }, 3000);
}

/* Thumbnail click */
function goToSlide(index) {
    galleryCarousel.to(index);
    setActiveThumb(index);
}

/* Sync active thumbnail */
document.addEventListener("slid.bs.carousel", function (e) {
    if (e.target.id === "galleryCarousel") {
        setActiveThumb(e.to);
    }
});

function setActiveThumb(index) {
    document.querySelectorAll(".thumb-img").forEach((img, i) => {
        img.classList.toggle("active", i === index);
    });
}

/* Manual scroll */
function scrollThumbs(dir) {
    document
        .getElementById("thumbContainer")
        .scrollBy({ left: dir * 150, behavior: "smooth" });
}
