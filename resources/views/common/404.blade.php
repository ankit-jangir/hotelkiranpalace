@extends('common.layout')

@section('title', '404 - Page Not Found')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <h1 class="display-1">404</h1>
            <h2 class="mb-4">Page Not Found</h2>
            <p class="lead mb-4">Sorry, the page you are looking for does not exist.</p>
            <a href="{{ route('home') }}" class="btn btn-primary">Go to Home</a>
        </div>
    </div>
</div>
@endsection

