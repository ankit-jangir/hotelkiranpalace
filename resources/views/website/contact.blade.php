@extends('common.layout')

@section('title', 'Contact Us - Hotel Kiran Place')

@section('content')
<!-- At Your Assistance Section with Fixed Background -->
<section class="contact-assistance-fixed-section" style="background-image: url('{{ asset('images/hero_section_img1.png') }}');">
    <div class="assistance-fixed-content">
        <div class="container">
            <div class="assistance-header text-center mb-5">
                <h2 class="assistance-title">At your Assistance</h2>
                <p class="assistance-subtitle">Please feel free to contact us for any enquiries or feedback. We will be happy to hear from you!</p>
                <div class="assistance-divider-line mt-3"></div>
            </div>
            <div class="row g-4">
                <!-- Contact Details Card (Order 0 on mobile, Order 1 on desktop/tablet) -->
                <div class="col-lg-6 col-md-6 order-lg-1 order-md-1 order-0">
                    <div class="assistance-contact-card">
                        <h3 class="assistance-contact-title">Hotel Kiran Place</h3>
                        <div class="assistance-contact-list">
                            <div class="assistance-contact-item">
                                <div class="assistance-contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="assistance-contact-content">
                                    <h5>Corporate Office:</h5>
                                    <p>Hotel Kiran Place<br>
                                    Street Address, City<br>
                                    State, PIN Code</p>
                                    <a href="#" class="assistance-view-map">View on map</a>
                                </div>
                            </div>
                            <div class="assistance-contact-item">
                                <div class="assistance-contact-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="assistance-contact-content">
                                    <h5>Phone:</h5>
                                    <p><a href="tel:+91XXXXXXXXXX">+91 XXXX XXXX XX</a></p>
                                </div>
                            </div>
                            <div class="assistance-contact-item">
                                <div class="assistance-contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="assistance-contact-content">
                                    <h5>Email:</h5>
                                    <p><a href="mailto:info@hotelkiranplace.com">info@hotelkiranplace.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Map Section (Order 1 on mobile, Order 0 on desktop/tablet) -->
                <div class="col-lg-6 col-md-6 order-lg-0 order-md-0 order-1">
                    <div class="assistance-map-container-fixed">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9663095343008!2d-74.00425878459418!3d40.74076684379132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDQ0JzI2LjgiTiA3NMKwMDAnMTAuOCJX!5e0!3m2!1sen!2sus!4v1234567890123!5m2!1sen!2sus" 
                            width="100%" 
                            height="100%" 
                            style="border:0; border-radius: 12px;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Query Form Section -->
<section class="query-form-section py-5">
    <div class="container">
        <div class="query-form-wrapper">
            <div class="query-form-header text-center mb-4">
                <h2 class="query-form-title">Get in Touch</h2>
                <p class="query-form-intro">At Hotel Kiran Place, we're all about crafting moments that you'll cherish forever. If there's anything we can do to make your stay even better, don't hesitate to share your thoughts with us. Your happiness is our top priority and we're here to ensure your experience is nothing short of extraordinary.</p>
            </div>
            
            <form action="{{ route('contact.submit') }}" method="POST" class="query-form" id="queryForm">
                @csrf
                
                <!-- Privacy Statement -->
                <div class="query-privacy-statement mb-4">
                    <p>By submitting this form, you consent to share your personal information with us to service your request and for communication purposes. We do not sell your data to third parties.</p>
                </div>
                
                <!-- Form Fields -->
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="query-form-group">
                            <label for="query_name" class="query-form-label">Name *</label>
                            <input type="text" class="query-form-input" id="query_name" name="name" placeholder="Enter your full name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="query-form-group">
                            <label for="query_email" class="query-form-label">Email *</label>
                            <input type="email" class="query-form-input" id="query_email" name="email" placeholder="your.email@example.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="query-form-group">
                            <label for="query_phone" class="query-form-label">Phone *</label>
                            <div class="query-phone-wrapper">
                                <select class="query-country-code" id="query_country_code" name="country_code">
                                    <option value="+91" selected>+91</option>
                                    <option value="+1">+1</option>
                                    <option value="+44">+44</option>
                                    <option value="+61">+61</option>
                                    <option value="+971">+971</option>
                                </select>
                                <input type="tel" class="query-form-input query-phone-input" id="query_phone" name="phone" placeholder="Enter 10 digit mobile number" maxlength="12" pattern="[0-9]{10,12}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="query-form-group">
                            <label for="query_room_type" class="query-form-label">Room Type *</label>
                            <select class="query-form-input query-form-select" id="query_room_type" name="room_type" required>
                                <option value="">Select Room Type</option>
                                <option value="deluxe">Deluxe Room</option>
                                <option value="suite">Suite</option>
                                <option value="executive">Executive Room</option>
                                <option value="presidential">Presidential Suite</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="query-form-group">
                            <label for="query_checkin_date" class="query-form-label">Check-in Date *</label>
                            <div class="query-input-with-icon">
                                <input type="date" class="query-form-input query-date-input" id="query_checkin_date" name="checkin_date" required>
                                <i class="fas fa-calendar query-input-icon query-calendar-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="query-form-group">
                            <label for="query_checkout_date" class="query-form-label">Check-out Date <span class="optional-label">(Optional)</span></label>
                            <div class="query-input-with-icon">
                                <input type="date" class="query-form-input query-date-input" id="query_checkout_date" name="checkout_date">
                                <i class="fas fa-calendar query-input-icon query-calendar-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="query-form-group">
                            <label for="query_comments" class="query-form-label">Message / Comments</label>
                            <textarea class="query-form-input query-form-textarea" id="query_comments" name="comments" rows="4" placeholder="Share your feedback or suggestions with us..."></textarea>
                        </div>
                    </div>
                </div>
                
                <!-- Required Fields Note -->
                <div class="query-required-note mb-3">
                    <p>* Required Fields</p>
                </div>
                
                <!-- Privacy Policy Checkbox -->
                <div class="query-form-group mb-4">
                    <div class="query-checkbox-wrapper">
                        <input type="checkbox" id="query_privacy" name="privacy_agreement" required>
                        <label for="query_privacy" class="query-checkbox-label">
                            I have read and agree to the <a href="{{ route('privacy') }}" target="_blank">Privacy Policy</a> and <a href="{{ route('terms') }}" target="_blank">Terms & Condition</a>
                        </label>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <div class="query-form-group text-center">
                    <button type="submit" class="query-submit-btn" id="querySubmitBtn">
                        <span class="btn-loader"></span>
                        <span class="btn-text">Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Contact Departments Section -->
<section class="contact-departments-section py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Manager Card -->
            <div class="col-lg-4 col-md-4 col-12">
                <div class="contact-dept-card">
                    <h3 class="contact-dept-title">Manager</h3>
                    <div class="contact-dept-info">
                        <div class="contact-dept-item">
                            <span class="contact-dept-label">Phone:</span>
                            <a href="tel:+912261371947" class="contact-dept-phone">+91 22 6137 1947</a>
                        </div>
                        <div class="contact-dept-item">
                            <span class="contact-dept-label">Email:</span>
                            <a href="mailto:manager@hotelkiranplace.com" class="contact-dept-email">manager@hotelkiranplace.com</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Hotel Card -->
            <div class="col-lg-4 col-md-4 col-12">
                <div class="contact-dept-card">
                    <h3 class="contact-dept-title">Hotel</h3>
                    <div class="contact-dept-info">
                        <div class="contact-dept-item">
                            <span class="contact-dept-label">Phone:</span>
                            <a href="tel:+912261371720" class="contact-dept-phone">+91 22 6137 1720</a>
                        </div>
                        <div class="contact-dept-item">
                            <span class="contact-dept-label">Email:</span>
                            <a href="mailto:info@hotelkiranplace.com" class="contact-dept-email">info@hotelkiranplace.com</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Reservations Card -->
            <div class="col-lg-4 col-md-4 col-12">
                <div class="contact-dept-card">
                    <h3 class="contact-dept-title">Reservations</h3>
                    <div class="contact-dept-info">
                        <div class="contact-dept-item">
                            <span class="contact-dept-label">Phone:</span>
                            <a href="tel:+912266395515" class="contact-dept-phone">+91 22 6639 5515</a>
                        </div>
                        <div class="contact-dept-item">
                            <span class="contact-dept-label">Email:</span>
                            <a href="mailto:reservations@hotelkiranplace.com" class="contact-dept-email">reservations@hotelkiranplace.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Membership Card Section (Last Section) -->
@include('common.membership-card')

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/query-form.css') }}">
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Date Picker Setup for Check-in Date
    const checkinDateInput = document.getElementById('query_checkin_date');
    if (checkinDateInput) {
        // Allow manual input
        checkinDateInput.addEventListener('input', function(e) {
            // Manual input is allowed, no restrictions
        });
        
        // Calendar icon click to open calendar
        const checkinCalendarIcon = checkinDateInput.parentElement.querySelector('.query-calendar-icon');
        if (checkinCalendarIcon) {
            checkinCalendarIcon.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                // Try modern showPicker API first
                if (checkinDateInput.showPicker && typeof checkinDateInput.showPicker === 'function') {
                    try {
                        checkinDateInput.showPicker();
                    } catch (err) {
                        // Fallback for browsers that don't support showPicker
                        checkinDateInput.focus();
                        checkinDateInput.click();
                    }
                } else {
                    // Fallback: focus and click
                    checkinDateInput.focus();
                    checkinDateInput.click();
                }
            });
            
            // Make icon pointer cursor
            checkinCalendarIcon.style.cursor = 'pointer';
            checkinCalendarIcon.style.pointerEvents = 'auto';
        }
        
        // Ensure input allows manual typing - fully enabled
        checkinDateInput.removeAttribute('readonly');
        checkinDateInput.removeAttribute('disabled');
        checkinDateInput.setAttribute('inputmode', 'text');
        
        // Allow all keyboard input for manual entry (dd/mm/yyyy format)
        checkinDateInput.addEventListener('keydown', function(e) {
            // Allow all keyboard input - user can type manually
            // Browser will handle date format conversion
        });
        
        // Allow manual paste and input
        checkinDateInput.addEventListener('paste', function(e) {
            // Allow paste for manual date entry
        });
    }
    
    // Date Picker Setup for Check-out Date (Optional)
    const checkoutDateInput = document.getElementById('query_checkout_date');
    if (checkoutDateInput) {
        // Allow manual input
        checkoutDateInput.addEventListener('input', function(e) {
            // Manual input is allowed, no restrictions
        });
        
        // Calendar icon click to open calendar
        const checkoutCalendarIcon = checkoutDateInput.parentElement.querySelector('.query-calendar-icon');
        if (checkoutCalendarIcon) {
            checkoutCalendarIcon.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                // Try modern showPicker API first
                if (checkoutDateInput.showPicker && typeof checkoutDateInput.showPicker === 'function') {
                    try {
                        checkoutDateInput.showPicker();
                    } catch (err) {
                        // Fallback for browsers that don't support showPicker
                        checkoutDateInput.focus();
                        checkoutDateInput.click();
                    }
                } else {
                    // Fallback: focus and click
                    checkoutDateInput.focus();
                    checkoutDateInput.click();
                }
            });
            
            // Make icon pointer cursor
            checkoutCalendarIcon.style.cursor = 'pointer';
            checkoutCalendarIcon.style.pointerEvents = 'auto';
        }
        
        // Ensure input allows manual typing - fully enabled
        checkoutDateInput.removeAttribute('readonly');
        checkoutDateInput.removeAttribute('disabled');
        checkoutDateInput.setAttribute('inputmode', 'text');
        
        // Allow all keyboard input for manual entry (dd/mm/yyyy format)
        checkoutDateInput.addEventListener('keydown', function(e) {
            // Allow all keyboard input - user can type manually
            // Browser will handle date format conversion
        });
        
        // Allow manual paste and input
        checkoutDateInput.addEventListener('paste', function(e) {
            // Allow paste for manual date entry
        });
        
        // Set minimum date to check-in date if check-in is selected
        if (checkinDateInput) {
            checkinDateInput.addEventListener('change', function() {
                if (this.value) {
                    checkoutDateInput.setAttribute('min', this.value);
                }
            });
        }
    }
    
    // Phone Number Validation (12 digits max)
    const phoneInput = document.getElementById('query_phone');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 12) {
                value = value.substring(0, 12);
            }
            e.target.value = value;
        });
        
        phoneInput.addEventListener('keypress', function(e) {
            if (!/[0-9]/.test(e.key) && !['Backspace', 'Delete', 'Tab', 'ArrowLeft', 'ArrowRight'].includes(e.key)) {
                e.preventDefault();
            }
        });
    }
    
    // Email Validation
    const emailInput = document.getElementById('query_email');
    if (emailInput) {
        emailInput.addEventListener('blur', function(e) {
            const email = e.target.value;
            const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i;
            if (email && !emailPattern.test(email)) {
                e.target.setCustomValidity('Please enter a valid email address');
            } else {
                e.target.setCustomValidity('');
            }
        });
    }
    
    // Select Dropdown Styling
    const roomTypeSelect = document.getElementById('query_room_type');
    if (roomTypeSelect) {
        roomTypeSelect.addEventListener('change', function() {
            if (this.value) {
                this.style.color = '#0d1526';
                this.style.backgroundColor = '#ffffff';
            }
        });
        
        // Set initial color if value is selected
        if (roomTypeSelect.value) {
            roomTypeSelect.style.color = '#0d1526';
        }
    }
    
    // Form Submission with Loader and Toast
    const queryForm = document.getElementById('queryForm');
    const submitBtn = document.getElementById('querySubmitBtn');
    
    if (queryForm && submitBtn) {
        queryForm.addEventListener('submit', function(e) {
            
            // Show loader
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
            
            // Form will submit normally
            // Server will handle response and show toast via session
        });
    }
});
</script>
@endpush


