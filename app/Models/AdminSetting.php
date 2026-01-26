<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class AdminSetting extends Model
{
    protected $table = 'admin_settings';

    protected $fillable = [
        'staff_email_1',
        'staff_email_2',
        'staff_email_3',
        'staff_number_1',
        'staff_number_2',
        'staff_number_3',
        'admin_email_1',
        'admin_email_2',
        'admin_number_1',
        'admin_number_2',
        'address',
        'admin_name',
        'admin_email',
        'admin_password',
        'otp',
        'otp_expires_at',
    ];

    protected $hidden = [
        'admin_password',
        'otp',
    ];

    protected $casts = [
        'otp_expires_at' => 'datetime',
    ];

    /**
     * Automatically hash password when setting it
     */
    public function setAdminPasswordAttribute($value)
    {
        // Only hash if value is provided
        if ($value) {
            // Check if it's already a bcrypt hash (starts with $2a$, $2b$, or $2y$)
            if (preg_match('/^\$2[ayb]\$/', $value)) {
                // Already hashed, use as is
                $this->attributes['admin_password'] = $value;
            } else {
                // Not hashed, hash it
                $this->attributes['admin_password'] = Hash::make($value);
            }
        } else {
            $this->attributes['admin_password'] = $value;
        }
    }
}
