@extends('admin.layout')

@section('title', 'Rooms - Admin Dashboard')
@section('page-title', 'Rooms')

@push('styles')
<!-- Admin Rooms CSS -->
<link href="{{ asset('frontend/admin-rooms.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="admin-rooms-header-row">
                    <h5 class="admin-rooms-title mb-0">Rooms</h5>
                    <form method="GET" action="{{ route('admin.rooms') }}" class="admin-rooms-search-form">
                        <div class="admin-rooms-search-wrapper">
                            <i class="fas fa-search admin-rooms-search-icon"></i>
                            <input type="text" name="search" class="admin-rooms-search-input"
                                placeholder="Search by title or description..." value="{{ $search ?? '' }}">
                            @if (!empty($search))
                            <a href="{{ route('admin.rooms') }}" class="admin-rooms-search-clear">
                                <i class="fas fa-times"></i>
                            </a>
                            @endif
                            <button type="submit" class="admin-rooms-search-btn">
                                <i class="fas fa-search"></i>
                                <span>Search</span>
                            </button>
                        </div>
                    </form>
                    <div class="admin-add-rooms-btn-wrapper">
                        <button type="button" class="admin-add-rooms-btn"
                            onclick="event.preventDefault(); event.stopPropagation(); if(typeof window.openRoomModal === 'function') { window.openRoomModal(); } else { console.error('openRoomModal not found'); alert('Please refresh the page. Function not loaded.'); }">
                            <i class="fas fa-plus"></i>
                            <span>Add Room</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="admin-rooms-table-container">
                    <div class="admin-rooms-table-wrapper">
                        <table class="admin-rooms-table table">
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Photo</th>
                                    <th>Room Title</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Type</th>
                                    <th>Discount Price</th>
                                    <th>Status</th>
                                    <th>Date & Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse(isset($rooms) && $rooms->count() > 0 ? $rooms : [] as $index => $room)
                                <tr>
                                    <td>{{ isset($rooms) && $rooms->firstItem() ? $rooms->firstItem() + $index : $index + 1 }}
                                    </td>
                                    <td>
                                        @if ($room->main_image)
                                        <img src="{{ asset('storage/' . $room->main_image) }}" alt="{{ $room->title }}"
                                            class="admin-rooms-thumbnail"
                                            onerror="this.onerror=null; this.parentElement.innerHTML='<div class=\'admin-rooms-thumbnail-placeholder\'><i class=\'fas fa-image\'></i></div>';">
                                        @else
                                        <div class="admin-rooms-thumbnail-placeholder">
                                            <i class="fas fa-image"></i>
                                        </div>
                                        @endif
                                    </td>

                                    <td>
                                        <p class="admin-rooms-table-name">{{ $room->title ?? 'N/A' }}</p>
                                    </td>
                                    <td>
                                        <p class="admin-rooms-table-slug" title="{{ $room->slug ?? 'N/A' }}">
                                            {{ Str::limit($room->slug ?? 'N/A', 30) }}</p>
                                    </td>
                                    <td>
                                        <p class="admin-rooms-table-slug admin-rooms-table-name-truncate"
                                            title="{{ strip_tags($room->description ?? '') }}">
                                            {{ Str::limit(strip_tags($room->description ?? 'N/A'), 50) }}</p>
                                    </td>
                                    <td>
                                        <div class="admin-rooms-price-wrapper">
                                            @if ($room->discount_price && $room->discount_price < $room->price)
                                                <div class="admin-rooms-price-display">
                                                    <div class="admin-rooms-price-label">Price:</div>
                                                    <div class="admin-rooms-price-original">
                                                        <span
                                                            class="admin-rooms-price-strikethrough">₹{{ number_format($room->price ?? 0, 2) }}</span>
                                                    </div>
                                                    <div class="admin-rooms-price-label discount-label">Discount:
                                                    </div>
                                                    <div class="admin-rooms-price-discount">
                                                        <span
                                                            class="admin-rooms-discount-price">₹{{ number_format($room->discount_price, 2) }}</span>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="admin-rooms-price-display">
                                                    <div class="admin-rooms-price-label">Price:</div>
                                                    <div class="admin-rooms-price-normal">
                                                        <span
                                                            class="admin-rooms-price">₹{{ number_format($room->price ?? 0, 2) }}</span>
                                                    </div>
                                                </div>
                                                @endif
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $room->type ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        @if ($room->discount_price && $room->discount_price < $room->price)
                                            <div class="admin-rooms-discount-display">
                                                <div class="admin-rooms-discount-badge">
                                                    <span class="admin-rooms-discount-percentage">
                                                        {{ round((($room->price - $room->discount_price) / $room->price) * 100) }}%
                                                        OFF
                                                    </span>
                                                </div>
                                                <div class="admin-rooms-save-amount">
                                                    Save
                                                    ₹{{ number_format($room->price - $room->discount_price, 2) }}
                                                </div>
                                            </div>
                                            @else
                                            <span class="text-muted">No Discount</span>
                                            @endif
                                    </td>
                                    <td>
                                        <label class="admin-rooms-toggle-switch"
                                            onclick="event.stopPropagation(); (window.toggleRoomActive || toggleRoomActive)({{ $room->id }}, event)">
                                            <input type="checkbox" {{ $room->is_active ? 'checked' : '' }}
                                                data-room-id="{{ $room->id }}" readonly>
                                            <span class="admin-rooms-toggle-slider">
                                                <span class="admin-rooms-toggle-icon active-icon"><i
                                                        class="fas fa-check"></i></span>
                                                <span class="admin-rooms-toggle-icon inactive-icon"><i
                                                        class="fas fa-times"></i></span>
                                            </span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="admin-rooms-date-main">{{ $room->created_at->format('d M Y') }}
                                        </div>
                                        <div class="admin-rooms-date-time">{{ $room->created_at->format('h:i A') }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="admin-rooms-action-menu">
                                            <button type="button" class="admin-rooms-action-btn"
                                                onclick="event.stopPropagation(); if(typeof window.toggleRoomActionMenu === 'function') { window.toggleRoomActionMenu(this); } else { console.error('toggleRoomActionMenu not found'); }">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="admin-rooms-action-dropdown">
                                                <button type="button" class="admin-rooms-action-item view"
                                                    onclick="event.stopPropagation(); (window.viewRoom || viewRoom)({{ $room->id }})">
                                                    <i class="fas fa-eye"></i>
                                                    <span>View</span>
                                                </button>
                                                <button type="button" class="admin-rooms-action-item edit"
                                                    onclick="event.stopPropagation(); (window.editRoom || editRoom)({{ $room->id }})">
                                                    <i class="fas fa-edit"></i>
                                                    <span>Edit</span>
                                                </button>
                                                <button type="button" class="admin-rooms-action-item delete"
                                                    onclick="event.stopPropagation(); (window.confirmDeleteRoom || confirmDeleteRoom)({{ $room->id }}, '{{ addslashes($room->title ?? 'Room') }}')">
                                                    <i class="fas fa-trash"></i>
                                                    <span>Delete</span>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="11" class="text-center py-5">
                                        <p class="text-muted mb-0">No rooms found. Click "Add Room" to create your
                                            first room.</p>
                                    </td>
                                </tr>
                                @endforelse
                                @if (!isset($rooms) || $rooms->count() == 0)
                                <tr>
                                    <td colspan="11" class="text-center py-5">
                                        <p class="text-muted mb-0">No rooms found. Click "Add Room" to create your
                                            first room.</p>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="admin-rooms-pagination-wrapper">
                    <div class="admin-rooms-pagination-left">
                        <label class="admin-rooms-rows-label">Show rows per page</label>
                        <select class="form-select form-select-sm admin-rooms-pagination-select"
                            onchange="changeRoomPerPage(this.value)">
                            <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page', 10) == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page', 10) == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('per_page', 10) == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>
                    @if (isset($rooms) && $rooms->hasPages())
                    <div class="admin-rooms-pagination-right">
                        <span class="admin-rooms-pagination-info">
                            {{ $rooms->firstItem() ?? 0 }}-{{ $rooms->lastItem() ?? 0 }} of {{ $rooms->total() }}
                        </span>
                        <div class="admin-rooms-pagination-arrows">
                            {{ $rooms->appends(request()->query())->links('vendor.pagination.bootstrap-5-custom') }}
                        </div>
                    </div>
                    @elseif(isset($rooms) && $rooms->count() > 0)
                    <div class="admin-rooms-pagination-right">
                        <span class="admin-rooms-pagination-info">
                            1-{{ $rooms->count() }} of {{ $rooms->count() }}
                        </span>
                    </div>
                    @else
                    <div class="admin-rooms-pagination-right">
                        <span class="admin-rooms-pagination-info">
                            0-0 of 0
                        </span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Room Panel (Right Side) -->
<div id="roomPanelOverlay" class="admin-rooms-panel-overlay" onclick="(window.closeRoomPanel || closeRoomPanel)()">
</div>
<div id="roomPanel" class="admin-rooms-panel">
    <div class="admin-rooms-panel-header">
        <h3 class="admin-rooms-modal-title" id="roomModalTitle">Add New Room</h3>
        <button type="button" class="admin-rooms-panel-close" onclick="(window.closeRoomPanel || closeRoomPanel)()">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="admin-rooms-panel-body">
        <form id="roomForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="roomId" name="room_id">

            <!-- Room Title -->
            <div class="admin-rooms-form-group">
                <label class="admin-rooms-form-label">
                    Room Title <span class="required">*</span>
                </label>
                <input type="text" name="title" id="room_title" class="admin-rooms-form-input"
                    placeholder="Enter room title" required onkeyup="generateRoomSlug(this.value)">
            </div>

            <!-- Slug -->
            <div class="admin-rooms-form-group">
                <label class="admin-rooms-form-label">
                    Slug <span class="required">*</span>
                    <small class="text-muted" style="font-weight: normal; font-size: 0.85rem;">(URL-friendly
                        identifier)</small>
                </label>
                <input type="text" name="slug" id="room_slug" class="admin-rooms-form-input"
                    placeholder="e.g., deluxe-room" required>
            </div>

            <!-- Description -->
            <div class="admin-rooms-form-group">
                <label class="admin-rooms-form-label">
                    Description <span class="required">*</span>
                </label>
                <div class="admin-rooms-quill-container">
                    <div id="roomDescriptionEditor" class="admin-rooms-quill-editor"></div>
                </div>
                <input type="hidden" name="description" id="room_description">
            </div>

            <!-- Price and Discount Price Row -->
            <div class="admin-rooms-form-row">
                <div class="admin-rooms-form-group">
                    <label class="admin-rooms-form-label">
                        Price <span class="required">*</span>
                    </label>
                    <input type="number" name="price" id="room_price" class="admin-rooms-form-input" placeholder="0.00"
                        step="0.01" min="0" required>
                </div>
                <div class="admin-rooms-form-group">
                    <label class="admin-rooms-form-label">Discount Price</label>
                    <input type="number" name="discount_price" id="room_discount_price" class="admin-rooms-form-input"
                        placeholder="0.00" step="0.01" min="0">
                </div>
            </div>

            <!-- Type and Available Rooms Row -->
            <div class="admin-rooms-form-row">
                <div class="admin-rooms-form-group">
                    <label class="admin-rooms-form-label">Room Type</label>
                    <input type="text" name="type" id="room_type" class="admin-rooms-form-input"
                        placeholder="e.g., Deluxe, Suite">
                </div>
                <div class="admin-rooms-form-group">
                    <label class="admin-rooms-form-label">
                        Available Rooms <span class="required">*</span>
                    </label>
                    <input type="number" name="available_rooms" id="room_available_rooms" class="admin-rooms-form-input"
                        placeholder="0" min="0" required>
                </div>
            </div>

            <!-- Main Image -->
            <div class="admin-rooms-form-group">
                <label class="admin-rooms-form-label">
                    Main Image <span class="required">*</span>
                </label>
                <div class="admin-rooms-image-preview-wrapper">
                    <input type="file" name="main_image" id="main_image" class="admin-rooms-form-input" accept="image/*"
                        onchange="previewMainRoomImage(this)">
                    <input type="hidden" name="existing_main_image" id="existing_main_image">
                    <button type="button" class="admin-rooms-remove-image-btn" onclick="removeMainRoomImage()"
                        style="display: none;" id="remove_main_image_btn">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="admin-rooms-image-preview-container">
                        <img id="preview_main_image" class="admin-rooms-image-preview" style="display: none;"
                            alt="Preview">
                    </div>
                </div>
            </div>

            <!-- Sub Images -->
            <div class="admin-rooms-form-group">
                <label class="admin-rooms-form-label">Sub Images (Multiple)</label>
                <div class="admin-rooms-sub-images-wrapper">
                    <input type="file" name="sub_images[]" id="sub_images" class="admin-rooms-form-input"
                        accept="image/*" multiple onchange="previewSubRoomImages(this)">
                    <input type="hidden" name="existing_sub_images" id="existing_sub_images">
                    <div class="admin-rooms-sub-images-preview" id="sub_images_preview">
                        <!-- Sub images preview will be added here -->
                    </div>
                </div>
            </div>

            <!-- Facilities -->
            <div class="admin-rooms-form-group">
                <label class="admin-rooms-form-label">Facilities</label>
                <div id="roomFacilitiesContainer">
                    <div class="admin-rooms-facility-item">
                        <input type="text" name="facilities[]" class="admin-rooms-form-input"
                            placeholder="Enter facility">
                        <button type="button" class="admin-rooms-remove-facility-btn" onclick="removeRoomFacility(this)"
                            style="display: none;">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <button type="button" class="admin-rooms-add-facility-btn" onclick="addRoomFacility()">
                    <i class="fas fa-plus"></i>
                    <span>Add Facility</span>
                </button>
            </div>

            <!-- Special Offer (Rich Text Editor) -->
            <div class="admin-rooms-form-group">
                <label class="admin-rooms-form-label">Special Offer</label>
                <div id="roomEditMessageEditor" style="min-height: 200px;"></div>
                <input type="hidden" name="edit_message" id="room_edit_message">
            </div>
        </form>
    </div>
    <div class="admin-rooms-panel-footer">
        <button type="button" class="admin-rooms-panel-btn cancel"
            onclick="(window.closeRoomPanel || closeRoomPanel)()"><span>Cancel</span></button>
        <button type="button" class="admin-rooms-panel-btn save"
            onclick="(window.saveRoom || saveRoom)()"><span>Save</span></button>
    </div>
</div>

<!-- View Room Panel (Right Side - Same as Edit Form) -->
<div id="viewRoomPanelOverlay" class="admin-rooms-panel-overlay"
    onclick="(window.closeViewRoomModal || closeViewRoomModal)()"></div>
<div id="viewRoomPanel" class="admin-rooms-panel">
    <div class="admin-rooms-panel-header">
        <h3 class="admin-rooms-modal-title">Room Details</h3>
        <button type="button" class="admin-rooms-panel-close"
            onclick="(window.closeViewRoomModal || closeViewRoomModal)()">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="admin-rooms-panel-body">
        <div id="viewRoomBody" style="overflow-y: auto; max-height: calc(100vh - 200px);">
            <!-- Content will be loaded here -->
        </div>
    </div>
    <div class="admin-rooms-panel-footer">
        <button type="button" class="admin-rooms-panel-btn cancel"
            onclick="(window.closeViewRoomModal || closeViewRoomModal)()"><span>Close</span></button>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteRoomModal" class="admin-rooms-delete-modal">
    <div class="admin-rooms-delete-content">
        <h3 class="admin-rooms-delete-title">Confirm Delete</h3>
        <p class="admin-rooms-delete-message" id="deleteRoomMessage">
            Are you sure you want to delete this room? This action cannot be undone.
        </p>
        <div class="admin-rooms-delete-actions">
            <button type="button" class="admin-rooms-modal-btn cancel"
                onclick="(window.closeDeleteRoomModal || closeDeleteRoomModal)()">Cancel</button>
            <button type="button" class="admin-rooms-modal-btn save" style="background: #dc3545;"
                onclick="(window.deleteRoom || deleteRoom)()">Confirm Delete</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Quill Editor -->
<script src="{{ asset('frontend/common.js') }}"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<!-- Admin Rooms JS -->
<script src="{{ asset('frontend/admin-rooms.js') }}?v={{ time() }}"></script>
<script>
// Verify functions are loaded immediately after script loads
(function() {
    function checkFunctions() {
        var functionsLoaded = {
            openRoomModal: typeof window.openRoomModal !== 'undefined',
            toggleRoomActionMenu: typeof window.toggleRoomActionMenu !== 'undefined',
            editRoom: typeof window.editRoom !== 'undefined',
            viewRoom: typeof window.viewRoom !== 'undefined',
            confirmDeleteRoom: typeof window.confirmDeleteRoom !== 'undefined'
        };

        var allLoaded = Object.values(functionsLoaded).every(function(val) {
            return val === true;
        });

        if (allLoaded) {
            console.log('✓ All room functions loaded successfully:', functionsLoaded);
        } else {
            console.warn('⚠ Some functions not loaded:', functionsLoaded);
            // Retry after a short delay
            setTimeout(checkFunctions, 100);
        }
    }

    // Check immediately
    checkFunctions();
})();
</script>
@endpush