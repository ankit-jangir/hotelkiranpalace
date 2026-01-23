@extends('common.layout')

@section('title', 'Terms & Conditions | Hotel Kiran Palace')

@section('content')



<!-- CONTENT SECTION -->
<section class="kp-content py-5">
    <div class="container">

        <div class="kp-card">

            <!-- DOWNLOAD PDF -->
            <div class="kp-download text-end mb-4">
                <a href="{{ asset('terms/Hotel-Kiran-Palace-Terms.pdf') }}" class="btn kp-btn-orange" download>
                    Download Terms (PDF)
                </a>
            </div>

            <p class="kp-intro">
                These Terms and Conditions govern your stay, booking, and use of
                services at <strong>Hotel Kiran Palace</strong>. By booking or
                staying with us, you agree to comply with these terms.
            </p>

            <h3>1. Acceptance of Terms</h3>
            <p>
                By accessing our website or availing hotel services, you agree
                to be bound by these Terms & Conditions and all applicable laws.
            </p>

            <h3>2. Booking & Reservation Policy</h3>
            <ul>
                <li>All reservations are subject to availability</li>
                <li>Valid government-issued ID is mandatory at check-in</li>
                <li>Hotel reserves the right to refuse accommodation</li>
            </ul>

            <h3>3. Pricing & Payment</h3>
            <ul>
                <li>Room tariffs are subject to change without prior notice</li>
                <li>Accepted payment modes include cash and digital payments</li>
                <li>Advance payment may be required for confirmed bookings</li>
            </ul>

            <h3>4. Cancellation & Refund Policy</h3>
            <p>
                Cancellations made at least 24 hours before check-in may be
                eligible for a refund. Late cancellations or no-shows may
                attract charges.
            </p>

            <h3>5. Check-in & Check-out</h3>
            <ul>
                <li>Check-in time: <strong>2:00 PM</strong></li>
                <li>Check-out time: <strong>12:00 PM</strong></li>
                <li>Early check-in / late check-out subject to availability</li>
            </ul>

            <h3>6. Guest Responsibilities</h3>
            <p>
                Guests must behave responsibly and respect hotel property.
                Any damage caused will be chargeable to the guest.
            </p>

            <h3>7. Hotel Services & Facilities</h3>
            <ul>
                <li>Services are provided as per hotel policies</li>
                <li>Outside food may be restricted</li>
                <li>Hotel reserves the right to modify services</li>
            </ul>

            <h3>8. Safety & Security</h3>
            <p>
                Guests are responsible for their personal belongings.
                Hotel Kiran Palace shall not be liable for loss or theft.
            </p>

            <h3>9. Force Majeure</h3>
            <p>
                The hotel shall not be responsible for service disruption due to
                events beyond reasonable control including natural disasters,
                government regulations, or emergencies.
            </p>

            <h3>10. Governing Law</h3>
            <p>
                These terms shall be governed by the laws of India. Any disputes
                shall be subject to the jurisdiction of local courts.
            </p>

            <h3>11. Modifications to Terms</h3>
            <p>
                Hotel Kiran Palace reserves the right to update these terms at
                any time without prior notice.
            </p>

            <p class="kp-date">
                <strong>Last Updated:</strong> {{ date('F Y') }}
            </p>

        </div>
    </div>
</section>

@endsection