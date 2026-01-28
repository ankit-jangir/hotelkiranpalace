<!-- Admin Sidebar -->
<aside id="adminSidebar" class="admin-sidebar">
    <div class="admin-sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-logo d-flex align-items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Hotel Kiran Place Logo" class="admin-sidebar-logo-img"
                onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2240%22 height=%2240%22%3E%3Crect width=%2240%22 height=%2240%22 fill=%22%23ffa100%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23fff%22 font-size=%2220%22 font-weight=%22bold%22%3EH%3C/text%3E%3C/svg%3E'; this.style.display='inline-block';">
            <span class="admin-sidebar-logo-text">Hotel Kiran Place</span>
        </a>
        <button id="adminSidebarClose" class="admin-sidebar-close d-xl-none" type="button" aria-label="Close Sidebar">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <nav class="admin-sidebar-nav">
        <ul class="admin-sidebar-menu">
            <li class="admin-sidebar-item">
                <a href="{{ route('admin.dashboard') }}"
                    class="admin-sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home admin-sidebar-icon"></i>
                    <span class="admin-sidebar-text">Dashboard</span>
                </a>
            </li>

            <li class="admin-sidebar-item">
                <a href="{{ route('admin.blogs') }}"
                    class="admin-sidebar-link {{ request()->routeIs('admin.blogs*') ? 'active' : '' }}">
                    <i class="fas fa-blog admin-sidebar-icon"></i>
                    <span class="admin-sidebar-text">Blogs</span>
                </a>
            </li>

            <li class="admin-sidebar-item">
                <a href="{{ route('admin.gallery') }}"
                    class="admin-sidebar-link {{ request()->routeIs('admin.gallery*') ? 'active' : '' }}">
                    <i class="fas fa-images admin-sidebar-icon"></i>
                    <span class="admin-sidebar-text">Gallery</span>
                </a>
            </li>

            <li class="admin-sidebar-item">
                <a href="{{ route('admin.rooms') }}"
                    class="admin-sidebar-link {{ request()->routeIs('admin.rooms*') ? 'active' : '' }}">
                    <i class="fas fa-bed admin-sidebar-icon"></i>
                    <span class="admin-sidebar-text">Rooms</span>
                </a>
            </li>

            <li class="admin-sidebar-item">
                <a href="{{ route('admin.hero-section') }}"
                    class="admin-sidebar-link {{ request()->routeIs('admin.hero-section*') ? 'active' : '' }}">
                    <i class="fas fa-sliders-h admin-sidebar-icon"></i>
                    <span class="admin-sidebar-text">Website Hero Section</span>
                </a>
            </li>

            <li class="admin-sidebar-item">
                <a href="{{ route('admin.user-form-details') }}"
                    class="admin-sidebar-link {{ request()->routeIs('admin.user-form-details*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt admin-sidebar-icon"></i>
                    <span class="admin-sidebar-text">User Form Details</span>
                </a>
            </li>

            <li class="admin-sidebar-item">
                <a href="{{ route('admin.user-subscribe-details') }}"
                    class="admin-sidebar-link {{ request()->routeIs('admin.user-subscribe-details*') ? 'active' : '' }}">
                    <i class="fas fa-envelope admin-sidebar-icon"></i>
                    <span class="admin-sidebar-text">User Subscribe Details</span>
                </a>
            </li>

            @php $adminRole = session('admin_role', 'admin'); @endphp
            @if($adminRole === 'admin')
            <li class="admin-sidebar-item">
                <a href="{{ route('admin.settings') }}"
                    class="admin-sidebar-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                    <i class="fas fa-cog admin-sidebar-icon"></i>
                    <span class="admin-sidebar-text">Settings</span>
                </a>
            </li>
            @endif
        </ul>
    </nav>
</aside>

<!-- Sidebar Overlay (Mobile) -->
<div id="adminSidebarOverlay" class="admin-sidebar-overlay"></div>