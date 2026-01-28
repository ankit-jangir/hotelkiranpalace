@extends('admin.layout')

@section('content')
<div class="admin-content-wrapper">
    <div class="staff-form-header">
        <div class="staff-form-title-group">
            <h1 class="staff-form-title">
                <i class="fas fa-user-plus"></i> {{ isset($staff) ? 'Edit Staff Member' : 'Add New Staff Member' }}
            </h1>
            <p class="staff-form-subtitle">{{ isset($staff) ? 'Update staff details and access' : 'Create a new staff account' }}</p>
        </div>
        <a href="{{ route('admin.staff') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    <!-- Validation Errors -->
    @if($errors->any())
    <div class="alert-error">
        <i class="fas fa-exclamation-circle"></i>
        <div>
            <strong>Errors:</strong>
            <ul style="margin: 0.5rem 0 0 1.5rem;">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <div class="staff-form-container">
        <form action="{{ isset($staff) ? route('admin.staff.update', $staff->id) : route('admin.staff.store') }}" 
              method="POST" class="staff-form">
            @csrf
            @if(isset($staff))
                @method('PUT')
            @endif

            <!-- Row 1: Name and Position -->
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-user"></i> Staff Name <span class="required">*</span>
                    </label>
                    <input type="text" name="name" class="form-input" 
                           value="{{ old('name', $staff->name ?? '') }}" 
                           placeholder="Full name" required>
                    @error('name')<span class="error-text">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-briefcase"></i> Position <span class="required">*</span>
                    </label>
                    <select name="role" class="form-input" required>
                        <option value="">Select Position</option>
                        <option value="cook" {{ old('role', $staff->role ?? '') === 'cook' ? 'selected' : '' }}>🍳 Cook</option>
                        <option value="manager" {{ old('role', $staff->role ?? '') === 'manager' ? 'selected' : '' }}>👔 Manager</option>
                        <option value="hr" {{ old('role', $staff->role ?? '') === 'hr' ? 'selected' : '' }}>👨‍💼 HR</option>
                        <option value="receptionist" {{ old('role', $staff->role ?? '') === 'receptionist' ? 'selected' : '' }}>📞 Receptionist</option>
                        <option value="housekeeper" {{ old('role', $staff->role ?? '') === 'housekeeper' ? 'selected' : '' }}>🧹 Housekeeper</option>
                        <option value="maintenance" {{ old('role', $staff->role ?? '') === 'maintenance' ? 'selected' : '' }}>🔧 Maintenance</option>
                        <option value="other" {{ old('role', $staff->role ?? '') === 'other' ? 'selected' : '' }}>⚙️ Other</option>
                    </select>
                    @error('role')<span class="error-text">{{ $message }}</span>@enderror
                </div>
            </div>

            <!-- Section Title: Hotel Credentials -->
            <div class="section-divider">
                <i class="fas fa-building"></i> Hotel Login Credentials
            </div>

            <!-- Row 2: Email -->
            <div class="form-row full">
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-envelope"></i> Hotel Email (Username) <span class="required">*</span>
                    </label>
                    <input type="email" name="login_email" class="form-input" 
                           value="{{ old('login_email', $staff->login_email ?? '') }}" 
                           placeholder="staff@hotelkiran.com" required>
                    <small class="help-text">Staff uses this email to login</small>
                    @error('login_email')<span class="error-text">{{ $message }}</span>@enderror
                </div>
            </div>

            <!-- Row 3: Phone Number -->
            <div class="form-row full">
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-phone"></i> Hotel Phone (Password) <span class="required">*</span>
                    </label>
                    <div class="phone-input-wrapper">
                        <span class="phone-prefix">+91</span>
                        <input type="text" name="login_number" class="form-input phone-input" 
                               value="{{ old('login_number', $staff->login_number ?? '') }}" 
                               placeholder="7877829435" 
                               inputmode="numeric"
                               maxlength="10"
                               pattern="[0-9]{10}"
                               required>
                    </div>
                    <small class="help-text">10-digit phone number (auto-set as password)</small>
                    @error('login_number')<span class="error-text">{{ $message }}</span>@enderror
                </div>
            </div>

            @if(isset($staff))
            <!-- Row 4: Change Password (Optional for Edit) -->
            <div class="form-row full">
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-key"></i> Change Password (Optional)
                    </label>
                    <div class="phone-input-wrapper">
                        <span class="phone-prefix">+91</span>
                        <input type="text" name="password" class="form-input phone-input" 
                               placeholder="Leave blank to keep current"
                               inputmode="numeric"
                               maxlength="10"
                               pattern="[0-9]{10}">
                    </div>
                    <small class="help-text">Leave blank to keep current password, or enter new 10-digit number</small>
                    @error('password')<span class="error-text">{{ $message }}</span>@enderror
                </div>
            </div>
            @endif

            <!-- Section Title: Personal Contact -->
            <div class="section-divider">
                <i class="fas fa-mobile-alt"></i> Personal Contact Information
            </div>

            <!-- Row 5: Personal Contact -->
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-envelope"></i> Personal Email
                    </label>
                    <input type="email" name="personal_email" class="form-input" 
                           value="{{ old('personal_email', $staff->personal_email ?? '') }}" 
                           placeholder="staff.personal@gmail.com">
                    @error('personal_email')<span class="error-text">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-phone"></i> Personal Phone
                    </label>
                    <input type="text" name="personal_number" class="form-input" 
                           value="{{ old('personal_number', $staff->personal_number ?? '') }}" 
                           placeholder="1234567890"
                           inputmode="numeric">
                    @error('personal_number')<span class="error-text">{{ $message }}</span>@enderror
                </div>
            </div>

            <!-- Row 6: Address -->
            <div class="form-row full">
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-map-marker-alt"></i> Address
                    </label>
                    <textarea name="address" class="form-input" rows="3" 
                              placeholder="Staff address">{{ old('address', $staff->address ?? '') }}</textarea>
                    @error('address')<span class="error-text">{{ $message }}</span>@enderror
                </div>
            </div>

            <!-- Row 7: Status -->
            <div class="form-row full">
                <div class="form-group">
                    <label class="form-checkbox">
                        <input type="checkbox" name="is_active" value="1" 
                               {{ old('is_active', $staff->is_active ?? true) ? 'checked' : '' }}>
                        <span class="checkbox-label">
                            <i class="fas fa-toggle-on"></i> Account is Active
                        </span>
                    </label>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="form-actions">
                <button type="submit" class="btn-primary staff-form-submit">
                    <span class="btn-text">
                        <i class="fas fa-save"></i> {{ isset($staff) ? 'Update Staff' : 'Add Staff' }}
                    </span>
                    <span class="btn-loader" style="display: none;">
                        <i class="fas fa-spinner fa-spin"></i> Saving...
                    </span>
                </button>
                <a href="{{ route('admin.staff') }}" class="btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<style>
.admin-content-wrapper {
    max-width: 700px;
    margin: 0 auto;
}

.staff-form-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 2.5rem;
    padding-bottom: 1.5rem;
    border-bottom: 2px solid #e9ecef;
}

.staff-form-title-group {
    flex: 1;
}

.staff-form-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: #2c3e50;
    margin: 0 0 0.3rem 0;
}

.staff-form-subtitle {
    color: #7f8c8d;
    margin: 0;
    font-size: 0.9rem;
}

.btn-back {
    padding: 0.6rem 1.2rem;
    background: #f8f9fa;
    color: #2c3e50;
    border: none;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    transition: all 0.3s ease;
}

.btn-back:hover {
    background: #e9ecef;
    transform: translateX(-2px);
}

.alert-error {
    padding: 1rem 1.5rem;
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
    border-radius: 8px;
    margin-bottom: 1.5rem;
    display: flex;
    gap: 1rem;
    animation: slideDown 0.3s ease;
}

.alert-error i {
    flex-shrink: 0;
    font-size: 1.1rem;
}

.staff-form-container {
    background: white;
    border-radius: 12px;
    padding: 2.5rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
    margin-bottom: 1.5rem;
}

.form-row.full {
    grid-template-columns: 1fr;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.form-label {
    font-weight: 600;
    color: #2c3e50;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    gap: 0.4rem;
}

.required {
    color: #ffa100;
}

.form-input,
textarea {
    padding: 0.8rem 1rem;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 0.95rem;
    font-family: inherit;
    transition: all 0.3s ease;
}

.form-input:focus,
textarea:focus {
    border-color: #ffa100;
    box-shadow: 0 0 0 3px rgba(255, 161, 0, 0.1);
    outline: none;
}

textarea {
    resize: vertical;
    min-height: 90px;
}

.section-divider {
    font-weight: 700;
    color: #2c3e50;
    font-size: 1.05rem;
    margin: 2rem 0 1.5rem 0;
    padding-bottom: 0.8rem;
    border-bottom: 2px solid #ffa100;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.phone-input-wrapper {
    display: flex;
    align-items: center;
    gap: 0;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    overflow: hidden;
    transition: all 0.3s ease;
    background: white;
}

.phone-input-wrapper:focus-within {
    border-color: #ffa100;
    box-shadow: 0 0 0 3px rgba(255, 161, 0, 0.1);
}

.phone-prefix {
    padding: 0.8rem 1rem;
    background: linear-gradient(135deg, #ffa100 0%, #f7470f 100%);
    color: white;
    font-weight: 600;
    white-space: nowrap;
    border-right: 2px solid #f7470f;
}

.phone-input {
    flex: 1;
    border: none !important;
    box-shadow: none !important;
    padding: 0.8rem 1rem;
    font-size: 0.95rem;
}

.phone-input:focus {
    box-shadow: none !important;
}

.help-text {
    font-size: 0.8rem;
    color: #7f8c8d;
    margin-top: 0.2rem;
}

.error-text {
    color: #dc3545;
    font-size: 0.85rem;
    margin-top: -0.3rem;
}

.form-checkbox {
    display: flex;
    align-items: center;
    gap: 0.8rem;
    cursor: pointer;
    user-select: none;
    padding: 0.8rem;
    background: #f8f9fa;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.form-checkbox:hover {
    background: linear-gradient(135deg, rgba(255, 161, 0, 0.05) 0%, rgba(247, 71, 15, 0.05) 100%);
}

.form-checkbox input[type="checkbox"] {
    width: 1.3rem;
    height: 1.3rem;
    cursor: pointer;
    accent-color: #ffa100;
    flex-shrink: 0;
}

.checkbox-label {
    font-weight: 600;
    color: #2c3e50;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.form-actions {
    display: flex;
    gap: 1rem;
    margin-top: 2.5rem;
    padding-top: 2rem;
    border-top: 2px solid #e9ecef;
}

.btn-primary,
.btn-secondary {
    padding: 0.9rem 2rem;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    font-size: 0.95rem;
    flex: 1;
}

.btn-primary {
    background: linear-gradient(135deg, #ffa100 0%, #f7470f 100%);
    color: white;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 161, 0, 0.4);
}

.btn-secondary {
    background: #f8f9fa;
    color: #2c3e50;
}

.btn-secondary:hover {
    background: #e9ecef;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .staff-form-container {
        padding: 1.5rem;
    }

    .staff-form-header {
        flex-direction: column;
        gap: 1rem;
    }

    .btn-back {
        width: 100%;
        justify-content: center;
    }

    .form-row {
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .form-actions {
        flex-direction: column;
    }

    .btn-primary,
    .btn-secondary {
        width: 100%;
    }

    .staff-form-title {
        font-size: 1.4rem;
    }
}
</style>

<script>
// Auto-format phone number input
document.querySelectorAll('.phone-input').forEach(input => {
    input.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '').substring(0, 10);
    });
});

// Form submission loader
document.querySelector('.staff-form')?.addEventListener('submit', function() {
    const submitBtn = this.querySelector('.staff-form-submit');
    if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.querySelector('.btn-text').style.display = 'none';
        submitBtn.querySelector('.btn-loader').style.display = 'inline';
    }
});
</script>
@endsection