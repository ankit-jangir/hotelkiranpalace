@extends('common.layout')

@section('title', 'Contact Us - Hotel Kiran Place')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-5">Contact Us</h1>
    
    <div class="row">
        <!-- Contact Form -->
        <div class="col-md-6 mb-4">
            <h3>Send us a Message</h3>
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name *</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone">
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject *</label>
                    <input type="text" class="form-control" id="subject" name="subject" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message *</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>

        <!-- Contact Information -->
        <div class="col-md-6 mb-4">
            <h3>Contact Information</h3>
            <div class="mb-4">
                <h5><i class="fas fa-map-marker-alt text-primary"></i> Address</h5>
                <p>Hotel Kiran Place<br>
                Street Address, City<br>
                State, PIN Code</p>
            </div>
            <div class="mb-4">
                <h5><i class="fas fa-phone text-primary"></i> Phone</h5>
                <p>+91 XXXX XXXX XX</p>
            </div>
            <div class="mb-4">
                <h5><i class="fas fa-envelope text-primary"></i> Email</h5>
                <p>info@hotelkiranplace.com</p>
            </div>
        </div>
    </div>

    <!-- Google Map Section -->
    <div class="row mt-5">
        <div class="col-md-12">
            <h3 class="mb-3">Location</h3>
            <div class="map-container" style="height: 400px; width: 100%;">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9663095343008!2d-74.00425878459418!3d40.74076684379132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDDCsDQ0JzI2LjgiTiA3NMKwMDAnMTAuOCJX!5e0!3m2!1sen!2sus!4v1234567890123!5m2!1sen!2sus" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</div>

<!-- WhatsApp Chat Button -->
<div class="whatsapp-button" style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;">
    <a href="https://wa.me/91XXXXXXXXXX" target="_blank" class="btn btn-success btn-lg rounded-circle" style="width: 60px; height: 60px; padding: 0; display: flex; align-items: center; justify-content: center;">
        <i class="fab fa-whatsapp" style="font-size: 30px;"></i>
    </a>
</div>
@endsection

@push('styles')
<style>
    .whatsapp-button a {
        box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        transition: transform 0.3s;
    }
    .whatsapp-button a:hover {
        transform: scale(1.1);
    }
</style>
@endpush

