@extends('common.layout')

@section('title', 'Blog - Hotel Kiran Place')

@section('content')


<!-- CATEGORY FILTER -->
<div class="container">
    <div class="blog-filters">
        <button class="active" onclick="filterBlog('all')">All</button>
        <button onclick="filterBlog('luxury')">Luxury</button>
        <button onclick="filterBlog('travel')">Travel</button>
        <button onclick="filterBlog('food')">Dining</button>
        <button onclick="filterBlog('events')">Events</button>
    </div>
</div>

<!-- BLOG LIST -->
<div class="container my-5">
    <div class="row" id="blogContainer">

        @for($i=1;$i<=12;$i++) <div class="col-lg-4 col-md-6 blog-item luxury">
            <div class="blog-card">
                <img src="{{ asset('images/hero_section_img3.jpg') }}" alt="Hotel Kiran Palace Lobby">
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
<div class="pagination-wrapper">
    <button onclick="prevPage()">←</button>
    <span id="pageNumber">1</span>
    <button onclick="nextPage()">→</button>
</div>
</div>

<!-- RELATED BLOGS -->
<section class="related-section py-5" style="background-color:#f8f9fa;">
    <div class="container">
        <h2 class="text-center mb-5" style="font-weight:700;color:#333;">Related Blogs</h2>

        <div class="row g-4">
            @for($i=1;$i<=3;$i++) <div class="col-md-4">
                <div class="related-card position-relative overflow-hidden rounded shadow">
                    <div class="related-card-img position-relative">
                        <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb" alt="Blog Image">
                        <div class="related-card-overlay"></div>
                        <div class="related-card-text">
                            <h5>Luxury Stay Experience</h5>
                            <p>Experience the finest luxury stay with exceptional services.</p>
                            <a href="#" class="btn btn-outline-light btn-sm">Read More</a>
                        </div>
                    </div>
                </div>
        </div>
        @endfor
    </div>
    </div>
</section>



@endsection