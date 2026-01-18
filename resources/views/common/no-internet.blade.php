@extends('common.layout')

@section('title', 'No Internet Connection')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <h1 class="display-1">📶</h1>
            <h2 class="mb-4">No Internet Connection</h2>
            <p class="lead mb-4">Please check your internet connection and try again.</p>
            <button onclick="window.location.reload()" class="btn btn-primary">Retry</button>
        </div>
    </div>
</div>
@endsection

