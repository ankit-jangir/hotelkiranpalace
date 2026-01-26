@extends('common.layout')

@section('title', 'About Us | Hotel Kiran Place')

@section('content')


<!-- INTRO SECTION -->
<section class="about-intro py-5">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 mb-4">
                <img src="{{ asset('images/hero_section_img1.png') }}" alt="Hotel Kiran Place"
                    class="img-fluid about-img">
            </div>

            <div class="col-lg-6">
                <h2>Welcome to Hotel Kiran Place</h2>
                <p>
                    <strong>Hotel Kiran Place</strong> is more than just a hotel —
                    it is a destination where comfort, warmth, and personalized
                    hospitality come together. Located in a prime and convenient
                    area, our hotel offers easy access to major attractions,
                    business hubs, and transportation.
                </p>
                <p>
                    Designed to cater to both business and leisure travelers,
                    our property combines modern amenities with a welcoming
                    atmosphere that makes every guest feel at home.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- OUR HISTORY SECTION -->
<section class="our-history-section">
    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT IMAGE AREA -->
            <div class="col-lg-6 position-relative about-image-wrapper">

                <!-- MAIN IMAGE -->
                <div class="about-main-img">
                    <img src="{{ asset('images/rooms-1.jpg') }}" alt="">
                </div>

                <!-- OVERLAY IMAGE -->
                <div class="about-overlay-img">
                    <img src="{{ asset('images/rooms-2.jpg') }}" alt="">
                </div>

            </div>



            <!-- RIGHT CONTENT -->
            <div class="col-lg-6 history-content">
                <span class="history-subtitle"> Hotel Kiran Palace</span>
                <h2>Our History</h2>

                <p>
                    Hotel Kiran Palace was founded with a simple vision — to create a place
                    where comfort, elegance, and warm hospitality come together. From the very
                    beginning, our focus has been on delivering an experience that feels both
                    welcoming and memorable for every guest.
                </p>

                <p>
                    Over the years, we have grown into a trusted destination for travelers who
                    value quality service, peaceful surroundings, and thoughtfully designed
                    spaces. Every room, every detail, and every service is carefully curated to
                    ensure a relaxing and seamless stay, whether you are visiting for business
                    or leisure.
                </p>

                <p>
                    What truly sets us apart is our dedicated team, who believe that genuine
                    care and personal attention make all the difference. We take pride in
                    creating moments that our guests cherish long after their stay with us.
                </p>

                <div class="history-signature">
                    Maria, The Owner
                </div>

            </div>

        </div>
    </div>
</section>


<!-- aminities grid -->

<section class="about-amenities-section">
    <div class="container">
        <div class="row">

            <!-- LEFT FIXED CONTENT -->
            <div class="col-lg-5">
                <div class="about-amenities-content">

                    <span class="about-amenities-subtitle">PARADISE HOTEL</span>
                    <h2 class="about-amenities-title">Local Amenities</h2>

                    <p class="about-amenities-desc">
                        Our location offers easy access to a variety of local
                        attractions, dining experiences, and cultural highlights,
                        ensuring that every stay is enriched with memorable moments.
                    </p>

                    <div class="about-amenity-item">
                        <span class="about-amenity-icon">★</span>
                        <div>
                            <h5>Local Restaurants</h5>
                            <p>
                                Discover nearby restaurants offering authentic
                                flavors and unforgettable dining experiences.
                            </p>
                        </div>
                    </div>

                    <div class="about-amenity-item">
                        <span class="about-amenity-icon">★</span>
                        <div>
                            <h5>Nature</h5>
                            <p>
                                Enjoy scenic landscapes, peaceful surroundings,
                                and refreshing natural beauty just moments away.
                            </p>
                        </div>
                    </div>

                    <div class="about-amenity-item">
                        <span class="about-amenity-icon">★</span>
                        <div>
                            <h5>Art & Culture</h5>
                            <p>
                                Explore local art, heritage, and cultural landmarks
                                that showcase the spirit of the region.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- RIGHT SCROLLABLE IMAGES -->
            <div class="col-lg-7">
                <div class="about-amenities-images">

                    <img src="{{ asset('images/kiran-1.jpg') }}" alt="">
                    <img src="{{ asset('images/kiran-2.png') }}" alt="">
                    <img src="{{ asset('images/kiran-3.jpg') }}" alt="">
                    <img src="{{ asset('images/kiran-4.jpg') }}" alt="">

                </div>
            </div>

        </div>
    </div>
</section>





<!-- trust stats -->

<section class="about-stats">
    <div class="container">
        <div class="row text-center">

            <div class="col-md-3 col-6">
                <h3>5,000+</h3>
                <p>Happy Guests</p>
            </div>

            <div class="col-md-3 col-6">
                <h3>10+</h3>
                <p>Years of Hospitality</p>
            </div>

            <div class="col-md-3 col-6">
                <h3>4.5★</h3>
                <p>Average Rating</p>
            </div>

            <div class="col-md-3 col-6">
                <h3>24/7</h3>
                <p>Guest Support</p>
            </div>

        </div>
    </div>
</section>


<!-- MISSION VISION -->
<section class="about-mv">
    <div class="container">
        <div class="row">

            <div class="col-md-6 mb-4">
                <div class="mv-card">
                    <h3>Our Mission</h3>
                    <p>
                        To provide exceptional hospitality by delivering
                        comfortable accommodations, personalized services,
                        and unforgettable guest experiences.
                    </p>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="mv-card">
                    <h3>Our Vision</h3>
                    <p>
                        To become a trusted and preferred hotel brand known
                        for excellence, integrity, and guest satisfaction.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="about-facilities-section">
    <div class="container">

        <!-- Heading -->
        <div class="about-facilities-heading text-center">
            <span>Hotel Kiran Palace</span>
            <h2>Main Facilities</h2>
        </div>

        <div class="row">

            <div class="col-lg-3 col-md-6">
                <div class="about-facility-box">
                    <div class="about-facility-icon">
                        <i class="fas fa-parking"></i>
                    </div>
                    <h5>Private Parking</h5>
                    <p>
                        Secure and spacious private parking facilities are
                        available for our guests’ convenience.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="about-facility-box">
                    <div class="about-facility-icon">
                        <i class="fas fa-wifi"></i>
                    </div>
                    <h5>High Speed Wifi</h5>
                    <p>
                        Stay connected with complimentary high-speed internet
                        access throughout the hotel.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="about-facility-box">
                    <div class="about-facility-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h5>Bar & Restaurant</h5>
                    <p>
                        Enjoy delicious meals and refreshing drinks in our
                        elegant bar and restaurant.
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="about-facility-box">
                    <div class="about-facility-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h5>24×7 Service</h5>
                    <p>
                        Our front desk and guest support services are available
                        24 hours a day to assist you whenever you need.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- testionial -->
@include('common.testimonials-preview')

<!-- CTA -->
<section class="about-final-cta">
    <div class="container text-center">
        <h2>Ready to Experience a Comfortable Stay?</h2>
        <p>Book your room today at Hotel Kiran Place</p>
        <a href="/contact" class="btn-book">Book Now</a>
    </div>
</section>


@endsection