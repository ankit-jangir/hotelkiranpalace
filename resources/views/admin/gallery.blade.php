@extends('admin.layout')

@section('title', 'Gallery - Admin Dashboard')
@section('page-title', 'Gallery')

@push('styles')
<!-- Admin Gallery CSS -->
<link href="{{ asset('frontend/admin-gallery.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="admin-gallery-header-row">
                    <h5 class="admin-gallery-title mb-0">Gallery</h5>
                    <form method="GET" action="{{ route('admin.gallery') }}" class="admin-gallery-search-form">
                        <div class="admin-gallery-search-wrapper">
                            <i class="fas fa-search admin-gallery-search-icon"></i>
                            <input type="text" name="search" class="admin-gallery-search-input" placeholder="Search gallery by name or description..." value="{{ $search }}">
                            @if($search)
                            <a href="{{ route('admin.gallery') }}" class="admin-gallery-search-clear">
                                <i class="fas fa-times"></i>
                            </a>
                            @endif
                            <button type="submit" class="admin-gallery-search-btn">
                                <i class="fas fa-search"></i>
                                <span>Search</span>
                            </button>
                        </div>
                    </form>
                    <div class="admin-add-gallery-btn-wrapper">
                        <button type="button" class="admin-add-gallery-btn" onclick="openGalleryPanel()">
                            <i class="fas fa-plus"></i>
                            <span>Add Media</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="admin-gallery-table-container">
                    <div class="admin-gallery-table-wrapper">
                        <table class="admin-gallery-table table">
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Image</th>
                                    <th>Type</th>
                                    <th>Date & Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($galleries as $index => $gallery)
                                <tr>
                                    <td>{{ $galleries->firstItem() + $index }}</td>
                                    <td>
                                        @if($gallery->main_image)
                                            <img src="{{ asset('storage/' . $gallery->main_image) }}" alt="{{ $gallery->name }}" class="admin-gallery-img">
                                        @elseif($gallery->file_path)
                                            <img src="{{ asset($gallery->file_path) }}" alt="{{ $gallery->name }}" class="admin-gallery-img">
                                        @else
                                            @php
                                                $defaultImages = ['hero_section_img1.png', 'hero_section_img2.jpg', 'hero_section_img3.jpg', 'heroimg1.jpg', 'heroimg1.png', 'heroimg3.jpg', 'hotelimg-4.png'];
                                                $randomImage = $defaultImages[array_rand($defaultImages)];
                                            @endphp
                                            <img src="{{ asset('images/' . $randomImage) }}" alt="{{ $gallery->name }}" class="admin-gallery-img">
                                        @endif
                                    </td>
                                    <td>
                                        <span class="admin-gallery-type-badge {{ $gallery->type ?? 'image' }}">
                                            {{ ucfirst($gallery->type ?? 'image') }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="admin-gallery-date-main">{{ $gallery->created_at->format('d M Y') }}</div>
                                        <div class="admin-gallery-date-time">{{ $gallery->created_at->format('h:i A') }}</div>
                                    </td>
                                    <td>
                                        <div class="admin-gallery-action-menu">
                                            <button type="button" class="admin-gallery-action-btn" onclick="toggleGalleryActionMenu(this)">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="admin-gallery-action-dropdown">
                                                <button type="button" class="admin-gallery-action-item view" onclick="viewGallery({{ $gallery->id }})">
                                                    <i class="fas fa-eye"></i>
                                                    <span>View</span>
                                                </button>
                                                <button type="button" class="admin-gallery-action-item delete" onclick="confirmDeleteGallery({{ $gallery->id }}, '{{ $gallery->name }}')">
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
                <div class="admin-gallery-pagination-wrapper">
                    <div class="admin-gallery-pagination-left">
                        <label class="admin-gallery-rows-label">Show rows per page</label>
                        <select class="form-select form-select-sm admin-gallery-pagination-select" onchange="changeGalleryPerPage(this.value)">
                            <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page', 10) == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page', 10) == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('per_page', 10) == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>
                    @if($galleries->hasPages())
                    <div class="admin-gallery-pagination-right">
                        <span class="admin-gallery-pagination-info">
                            {{ $galleries->firstItem() ?? 0 }}-{{ $galleries->lastItem() ?? 0 }} of {{ $galleries->total() }}
                        </span>
                        <div class="admin-gallery-pagination-arrows">
                            {{ $galleries->appends(request()->query())->links('vendor.pagination.bootstrap-5-custom') }}
                        </div>
                    </div>
                    @else
                    <div class="admin-gallery-pagination-right">
                        <span class="admin-gallery-pagination-info">
                            1-{{ $galleries->count() }} of {{ $galleries->total() }}
                        </span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- View Gallery Modal -->
<div id="viewGalleryModal" class="admin-gallery-view-modal">
    <div class="admin-gallery-view-content">
        <div class="admin-gallery-modal-header">
            <h3 class="admin-gallery-modal-title">View Gallery</h3>
            <button type="button" class="admin-gallery-modal-close" onclick="closeViewGalleryModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="admin-gallery-view-body">
            <div id="viewGalleryContent"></div>
        </div>
    </div>
</div>
<div id="viewGalleryModalOverlay" class="admin-gallery-view-modal-overlay" onclick="closeViewGalleryModal()"></div>

<!-- Add/Edit Gallery Panel -->
<div id="galleryPanelOverlay" class="admin-gallery-panel-overlay" onclick="closeGalleryPanel()"></div>
<div id="galleryPanel" class="admin-gallery-panel">
    <div class="admin-gallery-panel-header">
        <h3 class="admin-gallery-modal-title" id="galleryPanelTitle">Add Media</h3>
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
                    Type <span class="required">*</span>
                </label>
                <select class="admin-gallery-form-input" id="galleryType" name="type" onchange="toggleGalleryFormType(this.value)" required>
                    <option value="">Select Type</option>
                    <option value="image">Image</option>
                    <option value="video">Video</option>
                </select>
            </div>

            <div class="admin-gallery-form-group">
                <label class="admin-gallery-form-label">
                    Post Name <span class="required">*</span>
                </label>
                <input type="text" class="admin-gallery-form-input" id="galleryName" name="name" placeholder="Enter post name (e.g., Luxury Room)" required>
            </div>

            <div class="admin-gallery-form-group">
                <label class="admin-gallery-form-label">
                    Heading
                </label>
                <input type="text" class="admin-gallery-form-input" id="galleryHeading" name="heading" placeholder="Enter heading">
            </div>

            <div class="admin-gallery-form-group">
                <label class="admin-gallery-form-label">
                    Description
                </label>
                <textarea class="admin-gallery-form-input" id="galleryDescription" name="description" rows="3" placeholder="Enter description"></textarea>
            </div>

            <!-- Image Form -->
            <div id="imageFormSection" style="display: none;">
                <div class="admin-gallery-form-group">
                    <label class="admin-gallery-form-label">
                        Main Image <span class="required">*</span>
                    </label>
                    <input type="file" class="admin-gallery-form-input" id="mainImage" name="main_image" accept="image/*" onchange="previewMainImage(this)">
                    <small class="text-muted">Upload main image</small>
                    <div id="mainImagePreview" class="admin-gallery-image-preview"></div>
                </div>

                <div class="admin-gallery-form-group">
                    <label class="admin-gallery-form-label">
                        Upload Type
                    </label>
                    <div class="admin-gallery-upload-type">
                        <label class="admin-gallery-radio-label">
                            <input type="radio" name="upload_type" value="single" checked onchange="toggleUploadType(this.value)">
                            <span>Single Image</span>
                        </label>
                        <label class="admin-gallery-radio-label">
                            <input type="radio" name="upload_type" value="multiple" onchange="toggleUploadType(this.value)">
                            <span>Multiple Images</span>
                        </label>
                    </div>
                </div>

                <div id="singleImageSection">
                    <div class="admin-gallery-form-group">
                        <label class="admin-gallery-form-label">
                            Image
                        </label>
                        <input type="file" class="admin-gallery-form-input" name="images[]" accept="image/*" onchange="previewSingleImage(this)">
                        <div class="admin-gallery-images-preview" id="singleImagePreview"></div>
                    </div>
                </div>

                <div id="multipleImagesSection" style="display: none;">
                    <div class="admin-gallery-form-group">
                        <label class="admin-gallery-form-label">
                            Images
                        </label>
                        <div id="multipleImagesContainer">
                            <div class="admin-gallery-image-input-wrapper">
                                <input type="file" class="admin-gallery-form-input" name="images[]" accept="image/*" onchange="previewMultipleImage(this, this.parentElement)">
                                <button type="button" class="admin-gallery-remove-image-btn" onclick="removeImageInput(this)" style="display: none;">
                                    <i class="fas fa-times"></i>
                                </button>
                                <div class="admin-gallery-image-preview-item"></div>
                            </div>
                        </div>
                        <button type="button" class="admin-gallery-add-more-btn" onclick="addMoreImageInput()">
                            <i class="fas fa-plus"></i>
                            <span>Add More Image</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Video Form -->
            <div id="videoFormSection" style="display: none;">
                <div class="admin-gallery-form-group">
                    <label class="admin-gallery-form-label">
                        Main Video <span class="required">*</span>
                    </label>
                    <input type="file" class="admin-gallery-form-input" id="mainVideo" name="main_video" accept="video/*" onchange="previewMainVideo(this)">
                    <small class="text-muted">Upload main video (1 video only)</small>
                    <div id="mainVideoPreview" class="admin-gallery-video-preview"></div>
                </div>
            </div>
        </form>
    </div>
    <div class="admin-gallery-panel-footer">
        <button type="button" class="admin-gallery-panel-btn cancel" onclick="closeGalleryPanel()"><span>Cancel</span></button>
        <button type="button" class="admin-gallery-panel-btn save" onclick="saveGallery()"><span>Save</span></button>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteGalleryModal" class="admin-gallery-delete-modal">
    <div class="admin-gallery-delete-content">
        <h3 class="admin-gallery-delete-title">Confirm Delete</h3>
        <p class="admin-gallery-delete-message" id="deleteGalleryMessage">
            Are you sure you want to delete this media? This action cannot be undone.
        </p>
        <div class="admin-gallery-delete-actions">
            <button type="button" class="admin-gallery-modal-btn cancel" onclick="closeDeleteGalleryModal()"><span>Cancel</span></button>
            <button type="button" class="admin-gallery-modal-btn delete" onclick="deleteGallery()"><span>Confirm Delete</span></button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Admin Gallery JS -->
<script src="{{ asset('frontend/admin-gallery.js') }}"></script>
@endpush
