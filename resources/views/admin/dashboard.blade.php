@extends('admin.layout')

@section('title', 'Admin Dashboard - Hotel Kiran Place')
@section('page-title', 'Dashboard')

@section('content')
<div class="row g-3">
    <!-- Stats Cards -->
    <div class="col-lg-3 col-md-6">
        <div class="card text-white admin-dashboard-card admin-card-blogs">
            <div class="card-body">
                <h5 class="card-title">Total Blogs</h5>
                <h2 class="mb-2">12</h2>
                <a href="{{ route('admin.blogs') }}" class="text-white text-decoration-none"><small>View all blogs</small></a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card text-white admin-dashboard-card admin-card-images">
            <div class="card-body">
                <h5 class="card-title">Total Images</h5>
                <h2 class="mb-2">45</h2>
                <a href="{{ route('admin.gallery') }}" class="text-white text-decoration-none"><small>Manage gallery</small></a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card text-white admin-dashboard-card admin-card-rooms">
            <div class="card-body">
                <h5 class="card-title">Total Rooms</h5>
                <h2 class="mb-2">8</h2>
                <a href="{{ route('admin.rooms') }}" class="text-white text-decoration-none"><small>Manage rooms</small></a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card text-white admin-dashboard-card admin-card-inquiries">
            <div class="card-body">
                <h5 class="card-title">Total Inquiries</h5>
                <h2 class="mb-2">23</h2>
                <a href="{{ route('admin.user-form-details') }}" class="text-white text-decoration-none"><small>View inquiries</small></a>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mt-0">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Subscribe User List <span class="badge bg-primary ms-2">15</span></h5>
                <a href="{{ route('admin.user-subscribe-details') }}" class="btn btn-sm admin-view-all-btn">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover admin-subscribe-table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Subscribed Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>user1@example.com</td>
                                <td>2025-01-15</td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>user2@example.com</td>
                                <td>2025-01-14</td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>user3@example.com</td>
                                <td>2025-01-13</td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>user4@example.com</td>
                                <td>2025-01-12</td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>user5@example.com</td>
                                <td>2025-01-11</td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mt-0">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Total User List (Form Submissions) <span class="badge bg-primary ms-2">23</span></h5>
                <a href="{{ route('admin.user-form-details') }}" class="btn btn-sm admin-view-all-btn">View All</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover admin-subscribe-table mb-0">
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
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>john@example.com</td>
                                <td>+91 98765 43210</td>
                                <td>2025-01-15</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>jane@example.com</td>
                                <td>+91 98765 43211</td>
                                <td>2025-01-14</td>
                                <td><span class="badge bg-success">Responded</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Mike Johnson</td>
                                <td>mike@example.com</td>
                                <td>+91 98765 43212</td>
                                <td>2025-01-13</td>
                                <td><span class="badge bg-success">Responded</span></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Sarah Williams</td>
                                <td>sarah@example.com</td>
                                <td>+91 98765 43213</td>
                                <td>2025-01-12</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>David Brown</td>
                                <td>david@example.com</td>
                                <td>+91 98765 43214</td>
                                <td>2025-01-11</td>
                                <td><span class="badge bg-success">Responded</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
