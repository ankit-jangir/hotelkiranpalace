@extends("common.layout")

@section('title', 'Blog Detail - Hotel Kiran Place')

@section('content')

<!-- BLOG DETAIL -->
<section class="blog-detail-section py-5">
    <div class="container">
        <div class="row justify-content-center">

            <!-- MAIN CONTENT -->
            <div class="col-lg-8">

                <div class="blog-detail-content">
                    <img src="{{ asset('images/hero_section_img2.jpg') }}" alt="Blog Image">

                    <div class="blog-meta">
                        <span>Luxury</span>
                        <span>•</span>
                        <span>25 Jan 2026</span>
                    </div>

                    <h1>Exploring the Luxuries of Hotel Kiran Place</h1>

                    <p>
                        Hotel Kiran Place offers an unmatched luxury experience with
                        world-class hospitality, elegant interiors, and premium services
                        designed for comfort and relaxation.
                    </p>

                    <p>
                        From spacious rooms to gourmet dining and personalized services,
                        every detail is thoughtfully curated to provide guests with a
                        memorable stay.
                    </p>

                    <blockquote>
                        “Luxury is not about excess, it’s about comfort, quality, and
                        unforgettable experiences.”
                    </blockquote>

                    <p>
                        Whether you are traveling for leisure or business, Hotel Kiran
                        Place ensures a peaceful and refined environment tailored to
                        your needs.
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- RELATED BLOGS -->
<section class="related-section py-5">
    <div class="container">
        <h2 class="text-center mb-4">Related Blogs</h2>

        <div class="row g-4 justify-content-center">
            @for($i=1;$i<=3;$i++) <div class="col-md-4">
                <div class="related-card">
                    <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb">
                    <div class="related-card-overlay">
                        <h5>Luxury Stay Experience</h5>
                        <p>Comfort, elegance & premium hospitality.</p>
                        <a href="#">Read More →</a>
                    </div>
                </div>
        </div>
        @endfor
    </div>
    </div>
</section>

@endsection