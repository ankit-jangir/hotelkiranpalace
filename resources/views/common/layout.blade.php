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
    
    <!-- Frontend Custom CSS -->
    <link href="{{ asset('frontend/style.css') }}" rel="stylesheet">
    
    <!-- Page Specific Styles -->
    @stack('styles')
</head>
<body>
    <!-- Page Loader -->
    <div id="pageLoader" class="page-loader">
        <div class="loader-content">
            <div class="loader-spinner"></div>
            <p class="loader-text">Loading...</p>
        </div>
    </div>

    @include('common.header')

    <main>
        @yield('content')
    </main>

    @include('common.footer')

    <!-- Global Bootstrap JS -->
    <script src="{{ asset('js/boot.js') }}"></script>
    
    <!-- Frontend Custom JS -->
    <script src="{{ asset('frontend/main.js') }}"></script>
    
    <!-- Global Toast System -->
    @include('common.toast')
    
    <!-- Page Specific Scripts -->
    @stack('scripts')
</body>
</html>
