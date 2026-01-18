@extends('common.layout')

@section('title', 'Blog - Hotel Kiran Place')

@section('content')
<div class="container my-5">
    <h1 class="mb-5">Blog</h1>
    
    <div class="row">
        <!-- Blog Post 1 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Blog Post">
                <div class="card-body">
                    <h5 class="card-title">Welcome to Hotel Kiran Place</h5>
                    <p class="card-text"><small class="text-muted">Published on {{ date('F d, Y') }}</small></p>
                    <p class="card-text">Discover the comfort and luxury that awaits you at Hotel Kiran Place...</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>

        <!-- Blog Post 2 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Blog Post">
                <div class="card-body">
                    <h5 class="card-title">Top 5 Things to Do in the City</h5>
                    <p class="card-text"><small class="text-muted">Published on {{ date('F d, Y', strtotime('-1 week')) }}</small></p>
                    <p class="card-text">Explore the best attractions and activities near our hotel...</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>

        <!-- Blog Post 3 -->
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="Blog Post">
                <div class="card-body">
                    <h5 class="card-title">Hotel Amenities You'll Love</h5>
                    <p class="card-text"><small class="text-muted">Published on {{ date('F d, Y', strtotime('-2 weeks')) }}</small></p>
                    <p class="card-text">Learn about all the amazing amenities we offer to make your stay memorable...</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

