@extends('common.layout')

@section('title', 'Terms & Conditions - Hotel Kiran Palace')

@section('content')
<div class="container my-5 kp-terms">

    <!-- Title -->
    <div class="kp-terms-header">
        <h1>Terms & Conditions</h1>
        <p>
            These terms and conditions outline the rules and regulations for
            staying at <strong>Hotel Kiran Palace</strong>.
        </p>
    </div>

    <!-- Download PDF -->
    <div class="kp-terms-download">
        <a href="{{ asset('terms/Hotel-Kiran-Palace-Terms.pdf') }}">
            Download Terms as PDF
        </a>
    </div>

    <!-- Content -->
    <div class="kp-terms-body">

        <h3>1. Acceptance of Terms</h3>
        <p>
            By accessing our website or staying at Hotel Kiran Palace, you agree
            to comply with these terms and all applicable local laws.
        </p>

        <h3>2. Booking & Reservation</h3>
        <p>
            All bookings are subject to availability and confirmation. Valid
            government identification is required at check-in.
        </p>

        <h3>3. Payment Policy</h3>
        <p>
            Payments can be made by cash or digital modes accepted by the hotel.
            Advance payment may be required for certain bookings.
        </p>

        <h3>4. Cancellation Policy</h3>
        <p>
            Cancellations made 24 hours before check-in may be eligible for a
            refund. Late cancellations may attract charges.
        </p>

        <h3>5. Check-in & Check-out</h3>
        <p>
            Check-in time is 2:00 PM and check-out time is 12:00 PM. Early
            check-in or late check-out is subject to availability.
        </p>

        <h3>6. Guest Conduct</h3>
        <p>
            Guests are expected to maintain decorum. Any damage to hotel
            property will be charged to the guest.
        </p>

        <h3>7. Food & Services</h3>
        <p>
            Food services are available as per hotel timings. Outside food may
            be restricted.
        </p>

        <h3>8. Liability</h3>
        <p>
            The hotel shall not be responsible for loss or damage to personal
            belongings of guests.
        </p>

        <h3>9. Force Majeure</h3>
        <p>
            The hotel shall not be liable for failure to provide services due to
            events beyond its control.
        </p>

        <p class="kp-terms-date">
            Last updated: {{ date('F Y') }}
        </p>

    </div>
</div>
@endsection