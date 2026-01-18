@extends('admin.layout')

@section('title', 'Profile - Admin Dashboard')
@section('page-title', 'Profile')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Admin Profile</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center mb-4 mb-md-0">
                        <div class="admin-profile-avatar-large mx-auto mb-3">
                            <i class="fas fa-user"></i>
                        </div>
                        <h5 class="mb-1">{{ session('admin_username') ?? 'Admin' }}</h5>
                        <p class="text-muted mb-0">Administrator</p>
                    </div>
                    <div class="col-md-8">
                        <form>
                            <div class="mb-3">
                                <label class="form-label"><strong>Email Address</strong></label>
                                <input type="email" class="form-control" value="{{ session('admin_username') ?? 'admin@gmail.com' }}" readonly>
                                <small class="text-muted">This is your login email address</small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Last Login</label>
                                <input type="text" class="form-control" value="{{ session('admin_login_time') ? \Carbon\Carbon::parse(session('admin_login_time'))->format('Y-m-d H:i:s') : 'N/A' }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <input type="text" class="form-control" value="Super Administrator" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <input type="text" class="form-control" value="Active" readonly>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .admin-profile-avatar-large {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: rgb(255, 161, 0);
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
    }
</style>
@endpush

