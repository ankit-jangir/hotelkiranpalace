<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create Admin - Developer</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🔐</text></svg>">
    <link href="{{ asset('css/boot.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html, body { min-height: 100vh; background: #0d1526; color: #333; font-family: system-ui, sans-serif; }
        .dev-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }
        .dev-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            max-width: 520px;
            width: 100%;
            padding: 2rem;
        }
        .dev-badge {
            display: inline-block;
            background: linear-gradient(135deg, #ffa100 0%, #f7470f 100%);
            color: #fff;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.6rem;
            border-radius: 6px;
            margin-bottom: 1rem;
        }
        .dev-title { font-size: 1.5rem; font-weight: 700; color: #0d1526; margin-bottom: 0.25rem; }
        .dev-subtitle { color: #666; font-size: 0.9rem; margin-bottom: 1.5rem; }
        .dev-form .form-label { font-weight: 500; color: #0d1526; margin-bottom: 0.35rem; }
        .dev-form .form-control {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 0.6rem 0.85rem;
        }
        .dev-form .form-control:focus { border-color: #ffa100; box-shadow: 0 0 0 3px rgba(255,161,0,0.15); }
        .dev-form .form-text { font-size: 0.8rem; color: #666; }
        .dev-form .mb-3 { margin-bottom: 1rem; }
        .dev-btn {
            background: linear-gradient(135deg, #ffa100 0%, #f7470f 100%);
            color: #fff;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            cursor: pointer;
        }
        .dev-btn:hover { opacity: 0.95; color: #fff; }
        .dev-alert { padding: 0.75rem 1rem; border-radius: 8px; margin-bottom: 1rem; }
        .dev-alert-success { background: #d4edda; color: #155724; }
        .dev-alert-success a { color: #0d1526; font-weight: 600; }
        .dev-alert-danger { background: #f8d7da; color: #721c24; }
        .dev-divider { border-top: 1px solid #eee; margin: 1.25rem 0; }
        .dev-back { font-size: 0.9rem; margin-top: 1rem; }
        .dev-back a { color: #ffa100; text-decoration: none; }
        .dev-back a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <section class="dev-section">
        <div class="dev-card">
            <span class="dev-badge">Developer / Company only</span>
            <h1 class="dev-title">Create Admin</h1>
            <p class="dev-subtitle">Set admin login and optional profile. Same as <code>php artisan admin:create</code>.</p>
            <p class="dev-subtitle" style="margin-bottom:0.5rem; font-size:0.8rem; color:#888;">Access URL: <code>/developer/create-admin?key=YOUR_SECRET</code> (query param name is <strong>key</strong>).</p>

            @if(session('success'))
                <div class="dev-alert dev-alert-success">{!! session('success') !!}</div>
            @endif
            @if($errors->any())
                <div class="dev-alert dev-alert-danger">
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
                    </ul>
                </div>
            @endif

            <form class="dev-form" action="{{ route('developer.create-admin.submit') }}" method="POST">
                @csrf
                @if($developerKey)
                    <input type="hidden" name="key" value="{{ $developerKey }}">
                @endif

                <div class="mb-3">
                    <label class="form-label">Admin name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="admin_name" value="{{ old('admin_name', $settings->admin_name ?? '') }}" placeholder="Admin display name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Login email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="admin_email" value="{{ old('admin_email', $settings->admin_email ?? '') }}" placeholder="admin@example.com" required>
                    <div class="form-text">This email is used to login to admin panel.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="admin_password" placeholder="Min 6 characters" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="admin_password_confirmation" placeholder="Same as above" required>
                </div>

                <div class="dev-divider"></div>
                <p class="form-text mb-2">Optional – profile / OTP</p>
                <div class="mb-3">
                    <label class="form-label">Main email</label>
                    <input type="email" class="form-control" name="admin_email_1" value="{{ old('admin_email_1', $settings->admin_email_1 ?? '') }}" placeholder="Profile main email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Second email</label>
                    <input type="email" class="form-control" name="admin_email_2" value="{{ old('admin_email_2', $settings->admin_email_2 ?? '') }}" placeholder="Optional">
                </div>
                <div class="mb-3">
                    <label class="form-label">Main number</label>
                    <input type="text" class="form-control" name="admin_number_1" value="{{ old('admin_number_1', $settings->admin_number_1 ?? '') }}" placeholder="For OTP / forgot password">
                </div>
                <div class="mb-3">
                    <label class="form-label">Second number</label>
                    <input type="text" class="form-control" name="admin_number_2" value="{{ old('admin_number_2', $settings->admin_number_2 ?? '') }}" placeholder="Optional">
                </div>

                <button type="submit" class="dev-btn">
                    <i class="fas fa-user-plus me-2"></i> Create / Update Admin
                </button>
            </form>

            <div class="dev-back">
                <a href="{{ route('admin.login') }}"><i class="fas fa-arrow-left me-1"></i> Admin login</a>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/boot.js') }}"></script>
</body>
</html>
