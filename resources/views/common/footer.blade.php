<footer class="footer-main mt-5 py-5">
    <div class="container">
        <div class="row mb-4 g-3 g-md-4">
            <!-- Column 1: Hotel Kiran Place Information + Subscribe -->
            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                <div class="footer-brand mb-3 d-flex align-items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Hotel Kiran Place Logo" class="me-2" style="height: 40px; width: auto;" onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2240%22 height=%2240%22%3E%3Crect width=%2240%22 height=%2240%22 fill=%22%23ff6b35%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23fff%22 font-size=%2220%22 font-weight=%22bold%22%3EH%3C/text%3E%3C/svg%3E'; this.style.display='inline-block';">
                    <h4 class="mb-0">Hotel Kiran Place</h4>
                </div>
                <p class="footer-description mb-4">Experience the pinnacle of luxury and hospitality in the heart of India. Where royal heritage meets modern elegance.</p>
                
                <!-- Subscribe Section (Below Description) -->
                <div class="footer-subscribe">
                    <h6 class="subscribe-heading mb-2">Subscribe For Latest Updates</h6>
                    <form class="d-flex gap-2 subscribe-form" id="subscribeForm">
                        <input type="email" class="form-control subscribe-input" placeholder="Enter Your Email Address" required>
                        <button type="submit" class="btn subscribe-btn" id="subscribeBtn">
                            <span class="subscribe-btn-text">Subscribe</span>
                            <span class="subscribe-btn-loader d-none">
                                <i class="fas fa-spinner fa-spin"></i>
                            </span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="col-lg-3 col-md-6 col-6 mb-4 mb-lg-0">
                <h5 class="footer-heading mb-3">Quick Links</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('rooms') }}">Rooms & Tariff</a></li>
                    <li><a href="{{ route('amenities') }}">Amenities</a></li>
                    <li><a href="{{ route('gallery') }}">Gallery</a></li>
                </ul>
            </div>

            <!-- Column 3: Support Center -->
            <div class="col-lg-3 col-md-6 col-6 mb-4 mb-lg-0">
                <h5 class="footer-heading mb-3">Support Center</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="{{ route('faq') }}">FAQs</a></li>
                    <li><a href="{{ route('booking.policy') }}">Booking Policy</a></li>
                    <li><a href="{{ route('cancellation.policy') }}">Cancellation Policy</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>

            <!-- Column 4: Get in Touch -->
            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                <h5 class="footer-heading mb-3">Get in Touch</h5>
                <ul class="list-unstyled footer-contact">
                    <li class="mb-3 d-flex align-items-start">
                        <i class="fas fa-map-marker-alt me-2 mt-1"></i>
                        <a href="https://www.google.com/maps/search/?api=1&query=Royal+Palace+Road,+Heritage+District,+New+Delhi,+India+110001" target="_blank" class="footer-contact-link flex-1">Royal Palace Road, Heritage District, New Delhi, India 110001</a>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <i class="fas fa-phone me-2 mt-1"></i>
                        <a href="tel:+911145678900" class="footer-contact-link">+91 11 4567 8900</a>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <i class="fas fa-envelope me-2 mt-1"></i>
                        <a href="mailto:reservations@kiranpalace.com" class="footer-contact-link">reservations@kiranpalace.com</a>
                    </li>
                </ul>
                <p class="footer-follow mb-2">Follow Us:</p>
                <div class="footer-social">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="mailto:reservations@kiranpalace.com" class="social-icon"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="footer-bottom pt-3 border-top">
            <div class="row align-items-center">
                <div class="col-md-4 mb-2 mb-md-0">
                    <p class="mb-0">© {{ date('Y') }} Hotel Kiran Place. All rights reserved.</p>
                </div>
                <div class="col-md-4 text-center mb-2 mb-md-0">
                    <a href="{{ route('privacy') }}" class="footer-bottom-link">Privacy Policy</a>
                    <span class="mx-2">|</span>
                    <a href="{{ route('terms') }}" class="footer-bottom-link">Terms & Conditions</a>
                    <span class="mx-2">|</span>
                    <a href="#" class="footer-bottom-link">Support Center</a>
                </div>
                <div class="col-md-4 text-md-end">
                    <p class="mb-0">Designed by <a href="#" class="footer-brand-name-link footer-brand-name">abxtechnology</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button (Left Side) with Progress Ring -->
<button id="scrollToTop" class="scroll-to-top" aria-label="Scroll to top">
    <i class="fas fa-arrow-up"></i>
    <svg class="progress-ring" width="60" height="60" viewBox="0 0 60 60">
        <circle class="progress-ring-circle" cx="30" cy="30" r="27" fill="transparent" stroke="rgb(247, 71, 15)" stroke-width="3"></circle>
    </svg>
</button>

<!-- WhatsApp Floating Button (Right Side) -->
<a href="https://wa.me/911145678900?text=Hello%20Hotel%20Kiran%20Place%2C%20I%20would%20like%20to%20know%20more%20about%20your%20services" target="_blank" class="whatsapp-float" aria-label="Contact us on WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>
