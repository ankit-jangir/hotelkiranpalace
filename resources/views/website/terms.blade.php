@extends('common.layout')

@section('title', 'Terms & Conditions - Hotel Kiran Place')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Terms & Conditions</h1>
    
    <div class="row">
        <div class="col-md-12">
            <h3>1. Booking and Reservation</h3>
            <p>All bookings are subject to availability and confirmation. Guests must provide valid identification at the time of check-in.</p>

            <h3 class="mt-4">2. Payment Terms</h3>
            <p>Payment can be made by cash, credit card, or debit card. Advance payment may be required for certain bookings.</p>

            <h3 class="mt-4">3. Cancellation Policy</h3>
            <p>Cancellations made 24 hours before check-in will receive a full refund. Cancellations made less than 24 hours before check-in may be subject to charges.</p>

            <h3 class="mt-4">4. Check-in and Check-out</h3>
            <p>Check-in time is 2:00 PM and check-out time is 12:00 PM. Early check-in and late check-out may be available upon request and subject to availability.</p>

            <h3 class="mt-4">5. Guest Responsibilities</h3>
            <p>Guests are responsible for any damage to hotel property. Smoking is prohibited in all rooms. Pets are not allowed unless specified.</p>

            <h3 class="mt-4">6. Liability</h3>
            <p>The hotel is not liable for loss or damage to guest property. Guests are advised to use the safe deposit facilities provided.</p>

            <h3 class="mt-4">7. Force Majeure</h3>
            <p>The hotel is not liable for any failure to perform due to circumstances beyond our control, including natural disasters, pandemics, or government actions.</p>

            <p class="mt-4"><strong>Last Updated:</strong> {{ date('F Y') }}</p>
        </div>
    </div>
</div>
@endsection

