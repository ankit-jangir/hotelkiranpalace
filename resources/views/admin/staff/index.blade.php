@extends('admin.layout')

@section('content')
<div class="admin-content-wrapper">
    <div class="admin-page-header">
        <div class="admin-page-title-group">
            <h1 class="admin-page-title">
                <i class="fas fa-users"></i> Staff Management
            </h1>
            <p class="admin-page-subtitle">Manage hotel staff, roles, access permissions</p>
        </div>
        <a href="{{ route('admin.staff.create') }}" class="admin-btn admin-btn-primary">
            <i class="fas fa-plus"></i> Add New Staff
        </a>
    </div>
    <!-- Staff Grid -->
    <div class="staff-grid">
        @forelse($staffUsers as $staff)
        <div class="staff-card">
            <div class="staff-card-header">
                <div class="staff-avatar">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="staff-header-info">
                    <h3 class="staff-name">{{ $staff->name }}</h3>
                    <span class="staff-role-badge">
                        <i class="fas fa-briefcase"></i> {{ ucfirst($staff->role) }}
                    </span>
                </div>
            </div>

            <div class="staff-card-body">
                <div class="staff-info-row">
                    <span class="staff-label">
                        <i class="fas fa-envelope"></i> Hotel Email:
                    </span>
                    <span class="staff-value hotel-email">{{ $staff->login_email ?? 'N/A' }}</span>
                </div>

                <div class="staff-info-row">
                    <span class="staff-label">
                        <i class="fas fa-phone"></i> Hotel Phone:
                    </span>
                    <span class="staff-value">+91 {{ $staff->login_number ?? 'N/A' }}</span>
                </div>

                <div class="staff-info-row">
                    <span class="staff-label">
                        <i class="fas fa-envelope"></i> Personal Email:
                    </span>
                    <span class="staff-value text-muted">{{ $staff->personal_email ?? 'Not set' }}</span>
                </div>

                <div class="staff-info-row">
                    <span class="staff-label">
                        <i class="fas fa-phone"></i> Personal Number:
                    </span>
                    <span class="staff-value text-muted">{{ $staff->personal_number ?? 'Not set' }}</span>
                </div>

                <div class="staff-info-row">
                    <span class="staff-label">
                        <i class="fas fa-map-marker-alt"></i> Address:
                    </span>
                    <span class="staff-value text-muted">{{ $staff->address ?? 'Not set' }}</span>
                </div>

                <div class="staff-info-row">
                    <span class="staff-label">
                        <i class="fas fa-toggle-on"></i> Status:
                    </span>
                    <span class="staff-status-badge" style="background-color: {{ $staff->is_active ? '#28a745' : '#dc3545' }};">
                        {{ $staff->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
            </div>

            <div class="staff-card-footer">
                <a href="{{ route('admin.staff.edit', $staff->id) }}" class="admin-btn admin-btn-sm admin-btn-info">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <button type="button" class="admin-btn admin-btn-sm admin-btn-danger delete-staff-btn" data-toggle="modal" 
                        data-target="#deleteModal{{ $staff->id }}" data-staff-id="{{ $staff->id }}">
                    <span class="btn-text"><i class="fas fa-trash"></i> Delete</span>
                    <span class="btn-loader" style="display: none;"><i class="fas fa-spinner fa-spin"></i> Deleting...</span>
                </button>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal{{ $staff->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background: linear-gradient(135deg, #ffa100 0%, #f7470f 100%); color: white; border: none;">
                        <h5 class="modal-title" style="color: white;">
                            <i class="fas fa-exclamation-triangle"></i> Delete Staff Member
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" style="color: white;">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete <strong>{{ $staff->name }}</strong>?</p>
                        <p class="text-muted"><i class="fas fa-info-circle"></i> This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form action="{{ route('admin.staff.destroy', $staff->id) }}" method="POST" style="display: inline;" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-submit-btn">
                                <span class="btn-text"><i class="fas fa-trash"></i> Delete Staff</span>
                                <span class="btn-loader" style="display: none;"><i class="fas fa-spinner fa-spin"></i> Deleting...</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="admin-empty-state" style="grid-column: 1 / -1;">
            <i class="fas fa-users"></i>
            <h3>No Staff Members Yet</h3>
            <p>Start by adding your first staff member</p>
            <a href="{{ route('admin.staff.create') }}" class="admin-btn admin-btn-primary">
                <i class="fas fa-plus"></i> Add Staff Member
            </a>
        </div>
        @endforelse
    </div>
</div>

<style>
.admin-page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    padding-bottom: 1.5rem;
    border-bottom: 2px solid #e9ecef;
}

.admin-page-title-group {
    flex: 1;
}

.admin-page-title {
    font-size: 2rem;
    font-weight: 700;
    color: #2c3e50;
    margin: 0 0 0.5rem 0;
}

.admin-page-subtitle {
    color: #7f8c8d;
    margin: 0;
    font-size: 0.95rem;
}

.admin-btn.admin-btn-primary {
    background: linear-gradient(135deg, #ffa100 0%, #f7470f 100%);
    color: white;
    padding: 0.8rem 1.5rem;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.admin-btn.admin-btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 161, 0, 0.4);
}

.staff-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 2rem;
    animation: fadeIn 0.3s ease-in-out;
}

.staff-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.staff-card:hover {
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    transform: translateY(-4px);
}

.staff-card-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1.5rem;
    background: linear-gradient(135deg, #ffa100 0%, #f7470f 100%);
    color: white;
}

.staff-avatar {
    font-size: 2.5rem;
    flex-shrink: 0;
}

.staff-header-info {
    flex: 1;
}

.staff-name {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 700;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.staff-role-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    font-size: 0.85rem;
    background: rgba(255, 255, 255, 0.2);
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    margin-top: 0.5rem;
}

.staff-card-body {
    padding: 1.5rem;
    flex: 1;
    overflow-y: auto;
    max-height: 300px;
}

.staff-info-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 1rem;
    font-size: 0.9rem;
}

.staff-label {
    font-weight: 600;
    color: #34495e;
    display: flex;
    align-items: center;
    gap: 0.4rem;
    min-width: fit-content;
}

.staff-value {
    color: #2c3e50;
    text-align: right;
    word-break: break-word;
    max-width: 180px;
    overflow-wrap: break-word;
}

.staff-value.hotel-email {
    color: #ffa100;
    font-weight: 600;
}

.text-muted {
    color: #95a5a6;
    font-size: 0.85rem;
}

.staff-status-badge {
    display: inline-block;
    color: white;
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
}

.staff-card-footer {
    display: flex;
    gap: 0.5rem;
    padding: 1rem 1.5rem;
    background: #f8f9fa;
    border-top: 1px solid #e9ecef;
}

.admin-btn-sm {
    padding: 0.4rem 0.8rem;
    font-size: 0.85rem;
    flex: 1;
    border: none;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.4rem;
}

.admin-btn-sm.admin-btn-info {
    background: linear-gradient(135deg, #ffa100 0%, #f7470f 100%);
    color: white;
}

.admin-btn-sm.admin-btn-info:hover {
    transform: translateY(-2px);
    box-shadow: 0 2px 8px rgba(255, 161, 0, 0.4);
}

.admin-btn-sm.admin-btn-danger {
    background: #dc3545;
    color: white;
}

.admin-btn-sm.admin-btn-danger:hover {
    background: #c82333;
    transform: translateY(-2px);
}

.admin-empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: white;
    border-radius: 12px;
    border: 2px dashed #bdc3c7;
}

.admin-empty-state i {
    font-size: 3rem;
    color: #bdc3c7;
    margin-bottom: 1rem;
}

.admin-empty-state h3 {
    color: #2c3e50;
    margin: 1rem 0 0.5rem 0;
}

.admin-empty-state p {
    color: #7f8c8d;
    margin: 0 0 1.5rem 0;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 768px) {
    .admin-page-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }

    .staff-grid {
        grid-template-columns: 1fr;
    }

    .admin-page-title {
        font-size: 1.5rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Close alert after 5 seconds
    const alerts = document.querySelectorAll('.admin-alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            alert.style.transition = 'opacity 0.3s ease';
            setTimeout(() => alert.remove(), 300);
        }, 5000);
    });

    // Close alert on close button click
    document.querySelectorAll('.admin-alert-close').forEach(btn => {
        btn.addEventListener('click', function() {
            this.closest('.admin-alert').remove();
        });
    });
});
</script>
@endsection
