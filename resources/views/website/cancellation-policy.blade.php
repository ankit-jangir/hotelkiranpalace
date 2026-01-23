@extends('common.layout')

@section('title', 'Cancellation Policy | Hotel Kiran Place')

@section('content')



<!-- CONTENT -->
<section class="cp-section py-5">
    <div class="container">
        <div class="cp-card">

            <p class="cp-intro">
                At <strong>Hotel Kiran Place</strong>, we understand that plans can change.
                This Cancellation Policy explains the terms applicable to cancellations,
                refunds, and no-shows.
            </p>

            <h3>1. Cancellation Timeframes</h3>
            <p>
                Reservations cancelled at least <strong>48 hours</strong> prior to the
                scheduled check-in time are eligible for a full refund.
                Cancellations made after this period may incur charges.
            </p>

            <h3>2. Cancellation Charges</h3>
            <div class="cp-table-wrapper">
                <table class="cp-table">
                    <tr>
                        <th>Cancellation Period</th>
                        <th>Refund Amount</th>
                    </tr>
                    <tr>
                        <td>More than 48 hours before check-in</td>
                        <td>100% Refund</td>
                    </tr>
                    <tr>
                        <td>24 – 48 hours before check-in</td>
                        <td>50% Refund</td>
                    </tr>
                    <tr>
                        <td>Less than 24 hours before check-in</td>
                        <td>No Refund</td>
                    </tr>
                </table>
            </div>

            <h3>3. No-Show Policy</h3>
            <p>
                Guests who do not arrive on the scheduled date without prior
                cancellation will be charged for the full booking amount.
            </p>

            <h3>4. Early Check-out</h3>
            <p>
                Early departures may be subject to cancellation charges depending
                on the notice period provided.
            </p>

            <h3>5. Refund Processing</h3>
            <p>
                Eligible refunds will be processed within <strong>7–14 business days</strong>
                to the original payment method used at the time of booking.
            </p>

            <h3>6. Non-Refundable Bookings</h3>
            <p>
                Promotional rates, special packages, or discounted bookings marked
                as <strong>Non-Refundable</strong> cannot be cancelled or refunded.
            </p>

            <h3>7. Force Majeure</h3>
            <p>
                In case of unforeseen circumstances such as natural disasters,
                government restrictions, or emergencies, Hotel Kiran Place will
                work with guests to provide suitable alternatives or refunds.
            </p>

            <h3>8. How to Cancel a Booking</h3>
            <p>
                To cancel your reservation, please contact our reservations team
                via phone, email, or through our official website.
                A cancellation is valid only after confirmation from our team.
            </p>

            <p class="cp-date">
                <strong>Last Updated:</strong> {{ date('F Y') }}
            </p>

        </div>
    </div>
</section>

@endsection