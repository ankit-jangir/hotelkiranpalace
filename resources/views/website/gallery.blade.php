@extends('common.layout')

@section('title', 'Photo Gallery - Hotel Kiran Place')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-5">Photo Gallery</h1>
    
    <div class="row">
        <!-- Gallery Images -->
        <div class="col-md-4 mb-4">
            <img src="https://via.placeholder.com/400x300" alt="Gallery Image" class="img-fluid rounded" data-bs-toggle="modal" data-bs-target="#galleryModal" onclick="setModalImage('https://via.placeholder.com/800x600')">
        </div>
        <div class="col-md-4 mb-4">
            <img src="https://via.placeholder.com/400x300" alt="Gallery Image" class="img-fluid rounded" data-bs-toggle="modal" data-bs-target="#galleryModal" onclick="setModalImage('https://via.placeholder.com/800x600')">
        </div>
        <div class="col-md-4 mb-4">
            <img src="https://via.placeholder.com/400x300" alt="Gallery Image" class="img-fluid rounded" data-bs-toggle="modal" data-bs-target="#galleryModal" onclick="setModalImage('https://via.placeholder.com/800x600')">
        </div>
        <div class="col-md-4 mb-4">
            <img src="https://via.placeholder.com/400x300" alt="Gallery Image" class="img-fluid rounded" data-bs-toggle="modal" data-bs-target="#galleryModal" onclick="setModalImage('https://via.placeholder.com/800x600')">
        </div>
        <div class="col-md-4 mb-4">
            <img src="https://via.placeholder.com/400x300" alt="Gallery Image" class="img-fluid rounded" data-bs-toggle="modal" data-bs-target="#galleryModal" onclick="setModalImage('https://via.placeholder.com/800x600')">
        </div>
        <div class="col-md-4 mb-4">
            <img src="https://via.placeholder.com/400x300" alt="Gallery Image" class="img-fluid rounded" data-bs-toggle="modal" data-bs-target="#galleryModal" onclick="setModalImage('https://via.placeholder.com/800x600')">
        </div>
    </div>
</div>

<!-- Gallery Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="galleryModalLabel">Gallery Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Gallery Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function setModalImage(src) {
        document.getElementById('modalImage').src = src;
    }
</script>
@endpush

