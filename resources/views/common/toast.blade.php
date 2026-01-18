<!-- Toast Container - Global (Responsive: Top on mobile/tablet, Bottom on desktop) -->
<div class="position-fixed top-0 start-0 end-0 p-2 d-md-none" style="z-index: 9999;">
    <div id="toastContainerMobile"></div>
</div>
<div class="position-fixed bottom-0 end-0 p-3 d-none d-md-block" style="z-index: 9999; max-width: 350px; width: 100%;">
    <div id="toastContainerDesktop"></div>
</div>

<!-- Toast Notification Script -->
<script>
    // Global Toast Function - Use anywhere: toast('success', 'Message here')
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

    // Auto show session toasts
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
            toast('success', '{{ session('success') }}');
        @endif

        @if(session('error'))
            toast('error', '{{ session('error') }}');
        @endif

        @if(session('warning'))
            toast('warning', '{{ session('warning') }}');
        @endif

        @if(session('info'))
            toast('info', '{{ session('info') }}');
        @endif
    });
</script>
