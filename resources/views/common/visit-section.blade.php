<!-- Visit Hotel Kiran Palace Section -->
<section class="visit-section py-5 position-relative">
    <div class="container">
        <div class="row align-items-center g-4">
            <!-- Map Column (Right on Desktop, Top on Phone - Order 1) -->
            <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                <div class="visit-map-container position-relative">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.1234567890123!2d77.2090!3d28.6139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjjCsDM2JzUwLjAiTiA3N8KwMTInMzIuNCJF!5e0!3m2!1sen!2sin!4v1234567890123!5m2!1sen!2sin" 
                        width="100%" 
                        height="450" 
                        style="border:0; border-radius: 12px;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        class="visit-map-iframe">
                    </iframe>
                </div>
            </div>
            
            <!-- Contact Info Column (Left on Desktop, Bottom on Phone - Order 2) -->
            <div class="col-lg-6 col-md-12 order-1 order-lg-2">
                <h2 class="visit-heading mb-4">Visit Hotel Kiran Palace</h2>
                
                <!-- Address -->
                <div class="visit-contact-item mb-4">
                    <div class="d-flex align-items-start">
                        <div class="visit-icon-wrapper me-3">
                            <i class="fas fa-map-marker-alt visit-icon text-white"></i>
                        </div>
                        <div class="visit-contact-content">
                            <h5 class="visit-contact-label mb-2">Address</h5>
                            <p class="visit-contact-text mb-0">123 Royal Street, Palace Road<br>Luxury District, City 400001</p>
                        </div>
                    </div>
                </div>
                
                <!-- Phone -->
                <div class="visit-contact-item mb-4">
                    <div class="d-flex align-items-start">
                        <div class="visit-icon-wrapper me-3">
                            <i class="fas fa-phone visit-icon text-white"></i>
                        </div>
                        <div class="visit-contact-content">
                            <h5 class="visit-contact-label mb-2">Phone</h5>
                            <p class="visit-contact-text mb-0">
                                <a href="tel:+919876543210" class="visit-contact-link">+91 98765 43210</a><br>
                                <a href="tel:+919876543211" class="visit-contact-link">+91 98765 43211</a>
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Email -->
                <div class="visit-contact-item mb-4">
                    <div class="d-flex align-items-start">
                        <div class="visit-icon-wrapper me-3">
                            <i class="fas fa-envelope visit-icon text-white"></i>
                        </div>
                        <div class="visit-contact-content">
                            <h5 class="visit-contact-label mb-2">Email</h5>
                            <p class="visit-contact-text mb-0">
                                <a href="mailto:info@hotelkiranpalace.com" class="visit-contact-link">info@hotelkiranpalace.com</a><br>
                                <a href="mailto:reservations@hotelkiranpalace.com" class="visit-contact-link">reservations@hotelkiranpalace.com</a>
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Buttons -->
                <div class="visit-buttons d-flex flex-column flex-sm-row gap-3 mt-4">
                    <a href="https://www.google.com/maps/dir/?api=1&destination=123+Royal+Street+Palace+Road+Luxury+District+City+400001" target="_blank" rel="noopener noreferrer" class="btn visit-btn-directions position-relative overflow-hidden">
                        <span class="position-relative z-index-1 d-flex align-items-center justify-content-center">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            Get Directions
                        </span>
                    </a>
                    <a href="{{ route('contact') }}" class="btn visit-btn-contact position-relative overflow-hidden">
                        <span class="position-relative z-index-1 d-flex align-items-center justify-content-center">
                            <i class="fas fa-phone me-2"></i>
                            Contact Us
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

