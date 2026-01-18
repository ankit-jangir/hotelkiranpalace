<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Site Under Maintenance - Hotel Kiran Place</title>
    
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🏨</text></svg>">
    
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/boot.css') }}" rel="stylesheet">
    </head>
<body class="bg-gradient" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh;">
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow-lg" style="max-width: 600px; width: 100%; margin: 20px;">
            <div class="card-body p-5 text-center">
                <div class="mb-4" style="font-size: 80px;">🔧</div>
                <h1 class="card-title mb-3">Site Under Maintenance</h1>
                <p class="card-text text-muted mb-4 lead">We're currently improving our website to serve you better.</p>
                
                <div class="card mb-3 text-start" style="background-color: #f8f9fa; border-left: 4px solid #667eea;">
                    <div class="card-body">
                        <h3 class="h5 mb-2">What's Happening?</h3>
                        <p class="card-text mb-0">Hotel Kiran Place is undergoing scheduled maintenance and updates. We're working hard to enhance your experience with improved features and better performance.</p>
                    </div>
                </div>

                <div class="card mb-4 text-start" style="background-color: #f8f9fa; border-left: 4px solid #667eea;">
                    <div class="card-body">
                        <h3 class="h5 mb-2">We'll Be Back Soon!</h3>
                        <p class="card-text mb-0">Our team is working diligently to complete the maintenance. Please check back shortly. We apologize for any inconvenience caused.</p>
                    </div>
                </div>

                <div class="border-top pt-4 mt-4">
                    <h4 class="mb-3">Need Immediate Assistance?</h4>
                    <p class="mb-2"><strong>Phone:</strong> <a href="tel:+91XXXXXXXXXX">+91 XXXX XXXX XX</a></p>
                    <p class="mb-2"><strong>Email:</strong> <a href="mailto:info@hotelkiranplace.com">info@hotelkiranplace.com</a></p>
                    <p class="mb-3"><strong>WhatsApp:</strong> <a href="https://wa.me/91XXXXXXXXXX" target="_blank">Contact us on WhatsApp</a></p>
                </div>

                <div class="badge bg-success mt-3" style="padding: 0.5rem 1.5rem; border-radius: 25px;">
                    <span>●</span> Maintenance In Progress
                </div>
            </div>
        </div>
        </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/boot.js') }}"></script>
    </body>
</html>
