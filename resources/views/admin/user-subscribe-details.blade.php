@extends('admin.layout')

@section('title', 'User Subscribe Details - Admin Dashboard')
@section('page-title', 'User Subscribe Details')

@push('styles')
<!-- Admin Gallery CSS (includes subscription styles) -->
<link href="{{ asset('frontend/admin-gallery.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="admin-gallery-header-row">
                    <h5 class="admin-gallery-title mb-0">User Subscribe Details</h5>
                    <div class="admin-subscribe-header-actions">
                        <form method="GET" action="{{ route('admin.user-subscribe-details') }}" class="admin-gallery-search-form">
                            <div class="admin-gallery-search-wrapper">
                                <i class="fas fa-search admin-gallery-search-icon"></i>
                                <input type="text" name="search" class="admin-gallery-search-input" placeholder="Search by email..." value="{{ $search }}">
                                @if($search)
                                <a href="{{ route('admin.user-subscribe-details') }}" class="admin-gallery-search-clear">
                                    <i class="fas fa-times"></i>
                                </a>
                                @endif
                                <button type="submit" class="admin-gallery-search-btn">
                                    <i class="fas fa-search"></i>
                                    <span>Search</span>
                                </button>
                            </div>
                        </form>
                        <button type="button" class="admin-subscribe-delete-selected-btn" id="deleteSelectedBtn" onclick="confirmDeleteSelectedSubscriptions()" style="display: none;">
                            <i class="fas fa-trash"></i>
                            <span>Delete Selected</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="admin-gallery-table-container">
                    <div class="admin-gallery-table-wrapper">
                        <table class="admin-gallery-table admin-subscribe-table table">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="selectAllSubscriptions" onchange="toggleSelectAllSubscriptions(this)">
                                    </th>
                                    <th>Sr. No</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($subscriptions as $index => $subscription)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="subscription-checkbox" value="{{ $subscription->id }}" onchange="updateDeleteButton()">
                                    </td>
                                    <td>{{ $subscriptions->firstItem() + $index }}</td>
                                    <td>
                                        <a href="mailto:{{ $subscription->email }}" class="admin-gallery-table-email-link" title="{{ $subscription->email }}">
                                            <p class="admin-gallery-table-name admin-gallery-table-email">{{ $subscription->email }}</p>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="admin-gallery-date-main">{{ $subscription->created_at->format('d M Y') }}</div>
                                        <div class="admin-gallery-date-time">{{ $subscription->created_at->format('h:i A') }}</div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5">
                                        <p class="text-muted mb-0">No subscriptions found.</p>
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
                        <span class="admin-gallery-pagination-total">Total: {{ $subscriptions->total() }}</span>
                        <label class="admin-gallery-rows-label">Show rows per page</label>
                        <select class="form-select form-select-sm admin-gallery-pagination-select" onchange="changeSubscriptionPerPage(this.value)">
                            <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                            <option value="25" {{ request('per_page', 10) == 25 ? 'selected' : '' }}>25</option>
                            <option value="50" {{ request('per_page', 10) == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('per_page', 10) == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>
                    @if($subscriptions->hasPages())
                    <div class="admin-gallery-pagination-right">
                        <span class="admin-gallery-pagination-info">
                            {{ $subscriptions->firstItem() ?? 0 }}-{{ $subscriptions->lastItem() ?? 0 }} of {{ $subscriptions->total() }}
                        </span>
                        <div class="admin-gallery-pagination-arrows">
                            {{ $subscriptions->appends(request()->query())->links('vendor.pagination.bootstrap-5-custom') }}
                        </div>
                    </div>
                    @else
                    <div class="admin-gallery-pagination-right">
                        <span class="admin-gallery-pagination-info">
                            1-{{ $subscriptions->count() }} of {{ $subscriptions->total() }}
                        </span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Selected Confirmation Modal -->
<div id="deleteSelectedSubscriptionsModal" class="admin-gallery-delete-modal">
    <div class="admin-gallery-delete-content">
        <h3 class="admin-gallery-delete-title">Confirm Delete</h3>
        <p class="admin-gallery-delete-message" id="deleteSelectedSubscriptionsMessage">
            Are you sure you want to delete selected subscriptions? This action cannot be undone.
        </p>
        <div class="admin-gallery-delete-actions">
            <button type="button" class="admin-gallery-modal-btn cancel" onclick="closeDeleteSelectedSubscriptionsModal()"><span>Cancel</span></button>
            <button type="button" class="admin-gallery-modal-btn delete" onclick="deleteSelectedSubscriptions()"><span>Confirm Delete</span></button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Admin Gallery JS (includes subscription functions) -->
<script src="{{ asset('frontend/admin-gallery.js') }}"></script>
<script>
// Change Subscription Per Page
function changeSubscriptionPerPage(perPage) {
    const url = new URL(window.location.href);
    url.searchParams.set('per_page', perPage);
    window.location.href = url.toString();
}

// Toggle Select All Subscriptions
function toggleSelectAllSubscriptions(checkbox) {
    const checkboxes = document.querySelectorAll('.subscription-checkbox');
    checkboxes.forEach(cb => {
        cb.checked = checkbox.checked;
    });
    updateDeleteButton();
}

// Update Delete Button Visibility
function updateDeleteButton() {
    const checkboxes = document.querySelectorAll('.subscription-checkbox:checked');
    const deleteBtn = document.getElementById('deleteSelectedBtn');
    if (checkboxes.length > 0) {
        deleteBtn.style.display = 'flex';
        deleteBtn.querySelector('span').textContent = `Delete Selected (${checkboxes.length})`;
    } else {
        deleteBtn.style.display = 'none';
    }
    
    // Update select all checkbox
    const selectAll = document.getElementById('selectAllSubscriptions');
    const allCheckboxes = document.querySelectorAll('.subscription-checkbox');
    if (allCheckboxes.length > 0) {
        selectAll.checked = checkboxes.length === allCheckboxes.length;
        selectAll.indeterminate = checkboxes.length > 0 && checkboxes.length < allCheckboxes.length;
    }
}

// Confirm Delete Selected Subscriptions
function confirmDeleteSelectedSubscriptions() {
    const selected = document.querySelectorAll('.subscription-checkbox:checked');
    if (selected.length === 0) {
        toast('error', 'Please select at least one subscription to delete');
        return;
    }
    
    const modal = document.getElementById('deleteSelectedSubscriptionsModal');
    const message = document.getElementById('deleteSelectedSubscriptionsMessage');
    message.textContent = `Are you sure you want to delete ${selected.length} selected subscription(s)? This action cannot be undone.`;
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
}

// Close Delete Selected Modal
function closeDeleteSelectedSubscriptionsModal() {
    const modal = document.getElementById('deleteSelectedSubscriptionsModal');
    modal.classList.remove('show');
    document.body.style.overflow = '';
}

// Delete Selected Subscriptions
function deleteSelectedSubscriptions() {
    const selected = document.querySelectorAll('.subscription-checkbox:checked');
    const ids = Array.from(selected).map(cb => cb.value);
    
    if (ids.length === 0) {
        toast('error', 'No subscriptions selected');
        return;
    }
    
    fetch('/admin/subscriptions/bulk-delete', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ ids: ids })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            toast('success', data.message || `${ids.length} subscription(s) deleted successfully!`);
            closeDeleteSelectedSubscriptionsModal();
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            toast('error', data.message || 'Failed to delete subscriptions');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        toast('error', 'An error occurred while deleting subscriptions');
    });
}
</script>
@endpush
