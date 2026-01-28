<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class StaffUser extends Model
{
    protected $table = 'staff_users';

    protected $fillable = [
        'name',
        'role',
        'login_email',
        'login_number',
        'personal_email',
        'personal_number',
        'address',
        'password',
        'is_active',
        'permissions',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'permissions' => 'array',
        'is_active' => 'boolean',
    ];

    public function setPasswordAttribute($value)
    {
        if ($value) {
            if (preg_match('/^\$2[ayb]\$/', $value)) {
                $this->attributes['password'] = $value;
            } else {
                $this->attributes['password'] = Hash::make($value);
            }
        }
    }
}

