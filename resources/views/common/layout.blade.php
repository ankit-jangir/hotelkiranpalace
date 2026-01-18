<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Hotel Kiran Place')</title>
    
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🏨</text></svg>">
    
    <!-- Global Bootstrap CSS -->
    <link href="{{ asset('css/boot.css') }}" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Global Responsive Text Styles -->
    <style>
        /* Responsive text size - automatically smaller on mobile/tablet */
        @media (max-width: 576px) {
            body {
                font-size: 0.875rem; /* 14px on mobile */
            }
            h1 { font-size: 1.75rem; }
            h2 { font-size: 1.5rem; }
            h3 { font-size: 1.25rem; }
            h4 { font-size: 1.1rem; }
            h5 { font-size: 1rem; }
        }
        @media (min-width: 577px) and (max-width: 991px) {
            body {
                font-size: 0.9375rem; /* 15px on tablet */
            }
        }
        @media (min-width: 992px) {
            body {
                font-size: 1rem; /* 16px on desktop */
            }
        }
    </style>
    
    <!-- Page Specific Styles -->
    @stack('styles')
</head>
<body>
    @include('common.header')

    <main>
        @yield('content')
    </main>

    @include('common.footer')

    <!-- Global Bootstrap JS -->
    <script src="{{ asset('js/boot.js') }}"></script>
    
    <!-- Global Toast System -->
    @include('common.toast')
    
    <!-- Page Specific Scripts -->
    @stack('scripts')
</body>
</html>
