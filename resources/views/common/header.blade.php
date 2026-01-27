<nav class="navbar navbar-expand-xl navbar-light bg-white fixed-top shadow-sm" style="padding: 0.75rem 0; z-index: 1050;">
    <div class="container-fluid px-3 px-lg-5">
        <!-- Hamburger Menu (Mobile & Tablet) -->
        <button class="navbar-toggler d-xl-none border-0 p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileNavbar" aria-controls="mobileNavbar" style="background: transparent; width: 30px; height: 30px;">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand Logo (Mobile & Tablet - Smaller) -->
        <a class="navbar-brand d-xl-none d-flex align-items-center me-auto" href="{{ route('home') }}" style="text-decoration: none; margin-left: 0.5rem;">
            <img src="{{ asset('images/logo.png') }}" alt="Hotel Kiran Place Logo" style="height: 28px; width: auto;" onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2228%22 height=%2228%22%3E%3Crect width=%2228%22 height=%2228%22 fill=%22%23ff6b35%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23fff%22 font-size=%2214%22 font-weight=%22bold%22%3EH%3C/text%3E%3C/svg%3E'; this.style.display='inline-block';">
            <span style="font-size: 1rem; font-weight: 700; color: #333; margin-left: 0.5rem; letter-spacing: -0.3px;">Hotel Kiran Place</span>
        </a>

        <!-- Brand Logo (Desktop) -->
        <a class="navbar-brand d-none d-xl-flex align-items-center" href="{{ route('home') }}" style="text-decoration: none;">
            <img src="{{ asset('images/logo.png') }}" alt="Hotel Kiran Place Logo" class="me-2" style="height: 40px; width: auto;" onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2240%22 height=%2240%22%3E%3Crect width=%2240%22 height=%2240%22 fill=%22%23ff6b35%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23fff%22 font-size=%2220%22 font-weight=%22bold%22%3EH%3C/text%3E%3C/svg%3E'; this.style.display='inline-block';">
            <div class="d-flex flex-column">
                <span style="font-size: 1.25rem; font-weight: 700; color: #333; letter-spacing: -0.5px;">Hotel Kiran Place</span>
            </div>
        </a>

        <!-- Desktop Navigation (Centered) -->
        <div class="d-none d-xl-flex align-items-center flex-grow-1 justify-content-center">
            <ul class="navbar-nav d-flex flex-row align-items-center" style="gap: 0.5rem 1.5rem; list-style: none; margin: 0;">
                <li class="nav-item position-relative">
                    <a class="nav-link position-relative px-0 {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}" style="color: #333; font-weight: 500; font-size: 0.95rem; text-decoration: none; transition: all 0.3s; padding-left: 12px;">
                        Home
                        <span class="nav-dot position-absolute" style="left: -12px; top: 50%; transform: translateY(-50%); width: 6px; height: 6px; background: #ff6b35; border-radius: 50%; opacity: {{ request()->routeIs('home') ? '1' : '0' }}; transition: opacity 0.3s;"></span>
                    </a>
                </li>
                <li class="nav-item position-relative">
                    <a class="nav-link position-relative px-0 {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}" style="color: #333; font-weight: 500; font-size: 0.95rem; text-decoration: none; transition: all 0.3s; padding-left: 12px;">
                        About
                        <span class="nav-dot position-absolute" style="left: -12px; top: 50%; transform: translateY(-50%); width: 6px; height: 6px; background: #ff6b35; border-radius: 50%; opacity: {{ request()->routeIs('about') ? '1' : '0' }}; transition: opacity 0.3s;"></span>
                    </a>
                </li>
                <li class="nav-item position-relative dropdown">
                    <a class="nav-link position-relative px-0 dropdown-toggle d-flex align-items-center {{ request()->routeIs('rooms') ? 'active' : '' }}" href="#" id="roomsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #333; font-weight: 500; font-size: 0.95rem; text-decoration: none; transition: all 0.3s; padding-left: 12px;">
                        Rooms & Tariff
                        <i class="fas fa-chevron-down ms-1" style="font-size: 0.7rem; color: #ff6b35;"></i>
                        <span class="nav-dot position-absolute" style="left: -12px; top: 50%; transform: translateY(-50%); width: 6px; height: 6px; background: #ff6b35; border-radius: 50%; opacity: {{ request()->routeIs('rooms') ? '1' : '0' }}; transition: opacity 0.3s;"></span>
                    </a>
                    <ul class="dropdown-menu border-0 shadow-sm rounded-3" aria-labelledby="roomsDropdown" style="margin-top: 0.75rem; min-width: 220px; padding: 0.5rem 0;">
                        <li><a class="dropdown-item py-2 px-3" href="{{ route('rooms') }}" style="font-size: 0.9rem; color: #333; transition: all 0.2s;">View All Rooms</a></li>
                        <li><a class="dropdown-item py-2 px-3" href="{{ route('rooms') }}#deluxe" style="font-size: 0.9rem; color: #333; transition: all 0.2s;">Deluxe Rooms</a></li>
                        <li><a class="dropdown-item py-2 px-3" href="{{ route('rooms') }}#suite" style="font-size: 0.9rem; color: #333; transition: all 0.2s;">Suite Rooms</a></li>
                    </ul>
                </li>
                <li class="nav-item position-relative">
                    <a class="nav-link position-relative px-0 {{ request()->routeIs('amenities') ? 'active' : '' }}" href="{{ route('amenities') }}" style="color: #333; font-weight: 500; font-size: 0.95rem; text-decoration: none; transition: all 0.3s; padding-left: 12px;">
                        Amenities
                        <span class="nav-dot position-absolute" style="left: -12px; top: 50%; transform: translateY(-50%); width: 6px; height: 6px; background: #ff6b35; border-radius: 50%; opacity: {{ request()->routeIs('amenities') ? '1' : '0' }}; transition: opacity 0.3s;"></span>
                    </a>
                </li>
                <li class="nav-item position-relative">
                    <a class="nav-link position-relative px-0 {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}" style="color: #333; font-weight: 500; font-size: 0.95rem; text-decoration: none; transition: all 0.3s; padding-left: 12px;">
                        Photo & Gallery
                        <span class="nav-dot position-absolute" style="left: -12px; top: 50%; transform: translateY(-50%); width: 6px; height: 6px; background: #ff6b35; border-radius: 50%; opacity: {{ request()->routeIs('gallery') ? '1' : '0' }}; transition: opacity 0.3s;"></span>
                    </a>
                </li>
                <li class="nav-item position-relative">
                    <a class="nav-link position-relative px-0 {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}" style="color: #333; font-weight: 500; font-size: 0.95rem; text-decoration: none; transition: all 0.3s; padding-left: 12px;">
                        Contact
                        <span class="nav-dot position-absolute" style="left: -12px; top: 50%; transform: translateY(-50%); width: 6px; height: 6px; background: #ff6b35; border-radius: 50%; opacity: {{ request()->routeIs('contact') ? '1' : '0' }}; transition: opacity 0.3s;"></span>
                    </a>
                </li>
                <li class="nav-item position-relative">
                    <a class="nav-link position-relative px-0 {{ request()->routeIs('blog') ? 'active' : '' }}" href="{{ route('blog') }}" style="color: #333; font-weight: 500; font-size: 0.95rem; text-decoration: none; transition: all 0.3s; padding-left: 12px;">
                        Blog
                        <span class="nav-dot position-absolute" style="left: -12px; top: 50%; transform: translateY(-50%); width: 6px; height: 6px; background: #ff6b35; border-radius: 50%; opacity: {{ request()->routeIs('blog') ? '1' : '0' }}; transition: opacity 0.3s;"></span>
                    </a>
                </li>
                <li class="nav-item position-relative dropdown">
                    <a class="nav-link position-relative px-0 dropdown-toggle d-flex align-items-center" href="#" id="moreDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #333; font-weight: 500; font-size: 0.95rem; text-decoration: none; transition: all 0.3s; padding-left: 12px;">
                        More
                        <i class="fas fa-chevron-down ms-1" style="font-size: 0.7rem; color: #ff6b35;"></i>
                        <span class="nav-dot position-absolute" style="left: -12px; top: 50%; transform: translateY(-50%); width: 6px; height: 6px; background: #ff6b35; border-radius: 50%; opacity: 0; transition: opacity 0.3s;"></span>
                    </a>
                    <ul class="dropdown-menu border-0 shadow-sm rounded-3" aria-labelledby="moreDropdown" style="margin-top: 0.75rem; min-width: 220px; padding: 0.5rem 0;">
                        {{-- <li><a class="dropdown-item py-2 px-3" href="#" style="font-size: 0.9rem; color: #333; transition: all 0.2s;">Club</a></li> --}}
                        <li><a class="dropdown-item py-2 px-3" href="{{ route('terms') }}" style="font-size: 0.9rem; color: #333; transition: all 0.2s;">Terms & Conditions</a></li>
                        <li><a class="dropdown-item py-2 px-3" href="{{ route('privacy') }}" style="font-size: 0.9rem; color: #333; transition: all 0.2s;">Privacy Policy</a></li>
                        <li><a class="dropdown-item py-2 px-3" href="{{ route('faq') }}" style="font-size: 0.9rem; color: #333; transition: all 0.2s;">FAQ</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- Book Button (Right Side - Desktop & Mobile) -->
        <div class="d-flex align-items-center ms-auto ms-lg-3 flex-shrink-0">
            <a href="{{ route('contact') }}" class="book-btn btn rounded-lg px-2 px-md-3 px-lg-4 py-2 position-relative overflow-hidden text-decoration-none" style="background: rgb(255, 161, 0); border: none; color: white; font-weight: 600; font-size: 0.75rem; white-space: nowrap; transition: all 0.4s ease; box-shadow: 0 2px 4px rgba(255, 161, 0, 0.2); min-width: 100px; height: 38px; display: inline-flex; align-items: center; justify-content: center;">
                <span class="position-relative" style="z-index: 1; font-size: inherit;">Book Your Stay</span>
            </a>
        </div>
    </div>
</nav>

<!-- Mobile & Tablet Offcanvas Menu -->
<div class="offcanvas offcanvas-start d-xl-none" tabindex="-1" id="mobileNavbar" aria-labelledby="mobileNavbarLabel" style="width: 320px;">
    <div class="offcanvas-header border-bottom pb-3 mb-3 px-4">
        <div class="d-flex align-items-center justify-content-between w-100">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" style="font-size: 1.2rem; opacity: 0.8;"></button>
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}" style="text-decoration: none;">
                <img src="{{ asset('images/logo.png') }}" alt="Hotel Kiran Place Logo" class="me-2" style="height: 32px; width: auto;" onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2232%22 height=%2232%22%3E%3Crect width=%2232%22 height=%2232%22 fill=%22%23ff6b35%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23fff%22 font-size=%2216%22 font-weight=%22bold%22%3EH%3C/text%3E%3C/svg%3E'; this.style.display='inline-block';">
                <div class="d-flex flex-column">
                    <span style="font-size: 1.1rem; font-weight: 700; color: #333;">Hotel Kiran Place</span>
                </div>
            </a>
            <div></div>
        </div>
    </div>
    <div class="offcanvas-body p-0">
        <ul class="list-unstyled mb-0" style="padding: 0;">
            <li class="border-bottom">
                <a class="d-flex align-items-center justify-content-between py-3 px-4 text-decoration-none position-relative {{ request()->routeIs('home') ? 'mobile-active' : '' }}" href="{{ route('home') }}" style="color: {{ request()->routeIs('home') ? '#ff6b35' : '#333' }}; font-weight: 500;" >
                    <span>Home</span>
                    @if(request()->routeIs('home'))
                        <span class="position-absolute" style="left: 12px; top: 50%; transform: translateY(-50%); width: 6px; height: 6px; background: #ff6b35; border-radius: 50%;"></span>
                    @endif
                </a>
            </li>
            <li class="border-bottom">
                <a class="d-flex align-items-center justify-content-between py-3 px-4 text-decoration-none position-relative {{ request()->routeIs('about') ? 'mobile-active' : '' }}" href="{{ route('about') }}" style="color: {{ request()->routeIs('about') ? '#ff6b35' : '#333' }}; font-weight: 500;" >
                    <span>About</span>
                    @if(request()->routeIs('about'))
                        <span class="position-absolute" style="left: 12px; top: 50%; transform: translateY(-50%); width: 6px; height: 6px; background: #ff6b35; border-radius: 50%;"></span>
                    @endif
                </a>
            </li>
            <li class="border-bottom">
                <a class="d-flex align-items-center justify-content-between py-3 px-4 text-decoration-none position-relative {{ request()->routeIs('rooms') ? 'mobile-active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#mobileRoomsCollapse" style="color: {{ request()->routeIs('rooms') ? '#ff6b35' : '#333' }}; font-weight: 500;">
                    <span>Rooms & Tariff</span>
                    <i class="fas fa-chevron-down" style="font-size: 0.7rem; color: #ff6b35; transition: transform 0.3s;"></i>
                    @if(request()->routeIs('rooms'))
                        <span class="position-absolute" style="left: 12px; top: 50%; transform: translateY(-50%); width: 6px; height: 6px; background: #ff6b35; border-radius: 50%;"></span>
                    @endif
                </a>
                <div class="collapse" id="mobileRoomsCollapse">
                    <ul class="list-unstyled bg-light mb-0">
                        <li><a class="d-block py-2 px-5 text-decoration-none" href="{{ route('rooms') }}" style="color: #666; font-size: 0.9rem;" >View All Rooms</a></li>
                        <li><a class="d-block py-2 px-5 text-decoration-none" href="{{ route('rooms') }}#deluxe" style="color: #666; font-size: 0.9rem;" >Deluxe Rooms</a></li>
                        <li><a class="d-block py-2 px-5 text-decoration-none" href="{{ route('rooms') }}#suite" style="color: #666; font-size: 0.9rem;" >Suite Rooms</a></li>
                    </ul>
                </div>
            </li>
            <li class="border-bottom">
                <a class="d-flex align-items-center justify-content-between py-3 px-4 text-decoration-none position-relative {{ request()->routeIs('amenities') ? 'mobile-active' : '' }}" href="{{ route('amenities') }}" style="color: {{ request()->routeIs('amenities') ? '#ff6b35' : '#333' }}; font-weight: 500;" >
                    <span>Amenities</span>
                    @if(request()->routeIs('amenities'))
                        <span class="position-absolute" style="left: 12px; top: 50%; transform: translateY(-50%); width: 6px; height: 6px; background: #ff6b35; border-radius: 50%;"></span>
                    @endif
                </a>
            </li>
            <li class="border-bottom">
                <a class="d-flex align-items-center justify-content-between py-3 px-4 text-decoration-none position-relative {{ request()->routeIs('gallery') ? 'mobile-active' : '' }}" href="{{ route('gallery') }}" style="color: {{ request()->routeIs('gallery') ? '#ff6b35' : '#333' }}; font-weight: 500;" >
                    <span>Photo & Gallery</span>
                    @if(request()->routeIs('gallery'))
                        <span class="position-absolute" style="left: 12px; top: 50%; transform: translateY(-50%); width: 6px; height: 6px; background: #ff6b35; border-radius: 50%;"></span>
                    @endif
                </a>
            </li>
            <li class="border-bottom">
                <a class="d-flex align-items-center justify-content-between py-3 px-4 text-decoration-none position-relative {{ request()->routeIs('contact') ? 'mobile-active' : '' }}" href="{{ route('contact') }}" style="color: {{ request()->routeIs('contact') ? '#ff6b35' : '#333' }}; font-weight: 500;" >
                    <span>Contact</span>
                    @if(request()->routeIs('contact'))
                        <span class="position-absolute" style="left: 12px; top: 50%; transform: translateY(-50%); width: 6px; height: 6px; background: #ff6b35; border-radius: 50%;"></span>
                    @endif
                </a>
            </li>
            <li class="border-bottom">
                <a class="d-flex align-items-center justify-content-between py-3 px-4 text-decoration-none position-relative {{ request()->routeIs('blog') ? 'mobile-active' : '' }}" href="{{ route('blog') }}" style="color: {{ request()->routeIs('blog') ? '#ff6b35' : '#333' }}; font-weight: 500;" >
                    <span>Blog</span>
                    @if(request()->routeIs('blog'))
                        <span class="position-absolute" style="left: 12px; top: 50%; transform: translateY(-50%); width: 6px; height: 6px; background: #ff6b35; border-radius: 50%;"></span>
                    @endif
                </a>
            </li>
            <li class="border-bottom">
                <a class="d-flex align-items-center justify-content-between py-3 px-4 text-decoration-none position-relative {{ request()->routeIs('terms', 'privacy', 'faq') ? 'mobile-active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#mobileMoreCollapse" aria-expanded="false" aria-controls="mobileMoreCollapse" style="color: {{ request()->routeIs('terms', 'privacy', 'faq') ? '#ff6b35' : '#333' }}; font-weight: 500;">
                    <span>More</span>
                    <i class="fas fa-chevron-down more-chevron" style="font-size: 0.7rem; color: #ff6b35; transition: transform 0.3s;"></i>
                    @if(request()->routeIs('terms', 'privacy', 'faq'))
                        <span class="position-absolute" style="left: 12px; top: 50%; transform: translateY(-50%); width: 6px; height: 6px; background: #ff6b35; border-radius: 50%;"></span>
                    @endif
                </a>
                <div class="collapse {{ request()->routeIs('terms', 'privacy', 'faq') ? 'show' : '' }}" id="mobileMoreCollapse">
                    <ul class="list-unstyled bg-light mb-0">
                        {{-- <li><a class="d-block py-2 px-5 text-decoration-none" href="#" style="color: #666; font-size: 0.9rem;" >Club</a></li> --}}
                        <li><a class="d-block py-2 px-5 text-decoration-none {{ request()->routeIs('terms') ? 'fw-bold' : '' }}" href="{{ route('terms') }}" style="color: {{ request()->routeIs('terms') ? '#ff6b35' : '#666' }}; font-size: 0.9rem;" >Terms & Conditions</a></li>
                        <li><a class="d-block py-2 px-5 text-decoration-none {{ request()->routeIs('privacy') ? 'fw-bold' : '' }}" href="{{ route('privacy') }}" style="color: {{ request()->routeIs('privacy') ? '#ff6b35' : '#666' }}; font-size: 0.9rem;" >Privacy Policy</a></li>
                        <li><a class="d-block py-2 px-5 text-decoration-none {{ request()->routeIs('faq') ? 'fw-bold' : '' }}" href="{{ route('faq') }}" style="color: {{ request()->routeIs('faq') ? '#ff6b35' : '#666' }}; font-size: 0.9rem;" >FAQ</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
