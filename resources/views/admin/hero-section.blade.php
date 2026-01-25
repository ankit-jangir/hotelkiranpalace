@extends('admin.layout')

@section('title', 'Hero Section - Admin Dashboard')
@section('page-title', 'Hero Section')

@push('styles')
<!-- Admin Hero Section CSS -->
<link href="{{ asset('frontend/admin-hero.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="admin-hero-header-row">
                    <h5 class="admin-hero-title mb-0">Hero Section</h5>
                    <form method="GET" action="{{ route('admin.hero-section') }}" class="admin-hero-search-form">
                        <div class="admin-hero-search-wrapper">
                            <i class="fas fa-search admin-hero-search-icon"></i>
                            <input type="text" name="search" class="admin-hero-search-input" placeholder="Search by title or description..." value="{{ $search }}">
                            @if($search)
                            <a href="{{ route('admin.hero-section') }}" class="admin-hero-search-clear">
                                <i class="fas fa-times"></i>
                            </a>
                            @endif
                            <button type="submit" class="admin-hero-search-btn">
                                <i class="fas fa-search"></i>
                                <span>Search</span>
                            </button>
                        </div>
                    </form>
                    <div class="admin-add-hero-btn-wrapper">
                        <button type="button" class="admin-add-hero-btn" onclick="(window.openHeroModal || openHeroModal)()">
                            <i class="fas fa-plus"></i>
                            <span>Add Hero Section</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="admin-hero-table-container">
                    <div class="admin-hero-table-wrapper">
                        <table class="admin-hero-table table">
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Date & Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($heroSections as $index => $heroSection)
                                <tr>
                                    <td>{{ $heroSections->firstItem() + $index }}</td>
                                    <td>
                                        <p class="admin-hero-table-name">{{ $heroSection->title ?? 'N/A' }}</p>
                                    </td>
                                    <td>
                                        <p class="admin-hero-table-slug admin-hero-table-name-truncate" title="{{ $heroSection->description }}">{{ Str::limit($heroSection->description ?? 'N/A', 50) }}</p>
                                    </td>
                                    <td>
                                        <span class="badge {{ $heroSection->type === 'image' ? 'bg-primary' : 'bg-success' }}">
                                            {{ ucfirst($heroSection->type) }}
                                        </span>
                                    </td>
                                    <td>
                                        <label class="admin-hero-toggle-switch" onclick="event.stopPropagation(); (window.toggleHeroActive || toggleHeroActive)({{ $heroSection->id }}, event)">
                                            <input type="checkbox" {{ $heroSection->is_active ? 'checked' : '' }} data-hero-id="{{ $heroSection->id }}" readonly>
                                            <span class="admin-hero-toggle-slider">
                                                <span class="admin-hero-toggle-icon active-icon"><i class="fas fa-check"></i></span>
                                                <span class="admin-hero-toggle-icon inactive-icon"><i class="fas fa-times"></i></span>
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="admin-hero-date-main">{{ $heroSection->created_at->format('d M Y') }}</div>
                                        <div class="admin-hero-date-time">{{ $heroSection->created_at->format('h:i A') }}</div>
                                    </td>
                                    <td>
                                        <div class="admin-hero-action-menu">
                                            <button type="button" class="admin-hero-action-btn" onclick="toggleActionMenu(this)">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="admin-hero-action-dropdown">
                                                <button type="button" class="admin-hero-action-item view" onclick="(window.viewHeroSection || viewHeroSection)({{ $heroSection->id }})">
                                                    <i class="fas fa-eye"></i>
                                                    <span>View</span>
                                                </button>
                                                <button type="button" class="admin-hero-action-item edit" onclick="(window.editHeroSection || editHeroSection)({{ $heroSection->id }})">
                                                    <i class="fas fa-edit"></i>
                                                    <span>Edit</span>
                                                </button>
                                                <button type="button" class="admin-hero-action-item delete" onclick="(window.confirmDeleteHero || confirmDeleteHero)({{ $heroSection->id }}, '{{ $heroSection->title ?? 'Hero Section' }}')">
                                                    <i class="fas fa-trash"></i>
                                                    <span>Delete</span>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <p class="text-muted mb-0">No hero sections found. Click "Add Hero Section" to create your first hero section.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="admin-hero-pagination-wrapper">
                    <div class="admin-hero-pagination-left">
                        <label class="admin-hero-rows-label">Show rows per page</label>
                        <select class="form-select form-select-sm admin-hero-pagination-select" onchange="changeHeroPerPage(this.value)">
                            <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page', 10) == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page', 10) == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('per_page', 10) == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>
                    @if($heroSections->hasPages())
                    <div class="admin-hero-pagination-right">
                        <span class="admin-hero-pagination-info">
                            {{ $heroSections->firstItem() ?? 0 }}-{{ $heroSections->lastItem() ?? 0 }} of {{ $heroSections->total() }}
                        </span>
                        <div class="admin-hero-pagination-arrows">
                            {{ $heroSections->appends(request()->query())->links('vendor.pagination.bootstrap-5-custom') }}
                        </div>
                    </div>
                    @else
                    <div class="admin-hero-pagination-right">
                        <span class="admin-hero-pagination-info">
                            1-{{ $heroSections->count() }} of {{ $heroSections->total() }}
                        </span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Hero Section Panel (Right Side) -->
<div id="heroPanelOverlay" class="admin-hero-panel-overlay" onclick="(window.closeHeroPanel || closeHeroPanel)()"></div>
<div id="heroPanel" class="admin-hero-panel">
    <div class="admin-hero-panel-header">
        <h3 class="admin-hero-modal-title" id="heroModalTitle">Add New Hero Section</h3>
        <button type="button" class="admin-hero-panel-close" onclick="(window.closeHeroPanel || closeHeroPanel)()">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="admin-hero-panel-body">
        <form id="heroForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="heroId" name="hero_id">
            
            <!-- Type Selector -->
            <div class="admin-hero-form-group">
                <label class="admin-hero-form-label">
                    Select Type <span class="required">*</span>
                </label>
                <select name="type" id="hero_type" class="admin-hero-form-input" onchange="selectHeroType(this.value)">
                    <option value="image" selected>Image</option>
                    <option value="video">Video</option>
                </select>
            </div>

            <!-- Image Section -->
            <div id="imageSection" class="admin-hero-image-upload-section">
                <h5 class="admin-hero-section-title mb-3">Upload Images (Max 3)</h5>
                <div class="admin-hero-images-single-row">
                    @for($i = 1; $i <= 3; $i++)
                    <div class="admin-hero-image-card-single">
                        <div class="admin-hero-image-card-header">
                            <h6 class="admin-hero-image-item-title">Image {{ $i }}</h6>
                            <button type="button" class="admin-hero-remove-image-btn" onclick="removeImage({{ $i }})" style="display: none;" id="remove_btn_{{ $i }}">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="admin-hero-image-preview-wrapper">
                            <input type="file" name="image_{{ $i }}" id="image_{{ $i }}" class="admin-hero-form-input" accept="image/*" onchange="previewImage({{ $i }}, this)">
                            <input type="hidden" name="existing_image_{{ $i }}" id="existing_image_{{ $i }}">
                            <div class="admin-hero-image-preview-container">
                                <img id="preview_image_{{ $i }}" class="admin-hero-image-preview" style="display: none;" alt="Preview">
                            </div>
                        </div>
                        <div class="admin-hero-form-group">
                            <label class="admin-hero-form-label">Image {{ $i }} Title</label>
                            <input type="text" name="image_title_{{ $i }}" id="image_title_{{ $i }}" class="admin-hero-form-input" placeholder="Enter image title">
                        </div>
                        <div class="admin-hero-form-group">
                            <label class="admin-hero-form-label">Image {{ $i }} Description</label>
                            <textarea name="image_description_{{ $i }}" id="image_description_{{ $i }}" class="admin-hero-form-input admin-hero-form-textarea" rows="2" placeholder="Enter image description"></textarea>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>

            <!-- Video Section -->
            <div id="videoSection" class="admin-hero-image-upload-section" style="display: none;">
                <h5 class="admin-hero-section-title mb-3">Upload Video</h5>
                <div class="admin-hero-image-item">
                    <div class="admin-hero-form-group">
                        <label class="admin-hero-form-label">Video <span class="required">*</span></label>
                        <div class="admin-hero-video-preview-wrapper">
                            <input type="file" name="video" id="video" class="admin-hero-form-input" accept="video/*" onchange="previewVideo(this)">
                            <input type="hidden" name="existing_video" id="existing_video">
                            <button type="button" class="admin-hero-remove-video-btn" onclick="removeVideo()" style="display: none;" id="remove_video_btn">
                                <i class="fas fa-times"></i>
                            </button>
                            <div class="admin-hero-video-preview-container">
                                <video id="preview_video" class="admin-hero-video-preview" controls style="display: none;"></video>
                            </div>
                        </div>
                    </div>
                    <div class="admin-hero-form-group">
                        <label class="admin-hero-form-label">Video Title</label>
                        <input type="text" name="video_title" id="video_title" class="admin-hero-form-input" placeholder="Enter video title">
                    </div>
                    <div class="admin-hero-form-group">
                        <label class="admin-hero-form-label">Video Description</label>
                        <textarea name="video_description" id="video_description" class="admin-hero-form-input admin-hero-form-textarea" rows="3" placeholder="Enter video description"></textarea>
                    </div>
                    <div class="admin-hero-form-group">
                        <label class="admin-hero-form-label">Video Extra</label>
                        <input type="text" name="video_extra" id="video_extra" class="admin-hero-form-input" placeholder="Enter extra information">
                    </div>
                </div>
            </div>

            <!-- Common Fields -->
            <div class="admin-hero-form-group">
                <label class="admin-hero-form-label">Title</label>
                <input type="text" name="title" id="hero_title" class="admin-hero-form-input" placeholder="Enter hero section title">
            </div>
            <div class="admin-hero-form-group">
                <label class="admin-hero-form-label">Description</label>
                <textarea name="description" id="hero_description" class="admin-hero-form-input admin-hero-form-textarea" rows="3" placeholder="Enter hero section description"></textarea>
            </div>
            <div class="admin-hero-form-group">
                <label class="admin-hero-form-label">Order</label>
                <input type="number" name="order" id="hero_order" class="admin-hero-form-input" value="0" min="0">
            </div>
            <div class="admin-hero-form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_active" id="hero_is_active" checked>
                    <label class="form-check-label admin-hero-form-label" for="hero_is_active">Active</label>
                </div>
            </div>
        </form>
    </div>
    <div class="admin-hero-panel-footer">
        <button type="button" class="admin-hero-panel-btn cancel" onclick="(window.closeHeroPanel || closeHeroPanel)()"><span>Cancel</span></button>
        <button type="button" class="admin-hero-panel-btn save" onclick="(window.saveHeroSection || saveHeroSection)()"><span>Save</span></button>
    </div>
</div>

<!-- View Hero Section Modal -->
<div id="viewHeroModal" class="admin-hero-view-modal" onclick="if(event.target === this) (window.closeViewHeroModal || closeViewHeroModal)()">
    <div class="admin-hero-view-content">
        <div class="admin-hero-modal-header">
            <h3 class="admin-hero-modal-title">Hero Section Details</h3>
            <button type="button" class="admin-hero-modal-close" onclick="(window.closeViewHeroModal || closeViewHeroModal)()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="admin-hero-view-body" id="viewHeroBody">
            <!-- Content will be loaded here -->
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteHeroModal" class="admin-hero-delete-modal">
    <div class="admin-hero-delete-content">
        <h3 class="admin-hero-delete-title">Confirm Delete</h3>
        <p class="admin-hero-delete-message" id="deleteHeroMessage">
            Are you sure you want to delete this hero section? This action cannot be undone.
        </p>
        <div class="admin-hero-delete-actions">
            <button type="button" class="admin-hero-modal-btn cancel" onclick="(window.closeDeleteHeroModal || closeDeleteHeroModal)()">Cancel</button>
            <button type="button" class="admin-hero-modal-btn save" style="background: #dc3545;" onclick="(window.deleteHero || deleteHero)()">Confirm Delete</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Admin Hero Section JS -->
<script src="{{ asset('frontend/admin-hero.js') }}"></script>
<script>
    // Verify functions are loaded
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Hero Section Functions Check:');
        console.log('toggleHeroActive:', typeof toggleHeroActive);
        console.log('openHeroModal:', typeof openHeroModal);
        console.log('editHeroSection:', typeof editHeroSection);
        console.log('viewHeroSection:', typeof viewHeroSection);
        console.log('confirmDeleteHero:', typeof confirmDeleteHero);
        
        // If functions are not available, try window object
        if (typeof toggleHeroActive === 'undefined' && typeof window.toggleHeroActive !== 'undefined') {
            window.toggleHeroActive = window.toggleHeroActive;
        }
    });
</script>
@endpush
