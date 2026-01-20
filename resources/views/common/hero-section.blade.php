@php
    // Get page title and description based on route
    $routeName = request()->route()->getName();
    
    $pageData = [
        'contact' => [
            'title' => 'Contact us',
            'description' => "At Hotel Kiran Place, we're all about crafting moments that you'll cherish forever. If there's anything we can do to make your stay even better, don't hesitate to share your thoughts with us.",
            'breadcrumb' => 'Contact Us'
        ],
        'about' => [
            'title' => 'About Us',
            'description' => 'Discover the story behind Hotel Kiran Place and our commitment to providing exceptional hospitality and unforgettable experiences.',
            'breadcrumb' => 'About Us'
        ],
        'rooms' => [
            'title' => 'Rooms & Tariff',
            'description' => 'Experience luxury and comfort in our beautifully designed rooms, each thoughtfully crafted to ensure your perfect stay.',
            'breadcrumb' => 'Rooms & Tariff'
        ],
        'amenities' => [
            'title' => 'Amenities',
            'description' => 'Explore our world-class facilities and amenities designed to enhance your stay and create memorable experiences.',
            'breadcrumb' => 'Amenities'
        ],
        'gallery' => [
            'title' => 'Photo Gallery',
            'description' => 'Take a visual journey through our hotel and discover the beauty and elegance that awaits you.',
            'breadcrumb' => 'Photo Gallery'
        ],
        'blog' => [
            'title' => 'Blog',
            'description' => 'Stay updated with our latest news, travel tips, and stories from Hotel Kiran Place.',
            'breadcrumb' => 'Blog'
        ],
        'terms' => [
            'title' => 'Terms & Conditions',
            'description' => 'Please read our terms and conditions carefully before using our services.',
            'breadcrumb' => 'Terms & Conditions'
        ],
        'privacy' => [
            'title' => 'Privacy Policy',
            'description' => 'Learn how we protect and handle your personal information with utmost care.',
            'breadcrumb' => 'Privacy Policy'
        ],
        'faq' => [
            'title' => 'Frequently Asked Questions',
            'description' => 'Find answers to common questions about our hotel, services, and policies.',
            'breadcrumb' => 'FAQ'
        ],
        'booking.policy' => [
            'title' => 'Booking Policy',
            'description' => 'Understand our booking terms, cancellation policies, and reservation guidelines.',
            'breadcrumb' => 'Booking Policy'
        ],
        'cancellation.policy' => [
            'title' => 'Cancellation Policy',
            'description' => 'Learn about our cancellation terms and refund policies.',
            'breadcrumb' => 'Cancellation Policy'
        ]
    ];
    
    $currentPage = $pageData[$routeName] ?? [
        'title' => 'Welcome',
        'description' => 'Experience luxury and comfort at Hotel Kiran Place.',
        'breadcrumb' => 'Page'
    ];
    
    $title = $currentPage['title'];
    $description = $currentPage['description'];
    $breadcrumbText = $currentPage['breadcrumb'];
    $backgroundImage = asset('images/heroimg1.jpg');
@endphp

<section class="page-hero-section">
    <div class="page-hero-background">
        <img src="{{ $backgroundImage }}" alt="{{ $title }}" class="page-hero-img" onerror="this.onerror=null; this.src='{{ asset('images/heroimg1.jpg') }}';">
        <div class="page-hero-overlay"></div>
    </div>
    <div class="page-hero-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-12">
                    <h1 class="page-hero-title">{{ $title }}</h1>
                    @if($description)
                        <p class="page-hero-description">{{ $description }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Breadcrumb Navigation -->
<section class="page-breadcrumb-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-breadcrumb-wrapper">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}" class="breadcrumb-link breadcrumb-home">
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <span class="breadcrumb-current">{{ $breadcrumbText }}</span>
                            </li>
                        </ol>
                    </nav>
                    <div class="page-share">
                        <a href="#" class="share-link" data-bs-toggle="modal" data-bs-target="#shareModal" onclick="return false;">
                            <i class="fas fa-share-alt share-icon"></i>
                            <span>Share</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Share Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered share-modal-dialog">
        <div class="modal-content share-modal-content">
            <div class="modal-header share-modal-header">
                <h5 class="modal-title share-modal-title" id="shareModalLabel">Share</h5>
                <button type="button" class="share-modal-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body share-modal-body">
                <!-- Link Preview -->
                <div class="share-link-preview">
                    <div class="share-preview-image">
                        <img src="{{ asset('images/heroimg1.jpg') }}" alt="Hotel Kiran Place" onerror="this.onerror=null; this.src='{{ asset('images/hero_section_img1.png') }}';">
                    </div>
                    <div class="share-preview-content">
                        <div class="share-preview-url">{{ url()->current() }}</div>
                        <div class="share-preview-title">Hotel Kiran Place</div>
                    </div>
                </div>
                
                <!-- Social Media Icons -->
                <div class="share-social-section">
                    <h6 class="share-social-title">Share this link via:</h6>
                    <div class="share-social-icons">
                        <a href="#" class="share-social-icon share-facebook" onclick="shareOnFacebook(event); return false;" title="Share on Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="share-social-icon share-twitter" onclick="shareOnTwitter(event); return false;" title="Share on Twitter">
                            <i class="fab fa-x-twitter"></i>
                        </a>
                        <a href="#" class="share-social-icon share-instagram" onclick="shareOnInstagram(event); return false;" title="Share on Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="share-social-icon share-email" onclick="shareViaEmail(event); return false;" title="Share via Email">
                            <i class="fas fa-envelope"></i>
                        </a>
                        <a href="#" class="share-social-icon share-whatsapp" onclick="shareOnWhatsApp(event); return false;" title="Share on WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Copy Link Section -->
                <div class="share-copy-section">
                    <h6 class="share-copy-title">Or copy the link:</h6>
                    <div class="share-copy-wrapper">
                        <input type="text" class="share-copy-input" id="shareLinkInput" value="{{ url()->current() }}" readonly>
                        <button type="button" class="share-copy-btn" onclick="copyShareLink()">
                            <span id="copyBtnText">Copy</span>
                            <i class="fas fa-check d-none" id="copyBtnIcon"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function shareOnFacebook(e) {
    e.preventDefault();
    const url = encodeURIComponent('{{ url()->current() }}');
    const title = encodeURIComponent('{{ $title }}');
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank', 'width=600,height=400');
}

function shareOnTwitter(e) {
    e.preventDefault();
    const url = encodeURIComponent('{{ url()->current() }}');
    const text = encodeURIComponent('{{ $title }} - Hotel Kiran Place');
    window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank', 'width=600,height=400');
}

function shareOnInstagram(e) {
    e.preventDefault();
    // Instagram doesn't support direct sharing, open Instagram
    window.open('https://www.instagram.com/', '_blank');
}

function shareViaEmail(e) {
    e.preventDefault();
    const url = encodeURIComponent('{{ url()->current() }}');
    const subject = encodeURIComponent('{{ $title }} - Hotel Kiran Place');
    const body = encodeURIComponent(`Check out this page: ${url}`);
    window.location.href = `mailto:?subject=${subject}&body=${body}`;
}

function shareOnWhatsApp(e) {
    e.preventDefault();
    const url = encodeURIComponent('{{ url()->current() }}');
    const text = encodeURIComponent('{{ $title }} - Hotel Kiran Place');
    window.open(`https://wa.me/?text=${text}%20${url}`, '_blank');
}

function copyShareLink() {
    const input = document.getElementById('shareLinkInput');
    const btnText = document.getElementById('copyBtnText');
    const btnIcon = document.getElementById('copyBtnIcon');
    
    input.select();
    input.setSelectionRange(0, 99999);
    
    navigator.clipboard.writeText(input.value).then(function() {
        btnText.textContent = 'Copied!';
        btnIcon.classList.remove('d-none');
        btnIcon.classList.add('d-inline-block');
        
        setTimeout(function() {
            btnText.textContent = 'Copy';
            btnIcon.classList.add('d-none');
            btnIcon.classList.remove('d-inline-block');
        }, 2000);
    });
}
</script>
