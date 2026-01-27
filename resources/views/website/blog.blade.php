@extends('common.layout')

@section('title', 'Blog - Hotel Kiran Place')

@section('content')

<div class=" blog-body">

    <div class="container my-5">

        <div class="row">

            <!-- LEFT : BLOG LIST -->
            <div class="col-lg-9 col-md-8 order-2 order-md-1">
                <div class="row g-4" id="blogContainer">

                    @php
                    $blogs = [
                    ['title'=>'Educating the Future Generation','desc'=>'Providing quality education to underprivileged
                    children.','category'=>'Education','img'=>'images/hero_section_img3.jpg'],
                    ['title'=>'Free Health Camps','desc'=>'Medical support reaching rural
                    communities.','category'=>'Healthcare','img'=>'images/hero_section_img3.jpg'],
                    ['title'=>'Women Skill Development','desc'=>'Empowering women through skills &
                    awareness.','category'=>'Women Empowerment','img'=>'images/hero_section_img3.jpg'],
                    ['title'=>'Green Initiatives','desc'=>'Promoting environment &
                    sustainability.','category'=>'Environment','img'=>'images/hero_section_img3.jpg'],
                    ];
                    @endphp

                    @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 blog-item {{ strtolower(str_replace(' ','-',$blog['category'])) }}">
                        <div class="blog-card shadow-sm rounded">
                            <div class="blog-img-wrapper position-relative">
                                <img src="{{ asset($blog['img']) }}" alt="{{ $blog['title'] }}"
                                    class="img-fluid rounded-top">
                                <span class="blog-label position-absolute">{{ $blog['category'] }}</span>
                            </div>
                            <div class="blog-content p-3">
                                <h5 class="mb-2">{{ $blog['title'] }}</h5>
                                <p class="mb-3 text-muted">{{ $blog['desc'] }}</p>
                                <a href="#" class="read-more">Read More →</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <!-- PAGINATION -->
                <div class="pagination-wrapper mt-5 d-flex justify-content-center align-items-center gap-3">
                    <button onclick="prevPage()" class="btn btn-outline-orange">←</button>
                    <span id="pageNumber" class="fw-bold">1</span>
                    <button onclick="nextPage()" class="btn btn-outline-orange">→</button>
                </div>
            </div>

            <!-- RIGHT : FILTER SIDEBAR -->
            <div class="col-lg-3 col-md-4 order-1 order-md-2 mb-4 mb-md-0">
                <div class="blog-filter-sidebar p-3 shadow-sm rounded bg-white">
                    <h5 class="mb-3 text-orange">Filter by Cause</h5>
                    <button class="filter-btn active w-100 mb-2 text-start" onclick="filterBlog('all')">All</button>
                    <button class="filter-btn w-100 mb-2 text-start"
                        onclick="filterBlog('education')">Education</button>
                    <button class="filter-btn w-100 mb-2 text-start"
                        onclick="filterBlog('healthcare')">Healthcare</button>
                    <button class="filter-btn w-100 mb-2 text-start" onclick="filterBlog('women-empowerment')">Women
                        Empowerment</button>
                    <button class="filter-btn w-100 mb-2 text-start"
                        onclick="filterBlog('environment')">Environment</button>
                </div>
            </div>

        </div>
    </div>

    <!-- RELATED BLOGS -->
    <section class="related-section py-5 ">
        <div class="container">
            <h2 class="text-center mb-5 text-orange">Related Blogs</h2>
            <div class="row g-4">
                @foreach($blogs as $blog)
                <div class="col-md-4">
                    <div class="blog-card shadow-sm rounded">
                        <div class="blog-img-wrapper position-relative">
                            <img src="{{ asset($blog['img']) }}" alt="{{ $blog['title'] }}"
                                class="img-fluid rounded-top">
                            <span class="blog-label position-absolute">{{ $blog['category'] }}</span>
                        </div>
                        <div class="blog-content p-3">
                            <h5 class="mb-2">{{ $blog['title'] }}</h5>
                            <p class="mb-3 text-muted">{{ $blog['desc'] }}</p>
                            <a href="#" class="read-more">Read More →</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>

@endsection