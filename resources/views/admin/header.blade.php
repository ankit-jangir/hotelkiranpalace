<!-- Admin Header -->
<header class="admin-header">
    <div class="admin-header-content">
        <!-- Menu Toggle Button (All Screens) -->
        <button id="adminSidebarToggle" class="admin-header-toggle" type="button" aria-label="Toggle Sidebar">
            <i class="fas fa-bars"></i>
        </button>
        
        <!-- Page Title -->
        <h1 class="admin-header-title">@yield('page-title', 'Dashboard')</h1>
        
        <!-- Right Side Actions -->
        <div class="admin-header-actions">
            <!-- Theme Toggle -->
            <button id="adminThemeToggle" class="admin-header-theme-btn" type="button" aria-label="Toggle Theme">
                <i class="fas fa-moon" id="themeIcon"></i>
            </button>
            
            <!-- View Website Link -->
            <a href="{{ route('home') }}" target="_blank" class="admin-header-link d-none d-md-inline-flex" title="View Website">
                <i class="fas fa-external-link-alt"></i>
                <span class="d-none d-lg-inline ms-2">View Website</span>
            </a>
            
            <!-- Profile Dropdown -->
            <div class="dropdown admin-profile-dropdown">
                <button class="admin-profile-btn" type="button" id="adminProfileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="admin-profile-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                </button>
                <ul class="dropdown-menu dropdown-menu-end admin-profile-menu" aria-labelledby="adminProfileDropdown">
                    @if(session('admin_role', 'admin') === 'admin')
                    <li>
                        <a class="dropdown-item admin-profile-menu-item" href="{{ route('admin.profile') }}">
                            <i class="fas fa-user me-2"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    @endif
                    <li>
                        <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item admin-profile-menu-item admin-logout-btn">
                                <i class="fas fa-sign-out-alt me-2"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

