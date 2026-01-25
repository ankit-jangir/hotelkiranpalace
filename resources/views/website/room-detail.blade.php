@extends('common.layout')

@section('title', $room['title'] . ' - Hotel Kiran Place')

@section('content')
<div class="container-fluid my-5">
    <!-- Luxury Experience Section -->
    <div class="roomdetail-luxury-section py-5">
        <div class="roomdetail-luxury-wrapper">

            <div class="row align-items-start m-0">

                <!-- Left Content -->
                <div class="col-lg-6 pe-lg-5 mb-4">
                    <span class="roomdetail-luxury-tag">LUXURY EXPERIENCE</span>

                    <h1 class="roomdetail-luxury-title mt-3">
                        A deeply space that<br>
                        invites you to truly<br>
                        Switch Off.
                    </h1>

                    <p class="roomdetail-luxury-text mt-4">
                        The dark wood panelling and furnishings, deluxe red-draped four-poster bed, and
                        magnificent
                        black stone bathroom evoke the charm of a secluded Sierra Nevada getaway. The intimate
                        scale
                        and finish give the room a distinctly personal feel.
                    </p>

                    <p class="roomdetail-luxury-text">
                        The dark wood panelling and furnishings, deluxe red-draped four-poster bed, and
                        magnificent
                        black stone bathroom evoke the charm.
                    </p>
                </div>

                <!-- Right Features -->
                <div class="col-lg-6 ps-lg-5">
                    <div class="row roomdetail-feature-list">

                        <div class="col-md-6 roomdetail-feature-item">
                            <i class="fas fa-bed"></i><span>King Size Bed</span>
                        </div>

                        <div class="col-md-6 roomdetail-feature-item">
                            <i class="fas fa-lock"></i><span>Safety Box</span>
                        </div>

                        <div class="col-md-6 roomdetail-feature-item">
                            <i class="fas fa-umbrella-beach"></i><span>Balcony</span>
                        </div>

                        <div class="col-md-6 roomdetail-feature-item">
                            <i class="fas fa-tv"></i><span>32 Inch TV</span>
                        </div>

                        <div class="col-md-6 roomdetail-feature-item">
                            <i class="fas fa-wheelchair"></i><span>Disable Access</span>
                        </div>

                        <div class="col-md-6 roomdetail-feature-item">
                            <i class="fas fa-paw"></i><span>Pet Allowed</span>
                        </div>

                        <div class="col-md-6 roomdetail-feature-item">
                            <i class="fas fa-wine-bottle"></i><span>Welcome Bottle</span>
                        </div>

                        <div class="col-md-6 roomdetail-feature-item">
                            <i class="fas fa-wifi"></i><span>Wifi / Netflix access</span>
                        </div>

                        <div class="col-md-6 roomdetail-feature-item">
                            <i class="fas fa-wind"></i><span>Air Dryer</span>
                        </div>

                        <div class="col-md-6 roomdetail-feature-item">
                            <i class="fas fa-snowflake"></i><span>Air Condition</span>
                        </div>

                        <div class="col-md-6 roomdetail-feature-item">
                            <i class="fas fa-soap"></i><span>Laundry Service</span>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- gallery -->

    @include('common.gallery_common')

    <!-- Reviews Section -->
    <section class="roomdetail-review-section">
        <div class="roomdetail-review-wrapper">

            <div class="row m-0">

                <!-- LEFT : Reviews List -->
                <div class="col-lg-8 roomdetail-review-left">

                    <!-- Review Card -->
                    <div class="roomdetail-review-card">

                        <div class="roomdetail-review-header">
                            <div class="roomdetail-review-user">
                                <img src="/images/user.jpg" alt="user">
                                <div>
                                    <h6>Lukas</h6>
                                    <span>Published 10 Oct. 2022</span>
                                </div>
                            </div>

                            <div class="roomdetail-review-rating">
                                <strong>8.5</strong>/10 <span>Rating average</span>
                            </div>
                        </div>

                        <h5>"Awesome Experience"</h5>

                        <p>
                            Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod
                            scaevola sea. Et nec tantas accusamus salutatus.
                        </p>

                    </div>

                    <!-- Review Card with Admin Reply -->
                    <div class="roomdetail-review-card roomdetail-review-scroll">

                        <div class="roomdetail-review-header">
                            <div class="roomdetail-review-user">
                                <img src="/images/user.jpg" alt="user">
                                <div>
                                    <h6>Marika</h6>
                                    <span>Published 11 Oct. 2022</span>
                                </div>
                            </div>

                            <div class="roomdetail-review-rating">
                                <strong>9.0</strong>/10 <span>Rating average</span>
                            </div>
                        </div>

                        <h5>"Really great dinner!"</h5>

                        <p>
                            Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod
                            scaevola sea. Et nec tantas accusamus salutatus.
                        </p>

                        <!-- Admin Reply -->
                        <div class="roomdetail-admin-reply">
                            <div class="roomdetail-admin-icon"></div>
                            <div>
                                <h6>Reply from Admin</h6>
                                <span>Published 3 minutes ago</span>

                                <p>
                                    Hi Monika, <br><br>
                                    Eos tollit ancillae ea, lorem consulatu qui ne,
                                    eu eros eirmod scaevola sea.
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- RIGHT : Fixed Rating Summary -->
                <div class="col-lg-4 roomdetail-review-right">
                    <div class="roomdetail-review-summary">

                        <span class="roomdetail-review-tag"> Hotel Kiran Palace</span>
                        <h2>Reviews</h2>

                        <p>
                            Nam libero tempore, cum soluta nobis est eligendi
                            optio cumque nihil impedit.
                        </p>

                        <div class="roomdetail-rating-bar">
                            <span>Comfort</span>
                            <div class="bar"><span style="width:90%"></span></div>
                            <strong>9.0</strong>
                        </div>

                        <div class="roomdetail-rating-bar">
                            <span>Facilities</span>
                            <div class="bar"><span style="width:95%"></span></div>
                            <strong>9.5</strong>
                        </div>

                        <div class="roomdetail-rating-bar">
                            <span>Location</span>
                            <div class="bar"><span style="width:60%"></span></div>
                            <strong>6.0</strong>
                        </div>

                        <div class="roomdetail-rating-bar">
                            <span>Price</span>
                            <div class="bar"><span style="width:60%"></span></div>
                            <strong>6.0</strong>
                        </div>

                        <button class="roomdetail-review-btn" data-bs-toggle="modal"
                            data-bs-target="#roomdetailReviewModal">
                            Leave a review
                        </button>




                    </div>
                </div>

            </div>

        </div>
        <!-- Review Modal -->
        <div class="modal fade" id="roomdetailReviewModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content roomdetail-review-modal">

                    <div class="modal-header">
                        <h5 class="modal-title">Leave a Review</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <form id="roomdetailReviewForm">

                            <!-- Name -->
                            <div class="mb-3">
                                <label class="form-label">Your Name</label>
                                <input type="text" class="form-control" placeholder="Enter your name" required>
                            </div>

                            <!-- Review -->
                            <div class="mb-3">
                                <label class="form-label">Your Review</label>
                                <textarea class="form-control" rows="4" placeholder="Write your review"
                                    required></textarea>
                            </div>

                            <!-- Star Rating -->
                            <div class="mb-3">
                                <label class="form-label">Rating</label>
                                <div class="roomdetail-star-rating">
                                    <input type="radio" name="rating" id="star5"><label for="star5">★</label>
                                    <input type="radio" name="rating" id="star4"><label for="star4">★</label>
                                    <input type="radio" name="rating" id="star3"><label for="star3">★</label>
                                    <input type="radio" name="rating" id="star2"><label for="star2">★</label>
                                    <input type="radio" name="rating" id="star1"><label for="star1">★</label>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="modal-footer">
                        <button class="btn roomdetail-btn-cancel" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn roomdetail-btn-submit" id="roomdetailSubmitReview">Submit</button>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- room cards -->
    @include('common.room_card', [
    'subtitle' => 'Hotel Kiran Palace',
    'title' => 'Similar Rooms',
    'cards' => [
    [
    'image' => '/images/rooms-2.jpg',
    'hover_image' => '/images/rooms-1.jpg',
    'price' => '$120',
    'room' => 'Deluxe Room',
    'link' => '#'
    ],
    [
    'image' => '/images/hotelimg-4.png',
    'hover_image' => '/images/hero_section_img3.jpg',
    'price' => '$150',
    'room' => 'Executive Suite',
    'link' => '#'
    ],
    [
    'image' => '/images/rooms-1.jpg',
    'hover_image' => '/images/hero_section_img3.jpg',
    'price' => '$200',
    'room' => 'Presidential Suite',
    'link' => '#'
    ]
    ]
    ])

</div>
@endsection