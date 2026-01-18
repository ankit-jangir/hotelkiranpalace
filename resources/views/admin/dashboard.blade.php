@extends('admin.layout')

@section('title', 'Admin Dashboard - Hotel Kiran Place')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h1>Admin Dashboard</h1>
        <p class="text-muted">Welcome to Hotel Kiran Place Admin Panel</p>
    </div>
</div>

<div class="row">
    <!-- Stats Cards -->
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Total Bookings</h5>
                <h2 class="mb-0">0</h2>
                <small>View all bookings</small>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Contact Inquiries</h5>
                <h2 class="mb-0">0</h2>
                <small>View inquiries</small>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5 class="card-title">Rooms Available</h5>
                <h2 class="mb-0">-</h2>
                <small>Manage rooms</small>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title">Gallery Images</h5>
                <h2 class="mb-0">0</h2>
                <small>Manage gallery</small>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="#" class="btn btn-outline-primary w-100">Manage Content</a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="#" class="btn btn-outline-success w-100">Update Prices</a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="#" class="btn btn-outline-info w-100">Upload Images</a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="#" class="btn btn-outline-warning w-100">Contact Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Recent Activities</h5>
            </div>
            <div class="card-body">
                <p class="text-muted">No recent activities to display.</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">System Information</h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li><strong>Logged in as:</strong> {{ session('admin_username') ?? 'Admin' }}</li>
                    <li><strong>Last login:</strong> {{ date('Y-m-d H:i:s') }}</li>
                    <li><strong>PHP Version:</strong> {{ phpversion() }}</li>
                    <li><strong>Laravel Version:</strong> {{ app()->version() }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

