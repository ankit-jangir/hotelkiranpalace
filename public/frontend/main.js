// ========================================
// Global Toast Function
// Use anywhere: toast('success', 'Message here')
// ========================================
window.toast = function(type, message, duration = 5000) {
    // Get container based on screen size
    const isMobile = window.innerWidth < 768;
    const container = document.getElementById(isMobile ? 'toastContainerMobile' : 'toastContainerDesktop');
    if (!container) return;
    
    const toastId = 'toast-' + Date.now();
    
    const icons = {
        success: 'fa-check-circle',
        error: 'fa-exclamation-circle',
        warning: 'fa-exclamation-triangle',
        info: 'fa-info-circle'
    };

    // Full color backgrounds for different toast types
    const bgColors = {
        success: 'bg-success',
        error: 'bg-danger',
        warning: 'bg-warning',
        info: 'bg-info'
    };

    // Responsive text size - smaller on phone, normal on tablet/desktop
    const screenWidth = window.innerWidth;
    let textSizeClass = '';
    if (screenWidth < 576) {
        textSizeClass = 'small'; // Small text on mobile
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

    container.insertAdjacentHTML('beforeend', toastHTML);
    const toastElement = document.getElementById(toastId);
    const toast = new bootstrap.Toast(toastElement);
    
    toast.show();
    
    toastElement.addEventListener('hidden.bs.toast', function() {
        toastElement.remove();
    });
};

// ========================================
// Mobile Menu Chevron Animation
// ========================================
document.addEventListener('DOMContentLoaded', function() {
    const moreCollapse = document.getElementById('mobileMoreCollapse');
    const roomsCollapse = document.getElementById('mobileRoomsCollapse');
    
    if (moreCollapse) {
        moreCollapse.addEventListener('show.bs.collapse', function() {
            const chevron = document.querySelector('[data-bs-target="#mobileMoreCollapse"] .more-chevron');
            if (chevron) chevron.style.transform = 'rotate(180deg)';
        });
        moreCollapse.addEventListener('hide.bs.collapse', function() {
            const chevron = document.querySelector('[data-bs-target="#mobileMoreCollapse"] .more-chevron');
            if (chevron) chevron.style.transform = 'rotate(0deg)';
        });
    }
    
    if (roomsCollapse) {
        roomsCollapse.addEventListener('show.bs.collapse', function() {
            const chevron = document.querySelector('[data-bs-target="#mobileRoomsCollapse"] .fa-chevron-down');
            if (chevron) chevron.style.transform = 'rotate(180deg)';
        });
        roomsCollapse.addEventListener('hide.bs.collapse', function() {
            const chevron = document.querySelector('[data-bs-target="#mobileRoomsCollapse"] .fa-chevron-down');
            if (chevron) chevron.style.transform = 'rotate(0deg)';
        });
    }
    
    // Scroll to Top Button with Progress Ring (Responsive)
    const scrollToTopBtn = document.getElementById('scrollToTop');
    if (scrollToTopBtn) {
        const progressCircle = scrollToTopBtn.querySelector('.progress-ring-circle');
        const progressSvg = scrollToTopBtn.querySelector('.progress-ring');
        
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
                progressSvg.setAttribute('width', values.svgSize.toString());
                progressSvg.setAttribute('height', values.svgSize.toString());
                progressSvg.setAttribute('viewBox', `0 0 ${values.svgSize} ${values.svgSize}`);
            }
            
            if (progressCircle) {
                progressCircle.setAttribute('cx', values.center.toString());
                progressCircle.setAttribute('cy', values.center.toString());
                progressCircle.setAttribute('r', values.radius.toString());
                progressCircle.style.strokeDasharray = circumference;
                progressCircle.style.strokeDashoffset = circumference;
                progressCircle.style.transformOrigin = `${values.center}px ${values.center}px`;
            }
            
            return circumference;
        }
        
        let circumference = updateProgressRingSize();
        
        // Update on resize
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(function() {
                circumference = updateProgressRingSize();
                updateScrollProgress();
            }, 100);
        });
        
        // Calculate and update scroll progress
        function updateScrollProgress() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight - window.innerHeight;
            const progress = scrollHeight > 0 ? (scrollTop / scrollHeight) : 0;
            
            const offset = circumference - (progress * circumference);
            
            if (scrollTop > 300) {
                scrollToTopBtn.classList.add('show');
                if (progressCircle) {
                    progressCircle.style.strokeDashoffset = offset;
                }
            } else {
                scrollToTopBtn.classList.remove('show');
                if (progressCircle) {
                    progressCircle.style.strokeDashoffset = circumference;
                }
            }
        }
        
        // Show/hide button and update progress
        window.addEventListener('scroll', updateScrollProgress);
        updateScrollProgress(); // Initial call
        
        // Scroll to top on click
        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // ========================================
    // Subscribe Form Handler with Toast
    // ========================================
    const subscribeForm = document.getElementById('subscribeForm');
    if (subscribeForm) {
        subscribeForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const emailInput = this.querySelector('.subscribe-input');
            const email = emailInput ? emailInput.value.trim() : '';
            
            // Basic email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (!email) {
                toast('error', 'Please enter your email address');
                return;
            }
            
            if (!emailRegex.test(email)) {
                toast('error', 'Please enter a valid email address');
                return;
            }
            
            // Simulate subscription (you can replace this with actual API call)
            // For now, show success toast
            setTimeout(function() {
                toast('success', 'Thank you! You have been successfully subscribed to our newsletter.');
                emailInput.value = '';
            }, 500);
        });
    }

    // ========================================
    // Hero Section - Video Auto-play and Loop
    // ========================================
    function initializeHeroVideos() {
        const heroVideos = document.querySelectorAll('.hero-slide-video');
        
        heroVideos.forEach(function(video) {
            // Ensure video has loop attribute
            video.setAttribute('loop', 'loop');
            video.setAttribute('autoplay', 'autoplay');
            video.setAttribute('muted', 'muted');
            video.setAttribute('playsinline', 'playsinline');
            
            // Force play the video
            const playPromise = video.play();
            
            if (playPromise !== undefined) {
                playPromise.then(function() {
                    // Video is playing successfully
                    console.log('Video is playing');
                }).catch(function(error) {
                    // Auto-play was prevented, try to play again on user interaction
                    console.log('Video autoplay prevented, will retry:', error);
                    
                    // Try to play on first user interaction
                    document.addEventListener('click', function playVideoOnClick() {
                        video.play().catch(function(err) {
                            console.log('Video play failed:', err);
                        });
                        document.removeEventListener('click', playVideoOnClick);
                    }, { once: true });
                });
            }
            
            // Ensure video loops when it ends (extra safety)
            video.addEventListener('ended', function() {
                video.currentTime = 0;
                video.play().catch(function(err) {
                    console.log('Video loop play failed:', err);
                });
            });
            
            // Ensure video continues playing if paused (auto-resume)
            video.addEventListener('pause', function() {
                // Only resume if it was auto-paused, not user-paused
                if (video.readyState >= 2) {
                    setTimeout(function() {
                        if (video.paused) {
                            video.play().catch(function(err) {
                                console.log('Video auto-resume failed:', err);
                            });
                        }
                    }, 100);
                }
            });
        });
    }

    // Initialize videos when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize videos immediately
        initializeHeroVideos();
        
        // Also initialize videos when carousel slide changes (if using carousel)
        const carousel = document.getElementById('heroCarousel');
        if (carousel) {
            carousel.addEventListener('slide.bs.carousel', function() {
                setTimeout(initializeHeroVideos, 100);
            });
        }
    });

    // ========================================
    // Hero Section - Image Error Handler & Video Fallback (Old code - keeping for compatibility)
    // ========================================
    let imageErrorCount = 0;
    const totalImages = 3;

    window.handleImageError = function(img, slideIndex) {
        imageErrorCount++;
        img.style.display = 'none';
    };
});

