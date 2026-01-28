@extends('admin.layout')

@section('title', 'Admin Dashboard - Hotel Kiran Place')
@section('page-title', 'Dashboard')

@section('content')
<div class="row g-3 mb-4">
    <!-- Stats Cards -->
    <div class="col-6 col-md-6 col-lg-3">
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
    <div class="col-6 col-md-6 col-lg-3">
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
    <div class="col-6 col-md-6 col-lg-3">
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
    <div class="col-6 col-md-6 col-lg-3">
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
                            <td>
                                <a href="mailto:{{ $user->email }}" class="admin-gallery-table-email-link"
                                    title="{{ $user->email }}">
                                    {{ $user->email }}
                                </a>
                            </td>
                            <td>{{ $user->created_at->format('d M Y') }}</td>
                            <td>
                                @php
                                $hoursPassed = $user->created_at->diffInHours(now(), false);
                                $daysPassed = ceil($hoursPassed / 24);
                                if ($daysPassed <= 0) { $statusText='Current' ; } else { $statusText=(int)$daysPassed
                                    . ' day' . ($daysPassed> 1 ? 's' : '') . ' ago';
                                    }
                                    @endphp
                                    <span class="admin-dashboard-status-badge active">{{ $statusText }}</span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-4">
                                <p class="text-muted mb-0">No subscribers found for current month.</p>
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
                            <th>Room Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($formSubmissions as $index => $submission)
                        @php
                        $roomTypes = [
                        'deluxe' => 'Deluxe Room',
                        'suite' => 'Suite',
                        'executive' => 'Executive Room',
                        'presidential' => 'Presidential Suite'
                        ];
                        $roomTypeDisplay = $submission->room_type ? ($roomTypes[$submission->room_type] ??
                        ucfirst($submission->room_type)) : 'N/A';
                        @endphp
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $submission->name }}</td>
                            <td>
                                <a href="mailto:{{ $submission->email }}" class="admin-gallery-table-email-link"
                                    title="{{ $submission->email }}">
                                    {{ $submission->email }}
                                </a>
                            </td>
                            <td>{{ $submission->country_code }} {{ $submission->phone }}</td>
                            <td>{{ $submission->created_at->format('d M Y') }}</td>
                            <td>
                                <span class="admin-gallery-type-badge {{ $submission->room_type ?? '' }}">
                                    {{ $roomTypeDisplay }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <p class="text-muted mb-0">No form submissions found for current month.</p>
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