<!-- Toast Container - Global (Responsive: Top on mobile/tablet, Bottom on desktop) -->
<div class="position-fixed top-0 start-0 end-0 p-2 d-md-none" style="z-index: 9999;">
    <div id="toastContainerMobile"></div>
</div>
<div class="position-fixed bottom-0 end-0 p-3 d-none d-md-block" style="z-index: 9999; max-width: 350px; width: 100%;">
    <div id="toastContainerDesktop"></div>
</div>

<!-- Auto Show Session Toasts (Blade PHP - calls toast function from main.js) -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Use window.toast if available, otherwise try toast
        const showToast = (typeof window.toast === 'function') ? window.toast : (typeof toast === 'function' ? toast : null);
        
        if (showToast) {
            @if(session('success'))
                showToast('success', '{{ session('success') }}');
            @endif

            @if(session('error'))
                showToast('error', '{{ session('error') }}');
            @endif

            @if(session('warning'))
                showToast('warning', '{{ session('warning') }}');
            @endif

            @if(session('info'))
                showToast('info', '{{ session('info') }}');
            @endif
        }
    });
</script>
