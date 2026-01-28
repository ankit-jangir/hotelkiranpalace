@extends('admin.layout')

@section('title', 'Profile - Admin Dashboard')
@section('page-title', 'Profile')

@push('styles')
<style>
/* Profile Page Styles */
.admin-profile-container {
    padding: 0;
}

.admin-profile-tabs {
    display: flex;
    gap: 0.5rem;
    border-bottom: 2px solid #e0e0e0;
    margin-bottom: 2rem;
    flex-wrap: wrap;
}

@media (max-width: 768px) {
    .admin-profile-tabs {
        flex-direction: column;
        gap: 0;
    }
}

.admin-profile-tab {
    padding: 0.75rem 1.5rem;
    background: transparent;
    border: none;
    border-bottom: 3px solid transparent;
    color: #666;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    font-size: 0.95rem;
}

.admin-profile-tab:hover {
    color: #ffa100;
    background: rgba(255, 161, 0, 0.05);
}

.admin-profile-tab.active {
    color: #ffa100;
    border-bottom-color: #ffa100;
    background: rgba(255, 161, 0, 0.05);
}

.admin-profile-tab-content {
    display: none;
}

.admin-profile-tab-content.active {
    display: block;
}

.admin-profile-avatar-large {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: linear-gradient(135deg, #ffa100 0%, #f7470f 100%);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    box-shadow: 0 4px 12px rgba(255, 161, 0, 0.3);
    margin: 0 auto 1.5rem;
}

.admin-profile-form-group {
    margin-bottom: 1.5rem;
}

.admin-profile-form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: #0d1526;
    font-size: 0.9rem;
}

.admin-profile-form-label .required {
    color: #dc3545;
    margin-left: 2px;
}

.admin-profile-form-input {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.admin-profile-form-input:focus {
    outline: none;
    border-color: #ffa100;
    box-shadow: 0 0 0 3px rgba(255, 161, 0, 0.1);
}

.admin-profile-form-input[readonly] {
    background-color: #f8f9fa;
    cursor: not-allowed;
}

.admin-profile-btn {
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 8px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.admin-profile-btn-primary {
    background: linear-gradient(135deg, #ffa100 0%, #f7470f 100%);
    color: #ffffff;
}

.admin-profile-btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 161, 0, 0.3);
}

.admin-profile-btn-secondary {
    background: #f8f9fa;
    color: #666;
}

.admin-profile-btn-secondary:hover {
    background: #e9ecef;
}

.admin-profile-btn-danger {
    background: #dc3545;
    color: #ffffff;
}

.admin-profile-btn-danger:hover {
    background: #c82333;
}

.admin-profile-info-card {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 1rem;
    margin-bottom: 1rem;
}

.admin-profile-info-label {
    font-size: 0.85rem;
    color: #666;
    margin-bottom: 0.25rem;
}

.admin-profile-info-value {
    font-size: 1rem;
    color: #0d1526;
    font-weight: 500;
}

/* OTP Modal Styles */
.admin-otp-modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9998;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.admin-otp-modal-overlay.show {
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 1;
}

.admin-otp-modal {
    background: #ffffff;
    border-radius: 12px;
    padding: 2rem;
    max-width: 500px;
    width: 90%;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    z-index: 9999;
    position: relative;
}

@media (max-width: 768px) {
    .admin-otp-modal {
        padding: 1.5rem;
        width: 95%;
    }
}

.admin-otp-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
}

.admin-otp-modal-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #0d1526;
    margin: 0;
}

.admin-otp-modal-close {
    background: transparent;
    border: none;
    font-size: 1.5rem;
    color: #666;
    cursor: pointer;
    padding: 0;
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 6px;
    transition: all 0.3s ease;
}

.admin-otp-modal-close:hover {
    background: rgba(220, 53, 69, 0.1);
    color: #dc3545;
}

.admin-otp-steps {
    display: flex;
    gap: 0.5rem;
    margin-bottom: 1.5rem;
    justify-content: center;
}

.admin-otp-step {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.85rem;
    background: #e0e0e0;
    color: #666;
}

.admin-otp-step.active {
    background: linear-gradient(135deg, #ffa100 0%, #f7470f 100%);
    color: #ffffff;
}

.admin-otp-step.completed {
    background: #28a745;
    color: #ffffff;
}

.admin-otp-step-indicator {
    width: 40px;
    height: 2px;
    background: #e0e0e0;
    margin-top: 14px;
}

.admin-otp-step-indicator.active {
    background: linear-gradient(135deg, #ffa100 0%, #f7470f 100%);
}

.admin-otp-form-step {
    display: none;
}

.admin-otp-form-step.active {
    display: block;
}

.admin-otp-resend {
    text-align: center;
    margin-top: 1rem;
    font-size: 0.9rem;
    color: #666;
}

.admin-otp-resend a {
    color: #ffa100;
    text-decoration: none;
    cursor: pointer;
}

.admin-otp-resend a:hover {
    text-decoration: underline;
}

.admin-otp-resend.disabled {
    opacity: 0.5;
    pointer-events: none;
}

/* Button loading state (same as login) */
.admin-profile-btn .btn-loader,
.admin-profile-btn .profile-btn-loader {
    display: none;
}

.admin-profile-btn.loading .btn-text,
.admin-profile-btn.loading .profile-btn-text {
    display: none;
}

.admin-profile-btn.loading .btn-loader,
.admin-profile-btn.loading .profile-btn-loader {
    display: inline-flex !important;
    align-items: center;
    gap: 0.35rem;
}

.admin-profile-btn:disabled {
    opacity: 0.7;
    cursor: not-allowed;
    pointer-events: none;
}
</style>
@endpush

@section('content')
<div class="admin-profile-container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Admin Profile</h5>
                </div>
                <div class="card-body">
                    <!-- Avatar and Basic Info -->
                    <div class="text-center mb-4">
                        <div class="admin-profile-avatar-large">
                            <i class="fas fa-user"></i>
                        </div>
                        <h5 class="mb-1">{{ $adminSettings->admin_name ?? session('admin_username') ?? 'Admin' }}</h5>
                        <p class="text-muted mb-0">Administrator</p>
                    </div>

                    <!-- Tabs -->
                    <div class="admin-profile-tabs">
                        <button class="admin-profile-tab active" onclick="switchTab('view')">
                            <i class="fas fa-user me-2"></i>View Profile
                        </button>
                        <button class="admin-profile-tab" onclick="switchTab('password')">
                            <i class="fas fa-lock me-2"></i>Change Password
                        </button>
                    </div>

                    <!-- View Profile Tab -->
                    <div id="viewTab" class="admin-profile-tab-content active">
                        <form id="profileForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="admin-profile-form-group">
                                        <label class="admin-profile-form-label">Name <span class="text-muted"
                                                style="font-size: 0.8rem;">(Optional)</span></label>
                                        <input type="text" class="admin-profile-form-input" id="adminName"
                                            name="admin_name"
                                            value="{{ $adminSettings->admin_name ?? session('admin_username') ?? '' }}"
                                            placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-profile-form-group">
                                        <label class="admin-profile-form-label">Email Address <span class="text-muted"
                                                style="font-size: 0.8rem;">(Optional)</span></label>
                                        <input type="email" class="admin-profile-form-input" id="adminEmail"
                                            name="admin_email"
                                            value="{{ $adminSettings->admin_email ?? session('admin_email') ?? '' }}"
                                            placeholder="Enter your email">
                                        <small class="text-muted">This is your login email address</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="admin-profile-form-group">
                                        <label class="admin-profile-form-label">Main Email</label>
                                        <input type="email" class="admin-profile-form-input" id="adminEmail1"
                                            name="admin_email_1" value="{{ $adminSettings->admin_email_1 ?? '' }}"
                                            placeholder="Main email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-profile-form-group">
                                        <label class="admin-profile-form-label">Second Email <span class="text-muted"
                                                style="font-size: 0.8rem;">(Optional)</span></label>
                                        <input type="email" class="admin-profile-form-input" id="adminEmail2"
                                            name="admin_email_2" value="{{ $adminSettings->admin_email_2 ?? '' }}"
                                            placeholder="Second email">
                                    </div>
                                </div>
                            </div>

                            @php
                            $hasAnyNumber = !empty($adminSettings->admin_number_1 ?? '') ||
                            !empty($adminSettings->admin_number_2 ?? '');
                            @endphp
                            <div class="row">
                                <div class="col-12">
                                    @if(!$hasAnyNumber)
                                    <div class="admin-profile-info-card mb-3"
                                        style="background: rgba(255, 161, 0, 0.08); border: 1px dashed #ffa100;">
                                        <div class="d-flex align-items-center gap-2 mb-0">
                                            <i class="fas fa-phone-alt text-warning"></i>
                                            <span class="admin-profile-info-value mb-0">No contact numbers added yet.
                                                Add your main number below to use OTP for forget password.</span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-profile-form-group">
                                        <label class="admin-profile-form-label">Main Number</label>
                                        <input type="text" class="admin-profile-form-input" id="adminNumber1"
                                            name="admin_number_1" value="{{ $adminSettings->admin_number_1 ?? '' }}"
                                            placeholder="{{ $hasAnyNumber ? 'Main phone number' : 'Add main phone number (OTP will go here)' }}">
                                        @if(!$hasAnyNumber)
                                        <small class="text-muted">Required for OTP-based password reset</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="admin-profile-form-group">
                                        <label class="admin-profile-form-label">Second Number <span class="text-muted"
                                                style="font-size: 0.8rem;">(Optional)</span></label>
                                        <input type="text" class="admin-profile-form-input" id="adminNumber2"
                                            name="admin_number_2" value="{{ $adminSettings->admin_number_2 ?? '' }}"
                                            placeholder="{{ $hasAnyNumber ? 'Second phone number' : 'Add second phone number' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="admin-profile-info-card">
                                <div class="admin-profile-info-label">Last Login</div>
                                <div class="admin-profile-info-value">
                                    {{ session('admin_login_time') ? \Carbon\Carbon::parse(session('admin_login_time'))->format('d M Y, h:i A') : 'N/A' }}
                                </div>
                            </div>

                            <div class="admin-profile-info-card">
                                <div class="admin-profile-info-label">Role</div>
                                <div class="admin-profile-info-value">Super Administrator</div>
                            </div>

                            <div class="admin-profile-form-group">
                                <button type="button" id="btnUpdateProfile"
                                    class="admin-profile-btn admin-profile-btn-primary" onclick="updateProfile()">
                                    <span class="btn-text"><i class="fas fa-save"></i> <span>Update
                                            Profile</span></span>
                                    <span class="btn-loader" style="display:none;"><span
                                            class="spinner-border spinner-border-sm me-2" role="status"></span>
                                        Updating...</span>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Change Password Tab -->
                    <div id="passwordTab" class="admin-profile-tab-content">
                        <form id="passwordForm">
                            @csrf
                            <div class="admin-profile-form-group">
                                <label class="admin-profile-form-label">Current Password <span
                                        class="required">*</span></label>
                                <input type="password" class="admin-profile-form-input" id="currentPassword"
                                    name="current_password" placeholder="Enter current password" required>
                            </div>
                            <div class="admin-profile-form-group">
                                <label class="admin-profile-form-label">New Password <span
                                        class="required">*</span></label>
                                <input type="password" class="admin-profile-form-input" id="newPassword"
                                    name="new_password" placeholder="Enter new password" required>
                                <small class="text-muted">Minimum 6 characters</small>
                            </div>
                            <div class="admin-profile-form-group">
                                <label class="admin-profile-form-label">Confirm New Password <span
                                        class="required">*</span></label>
                                <input type="password" class="admin-profile-form-input" id="confirmPassword"
                                    name="confirm_password" placeholder="Confirm new password" required>
                            </div>
                            <div class="admin-profile-form-group">
                                <button type="button" id="btnChangePassword"
                                    class="admin-profile-btn admin-profile-btn-primary" onclick="updatePassword()">
                                    <span class="btn-text"><i class="fas fa-key"></i> <span>Change
                                            Password</span></span>
                                    <span class="btn-loader" style="display:none;"><span
                                            class="spinner-border spinner-border-sm me-2" role="status"></span>
                                        Updating...</span>
                                </button>
                            </div>
                        </form>

                        <div class="mt-4 pt-4 border-top">
                            <h6 class="mb-3">Forgot Password?</h6>
                            <p class="text-muted mb-3">If you've forgotten your password, you can reset it using OTP
                                verification sent to your main phone number.</p>
                            <button type="button" class="admin-profile-btn admin-profile-btn-secondary"
                                onclick="openForgotPasswordModal()">
                                <i class="fas fa-unlock-alt"></i>
                                <span>Reset Password via OTP</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Forgot Password OTP Modal -->
<div id="otpModalOverlay" class="admin-otp-modal-overlay" onclick="closeOtpModal()">
    <div class="admin-otp-modal" onclick="event.stopPropagation()">
        <div class="admin-otp-modal-header">
            <h3 class="admin-otp-modal-title">Reset Password via OTP</h3>
            <button type="button" class="admin-otp-modal-close" onclick="closeOtpModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Step Indicators -->
        <div class="admin-otp-steps">
            <div class="admin-otp-step active" id="step1">1</div>
            <div class="admin-otp-step-indicator active" id="indicator1"></div>
            <div class="admin-otp-step" id="step2">2</div>
            <div class="admin-otp-step-indicator" id="indicator2"></div>
            <div class="admin-otp-step" id="step3">3</div>
        </div>

        <!-- Step 1: Enter Phone Number -->
        <div id="otpStep1" class="admin-otp-form-step active">
            @if(empty($adminSettings->admin_number_1))
            <div class="admin-profile-info-card mb-3"
                style="background: rgba(255, 161, 0, 0.08); border: 1px dashed #ffa100;">
                <div class="admin-profile-info-value mb-0" style="font-size: 0.95rem;">Add your main phone number in
                    <strong>View Profile</strong> first. OTP will be sent to that number.</div>
            </div>
            @endif
            <div class="admin-profile-form-group">
                <label class="admin-profile-form-label">Enter Your Main Phone Number <span
                        class="required">*</span></label>
                <input type="text" class="admin-profile-form-input" id="otpPhoneNumber" placeholder="+91 1234567890"
                    value="{{ $adminSettings->admin_number_1 ?? '' }}">
                <small class="text-muted">Enter the same number you added in Profile. OTP will be sent to this
                    number.</small>
            </div>
            <div class="admin-profile-form-group">
                <button type="button" id="btnSendOtp" class="admin-profile-btn admin-profile-btn-primary w-100"
                    onclick="sendOTP()" @if(empty($adminSettings->admin_number_1)) title="Add main number in View
                    Profile first" @endif>
                    <span class="btn-text"><i class="fas fa-paper-plane"></i> <span>Send OTP</span></span>
                    <span class="btn-loader" style="display:none;"><span class="spinner-border spinner-border-sm me-2"
                            role="status"></span> Sending...</span>
                </button>
            </div>
        </div>

        <!-- Step 2: Verify OTP -->
        <div id="otpStep2" class="admin-otp-form-step">
            <div class="admin-profile-form-group">
                <label class="admin-profile-form-label">Enter OTP <span class="required">*</span></label>
                <input type="text" class="admin-profile-form-input" id="otpCode" placeholder="Enter 6-digit OTP"
                    maxlength="6">
                <small class="text-muted">
                    Enter the OTP sent to your phone number.
                    <span id="otpValidityTimer" style="margin-left:6px; font-weight:600;"></span>
                </small>
            </div>
            <div class="admin-profile-form-group">
                <button type="button" id="btnVerifyOtp" class="admin-profile-btn admin-profile-btn-primary w-100"
                    onclick="verifyOTP()">
                    <span class="btn-text"><i class="fas fa-check"></i> <span>Verify OTP</span></span>
                    <span class="btn-loader" style="display:none;"><span class="spinner-border spinner-border-sm me-2"
                            role="status"></span> Verifying...</span>
                </button>
            </div>
            <div class="admin-otp-resend" id="otpResend">
                <span>Didn't receive OTP? </span>
                <a href="#" onclick="sendOTP(); return false;">Resend OTP</a>
                <span id="otpResendTimer" style="margin-left:6px; font-size:0.85rem; color:#999;"></span>
            </div>
        </div>

        <!-- Step 3: Set New Password -->
        <div id="otpStep3" class="admin-otp-form-step">
            <div class="admin-profile-form-group">
                <label class="admin-profile-form-label">New Password <span class="required">*</span></label>
                <input type="password" class="admin-profile-form-input" id="resetPassword"
                    placeholder="Enter new password" required>
                <small class="text-muted">Minimum 6 characters</small>
            </div>
            <div class="admin-profile-form-group">
                <label class="admin-profile-form-label">Confirm New Password <span class="required">*</span></label>
                <input type="password" class="admin-profile-form-input" id="resetConfirmPassword"
                    placeholder="Confirm new password" required>
            </div>
            <div class="admin-profile-form-group">
                <button type="button" id="btnResetPassword" class="admin-profile-btn admin-profile-btn-primary w-100"
                    onclick="resetPassword()">
                    <span class="btn-text"><i class="fas fa-save"></i> <span>Reset Password</span></span>
                    <span class="btn-loader" style="display:none;"><span class="spinner-border spinner-border-sm me-2"
                            role="status"></span> Resetting...</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let currentTab = 'view';
let otpVerified = false;
let otpResendInterval = null;
let otpResendSeconds = 0;
let otpValidInterval = null;
let otpValidSeconds = 0;

function switchTab(tab) {
    currentTab = tab;

    // Update tabs
    document.querySelectorAll('.admin-profile-tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.admin-profile-tab-content').forEach(c => c.classList.remove('active'));

    if (tab === 'view') {
        document.querySelector('.admin-profile-tab:first-child').classList.add('active');
        document.getElementById('viewTab').classList.add('active');
    } else {
        document.querySelector('.admin-profile-tab:last-child').classList.add('active');
        document.getElementById('passwordTab').classList.add('active');
    }
}

function setProfileBtnLoading(btnId, loading) {
    const el = document.getElementById(btnId);
    if (!el) return;
    el.disabled = loading;
    el.classList.toggle('loading', loading);
}

function updateProfile() {
    const btn = document.getElementById('btnUpdateProfile');
    if (btn && btn.disabled) return;
    setProfileBtnLoading('btnUpdateProfile', true);
    const data = {
        admin_name: document.getElementById('adminName').value.trim() || null,
        admin_email: document.getElementById('adminEmail').value.trim() || null,
        admin_email_1: document.getElementById('adminEmail1').value.trim() || null,
        admin_email_2: document.getElementById('adminEmail2').value.trim() || null,
        admin_number_1: document.getElementById('adminNumber1').value.trim() || null,
        admin_number_2: document.getElementById('adminNumber2').value.trim() || null,
    };
    fetch('/admin/profile', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            setProfileBtnLoading('btnUpdateProfile', false);
            if (result.success) {
                if (typeof window.toast === 'function') window.toast('success', result.message);
                else alert(result.message);
                setTimeout(() => location.reload(), 1000);
            } else {
                const errorMsg = result.errors ? Object.values(result.errors).flat().join(', ') : (result.message ||
                    'Error updating profile');
                if (typeof window.toast === 'function') window.toast('error', errorMsg);
                else alert(errorMsg);
            }
        })
        .catch(error => {
            setProfileBtnLoading('btnUpdateProfile', false);
            console.error('Error:', error);
            if (typeof window.toast === 'function') window.toast('error', 'Error updating profile');
            else alert('Error updating profile');
        });
}

function updatePassword() {
    const currentPassword = document.getElementById('currentPassword').value;
    const newPassword = document.getElementById('newPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    if (!currentPassword || !newPassword || !confirmPassword) {
        if (typeof window.toast === 'function') window.toast('error', 'All password fields are required');
        else alert('All password fields are required');
        return;
    }
    if (newPassword !== confirmPassword) {
        if (typeof window.toast === 'function') window.toast('error', 'New password and confirm password do not match');
        else alert('New password and confirm password do not match');
        return;
    }
    if (newPassword.length < 6) {
        if (typeof window.toast === 'function') window.toast('error', 'Password must be at least 6 characters long');
        else alert('Password must be at least 6 characters long');
        return;
    }
    const btn = document.getElementById('btnChangePassword');
    if (btn && btn.disabled) return;
    setProfileBtnLoading('btnChangePassword', true);
    const data = {
        current_password: currentPassword,
        admin_password: newPassword
    };
    fetch('/admin/profile', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            setProfileBtnLoading('btnChangePassword', false);
            if (result.success) {
                if (typeof window.toast === 'function') window.toast('success', result.message);
                else alert(result.message);
                document.getElementById('passwordForm').reset();
                setTimeout(() => location.reload(), 1500);
            } else {
                const errorMsg = result.errors ? Object.values(result.errors).flat().join(', ') : (result.message ||
                    'Error updating password');
                if (typeof window.toast === 'function') window.toast('error', errorMsg);
                else alert(errorMsg);
            }
        })
        .catch(error => {
            setProfileBtnLoading('btnChangePassword', false);
            console.error('Error:', error);
            if (typeof window.toast === 'function') window.toast('error', 'Error updating password');
            else alert('Error updating password');
        });
}

function openForgotPasswordModal() {
    document.getElementById('otpModalOverlay').classList.add('show');
    resetOtpSteps();
}

function closeOtpModal() {
    document.getElementById('otpModalOverlay').classList.remove('show');
    setTimeout(() => {
        resetOtpSteps();
        document.getElementById('otpPhoneNumber').value = '';
        document.getElementById('otpCode').value = '';
        document.getElementById('resetPassword').value = '';
        document.getElementById('resetConfirmPassword').value = '';
        otpVerified = false;
    }, 300);
}

function resetOtpSteps() {
    // Reset to step 1
    document.getElementById('otpStep1').classList.add('active');
    document.getElementById('otpStep2').classList.remove('active');
    document.getElementById('otpStep3').classList.remove('active');

    document.getElementById('step1').classList.add('active');
    document.getElementById('step2').classList.remove('active', 'completed');
    document.getElementById('step3').classList.remove('active', 'completed');
    document.getElementById('indicator1').classList.add('active');
    document.getElementById('indicator2').classList.remove('active');

    // Reset resend timer UI
    const timerEl = document.getElementById('otpResendTimer');
    if (timerEl) timerEl.textContent = '';
    if (otpResendInterval) {
        clearInterval(otpResendInterval);
        otpResendInterval = null;
    }

    const validEl = document.getElementById('otpValidityTimer');
    if (validEl) validEl.textContent = '';
    if (otpValidInterval) {
        clearInterval(otpValidInterval);
        otpValidInterval = null;
    }
    setProfileBtnLoading('btnVerifyOtp', false);
}

function startOtpResendTimer(seconds) {
    otpResendSeconds = seconds;
    const timerEl = document.getElementById('otpResendTimer');
    const resendWrapper = document.getElementById('otpResend');
    if (!timerEl || !resendWrapper) return;

    const update = () => {
        if (otpResendSeconds <= 0) {
            timerEl.textContent = '';
            resendWrapper.classList.remove('disabled');
            if (otpResendInterval) {
                clearInterval(otpResendInterval);
                otpResendInterval = null;
            }
            return;
        }
        const m = String(Math.floor(otpResendSeconds / 60)).padStart(2, '0');
        const s = String(otpResendSeconds % 60).padStart(2, '0');
        timerEl.textContent = `( ${m}:${s} )`;
        otpResendSeconds -= 1;
    };

    resendWrapper.classList.add('disabled');
    update();
    if (otpResendInterval) clearInterval(otpResendInterval);
    otpResendInterval = setInterval(update, 1000);
}

function startOtpValidityTimer(seconds) {
    otpValidSeconds = seconds;
    const validEl = document.getElementById('otpValidityTimer');
    if (!validEl) return;

    const update = () => {
        if (otpValidSeconds <= 0) {
            validEl.textContent = '( OTP expired )';
            const verifyBtn = document.getElementById('btnVerifyOtp');
            if (verifyBtn) verifyBtn.disabled = true;
            if (otpValidInterval) {
                clearInterval(otpValidInterval);
                otpValidInterval = null;
            }
            return;
        }
        const m = String(Math.floor(otpValidSeconds / 60)).padStart(2, '0');
        const s = String(otpValidSeconds % 60).padStart(2, '0');
        validEl.textContent = `( valid ${m}:${s} )`;
        otpValidSeconds -= 1;
    };

    const verifyBtn = document.getElementById('btnVerifyOtp');
    if (verifyBtn) verifyBtn.disabled = false;
    update();
    if (otpValidInterval) clearInterval(otpValidInterval);
    otpValidInterval = setInterval(update, 1000);
}

function sendOTP() {
    const phoneNumber = document.getElementById('otpPhoneNumber').value.trim();
    if (!phoneNumber) {
        if (typeof window.toast === 'function') window.toast('error', 'Please enter your phone number');
        else alert('Please enter your phone number');
        return;
    }
    const btn = document.getElementById('btnSendOtp');
    if (btn && btn.disabled) return;
    setProfileBtnLoading('btnSendOtp', true);
    fetch('/admin/send-otp', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                phone_number: phoneNumber
            })
        })
        .then(response => response.json())
        .then(result => {
            setProfileBtnLoading('btnSendOtp', false);
            if (result.success) {
                const uiMsg = 'Hotel admin one time password has been sent. It will be valid for a short time.';
                if (typeof window.toast === 'function') window.toast('success', uiMsg);
                else alert(uiMsg);
                document.getElementById('otpStep1').classList.remove('active');
                document.getElementById('otpStep2').classList.add('active');
                document.getElementById('step1').classList.remove('active');
                document.getElementById('step1').classList.add('completed');
                document.getElementById('step2').classList.add('active');
                document.getElementById('indicator2').classList.add('active');
                startOtpResendTimer(60);
                startOtpValidityTimer(60);
            } else {
                const errorMsg = result.message || 'Error sending OTP';
                if (typeof window.toast === 'function') window.toast('error', errorMsg);
                else alert(errorMsg);
            }
        })
        .catch(error => {
            setProfileBtnLoading('btnSendOtp', false);
            console.error('Error:', error);
            if (typeof window.toast === 'function') window.toast('error', 'Error sending OTP');
            else alert('Error sending OTP');
        });
}

function verifyOTP() {
    const otpCode = document.getElementById('otpCode').value.trim();
    if (!otpCode || otpCode.length !== 6) {
        if (typeof window.toast === 'function') window.toast('error', 'Please enter a valid 6-digit OTP');
        else alert('Please enter a valid 6-digit OTP');
        return;
    }
    const btn = document.getElementById('btnVerifyOtp');
    if (btn && btn.disabled) return;
    setProfileBtnLoading('btnVerifyOtp', true);
    fetch('/admin/verify-otp', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                otp: otpCode
            })
        })
        .then(response => response.json())
        .then(result => {
            setProfileBtnLoading('btnVerifyOtp', false);
            if (result.success) {
                if (typeof window.toast === 'function') window.toast('success', result.message ||
                    'OTP verified successfully!');
                else alert(result.message || 'OTP verified successfully!');
                otpVerified = true;
                document.getElementById('otpStep2').classList.remove('active');
                document.getElementById('otpStep3').classList.add('active');
                document.getElementById('step2').classList.remove('active');
                document.getElementById('step2').classList.add('completed');
                document.getElementById('step3').classList.add('active');
            } else {
                const errorMsg = result.message || 'Invalid OTP';
                if (typeof window.toast === 'function') window.toast('error', errorMsg);
                else alert(errorMsg);
            }
        })
        .catch(error => {
            setProfileBtnLoading('btnVerifyOtp', false);
            console.error('Error:', error);
            if (typeof window.toast === 'function') window.toast('error', 'Error verifying OTP');
            else alert('Error verifying OTP');
        });
}

function resetPassword() {
    if (!otpVerified) {
        if (typeof window.toast === 'function') window.toast('error', 'Please verify OTP first');
        else alert('Please verify OTP first');
        return;
    }
    const newPassword = document.getElementById('resetPassword').value;
    const confirmPassword = document.getElementById('resetConfirmPassword').value;
    if (!newPassword || !confirmPassword) {
        if (typeof window.toast === 'function') window.toast('error', 'Please enter both password fields');
        else alert('Please enter both password fields');
        return;
    }
    if (newPassword !== confirmPassword) {
        if (typeof window.toast === 'function') window.toast('error', 'Passwords do not match');
        else alert('Passwords do not match');
        return;
    }
    if (newPassword.length < 6) {
        if (typeof window.toast === 'function') window.toast('error', 'Password must be at least 6 characters long');
        else alert('Password must be at least 6 characters long');
        return;
    }
    const btn = document.getElementById('btnResetPassword');
    if (btn && btn.disabled) return;
    setProfileBtnLoading('btnResetPassword', true);
    fetch('/admin/reset-password-otp', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                password: newPassword,
                confirm_password: confirmPassword
            })
        })
        .then(response => response.json())
        .then(result => {
            setProfileBtnLoading('btnResetPassword', false);
            if (result.success) {
                if (typeof window.toast === 'function') window.toast('success', result.message ||
                    'Password reset successfully!');
                else alert(result.message || 'Password reset successfully!');
                setTimeout(() => {
                    closeOtpModal();
                    window.location.href = '/login/hotelkiranpalace/admin';
                }, 1500);
            } else {
                const errorMsg = result.message || 'Error resetting password';
                if (typeof window.toast === 'function') window.toast('error', errorMsg);
                else alert(errorMsg);
            }
        })
        .catch(error => {
            setProfileBtnLoading('btnResetPassword', false);
            console.error('Error:', error);
            if (typeof window.toast === 'function') window.toast('error', 'Error resetting password');
            else alert('Error resetting password');
        });
}
</script>

<!-- Load main.js for global toast function -->
<script src="{{ asset('frontend/main.js') }}"></script>
@endpush