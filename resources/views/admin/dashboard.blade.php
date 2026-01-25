@extends('admin.layout')

@section('title', 'Admin Dashboard - Hotel Kiran Place')
@section('page-title', 'Dashboard')

@section('content')
<div class="row g-3 mb-4">
    <!-- Stats Cards -->
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="admin-dashboard-stat-card admin-card-blogs">
            <div class="admin-dashboard-stat-icon">
                <i class="fas fa-blog"></i>
            </div>
            <div class="admin-dashboard-stat-content">
                <h5 class="admin-dashboard-stat-label">Total Blogs</h5>
                <h2 class="admin-dashboard-stat-value">{{ $totalBlogs }}</h2>
                <a href="{{ route('admin.blogs') }}" class="admin-dashboard-stat-link">View all blogs</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="admin-dashboard-stat-card admin-card-images">
            <div class="admin-dashboard-stat-icon">
                <i class="fas fa-images"></i>
            </div>
            <div class="admin-dashboard-stat-content">
                <h5 class="admin-dashboard-stat-label">Total Images</h5>
                <h2 class="admin-dashboard-stat-value">{{ $totalImages }}</h2>
                <a href="{{ route('admin.gallery') }}" class="admin-dashboard-stat-link">Manage gallery</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="admin-dashboard-stat-card admin-card-rooms">
            <div class="admin-dashboard-stat-icon">
                <i class="fas fa-bed"></i>
            </div>
            <div class="admin-dashboard-stat-content">
                <h5 class="admin-dashboard-stat-label">Total Rooms</h5>
                <h2 class="admin-dashboard-stat-value">{{ $totalRooms }}</h2>
                <a href="{{ route('admin.rooms') }}" class="admin-dashboard-stat-link">Manage rooms</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="admin-dashboard-stat-card admin-card-inquiries">
            <div class="admin-dashboard-stat-icon">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="admin-dashboard-stat-content">
                <h5 class="admin-dashboard-stat-label">Total Inquiries</h5>
                <h2 class="admin-dashboard-stat-value">{{ $totalInquiries }}</h2>
                <a href="{{ route('admin.user-form-details') }}" class="admin-dashboard-stat-link">View inquiries</a>
            </div>
        </div>
    </div>
</div>

<!-- Subscribe User List -->
<div class="row g-3 mb-4">
    <div class="col-12">
        <div class="admin-dashboard-table-card">
            <div class="admin-dashboard-table-header">
                <h5 class="admin-dashboard-table-title">
                    Subscribe User List 
                    <span class="admin-dashboard-table-badge">{{ $totalSubscribes }}</span>
                </h5>
                <a href="{{ route('admin.user-subscribe-details') }}" class="admin-dashboard-view-all-btn">
                    <span>View All</span>
                </a>
            </div>
            <div class="admin-dashboard-table-body">
                <table class="admin-dashboard-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Subscribed Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($subscribeUsers as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ is_string($user['created_at']) ? \Carbon\Carbon::parse($user['created_at'])->format('d M Y') : $user['created_at']->format('d M Y') }}</td>
                            <td>
                                <span class="admin-dashboard-status-badge active">Active</span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">
                                <p class="text-muted mb-0">No subscribers found.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- User Form Submissions -->
<div class="row g-3">
    <div class="col-12">
        <div class="admin-dashboard-table-card">
            <div class="admin-dashboard-table-header">
                <h5 class="admin-dashboard-table-title">
                    Total User List (Form Submissions)
                    <span class="admin-dashboard-table-badge">{{ $totalFormSubmissions }}</span>
                </h5>
                <a href="{{ route('admin.user-form-details') }}" class="admin-dashboard-view-all-btn">
                    <span>View All</span>
                </a>
            </div>
            <div class="admin-dashboard-table-body">
                <table class="admin-dashboard-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Submitted Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($formSubmissions as $index => $submission)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $submission['name'] }}</td>
                            <td>{{ $submission['email'] }}</td>
                            <td>{{ $submission['phone'] }}</td>
                            <td>{{ is_string($submission['created_at']) ? \Carbon\Carbon::parse($submission['created_at'])->format('d M Y') : $submission['created_at']->format('d M Y') }}</td>
                            <td>
                                <span class="admin-dashboard-status-badge {{ $submission['status'] === 'responded' ? 'responded' : 'pending' }}">
                                    {{ ucfirst($submission['status']) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <p class="text-muted mb-0">No form submissions found.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
