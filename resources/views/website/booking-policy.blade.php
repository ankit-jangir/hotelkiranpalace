@extends('common.layout')

@section('title', 'Booking Policy - Hotel Kiran Place')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Booking Policy</h1>
    
    <div class="row">
        <div class="col-md-12">
            <h3>1. Reservation and Confirmation</h3>
            <p>All room reservations are subject to availability and confirmation. Upon booking, you will receive a confirmation email with your reservation details.</p>

            <h3 class="mt-4">2. Booking Requirements</h3>
            <p>To make a reservation, guests must provide valid identification details and contact information. Minimum age requirement for booking is 18 years.</p>

            <h3 class="mt-4">3. Payment Terms</h3>
            <p>Payment can be made using credit cards, debit cards, or cash. Advance payment may be required for certain bookings or during peak seasons. All prices are subject to applicable taxes and service charges.</p>

            <h3 class="mt-4">4. Room Rates</h3>
            <p>Room rates are displayed per night and are subject to change without prior notice. Special offers and discounts cannot be combined unless stated otherwise.</p>

            <h3 class="mt-4">5. Group Bookings</h3>
            <p>For group bookings of 5 rooms or more, special rates and terms may apply. Please contact our reservations team for group booking arrangements.</p>

            <h3 class="mt-4">6. Check-in and Check-out</h3>
            <p>Standard check-in time is 2:00 PM and check-out time is 12:00 PM. Early check-in and late check-out requests are subject to availability and may incur additional charges.</p>

            <h3 class="mt-4">7. Modification of Bookings</h3>
            <p>Booking modifications are subject to availability and may be subject to rate adjustments. Please contact our reservations team for any changes to your booking.</p>

            <h3 class="mt-4">8. Special Requests</h3>
            <p>We will do our best to accommodate special requests such as room preferences, extra beds, or amenities. However, these requests cannot be guaranteed and are subject to availability.</p>

            <p class="mt-4"><strong>Last Updated:</strong> {{ date('F Y') }}</p>
        </div>
    </div>
</div>
@endsection

