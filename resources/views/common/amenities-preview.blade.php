<!-- Amenities Section -->
<section class="amenities-preview-section py-5 position-relative">
    <div class="amenities-background-circle position-absolute"></div>
    <div class="container position-relative">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <h2 class="amenities-preview-heading mb-2">Premium Amenities</h2>
            <p class="amenities-preview-subtitle">Everything you need for a perfect stay</p>
        </div>

        <!-- Amenities Cards Grid -->
        <div class="row g-4 mb-4">
            <div class="col-lg-4 col-md-4 col-6">
                <div class="amenity-card text-center">
                    <div class="amenity-icon-wrapper">
                        <i class="fas fa-wifi"></i>
                    </div>
                    <h5 class="amenity-card-title">Free Wi-Fi</h5>
                    <p class="amenity-card-description">High-speed internet access throughout the property</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-6">
                <div class="amenity-card text-center">
                    <div class="amenity-icon-wrapper">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h5 class="amenity-card-title">Restaurant</h5>
                    <p class="amenity-card-description">Multi-cuisine dining with gourmet delicacies</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-6">
                <div class="amenity-card text-center">
                    <div class="amenity-icon-wrapper">
                        <i class="fas fa-parking"></i>
                    </div>
                    <h5 class="amenity-card-title">Parking</h5>
                    <p class="amenity-card-description">Secure parking facility for all guests</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-6">
                <div class="amenity-card text-center">
                    <div class="amenity-icon-wrapper">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h5 class="amenity-card-title">Power Backup</h5>
                    <p class="amenity-card-description">Uninterrupted power supply 24x7</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-6">
                <div class="amenity-card text-center">
                    <div class="amenity-icon-wrapper">
                        <i class="fas fa-snowflake"></i>
                    </div>
                    <h5 class="amenity-card-title">AC Rooms</h5>
                    <p class="amenity-card-description">Climate-controlled comfort in every room</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-6">
                <div class="amenity-card text-center">
                    <div class="amenity-icon-wrapper">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h5 class="amenity-card-title">24x7 Reception</h5>
                    <p class="amenity-card-description">Always available to assist you</p>
                </div>
            </div>
        </div>

        <!-- Transportation Distances Banner -->
        <div class="amenities-transport-banner rounded p-3 mb-4">
            <div class="row g-3 g-md-4 align-items-center justify-content-center text-center">
                <div class="col-md-4 col-12">
                    <div class="transport-item d-flex align-items-center justify-content-center gap-2">
                        <i class="fas fa-plane transport-icon"></i>
                        <span class="transport-text">16 km</span>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="transport-item d-flex align-items-center justify-content-center gap-2">
                        <i class="fas fa-train transport-icon"></i>
                        <span class="transport-text">3 km</span>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="transport-item d-flex align-items-center justify-content-center gap-2">
                        <i class="fas fa-bus transport-icon"></i>
                        <span class="transport-text">8.7 km</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- View More Link -->
        <div class="text-center">
            <a href="{{ route('amenities') }}" class="amenities-view-more-link">View More</a>
        </div>
    </div>
</section>

