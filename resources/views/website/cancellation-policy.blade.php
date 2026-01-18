@extends('common.layout')

@section('title', 'Cancellation Policy - Hotel Kiran Place')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Cancellation Policy</h1>
    
    <div class="row">
        <div class="col-md-12">
            <h3>1. Cancellation Timeframes</h3>
            <p>Cancellations made at least 48 hours before the scheduled check-in time will receive a full refund. Cancellations made less than 48 hours before check-in may be subject to charges.</p>

            <h3 class="mt-4">2. Cancellation Charges</h3>
            <ul>
                <li><strong>More than 48 hours:</strong> Full refund (100%)</li>
                <li><strong>24-48 hours before check-in:</strong> 50% of total booking amount</li>
                <li><strong>Less than 24 hours:</strong> No refund applicable</li>
            </ul>

            <h3 class="mt-4">3. No-Show Policy</h3>
            <p>Guests who fail to check in on the scheduled date without prior cancellation will be charged for the entire stay as per the no-show policy.</p>

            <h3 class="mt-4">4. Early Check-out</h3>
            <p>Early check-out requests will be processed, but guests may be liable for charges as per the cancellation policy based on the notice period provided.</p>

            <h3 class="mt-4">5. Refund Processing</h3>
            <p>Refunds for eligible cancellations will be processed within 7-14 business days to the original payment method used during booking.</p>

            <h3 class="mt-4">6. Non-Refundable Bookings</h3>
            <p>Special offers, promotional rates, or packages marked as "Non-Refundable" cannot be cancelled or modified and are not eligible for refunds under any circumstances.</p>

            <h3 class="mt-4">7. Force Majeure</h3>
            <p>In case of exceptional circumstances beyond our control (natural disasters, government restrictions, etc.), we will work with guests to find suitable alternatives or provide full refunds.</p>

            <h3 class="mt-4">8. How to Cancel</h3>
            <p>To cancel your booking, please contact our reservations team via phone, email, or through our online booking system. Cancellation requests must be confirmed by our team to be valid.</p>

            <p class="mt-4"><strong>Last Updated:</strong> {{ date('F Y') }}</p>
        </div>
    </div>
</div>
@endsection

