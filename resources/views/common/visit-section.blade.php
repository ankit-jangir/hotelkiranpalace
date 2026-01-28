@php
$settings = \App\Models\AdminSetting::first();

$mapAddress = urlencode($settings->address ?? '');

$phones = array_filter([$settings->admin_number_1 ?? null, $settings->admin_number_2 ?? null]);

$emails = array_filter([$settings->admin_email_1 ?? null, $settings->admin_email_2 ?? null]);
@endphp

<section class="visit-section py-5 position-relative">
    <div class="container">
        <div class="row align-items-center g-4">

            <!-- Map -->
            <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                <div class="visit-map-container position-relative">
                    <iframe src="https://www.google.com/maps?q={{ $mapAddress }}&output=embed" width="100%" height="450"
                        style="border:0; border-radius:12px;" allowfullscreen loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-6 col-md-12 order-1 order-lg-2">
                <h2 class="visit-heading mb-4">Visit Hotel Kiran Palace</h2>

                <!-- Address -->
                @if (!empty($settings->address))
                <div class="visit-contact-item mb-4">
                    <div class="d-flex align-items-start">
                        <div class="visit-icon-wrapper me-3">
                            <i class="fas fa-map-marker-alt visit-icon text-white"></i>
                        </div>
                        <div>
                            <h5 class="visit-contact-label mb-2">Address</h5>
                            <p class="visit-contact-text mb-0">
                                {{ $settings->address }}
                            </p>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Phone -->
                @if (count($phones))
                <div class="visit-contact-item mb-4">
                    <div class="d-flex align-items-start">
                        <div class="visit-icon-wrapper me-3">
                            <i class="fas fa-phone visit-icon text-white"></i>
                        </div>
                        <div>
                            <h5 class="visit-contact-label mb-2">Phone</h5>
                            <p class="visit-contact-text mb-0">
                                @foreach ($phones as $phone)
                                <a href="tel:{{ $phone }}" class="visit-contact-link d-block">
                                    {{ $phone }}
                                </a>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Email -->
                @if (count($emails))
                <div class="visit-contact-item mb-4">
                    <div class="d-flex align-items-start">
                        <div class="visit-icon-wrapper me-3">
                            <i class="fas fa-envelope visit-icon text-white"></i>
                        </div>
                        <div>
                            <h5 class="visit-contact-label mb-2">Email</h5>
                            <p class="visit-contact-text mb-0">
                                @foreach ($emails as $email)
                                <a href="mailto:{{ $email }}" class="visit-contact-link d-block">
                                    {{ $email }}
                                </a>
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Buttons -->
                <div class="visit-buttons row g-3 mt-4">

                    <div class="col-lg-6 col-md-6 col-12">
                        <a href="https://www.google.com/maps/dir/?api=1&destination={{ $mapAddress }}" target="_blank"
                            class="btn visit-btn-directions position-relative overflow-hidden w-100">
                            <span class="position-relative z-index-1 d-flex align-items-center justify-content-center">
                                <i class="fas fa-map-marker-alt me-2"></i>
                                Get Directions
                            </span>
                        </a>
                    </div>

                    <div class="col-lg-6 col-md-6 col-12">
                        <a href="{{ route('contact') }}"
                            class="btn visit-btn-contact position-relative overflow-hidden w-100">
                            <span class="position-relative z-index-1 d-flex align-items-center justify-content-center">
                                <i class="fas fa-phone me-2"></i>
                                Contact Us
                            </span>
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>
</section>