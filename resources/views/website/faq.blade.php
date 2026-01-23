@extends('common.layout')

@section('title', 'FAQ | Hotel Kiran Place')

@section('content')


<!-- FAQ CONTENT -->
<section class="faq-section py-5">
    <div class="container">
        <div class="faq-card">

            <div class="accordion custom-accordion" id="faqAccordion">

                <!-- FAQ 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            What are the check-in and check-out times?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            Check-in time at <strong>Hotel Kiran Place</strong> is 2:00 PM and
                            check-out time is 12:00 PM. Early check-in or late check-out is
                            subject to room availability and additional charges.
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq2">
                            Do you provide free parking?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Yes, complimentary parking is available for all hotel guests.
                            Availability is subject to space at the property.
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq3">
                            Is free Wi-Fi available at the hotel?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Yes, we offer free high-speed Wi-Fi across the hotel premises,
                            including guest rooms and common areas.
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq4">
                            What is your cancellation policy?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Reservations cancelled at least 24 hours before check-in may
                            be eligible for a refund. Late cancellations or no-shows may
                            attract cancellation charges.
                        </div>
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq5">
                            Do you have an in-house restaurant?
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Yes, Hotel Kiran Place features an in-house restaurant serving
                            a variety of cuisines. Room service is also available.
                        </div>
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq6">
                            Are pets allowed at the hotel?
                        </button>
                    </h2>
                    <div id="faq6" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Pets are generally not allowed. Guests are requested to
                            contact the hotel directly for special cases.
                        </div>
                    </div>
                </div>

                <!-- FAQ 7 -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq7">
                            What payment methods are accepted?
                        </button>
                    </h2>
                    <div id="faq7" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            We accept cash, debit cards, credit cards, and online payments
                            for advance bookings.
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection