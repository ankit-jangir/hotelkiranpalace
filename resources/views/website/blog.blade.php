@extends('common.layout')

@section('title', 'Blog - Hotel Kiran Place')

@section('content')

<div class="container my-5">
    <div class="row">

        <!-- LEFT : BLOG LIST -->
        <div class="col-lg-9 col-md-8 order-2 order-md-1">

            <div class="row g-4" id="blogContainer">
                @for($i=1;$i<=9;$i++) <div class="col-lg-4 col-md-6 blog-item luxury">
                    <div class="blog-card">
                        <img src="{{ asset('images/hero_section_img3.jpg') }}" alt="">
                        <div class="blog-overlay">
                            <span>Luxury</span>
                            <h4>Royal Luxury Room</h4>
                            <p>Experience premium comfort & elegance.</p>
                            <a href="#">Read More →</a>
                        </div>
                    </div>
            </div>
            @endfor
        </div>

        <!-- PAGINATION -->
        <div class="pagination-wrapper mt-5">
            <button onclick="prevPage()">←</button>
            <span id="pageNumber">1</span>
            <button onclick="nextPage()">→</button>
        </div>

    </div>

    <!-- RIGHT : FILTER SIDEBAR -->
    <div class="col-lg-3 col-md-4 order-1 order-md-2 mb-4 mb-md-0">
        <div class="blog-filter-sidebar">
            <h5>Categories</h5>
            <button class="active" onclick="filterBlog('all')">All</button>
            <button onclick="filterBlog('luxury')">Luxury</button>
            <button onclick="filterBlog('travel')">Travel</button>
            <button onclick="filterBlog('food')">Dining</button>
            <button onclick="filterBlog('events')">Events</button>
        </div>
    </div>

</div>
</div>

<!-- RELATED BLOGS -->
<section class="related-section py-5">
    <div class="container">
        <h2 class="text-center mb-5">Related Blogs</h2>

        <div class="row g-4">
            @for($i=1;$i<=3;$i++) <div class="col-md-4">
                <div class="related-card">
                    <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb">
                    <div class="related-card-overlay">
                        <h5>Luxury Stay Experience</h5>
                        <p>Finest luxury with exceptional services.</p>
                        <a href="#">Read More</a>
                    </div>
                </div>
        </div>
        @endfor
    </div>
    </div>
</section>

@endsection