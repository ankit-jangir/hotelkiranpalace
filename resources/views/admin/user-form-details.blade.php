@extends('admin.layout')

@section('title', 'User Form Details - Admin Dashboard')
@section('page-title', 'User Form Details')

@push('styles')
<!-- Admin Gallery CSS (includes contact styles) -->
<link href="{{ asset('frontend/admin-gallery.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="admin-gallery-header-row">
                    <h5 class="admin-gallery-title mb-0">User Form Details</h5>
                    <form method="GET" action="{{ route('admin.user-form-details') }}" class="admin-gallery-search-form">
                        <div class="admin-gallery-search-wrapper">
                            <i class="fas fa-search admin-gallery-search-icon"></i>
                            <input type="text" name="search" class="admin-gallery-search-input" placeholder="Search by name, email or phone..." value="{{ $search }}">
                            @if($search)
                            <a href="{{ route('admin.user-form-details') }}" class="admin-gallery-search-clear">
                                <i class="fas fa-times"></i>
                            </a>
                            @endif
                            <button type="submit" class="admin-gallery-search-btn">
                                <i class="fas fa-search"></i>
                                <span>Search</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="admin-gallery-table-container">
                    <div class="admin-gallery-table-wrapper">
                        <table class="admin-gallery-table table">
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Room Type</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($contacts as $index => $contact)
                                <tr>
                                    <td>{{ $contacts->firstItem() + $index }}</td>
                                    <td>
                                        <p class="admin-gallery-table-name admin-gallery-table-name-truncate" title="{{ $contact->name }}">{{ $contact->name }}</p>
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $contact->email }}" class="admin-gallery-table-email-link" title="{{ $contact->email }}">
                                            <p class="admin-gallery-table-slug admin-gallery-table-email">{{ $contact->email }}</p>
                                        </a>
                                    </td>
                                    <td>
                                        <p class="admin-gallery-table-slug">{{ $contact->country_code }} {{ $contact->phone }}</p>
                                    </td>
                                    <td>
                                        @php
                                            $roomTypes = [
                                                'deluxe' => 'Deluxe Room',
                                                'suite' => 'Suite',
                                                'executive' => 'Executive Room',
                                                'presidential' => 'Presidential Suite'
                                            ];
                                        @endphp
                                        <span class="admin-gallery-type-badge {{ $contact->room_type ?? '' }}">
                                            {{ $contact->room_type ? ($roomTypes[$contact->room_type] ?? ucfirst($contact->room_type)) : 'N/A' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="admin-gallery-date-main">{{ $contact->created_at->format('d M Y') }}</div>
                                        <div class="admin-gallery-date-time">{{ $contact->created_at->format('h:i A') }}</div>
                                    </td>
                                    <td>
                                        <div class="admin-gallery-action-menu">
                                            <button type="button" class="admin-gallery-action-btn" onclick="toggleContactActionMenu(this)">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="admin-gallery-action-dropdown">
                                                <button type="button" class="admin-gallery-action-item view" onclick="viewContact({{ $contact->id }})">
                                                    <i class="fas fa-eye"></i>
                                                    <span>View</span>
                                                </button>
                                                <button type="button" class="admin-gallery-action-item delete" onclick="confirmDeleteContact({{ $contact->id }}, '{{ $contact->name }}')">
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
                                        <p class="text-muted mb-0">No contact submissions found.</p>
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
                        <span class="admin-gallery-pagination-total">Total: {{ $contacts->total() }}</span>
                        <label class="admin-gallery-rows-label">Show rows per page</label>
                        <select class="form-select form-select-sm admin-gallery-pagination-select" onchange="changeContactPerPage(this.value)">
                            <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page', 10) == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page', 10) == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('per_page', 10) == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>
                    @if($contacts->hasPages())
                    <div class="admin-gallery-pagination-right">
                        <span class="admin-gallery-pagination-info">
                            {{ $contacts->firstItem() ?? 0 }}-{{ $contacts->lastItem() ?? 0 }} of {{ $contacts->total() }}
                        </span>
                        <div class="admin-gallery-pagination-arrows">
                            {{ $contacts->appends(request()->query())->links('vendor.pagination.bootstrap-5-custom') }}
                        </div>
                    </div>
                    @else
                    <div class="admin-gallery-pagination-right">
                        <span class="admin-gallery-pagination-info">
                            1-{{ $contacts->count() }} of {{ $contacts->total() }}
                        </span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- View Contact Modal -->
<div id="viewContactModal" class="admin-gallery-view-modal">
    <div class="admin-gallery-view-content">
        <div class="admin-gallery-modal-header">
            <h3 class="admin-gallery-modal-title">Contact Details</h3>
            <button type="button" class="admin-gallery-modal-close" onclick="closeViewContactModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="admin-gallery-view-body">
            <div id="viewContactContent"></div>
        </div>
    </div>
</div>
<div id="viewContactModalOverlay" class="admin-gallery-view-modal-overlay" onclick="closeViewContactModal()"></div>

<!-- Delete Confirmation Modal -->
<div id="deleteContactModal" class="admin-gallery-delete-modal">
    <div class="admin-gallery-delete-content">
        <h3 class="admin-gallery-delete-title">Confirm Delete</h3>
        <p class="admin-gallery-delete-message" id="deleteContactMessage">
            Are you sure you want to delete this contact? This action cannot be undone.
        </p>
        <div class="admin-gallery-delete-actions">
            <button type="button" class="admin-gallery-modal-btn cancel" onclick="closeDeleteContactModal()"><span>Cancel</span></button>
            <button type="button" class="admin-gallery-modal-btn delete" onclick="deleteContact()"><span>Confirm Delete</span></button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Admin Gallery JS (includes contact functions) -->
<script src="{{ asset('frontend/admin-gallery.js') }}"></script>
<script>
// Change Contact Per Page
function changeContactPerPage(perPage) {
    const url = new URL(window.location.href);
    url.searchParams.set('per_page', perPage);
    window.location.href = url.toString();
}

// Toggle Contact Action Menu
function toggleContactActionMenu(button) {
    const dropdown = button.nextElementSibling;
    const allDropdowns = document.querySelectorAll('.admin-gallery-action-dropdown');
    
    allDropdowns.forEach(d => {
        if (d !== dropdown) {
            d.classList.remove('show');
        }
    });
    
    if (dropdown.classList.contains('show')) {
        dropdown.classList.remove('show');
    } else {
        const rect = button.getBoundingClientRect();
        dropdown.style.top = (rect.bottom + 5) + 'px';
        dropdown.style.left = (rect.right - 180) + 'px';
        dropdown.classList.add('show');
    }
}

// View Contact
function viewContact(id) {
    closeAllModals();
    
    setTimeout(() => {
        fetch(`/admin/contacts/${id}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const contact = data.contact;
                    const content = document.getElementById('viewContactContent');
                    
                    const roomTypeMap = {
                        'deluxe': 'Deluxe Room',
                        'suite': 'Suite',
                        'executive': 'Executive Room',
                        'presidential': 'Presidential Suite'
                    };
                    
                    // Escape HTML to prevent XSS
                    const escapeHtml = (text) => {
                        const div = document.createElement('div');
                        div.textContent = text;
                        return div.innerHTML;
                    };
                    
                    // Format date
                    const formatDate = (dateString) => {
                        if (!dateString) return 'N/A';
                        const date = new Date(dateString);
                        return date.toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
                    };
                    
                    content.innerHTML = `
                        <div class="admin-contact-view-container">
                            <div class="admin-contact-view-section">
                                <h4 class="admin-contact-section-title">
                                    <i class="fas fa-user"></i> Personal Information
                                </h4>
                                <div class="admin-contact-view-grid">
                                    <div class="admin-contact-view-item">
                                        <div class="admin-contact-view-label">
                                            <i class="fas fa-user-circle"></i> Name
                                        </div>
                                        <div class="admin-contact-view-value">${escapeHtml(contact.name || 'N/A')}</div>
                                    </div>
                                    <div class="admin-contact-view-item">
                                        <div class="admin-contact-view-label">
                                            <i class="fas fa-envelope"></i> Email
                                        </div>
                                        <div class="admin-contact-view-value">
                                            <a href="mailto:${escapeHtml(contact.email || '')}" class="admin-contact-email-link">${escapeHtml(contact.email || 'N/A')}</a>
                                        </div>
                                    </div>
                                    <div class="admin-contact-view-item">
                                        <div class="admin-contact-view-label">
                                            <i class="fas fa-phone"></i> Phone
                                        </div>
                                        <div class="admin-contact-view-value">
                                            <a href="tel:${escapeHtml(contact.country_code || '')}${escapeHtml(contact.phone || '')}" class="admin-contact-phone-link">${escapeHtml(contact.country_code || '')} ${escapeHtml(contact.phone || 'N/A')}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            ${contact.room_type ? `
                            <div class="admin-contact-view-section">
                                <h4 class="admin-contact-section-title">
                                    <i class="fas fa-bed"></i> Booking Details
                                </h4>
                                <div class="admin-contact-view-grid">
                                    <div class="admin-contact-view-item">
                                        <div class="admin-contact-view-label">
                                            <i class="fas fa-door-open"></i> Room Type
                                        </div>
                                        <div class="admin-contact-view-value">
                                            <span class="admin-contact-room-badge">${escapeHtml(roomTypeMap[contact.room_type] || contact.room_type)}</span>
                                        </div>
                                    </div>
                                    ${contact.checkin_date ? `
                                    <div class="admin-contact-view-item">
                                        <div class="admin-contact-view-label">
                                            <i class="fas fa-calendar-check"></i> Check-in Date
                                        </div>
                                        <div class="admin-contact-view-value">${formatDate(contact.checkin_date)}</div>
                                    </div>
                                    ` : ''}
                                    ${contact.checkout_date ? `
                                    <div class="admin-contact-view-item">
                                        <div class="admin-contact-view-label">
                                            <i class="fas fa-calendar-times"></i> Check-out Date
                                        </div>
                                        <div class="admin-contact-view-value">${formatDate(contact.checkout_date)}</div>
                                    </div>
                                    ` : ''}
                                </div>
                            </div>
                            ` : ''}
                            
                            ${contact.comments ? `
                            <div class="admin-contact-view-section">
                                <h4 class="admin-contact-section-title">
                                    <i class="fas fa-comment-dots"></i> Message / Comments
                                </h4>
                                <div class="admin-contact-message-box">
                                    <p class="admin-contact-message-text">${escapeHtml(contact.comments).replace(/\n/g, '<br>')}</p>
                                </div>
                            </div>
                            ` : ''}
                            
                            <div class="admin-contact-view-section">
                                <h4 class="admin-contact-section-title">
                                    <i class="fas fa-info-circle"></i> Submission Details
                                </h4>
                                <div class="admin-contact-view-grid">
                                    <div class="admin-contact-view-item">
                                        <div class="admin-contact-view-label">
                                            <i class="fas fa-clock"></i> Submitted Date
                                        </div>
                                        <div class="admin-contact-view-value">${formatDate(contact.created_at)} at ${new Date(contact.created_at).toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit' })}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    
                    document.getElementById('viewContactModalOverlay').classList.add('show');
                    document.getElementById('viewContactModal').classList.add('show');
                    document.body.style.overflow = 'hidden';
                } else {
                    toast('error', data.message || 'Failed to load contact');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toast('error', 'An error occurred while loading contact');
            });
    }, 300);
}

// Close View Contact Modal
function closeViewContactModal() {
    document.getElementById('viewContactModal').classList.remove('show');
    const overlay = document.getElementById('viewContactModalOverlay');
    if (overlay) overlay.classList.remove('show');
    document.body.style.overflow = '';
}

// Delete Contact Variables
let deleteContactId = null;

// Confirm Delete Contact
function confirmDeleteContact(id, name) {
    closeAllModals();
    
    setTimeout(() => {
        deleteContactId = id;
        const messageEl = document.getElementById('deleteContactMessage');
        if (messageEl) {
            messageEl.textContent = `Are you sure you want to delete contact from "${name}"? This action cannot be undone.`;
        }
        
        const deleteModal = document.getElementById('deleteContactModal');
        if (deleteModal) {
            deleteModal.classList.add('show');
            document.body.style.overflow = 'hidden';
        }
    }, 300);
}

// Close Delete Contact Modal
function closeDeleteContactModal() {
    const deleteModal = document.getElementById('deleteContactModal');
    if (deleteModal) {
        deleteModal.classList.remove('show');
        document.body.style.overflow = '';
    }
    deleteContactId = null;
}

// Delete Contact
function deleteContact() {
    if (!deleteContactId) return;
    
    fetch(`/admin/contacts/${deleteContactId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            toast('success', data.message || 'Contact deleted successfully!');
            closeDeleteContactModal();
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            toast('error', data.message || 'Failed to delete contact');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        toast('error', 'An error occurred while deleting contact');
    });
}

// Close action menus when clicking outside
document.addEventListener('click', function(e) {
    if (!e.target.closest('.admin-gallery-action-menu')) {
        document.querySelectorAll('.admin-gallery-action-dropdown').forEach(dropdown => {
            dropdown.classList.remove('show');
        });
    }
    
    // Close view modal when clicking overlay
    if (e.target.id === 'viewContactModalOverlay') {
        closeViewContactModal();
    }
});
</script>
@endpush
