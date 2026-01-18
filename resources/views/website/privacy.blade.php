@extends('common.layout')

@section('title', 'Privacy Policy - Hotel Kiran Place')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Privacy Policy</h1>
    
    <div class="row">
        <div class="col-md-12">
            <h3>1. Information We Collect</h3>
            <p>We collect information that you provide directly to us, including:</p>
            <ul>
                <li>Name, email address, phone number</li>
                <li>Payment information</li>
                <li>Booking preferences and history</li>
                <li>Identification documents (for check-in purposes)</li>
            </ul>

            <h3 class="mt-4">2. How We Use Your Information</h3>
            <p>We use the information we collect to:</p>
            <ul>
                <li>Process and manage your reservations</li>
                <li>Communicate with you about your stay</li>
                <li>Send you promotional offers and updates (with your consent)</li>
                <li>Improve our services and guest experience</li>
                <li>Comply with legal obligations</li>
            </ul>

            <h3 class="mt-4">3. Information Sharing</h3>
            <p>We do not sell, trade, or rent your personal information to third parties. We may share information only in the following circumstances:</p>
            <ul>
                <li>With service providers who assist in our operations</li>
                <li>When required by law or legal process</li>
                <li>To protect our rights and safety</li>
            </ul>

            <h3 class="mt-4">4. Data Security</h3>
            <p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p>

            <h3 class="mt-4">5. Your Rights</h3>
            <p>You have the right to:</p>
            <ul>
                <li>Access your personal information</li>
                <li>Correct inaccurate information</li>
                <li>Request deletion of your information</li>
                <li>Opt-out of marketing communications</li>
            </ul>

            <h3 class="mt-4">6. Cookies</h3>
            <p>Our website uses cookies to enhance your browsing experience. You can control cookie preferences through your browser settings.</p>

            <h3 class="mt-4">7. Changes to This Policy</h3>
            <p>We may update this privacy policy from time to time. We will notify you of any changes by posting the new policy on this page.</p>

            <h3 class="mt-4">8. Contact Us</h3>
            <p>If you have questions about this privacy policy, please contact us at <a href="mailto:info@hotelkiranplace.com">info@hotelkiranplace.com</a></p>

            <p class="mt-4"><strong>Last Updated:</strong> {{ date('F Y') }}</p>
        </div>
    </div>
</div>
@endsection

