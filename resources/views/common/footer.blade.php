<footer class="bg-dark text-white mt-5 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3 mb-md-0">
                <h5>Hotel Kiran Place</h5>
                <p>Your comfortable stay destination</p>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-white-50">Home</a></li>
                    <li><a href="{{ route('about') }}" class="text-white-50">About</a></li>
                    <li><a href="{{ route('rooms') }}" class="text-white-50">Rooms & Tariff</a></li>
                    <li><a href="{{ route('amenities') }}" class="text-white-50">Amenities</a></li>
                    <li><a href="{{ route('gallery') }}" class="text-white-50">Photo & Gallery</a></li>
                    <li><a href="{{ route('contact') }}" class="text-white-50">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Legal</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('terms') }}" class="text-white-50">Terms & Conditions</a></li>
                    <li><a href="{{ route('privacy') }}" class="text-white-50">Privacy Policy</a></li>
                    <li><a href="{{ route('faq') }}" class="text-white-50">FAQ</a></li>
                </ul>
            </div>
        </div>
        <hr class="bg-white my-3">
        <div class="text-center">
            <p class="mb-0">&copy; {{ date('Y') }} Hotel Kiran Place. All rights reserved.</p>
        </div>
    </div>
</footer>
