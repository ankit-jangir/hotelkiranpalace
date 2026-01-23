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

<!-- HIGHLIGHTS -->
<section class="about-highlights">
    <div class="container">
        <div class="row text-center">

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="highlight-card">
                    <h3>Comfortable Rooms</h3>
                    <p>Spacious, clean, and well-furnished rooms designed for relaxation.</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="highlight-card">
                    <h3>Prime Location</h3>
                    <p>Located near key city attractions and transport facilities.</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="highlight-card">
                    <h3>24/7 Service</h3>
                    <p>Round-the-clock support to ensure a seamless stay.</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="highlight-card">
                    <h3>Safe & Secure</h3>
                    <p>Your safety is our priority with modern security systems.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- OUR STORY -->
<section class="about-story py-5">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 order-lg-2 mb-4">
                <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Our Story" class="img-fluid about-img">
            </div>

            <div class="col-lg-6 order-lg-1">
                <h2>Our Story</h2>
                <p>
                    Founded with a passion for hospitality, Hotel Kiran Place was
                    created to offer travelers a refined yet affordable stay.
                    Over the years, we have built a reputation for delivering
                    quality service, comfort, and genuine care for our guests.
                </p>
                <p>
                    Our experienced team works tirelessly to ensure that every
                    stay is smooth, memorable, and exceeds expectations.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- why choose us -->
<section class="about-why">
    <div class="container">
        <h2 class="text-center">Why Guests Love Hotel Kiran Place</h2>
        <div class="row mt-4">

            <div class="col-md-4 mb-4">
                <div class="why-card">
                    <h4>Prime City Location</h4>
                    <p>Easy access to markets, transport hubs, and major attractions.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="why-card">
                    <h4>Affordable Luxury</h4>
                    <p>Premium comfort and services at budget-friendly prices.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="why-card">
                    <h4>Personalized Service</h4>
                    <p>Our staff ensures every guest feels special and cared for.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- guest expreince -->
<section class="about-journey">
    <div class="container">
        <h2 class="text-center">Your Stay Journey</h2>

        <div class="journey-steps">
            <div class="step">Easy Booking</div>
            <div class="step">Warm Welcome</div>
            <div class="step">Relaxing Stay</div>
            <div class="step">Memorable Experience</div>
        </div>
    </div>
</section>

<!-- aminities grid -->

<section class="about-amenities luxury-scroll">
    <div class="container">
        <h2>Hotel Amenities</h2>

        <ul class="amenities-list">
            <li>Complimentary High-Speed Wi-Fi</li>
            <li>24×7 In-Room Dining</li>
            <li>Elegantly Air-Conditioned Rooms</li>
            <li>Power Backup & Safety Systems</li>
            <li>Secure On-Site Parking</li>
            <li>Daily Housekeeping Services</li>
            <li>24-Hour CCTV Surveillance</li>
            <li>Travel & Local Assistance</li>
        </ul>
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