@extends('admin.layout')

@section('title', 'Gallery - Admin Dashboard')
@section('page-title', 'Gallery')

@push('styles')
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0">Gallery <span class="badge bg-secondary ms-2">{{ $galleries->total() }}</span></h5>
                    <nav aria-label="breadcrumb" class="mt-2">
                        <ol class="breadcrumb mb-0" style="font-size: 0.85rem;">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" style="color: #6c757d; text-decoration: none;">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                        </ol>
                    </nav>
                </div>
                <button type="button" class="admin-add-gallery-btn" onclick="openGalleryPanel()">
                    <i class="fas fa-plus"></i>
                    <span>Add Media</span>
                </button>
            </div>
            <div class="card-body p-0">
                <!-- Search Input -->
                <div class="p-3 border-bottom">
                    <form method="GET" action="{{ route('admin.gallery') }}" class="d-flex gap-2">
                        <div class="flex-grow-1 position-relative">
                            <i class="fas fa-search position-absolute" style="left: 12px; top: 50%; transform: translateY(-50%); color: #9ca3af; z-index: 10;"></i>
                            <input type="text" name="search" class="form-control ps-5" placeholder="Search gallery by name or description..." value="{{ $search }}" style="border: 1px solid #e0e0e0; border-radius: 6px;">
                        </div>
                        @if($search)
                        <a href="{{ route('admin.gallery') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times"></i> Clear
                        </a>
                        @endif
                        <button type="submit" class="btn" style="background: linear-gradient(90deg, rgb(255, 161, 0) 0%, rgb(247, 71, 15) 50%, rgb(238, 17, 98) 100%); color: #ffffff; border: none;">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </form>
                </div>
                <div class="admin-gallery-table-container">
                    <div class="admin-gallery-table-wrapper">
                        <table class="admin-gallery-table table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Media</th>
                                    <th>Type</th>
                                    <th>Date & Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($galleries as $index => $gallery)
                                <tr>
                                    <td>{{ $galleries->firstItem() + $index }}</td>
                                    <td>
                                        <div class="admin-gallery-table-name-cell">
                                            @if($gallery->main_image)
                                                <img src="{{ asset($gallery->main_image) }}" alt="{{ $gallery->name }}" class="admin-gallery-img">
                                            @elseif($gallery->file_path)
                                                <img src="{{ asset($gallery->file_path) }}" alt="{{ $gallery->name }}" class="admin-gallery-img">
                                            @else
                                                @php
                                                    $defaultImages = ['hero_section_img1.png', 'hero_section_img2.jpg', 'hero_section_img3.jpg', 'heroimg1.jpg', 'heroimg1.png', 'heroimg3.jpg', 'hotelimg-4.png'];
                                                    $randomImage = $defaultImages[array_rand($defaultImages)];
                                                @endphp
                                                <img src="{{ asset('images/' . $randomImage) }}" alt="{{ $gallery->name }}" class="admin-gallery-img">
                                            @endif
                                            <div class="admin-gallery-table-name-info">
                                                <p class="admin-gallery-table-name">{{ $gallery->name ?? 'Gallery Item' }}</p>
                                                <p class="admin-gallery-table-type">{{ Str::limit($gallery->description ?? '', 50) }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="admin-gallery-status-badge {{ $gallery->type ?? 'image' }}">
                                            {{ ucfirst($gallery->type ?? 'image') }}
                                        </span>
                                    </td>
                                    <td>
                                        <div style="color: #111827; font-weight: 500;">{{ $gallery->created_at->format('d M Y') }}</div>
                                        <div style="color: #6b7280; font-size: 0.875rem; margin-top: 0.25rem;">{{ $gallery->created_at->format('h:i A') }}</div>
                                    </td>
                                    <td>
                                        <div class="admin-gallery-action-menu">
                                            <button type="button" class="admin-gallery-action-btn" onclick="toggleGalleryActionMenu(this)">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="admin-gallery-action-dropdown">
                                                <button type="button" class="admin-gallery-action-item delete" onclick="deleteGallery({{ $gallery->id }})">
                                                    <i class="fas fa-trash"></i>
                                                    <span>Delete</span>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <p class="text-muted mb-0">No media found. Click "Add Media" to upload images or videos.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                @if($galleries->hasPages())
                <div class="admin-gallery-pagination-wrapper">
                    <div class="admin-gallery-pagination-info">
                        Showing {{ $galleries->firstItem() ?? 0 }} to {{ $galleries->lastItem() ?? 0 }} of {{ $galleries->total() }} entries
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="me-2">Show:</span>
                        <select class="admin-gallery-pagination-select" onchange="changeGalleryPerPage(this.value)">
                            <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page', 10) == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page', 10) == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('per_page', 10) == 100 ? 'selected' : '' }}>100</option>
                        </select>
                        <span class="ms-2">per page</span>
                    </div>
                    <div class="admin-gallery-pagination">
                        {{ $galleries->appends(request()->query())->links() }}
                    </div>
                </div>
                @else
                <div class="admin-gallery-pagination-wrapper">
                    <div class="admin-gallery-pagination-info">
                        Showing {{ $galleries->count() }} of {{ $galleries->total() }} entries
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Gallery Panel -->
<div id="galleryPanelOverlay" class="admin-gallery-panel-overlay" onclick="closeGalleryPanel()"></div>
<div id="galleryPanel" class="admin-gallery-panel">
    <div class="admin-gallery-panel-header">
        <h3 class="admin-blog-modal-title">Add Media</h3>
        <button type="button" class="admin-gallery-panel-close" onclick="closeGalleryPanel()">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="admin-gallery-panel-body">
        <form id="galleryForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="galleryId" name="gallery_id">
            

            <div class="admin-gallery-form-group">
                <label class="admin-gallery-form-label">
                    Gallery Name <span class="required">*</span>
                </label>
                <input type="text" class="admin-gallery-form-input" id="galleryName" name="name" placeholder="Enter gallery name" required>
            </div>

            <div class="admin-gallery-form-group">
                <label class="admin-gallery-form-label">
                    Description
                </label>
                <textarea class="admin-gallery-form-input" id="galleryDescription" name="description" rows="3" placeholder="Enter gallery description"></textarea>
            </div>

            <div class="admin-gallery-form-group" id="mainImageGroup">
                <label class="admin-gallery-form-label">
                    Main Image <span class="required">*</span>
                </label>
                <input type="file" class="admin-gallery-form-input" id="mainImage" name="main_image" accept="image/*" onchange="previewMainImage(this)" placeholder="Choose main image">
                <small class="text-muted">Upload main image (1 image)</small>
                <div id="mainImagePreview" class="admin-gallery-image-preview"></div>
            </div>

            <div class="admin-gallery-form-group" id="subImagesGroup">
                <label class="admin-gallery-form-label">
                    Sub Images
                </label>
                <input type="file" class="admin-gallery-form-input" id="subImages" name="sub_images[]" accept="image/*" multiple onchange="previewSubImages(this)" placeholder="Choose multiple sub images">
                <small class="text-muted">Upload multiple sub images</small>
                <div id="subImagesPreview" class="admin-gallery-image-preview"></div>
            </div>

            <div class="admin-gallery-form-group" id="subVideosGroup">
                <label class="admin-gallery-form-label">
                    Sub Videos
                </label>
                <input type="file" class="admin-gallery-form-input" id="subVideos" name="sub_videos[]" accept="video/*" multiple onchange="previewSubVideos(this)" placeholder="Choose multiple sub videos">
                <small class="text-muted">Upload multiple sub videos</small>
                <div id="subVideosPreview" class="admin-gallery-image-preview"></div>
            </div>
        </form>
    </div>
    <div class="admin-gallery-panel-footer">
        <button type="button" class="admin-gallery-panel-btn cancel" onclick="closeGalleryPanel()">Cancel</button>
        <button type="button" class="admin-gallery-panel-btn save" onclick="saveGallery()">Save</button>
    </div>
</div>
@endsection

@push('scripts')
<!-- Gallery functions are in main.js -->
