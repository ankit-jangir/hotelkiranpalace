@extends('common.layout')

@section('title', 'Privacy Policy | Hotel Kiran Place')

@section('content')


<!-- CONTENT -->
<section class="privacy-content py-5">
    <div class="container">
        <div class="privacy-card">

            <p class="intro-text">
                At <strong>Hotel Kiran Place</strong>, we are committed to protecting your personal information.
                This Privacy Policy explains how we collect, use, and safeguard your data when you visit our
                website or stay with us.
            </p>

            <h3>1. Information We Collect</h3>
            <p>We may collect the following personal information:</p>
            <ul>
                <li>Full name, email address, phone number</li>
                <li>Government-issued ID proof (as per hotel regulations)</li>
                <li>Payment and billing details</li>
                <li>Room booking history and preferences</li>
                <li>IP address, browser type, and device information</li>
            </ul>

            <h3>2. How We Use Your Information</h3>
            <ul>
                <li>To confirm and manage hotel reservations</li>
                <li>For check-in, verification, and security purposes</li>
                <li>To improve customer service and guest experience</li>
                <li>To send booking confirmations and service updates</li>
                <li>To comply with legal and regulatory requirements</li>
            </ul>

            <h3>3. Sharing of Information</h3>
            <p>
                We do not sell or rent your personal data. Information may be shared only:
            </p>
            <ul>
                <li>With trusted service providers (payment gateways, booking systems)</li>
                <li>With law enforcement authorities if required by law</li>
                <li>To protect the safety and rights of Hotel Kiran Place</li>
            </ul>

            <h3>4. Data Security</h3>
            <p>
                We implement strict security measures to protect your data from unauthorized access,
                misuse, or disclosure. However, no online transmission is 100% secure.
            </p>

            <h3>5. Cookies Policy</h3>
            <p>
                Our website uses cookies to enhance user experience and analyze website traffic.
                You can disable cookies through your browser settings.
            </p>

            <h3>6. Guest Rights</h3>
            <ul>
                <li>Access your personal data</li>
                <li>Request correction or deletion</li>
                <li>Opt-out of promotional communication</li>
            </ul>

            <h3>7. Third-Party Links</h3>
            <p>
                Our website may contain links to third-party sites. We are not responsible for
                the privacy practices of those websites.
            </p>

            <h3>8. Policy Updates</h3>
            <p>
                Hotel Kiran Place reserves the right to update this policy at any time.
                Changes will be posted on this page.
            </p>

            <h3>9. Contact Information</h3>
            <p>
                If you have any questions regarding this Privacy Policy, please contact us:
            </p>
            <p>
                📧 <a href="mailto:info@hotelkiranplace.com">info@hotelkiranplace.com</a>
            </p>

            <p class="last-updated">
                <strong>Last Updated:</strong> {{ date('F Y') }}
            </p>

            <!-- PDF DOWNLOAD BUTTON -->
            <div class="text-center mt-4">
                <a href="{{ asset('privacy-policy-hotel-kiran-place.pdf') }}" class="btn btn-orange" download>
                    Download Privacy Policy (PDF)
                </a>
            </div>

        </div>
    </div>
</section>

@endsection