@extends('admin.layout')

@section('title', 'Settings - Admin Dashboard')
@section('page-title', 'Settings')

@push('styles')
<style>
/* Settings Page Styles */
.admin-settings-container {
    padding: 0;
}

.admin-settings-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    flex-wrap: wrap;
    gap: 1rem;
}

.admin-settings-title {
    font-size: 1.75rem;
    font-weight: 600;
    color: #0d1526;
    margin: 0;
}

.admin-settings-edit-btn {
    background: linear-gradient(135deg, #ffa100 0%, #f7470f 100%);
    color: #ffffff;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 500;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(255, 161, 0, 0.3);
}

.admin-settings-edit-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 161, 0, 0.4);
}

.admin-settings-cards-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

@media (max-width: 768px) {
    .admin-settings-cards-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
}

.admin-settings-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 1.5rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    position: relative;
    border: 1px solid #e0e0e0;
}

.admin-settings-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
}

.admin-settings-card-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 1rem;
}

.admin-settings-card-type {
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    padding: 0.25rem 0.75rem;
    border-radius: 4px;
    background: linear-gradient(135deg, #ffa100 0%, #f7470f 100%);
    color: #ffffff;
}

.admin-settings-card-value {
    font-size: 0.9rem;
    color: #666;
    word-break: break-word;
}

.admin-settings-card-value a {
    color: #f7470f;
    text-decoration: none;
}

.admin-settings-card-value a:hover {
    text-decoration: underline;
}

.admin-settings-section-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #0d1526;
    margin: 2rem 0 1rem 0;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid #ffa100;
}

.admin-settings-section-title:first-child {
    margin-top: 0;
}

/* Right Side Panel */
.admin-settings-panel-overlay {
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

.admin-settings-panel-overlay.show {
    display: block;
    opacity: 1;
}

.admin-settings-panel {
    position: fixed;
    top: 0;
    right: -100%;
    width: 75%;
    max-width: 900px;
    height: 100vh;
    background: #ffffff;
    box-shadow: -4px 0 20px rgba(0, 0, 0, 0.2);
    z-index: 9999;
    transition: right 0.4s ease;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.admin-settings-panel.show {
    right: 0;
}

@media (max-width: 768px) {
    .admin-settings-panel {
        width: 100%;
        max-width: 100%;
    }
}

.admin-settings-panel-header {
    padding: 1.5rem;
    border-bottom: 1px solid #e0e0e0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-shrink: 0;
    background: #ffffff;
    position: sticky;
    top: 0;
    z-index: 10;
}

.admin-settings-modal-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #0d1526;
    margin: 0;
}

.admin-settings-panel-close {
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

.admin-settings-panel-close:hover {
    background: rgba(220, 53, 69, 0.1);
    color: #dc3545;
}

.admin-settings-panel-body {
    padding: 2rem;
    overflow-y: auto;
    flex: 1;
    background: #ffffff;
}

.admin-settings-panel-footer {
    padding: 1.5rem;
    border-top: 1px solid #e0e0e0;
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
    flex-shrink: 0;
    background: #ffffff;
    position: sticky;
    bottom: 0;
    z-index: 10;
}

.admin-settings-form-group {
    margin-bottom: 1.5rem;
}

.admin-settings-form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: #0d1526;
    font-size: 0.9rem;
}

.admin-settings-form-input,
.admin-settings-form-textarea {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.admin-settings-form-input:focus,
.admin-settings-form-textarea:focus {
    outline: none;
    border-color: #ffa100;
    box-shadow: 0 0 0 3px rgba(255, 161, 0, 0.1);
}

.admin-settings-form-textarea {
    resize: vertical;
    min-height: 100px;
}

.admin-settings-btn {
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 8px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

.admin-settings-btn-primary {
    background: linear-gradient(135deg, #ffa100 0%, #f7470f 100%);
    color: #ffffff;
}

.admin-settings-btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255, 161, 0, 0.3);
}

.admin-settings-btn-secondary {
    background: #f8f9fa;
    color: #666;
}

.admin-settings-btn-secondary:hover {
    background: #e9ecef;
}

.admin-settings-staff-group,
.admin-settings-admin-group {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
    margin-top: 1rem;
}

@media (max-width: 768px) {

    .admin-settings-staff-group,
    .admin-settings-admin-group {
        grid-template-columns: 1fr;
    }
}

.admin-settings-empty-state {
    text-align: center;
    padding: 3rem 1rem;
    color: #999;
}

.admin-settings-empty-state i {
    font-size: 3rem;
    margin-bottom: 1rem;
    opacity: 0.5;
}
</style>
@endpush

@section('content')
<div class="admin-settings-container">
    <div class="admin-settings-header">
        <h2 class="admin-settings-title">Settings</h2>
        <button type="button" class="admin-settings-edit-btn" onclick="openSettingsPanel()">
            <i class="fas fa-edit"></i>
            <span>Edit Settings</span>
        </button>
    </div>

    @if($settings)
    <div class="admin-settings-cards-grid">
        <!-- Staff Section -->
        <h3 class="admin-settings-section-title">Staff Information</h3>

        @if($settings->staff_email_1)
        <div class="admin-settings-card">
            <div class="admin-settings-card-header">
                <span class="admin-settings-card-type">Staff Email 1</span>
            </div>
            <div class="admin-settings-card-value">
                <a href="mailto:{{ $settings->staff_email_1 }}">{{ $settings->staff_email_1 }}</a>
            </div>
        </div>
        @endif

        @if($settings->staff_email_2)
        <div class="admin-settings-card">
            <div class="admin-settings-card-header">
                <span class="admin-settings-card-type">Staff Email 2</span>
            </div>
            <div class="admin-settings-card-value">
                <a href="mailto:{{ $settings->staff_email_2 }}">{{ $settings->staff_email_2 }}</a>
            </div>
        </div>
        @endif

        @if($settings->staff_email_3)
        <div class="admin-settings-card">
            <div class="admin-settings-card-header">
                <span class="admin-settings-card-type">Staff Email 3</span>
            </div>
            <div class="admin-settings-card-value">
                <a href="mailto:{{ $settings->staff_email_3 }}">{{ $settings->staff_email_3 }}</a>
            </div>
        </div>
        @endif

        @if($settings->staff_number_1)
        <div class="admin-settings-card">
            <div class="admin-settings-card-header">
                <span class="admin-settings-card-type">Staff Number 1</span>
            </div>
            <div class="admin-settings-card-value">
                <a href="tel:{{ $settings->staff_number_1 }}">{{ $settings->staff_number_1 }}</a>
            </div>
        </div>
        @endif

        @if($settings->staff_number_2)
        <div class="admin-settings-card">
            <div class="admin-settings-card-header">
                <span class="admin-settings-card-type">Staff Number 2</span>
            </div>
            <div class="admin-settings-card-value">
                <a href="tel:{{ $settings->staff_number_2 }}">{{ $settings->staff_number_2 }}</a>
            </div>
        </div>
        @endif

        @if($settings->staff_number_3)
        <div class="admin-settings-card">
            <div class="admin-settings-card-header">
                <span class="admin-settings-card-type">Staff Number 3</span>
            </div>
            <div class="admin-settings-card-value">
                <a href="tel:{{ $settings->staff_number_3 }}">{{ $settings->staff_number_3 }}</a>
            </div>
        </div>
        @endif

        <!-- Admin Section -->
        <h3 class="admin-settings-section-title" style="grid-column: 1 / -1;">Admin Information</h3>

        @if($settings->admin_email_1)
        <div class="admin-settings-card">
            <div class="admin-settings-card-header">
                <span class="admin-settings-card-type">Admin Email 1</span>
            </div>
            <div class="admin-settings-card-value">
                <a href="mailto:{{ $settings->admin_email_1 }}">{{ $settings->admin_email_1 }}</a>
            </div>
        </div>
        @endif

        @if($settings->admin_email_2)
        <div class="admin-settings-card">
            <div class="admin-settings-card-header">
                <span class="admin-settings-card-type">Admin Email 2</span>
            </div>
            <div class="admin-settings-card-value">
                <a href="mailto:{{ $settings->admin_email_2 }}">{{ $settings->admin_email_2 }}</a>
            </div>
        </div>
        @endif

        @if($settings->admin_number_1)
        <div class="admin-settings-card">
            <div class="admin-settings-card-header">
                <span class="admin-settings-card-type">Admin Number 1</span>
            </div>
            <div class="admin-settings-card-value">
                <a href="tel:{{ $settings->admin_number_1 }}">{{ $settings->admin_number_1 }}</a>
            </div>
        </div>
        @endif

        @if($settings->admin_number_2)
        <div class="admin-settings-card">
            <div class="admin-settings-card-header">
                <span class="admin-settings-card-type">Admin Number 2</span>
            </div>
            <div class="admin-settings-card-value">
                <a href="tel:{{ $settings->admin_number_2 }}">{{ $settings->admin_number_2 }}</a>
            </div>
        </div>
        @endif

        <!-- Address Section -->
        @if($settings->address)
        <h3 class="admin-settings-section-title" style="grid-column: 1 / -1;">Address</h3>
        <div class="admin-settings-card" style="grid-column: 1 / -1;">
            <div class="admin-settings-card-header">
                <span class="admin-settings-card-type">Address</span>
            </div>
            <div class="admin-settings-card-value">
                {{ $settings->address }}
            </div>
        </div>
        @endif
    </div>
    @else
    <div class="admin-settings-empty-state">
        <i class="fas fa-cog"></i>
        <p>No settings found. Click "Edit Settings" to add settings.</p>
    </div>
    @endif
</div>

<!-- Edit Settings Panel (Right Side) -->
<div id="settingsPanelOverlay" class="admin-settings-panel-overlay" onclick="closeSettingsPanel()"></div>
<div id="settingsPanel" class="admin-settings-panel">
    <div class="admin-settings-panel-header">
        <h3 class="admin-settings-modal-title">Edit Settings</h3>
        <button type="button" class="admin-settings-panel-close" onclick="closeSettingsPanel()">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="admin-settings-panel-body">
        <form id="settingsForm">
            @csrf
            <input type="hidden" id="settingId" name="id" value="{{ $settings->id ?? '' }}">

            <!-- Staff Section -->
            <h4 class="admin-settings-section-title">Staff Information</h4>
            <div class="admin-settings-staff-group">
                <div class="admin-settings-form-group">
                    <label class="admin-settings-form-label">Staff Email 1</label>
                    <input type="email" class="admin-settings-form-input" id="staffEmail1" name="staff_email_1"
                        value="{{ $settings->staff_email_1 ?? '' }}" placeholder="staff1@example.com">
                </div>
                <div class="admin-settings-form-group">
                    <label class="admin-settings-form-label">Staff Email 2</label>
                    <input type="email" class="admin-settings-form-input" id="staffEmail2" name="staff_email_2"
                        value="{{ $settings->staff_email_2 ?? '' }}" placeholder="staff2@example.com">
                </div>
                <div class="admin-settings-form-group">
                    <label class="admin-settings-form-label">Staff Email 3</label>
                    <input type="email" class="admin-settings-form-input" id="staffEmail3" name="staff_email_3"
                        value="{{ $settings->staff_email_3 ?? '' }}" placeholder="staff3@example.com">
                </div>
                <div class="admin-settings-form-group">
                    <label class="admin-settings-form-label">Staff Number 1</label>
                    <input type="text" class="admin-settings-form-input" id="staffNumber1" name="staff_number_1"
                        value="{{ $settings->staff_number_1 ?? '' }}" placeholder="+91 1234567890">
                </div>
                <div class="admin-settings-form-group">
                    <label class="admin-settings-form-label">Staff Number 2</label>
                    <input type="text" class="admin-settings-form-input" id="staffNumber2" name="staff_number_2"
                        value="{{ $settings->staff_number_2 ?? '' }}" placeholder="+91 1234567890">
                </div>
                <div class="admin-settings-form-group">
                    <label class="admin-settings-form-label">Staff Number 3</label>
                    <input type="text" class="admin-settings-form-input" id="staffNumber3" name="staff_number_3"
                        value="{{ $settings->staff_number_3 ?? '' }}" placeholder="+91 1234567890">
                </div>
            </div>

            <!-- Admin Section -->
            <h4 class="admin-settings-section-title">Admin Information</h4>
            <p style="font-size: 0.85rem; color: #666; margin-bottom: 1rem;">
                <i class="fas fa-info-circle me-1"></i> At least 1 email and 1 number are required. You can add up to 2
                emails and 2 numbers.
            </p>
            <div class="admin-settings-admin-group">
                <div class="admin-settings-form-group">
                    <label class="admin-settings-form-label">Admin Email 1 <span
                            style="color: #dc3545;">*</span></label>
                    <input type="email" class="admin-settings-form-input" id="adminEmail1" name="admin_email_1"
                        value="{{ $settings->admin_email_1 ?? '' }}" placeholder="admin1@example.com" required>
                </div>
                <div class="admin-settings-form-group">
                    <label class="admin-settings-form-label">Admin Email 2 <span
                            style="color: #999; font-size: 0.8rem;">(Optional)</span></label>
                    <input type="email" class="admin-settings-form-input" id="adminEmail2" name="admin_email_2"
                        value="{{ $settings->admin_email_2 ?? '' }}" placeholder="admin2@example.com">
                </div>
                <div class="admin-settings-form-group">
                    <label class="admin-settings-form-label">Admin Number 1 <span
                            style="color: #dc3545;">*</span></label>
                    <input type="text" class="admin-settings-form-input" id="adminNumber1" name="admin_number_1"
                        value="{{ $settings->admin_number_1 ?? '' }}" placeholder="+91 1234567890" required>
                </div>
                <div class="admin-settings-form-group">
                    <label class="admin-settings-form-label">Admin Number 2 <span
                            style="color: #999; font-size: 0.8rem;">(Optional)</span></label>
                    <input type="text" class="admin-settings-form-input" id="adminNumber2" name="admin_number_2"
                        value="{{ $settings->admin_number_2 ?? '' }}" placeholder="+91 1234567890">
                </div>
            </div>

            <!-- Address Section -->
            <h4 class="admin-settings-section-title">Address</h4>
            <div class="admin-settings-form-group">
                <label class="admin-settings-form-label">Address</label>
                <textarea class="admin-settings-form-textarea" id="address" name="address"
                    placeholder="Enter full address">{{ $settings->address ?? '' }}</textarea>
            </div>
        </form>
    </div>
    <div class="admin-settings-panel-footer">
        <button type="button" class="admin-settings-btn admin-settings-btn-secondary"
            onclick="closeSettingsPanel()">Cancel</button>
        <button type="button" class="admin-settings-btn admin-settings-btn-primary" onclick="saveSetting()">Save
            Settings</button>
    </div>
</div>
@endsection

@push('scripts')
<script>
function openSettingsPanel() {
    const panel = document.getElementById('settingsPanel');
    const overlay = document.getElementById('settingsPanelOverlay');

    panel.classList.add('show');
    overlay.classList.add('show');
    document.body.style.overflow = 'hidden';
}

function closeSettingsPanel() {
    const panel = document.getElementById('settingsPanel');
    const overlay = document.getElementById('settingsPanelOverlay');

    panel.classList.remove('show');
    overlay.classList.remove('show');
    document.body.style.overflow = '';
}

function saveSetting() {
    const form = document.getElementById('settingsForm');
    const id = document.getElementById('settingId').value;

    // Get admin emails and numbers
    const adminEmail1 = document.getElementById('adminEmail1').value.trim();
    const adminEmail2 = document.getElementById('adminEmail2').value.trim();
    const adminNumber1 = document.getElementById('adminNumber1').value.trim();
    const adminNumber2 = document.getElementById('adminNumber2').value.trim();

    // Validate: At least 1 admin email and 1 admin number required
    const adminEmails = [adminEmail1, adminEmail2].filter(email => email);
    const adminNumbers = [adminNumber1, adminNumber2].filter(number => number);

    if (adminEmails.length === 0) {
        alert('At least one admin email is required');
        document.getElementById('adminEmail1').focus();
        return;
    }

    if (adminNumbers.length === 0) {
        alert('At least one admin number is required');
        document.getElementById('adminNumber1').focus();
        return;
    }

    const data = {
        staff_email_1: document.getElementById('staffEmail1').value.trim(),
        staff_email_2: document.getElementById('staffEmail2').value.trim(),
        staff_email_3: document.getElementById('staffEmail3').value.trim(),
        staff_number_1: document.getElementById('staffNumber1').value.trim(),
        staff_number_2: document.getElementById('staffNumber2').value.trim(),
        staff_number_3: document.getElementById('staffNumber3').value.trim(),
        admin_email_1: adminEmail1,
        admin_email_2: adminEmail2,
        admin_number_1: adminNumber1,
        admin_number_2: adminNumber2,
        address: document.getElementById('address').value.trim(),
    };

    const url = id ? `/admin/settings/${id}` : '/admin/settings';
    const method = id ? 'PUT' : 'POST';

    fetch(url, {
            method: method,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                if (typeof window.toast === 'function') {
                    window.toast('success', result.message);
                } else {
                    alert(result.message);
                }
                setTimeout(() => location.reload(), 1000);
            } else {
                const errorMsg = result.errors ? Object.values(result.errors).flat().join(', ') : (result.message ||
                    'Error saving settings');
                if (typeof window.toast === 'function') {
                    window.toast('error', errorMsg);
                } else {
                    alert(errorMsg);
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            const errorMsg = 'Error saving settings';
            if (typeof window.toast === 'function') {
                window.toast('error', errorMsg);
            } else {
                alert(errorMsg);
            }
        });
}
</script>
@endpush