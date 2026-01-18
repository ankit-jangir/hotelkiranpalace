<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard - Hotel Kiran Place')</title>
    
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🏨</text></svg>">
    
    <!-- Global Bootstrap CSS -->
    <link href="{{ asset('css/boot.css') }}" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Frontend Custom CSS -->
    <link href="{{ asset('frontend/style.css') }}" rel="stylesheet">
    
    <!-- Page Specific Styles -->
    @stack('styles')
</head>
<body class="admin-body" data-theme="light">
    <!-- Sidebar -->
    @include('admin.sidebar')
    
    <!-- Main Content Wrapper -->
    <div class="admin-main-wrapper">
        <!-- Header -->
        @include('admin.header')
        
        <!-- Main Content -->
        <main class="admin-main-content">
            <div class="admin-content-container">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Global Bootstrap JS -->
    <script src="{{ asset('js/boot.js') }}"></script>
    
    <!-- Frontend Custom JS -->
    <script src="{{ asset('frontend/main.js') }}"></script>
    
    <!-- Admin Sidebar Toggle & Theme Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('adminSidebar');
            const sidebarToggle = document.getElementById('adminSidebarToggle');
            const sidebarClose = document.getElementById('adminSidebarClose');
            const sidebarOverlay = document.getElementById('adminSidebarOverlay');
            const themeToggle = document.getElementById('adminThemeToggle');
            const themeIcon = document.getElementById('themeIcon');
            const body = document.body;
            
            // Load sidebar state from localStorage
            const sidebarState = localStorage.getItem('adminSidebarState');
            if (sidebarState === 'collapsed' && window.innerWidth >= 1200) {
                sidebar.classList.add('collapsed');
                document.body.classList.add('sidebar-collapsed');
            }
            
            // Toggle sidebar
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    if (window.innerWidth >= 1200) {
                        // Desktop: Toggle collapse
                        sidebar.classList.toggle('collapsed');
                        document.body.classList.toggle('sidebar-collapsed');
                        localStorage.setItem('adminSidebarState', sidebar.classList.contains('collapsed') ? 'collapsed' : 'expanded');
                    } else {
                        // Mobile: Toggle open/close
                        sidebar.classList.toggle('active');
                        sidebarOverlay.classList.toggle('active');
                        document.body.classList.toggle('sidebar-open');
                    }
                });
            }
            
            // Close sidebar button (mobile)
            if (sidebarClose) {
                sidebarClose.addEventListener('click', function() {
                    sidebar.classList.remove('active');
                    sidebarOverlay.classList.remove('active');
                    document.body.classList.remove('sidebar-open');
                });
            }
            
            // Close sidebar when overlay is clicked
            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', function() {
                    sidebar.classList.remove('active');
                    sidebarOverlay.classList.remove('active');
                    document.body.classList.remove('sidebar-open');
                });
            }
            
            // Theme Toggle
            if (themeToggle) {
                // Load theme from localStorage
                const savedTheme = localStorage.getItem('adminTheme') || 'light';
                if (savedTheme === 'dark') {
                    body.setAttribute('data-theme', 'dark');
                    body.classList.add('theme-dark');
                    if (themeIcon) {
                        themeIcon.classList.remove('fa-moon');
                        themeIcon.classList.add('fa-sun');
                    }
                }
                
                themeToggle.addEventListener('click', function() {
                    const currentTheme = body.getAttribute('data-theme');
                    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                    
                    body.setAttribute('data-theme', newTheme);
                    body.classList.toggle('theme-dark');
                    localStorage.setItem('adminTheme', newTheme);
                    
                    if (themeIcon) {
                        if (newTheme === 'dark') {
                            themeIcon.classList.remove('fa-moon');
                            themeIcon.classList.add('fa-sun');
                        } else {
                            themeIcon.classList.remove('fa-sun');
                            themeIcon.classList.add('fa-moon');
                        }
                    }
                });
            }
            
            // Close sidebar on window resize (if desktop)
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1200) {
                    sidebar.classList.remove('active');
                    sidebarOverlay.classList.remove('active');
                    document.body.classList.remove('sidebar-open');
                } else {
                    sidebar.classList.remove('collapsed');
                    document.body.classList.remove('sidebar-collapsed');
                }
            });
        });
    </script>
    
    <!-- Global Toast System -->
    @include('common.toast')
    
    <!-- Show Server-Side Toast Messages -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                if (typeof toast === 'function') {
                    toast('success', '{{ session('success') }}');
                }
            @endif

            @if(session('error'))
                if (typeof toast === 'function') {
                    toast('error', '{{ session('error') }}');
                }
            @endif
        });
    </script>
    
    <!-- Page Specific Scripts -->
    @stack('scripts')
</body>
</html>
