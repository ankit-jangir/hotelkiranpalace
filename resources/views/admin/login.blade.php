<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login - Hotel Kiran Place</title>
    
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🏨</text></svg>">
    
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/boot.css') }}" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Admin Login Styles -->
    <link href="{{ asset('frontend/style.css') }}" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            overflow: hidden;
            height: 100vh;
            width: 100%;
            margin: 0;
            padding: 0;
        }

        .admin-login-section {
            min-height: 100vh;
            height: 100vh;
            position: relative;
            overflow: hidden;
            background: #0d1526;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .admin-login-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{ asset('images/hero_section_img3.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: none;
            opacity: 0.5;
            z-index: 0;
        }

        .admin-login-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(13, 21, 38, 0.75);
            z-index: 1;
        }

        .admin-login-container {
            position: relative;
            z-index: 2;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 0;
        }


        .admin-login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
            padding: 1.75rem;
            position: relative;
            overflow: hidden;
            max-width: 100%;
            width: 100%;
        }

        .admin-login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{ asset('images/hero_section_img1.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(10px);
            opacity: 0.2;
            z-index: 0;
        }

        .admin-login-card > * {
            position: relative;
            z-index: 1;
        }

        .admin-login-logo {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .admin-login-logo img {
            height: 50px;
            width: auto;
        }

        .admin-login-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #0d1526;
            text-align: center;
            margin-bottom: 0.4rem;
        }

        .admin-login-subtitle {
            font-size: 0.9rem;
            color: #666;
            text-align: center;
            margin-bottom: 1.25rem;
        }

        .admin-form-group {
            margin-bottom: 1rem;
            position: relative;
        }

        .admin-form-label {
            font-size: 0.9rem;
            font-weight: 600;
            color: #0d1526;
            margin-bottom: 0.5rem;
            display: block;
        }

        .admin-form-label .required {
            color: rgb(255, 161, 0);
            margin-left: 2px;
        }

        .admin-form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            padding-right: 2.5rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #ffffff;
        }

        .admin-form-input:focus {
            outline: none;
            border-color: rgb(255, 161, 0);
            box-shadow: 0 0 0 3px rgba(255, 161, 0, 0.1);
        }

        .admin-form-input.is-invalid {
            border-color: #dc3545;
        }

        .admin-form-input.is-valid {
            border-color: #28a745;
        }

        .admin-input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            cursor: pointer;
            transition: color 0.3s ease;
            z-index: 10;
        }

        .admin-input-icon:hover {
            color: rgb(255, 161, 0);
        }

        .admin-password-toggle {
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
        }

        .admin-form-check {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .admin-form-check-input {
            width: 18px;
            height: 18px;
            margin-right: 0.75rem;
            cursor: pointer;
            accent-color: rgb(255, 161, 0);
        }

        .admin-form-check-label {
            font-size: 0.9rem;
            color: #666;
            cursor: pointer;
            margin: 0;
        }

        .admin-login-btn {
            width: 100%;
            padding: 0.75rem;
            background: rgb(255, 161, 0);
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .admin-login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(89deg, rgb(255, 161, 0) 11.51%, rgb(247, 71, 15) 52.88%, rgb(238, 17, 98) 92.44%);
            transition: left 0.4s ease;
            z-index: 0;
        }

        .admin-login-btn:hover::before,
        .admin-login-btn:active::before,
        .admin-login-btn:focus::before {
            left: 0;
        }

        .admin-login-btn span {
            position: relative;
            z-index: 1;
        }

        .admin-login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 161, 0, 0.4);
        }

        .admin-back-link {
            text-align: center;
            margin-top: 1rem;
        }

        .admin-login-btn .btn-loader {
            display: inline-flex;
            align-items: center;
        }

        .admin-login-btn.loading .btn-text {
            display: none;
        }

        .admin-login-btn.loading .btn-loader {
            display: inline-flex !important;
        }

        .admin-login-btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .admin-back-link a {
            color: #666;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .admin-back-link a:hover {
            color: rgb(255, 161, 0);
        }

        .admin-invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.5rem;
            font-size: 0.875rem;
            color: #dc3545;
        }

        .admin-valid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.5rem;
            font-size: 0.875rem;
            color: #28a745;
        }

        /* Responsive Styles */
        @media (max-width: 767px) {
            body {
                overflow: hidden;
                height: 100vh;
            }

            .admin-login-section {
                min-height: 100vh;
                height: 100vh;
                padding: 0;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .admin-login-container {
                padding: 0;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            
            .admin-login-card {
                padding: 1.5rem 1rem;
                border-radius: 12px;
                margin: 0 auto;
            }

            .admin-login-logo {
                margin-bottom: 1rem;
            }

            .admin-login-logo img {
                height: 40px;
            }

            .admin-login-title {
                font-size: 1.35rem;
                margin-bottom: 0.3rem;
            }

            .admin-login-subtitle {
                font-size: 0.8rem;
                margin-bottom: 1rem;
            }

            .admin-form-group {
                margin-bottom: 0.875rem;
            }

            .admin-form-label {
                font-size: 0.85rem;
                margin-bottom: 0.4rem;
            }

            .admin-form-input {
                padding: 0.55rem 0.75rem;
                padding-right: 2rem;
                font-size: 0.85rem;
            }

            .admin-input-icon {
                font-size: 0.9rem;
                right: 0.75rem;
            }

            .admin-form-check {
                margin-bottom: 0.875rem;
            }

            .admin-form-check-input {
                width: 16px;
                height: 16px;
            }

            .admin-form-check-label {
                font-size: 0.85rem;
            }

            .admin-login-btn {
                padding: 0.6rem;
                font-size: 0.85rem;
            }

            .admin-back-link {
                margin-top: 0.875rem;
            }

            .admin-back-link a {
                font-size: 0.8rem;
            }

            .admin-invalid-feedback,
            .admin-valid-feedback {
                font-size: 0.75rem;
                margin-top: 0.3rem;
            }

            .admin-rate-limit-timer {
                background: #fff3cd;
                border: 1px solid #ffc107;
                border-radius: 8px;
                padding: 0.75rem;
                margin-bottom: 1rem;
                text-align: center;
                color: #856404;
                font-size: 0.9rem;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .admin-rate-limit-timer i {
                color: #ffc107;
            }

            .admin-login-btn:disabled {
                opacity: 0.6;
                cursor: not-allowed;
                transform: none !important;
            }

            .admin-login-card {
                padding: 2rem 1.5rem;
                border-radius: 12px;
            }

            .admin-login-title {
                font-size: 1.75rem;
            }

            .admin-login-subtitle {
                font-size: 0.85rem;
            }

            .admin-form-input {
                padding: 0.65rem 0.875rem;
                padding-right: 2.25rem;
                font-size: 0.9rem;
            }

            .admin-login-btn {
                padding: 0.75rem;
                font-size: 0.95rem;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            .admin-login-card {
                padding: 2.5rem;
            }
        }
    </style>
</head>
<body>
    <section class="admin-login-section">
        <div class="admin-login-bg"></div>
        <div class="admin-login-overlay"></div>
        
        <div class="admin-login-container">
            <div class="container-fluid h-100 d-flex align-items-center justify-content-center px-0">
                <div class="row justify-content-center w-100 g-0">
                    <!-- Login Form Column -->
                    <div class="col-lg-5 col-md-7 col-12 px-3 px-md-4">
                        <div class="admin-login-card">
                            <div class="admin-login-logo">
                                <img src="{{ asset('images/logo.png') }}" alt="Hotel Kiran Place Logo" onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2250%22 height=%2250%22%3E%3Crect width=%2250%22 height=%2250%22 fill=%22%23ff6b35%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22 fill=%22%23fff%22 font-size=%2225%22 font-weight=%22bold%22%3EH%3C/text%3E%3C/svg%3E'; this.style.display='inline-block';">
                            </div>
                            
                            <h2 class="admin-login-title">Admin Login</h2>
                            <p class="admin-login-subtitle">Hotel Kiran Place</p>

                            <form action="{{ route('admin.login.submit') }}" method="POST" id="adminLoginForm" novalidate>
                                @csrf
                                
                                <!-- Email Field -->
                                <div class="admin-form-group">
                                    <label for="username" class="admin-form-label">
                                        Email Address <span class="required">*</span>
                                    </label>
                                    <div class="position-relative">
                                        <input 
                                            type="email" 
                                            class="admin-form-input" 
                                            id="username" 
                                            name="username" 
                                            value="{{ old('username') }}" 
                                            placeholder="Enter your email"
                                            required
                                            autocomplete="email"
                                        >
                                        <i class="fas fa-envelope admin-input-icon"></i>
                                    </div>
                                    <div class="admin-invalid-feedback" id="emailError"></div>
                                    <div class="admin-valid-feedback" id="emailSuccess"></div>
                                </div>

                                <!-- Password Field -->
                                <div class="admin-form-group">
                                    <label for="password" class="admin-form-label">
                                        Password <span class="required">*</span>
                                    </label>
                                    <div class="position-relative">
                                        <input 
                                            type="password" 
                                            class="admin-form-input" 
                                            id="password" 
                                            name="password" 
                                            placeholder="Enter your password"
                                            required
                                            autocomplete="current-password"
                                        >
                                        <i class="fas fa-eye admin-input-icon admin-password-toggle" id="passwordToggle"></i>
                                    </div>
                                    <div class="admin-invalid-feedback" id="passwordError"></div>
                                </div>

                                <!-- Login Type (Admin / Staff) -->
                                <div class="admin-form-group">
                                    <label class="admin-form-label d-block mb-1">Login as</label>
                                    <div class="d-flex gap-3">
                                        <label class="admin-form-check-label">
                                            <input type="radio" name="login_type" value="admin" checked>
                                            <span class="ms-1">Admin</span>
                                        </label>
                                        <label class="admin-form-check-label">
                                            <input type="radio" name="login_type" value="staff">
                                            <span class="ms-1">Staff</span>
                                        </label>
                                    </div>
                                    <small class="text-muted d-block mt-1">
                                        Staff login uses email or phone assigned in Staff settings.
                                    </small>
                                </div>

                                <!-- Remember Me Checkbox -->
                                <div class="admin-form-check">
                                    <input 
                                        type="checkbox" 
                                        class="admin-form-check-input" 
                                        id="remember" 
                                        name="remember"
                                    >
                                    <label class="admin-form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>

                                <!-- Rate Limit Timer (Hidden by default) -->
                                <div id="rateLimitTimer" class="admin-rate-limit-timer" style="display: none;">
                                    <i class="fas fa-clock me-2"></i>
                                    <span id="timerText">Please wait <span id="timerSeconds">60</span> seconds before trying again.</span>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="admin-login-btn" id="loginSubmitBtn">
                                    <span class="btn-text">Login</span>
                                    <span class="btn-loader d-none">
                                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                                        Logging in...
                                    </span>
                                </button>
                            </form>

                            <div class="admin-back-link">
                                <a href="{{ route('home') }}">
                                    <i class="fas fa-arrow-left me-1"></i> Back to Website
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/boot.js') }}"></script>
    
    <!-- Admin Login Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('adminLoginForm');
            const emailInput = document.getElementById('username');
            const passwordInput = document.getElementById('password');
            const passwordToggle = document.getElementById('passwordToggle');
            const emailError = document.getElementById('emailError');
            const emailSuccess = document.getElementById('emailSuccess');
            const passwordError = document.getElementById('passwordError');
            const loginBtn = document.getElementById('loginSubmitBtn');
            const rateLimitTimer = document.getElementById('rateLimitTimer');
            const timerText = document.getElementById('timerText');
            const timerSeconds = document.getElementById('timerSeconds');
            
            // Check rate limit on page load
            checkRateLimit();
            
            // Also check for rate limit in URL parameters (if redirected with error)
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('rate_limited') === 'true') {
                const seconds = parseInt(urlParams.get('seconds')) || 60;
                startRateLimitTimer(seconds);
            }

            // Password Toggle
            passwordToggle.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });

            // Email Validation
            emailInput.addEventListener('input', function() {
                const email = this.value.trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                
                if (email === '') {
                    this.classList.remove('is-valid', 'is-invalid');
                    emailError.textContent = '';
                    emailSuccess.textContent = '';
                } else if (emailRegex.test(email)) {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                    emailError.textContent = '';
                    emailSuccess.textContent = 'Valid email address';
                } else {
                    this.classList.remove('is-valid');
                    this.classList.add('is-invalid');
                    emailError.textContent = 'Please enter a valid email address';
                    emailSuccess.textContent = '';
                }
            });

            // Password Validation (simple - just check if not empty)
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                
                if (password === '') {
                    this.classList.remove('is-valid', 'is-invalid');
                    passwordError.textContent = '';
                } else {
                    this.classList.remove('is-invalid');
                    this.classList.add('is-valid');
                    passwordError.textContent = '';
                }
            });


            // Use global toast function if available, otherwise fallback
            function showToast(message, type = 'error') {
                if (typeof window.toast === 'function') {
                    window.toast(type, message);
                } else if (typeof toast === 'function') {
                    toast(type, message);
                } else {
                    // Fallback: Create toast element
                    const toastEl = document.createElement('div');
                    toastEl.className = `toast align-items-center text-white bg-${type === 'error' ? 'danger' : 'success'} border-0`;
                    toastEl.setAttribute('role', 'alert');
                    toastEl.setAttribute('aria-live', 'assertive');
                    toastEl.setAttribute('aria-atomic', 'true');
                    toastEl.innerHTML = `
                        <div class="d-flex">
                            <div class="toast-body">${message}</div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    `;
                    
                    // Get toast container or create one
                    let toastContainer = document.querySelector('.toast-container');
                    if (!toastContainer) {
                        toastContainer = document.createElement('div');
                        toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
                        toastContainer.style.zIndex = '9999';
                        document.body.appendChild(toastContainer);
                    }
                    
                    toastContainer.appendChild(toastEl);
                    const bsToast = new bootstrap.Toast(toastEl);
                    bsToast.show();
                    
                    toastEl.addEventListener('hidden.bs.toast', function() {
                        toastEl.remove();
                    });
                }
            }

            // Check Rate Limit Function
            function checkRateLimit() {
                // Check if there's a rate limit error in session
                @if(session('error') && str_contains(session('error'), 'Too many login attempts'))
                    const errorMsg = '{{ session('error') }}';
                    // Extract minutes from error message (e.g., "1 minute" or "2 minutes")
                    const minuteMatch = errorMsg.match(/(\d+)\s+minute/);
                    
                    if (minuteMatch) {
                        const minutes = parseInt(minuteMatch[1]);
                        // Always use 60 seconds (1 minute) for rate limit
                        startRateLimitTimer(60);
                    } else {
                        // Default to 60 seconds
                        startRateLimitTimer(60);
                    }
                @endif
            }

            // Start Rate Limit Timer
            function startRateLimitTimer(seconds) {
                loginBtn.disabled = true;
                rateLimitTimer.style.display = 'flex';
                
                let remainingSeconds = seconds;
                
                const timerInterval = setInterval(function() {
                    remainingSeconds--;
                    const mins = Math.floor(remainingSeconds / 60);
                    const secs = remainingSeconds % 60;
                    
                    if (remainingSeconds > 0) {
                        if (mins > 0) {
                            timerText.innerHTML = `Please wait <span id="timerSeconds">${mins} minute${mins > 1 ? 's' : ''} ${secs} second${secs !== 1 ? 's' : ''}</span> before trying again.`;
                        } else {
                            timerText.innerHTML = `Please wait <span id="timerSeconds">${secs} second${secs !== 1 ? 's' : ''}</span> before trying again.`;
                        }
                    } else {
                        clearInterval(timerInterval);
                        loginBtn.disabled = false;
                        rateLimitTimer.style.display = 'none';
                        timerText.innerHTML = 'Please wait <span id="timerSeconds">60</span> seconds before trying again.';
                    }
                }, 1000);
            }

            // Form Submission Validation
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Check if button is disabled (rate limited)
                if (loginBtn.disabled) {
                    return;
                }
                
                let isValid = true;
                let errorMessages = [];
                
                // Email validation
                const email = emailInput.value.trim();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (email === '') {
                    emailInput.classList.add('is-invalid');
                    emailError.textContent = 'Email is required';
                    errorMessages.push('Email is required');
                    isValid = false;
                } else if (!emailRegex.test(email)) {
                    emailInput.classList.add('is-invalid');
                    emailError.textContent = 'Please enter a valid email address';
                    errorMessages.push('Please enter a valid email address');
                    isValid = false;
                } else {
                    emailInput.classList.remove('is-invalid');
                    emailInput.classList.add('is-valid');
                    emailError.textContent = '';
                }
                
                // Password validation (simple - just check if not empty)
                const password = passwordInput.value;
                if (password === '') {
                    passwordInput.classList.add('is-invalid');
                    passwordError.textContent = 'Password is required';
                    errorMessages.push('Password is required');
                    isValid = false;
                } else {
                    passwordInput.classList.remove('is-invalid');
                    passwordInput.classList.add('is-valid');
                    passwordError.textContent = '';
                }
                
                if (!isValid) {
                    // Show toast with error messages using global toast
                    const errorMessage = errorMessages.join('. ');
                    if (typeof window.toast === 'function') {
                        window.toast('error', errorMessage);
                    } else if (typeof toast === 'function') {
                        toast('error', errorMessage);
                    } else {
                        showToast(errorMessage, 'error');
                    }
                } else {
                    // Show loading state
                    loginBtn.disabled = true;
                    loginBtn.classList.add('loading');
                    
                    // Submit form normally - rate limiting handled server-side
                    // If rate limited, page will reload with error and timer will start
                    form.submit();
                }
            });
        });
    </script>
    
    <!-- Global Toast System -->
    @include('common.toast')
    
    <!-- Load main.js for global toast function -->
    <script src="{{ asset('frontend/main.js') }}"></script>
    
    <!-- Show Server-Side Toast Messages -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Use global toast function
            const showToastMessage = (typeof window.toast === 'function') ? window.toast : (typeof toast === 'function' ? toast : null);
            
            if (showToastMessage) {
                @if(session('success'))
                    showToastMessage('success', '{{ session('success') }}');
                @endif

                @if(session('error'))
                    showToastMessage('error', '{{ session('error') }}');
                @endif

                @if(session('warning'))
                    showToastMessage('warning', '{{ session('warning') }}');
                @endif

                @if(session('info'))
                    showToastMessage('info', '{{ session('info') }}');
                @endif
            }
        });
    </script>
</body>
</html>
