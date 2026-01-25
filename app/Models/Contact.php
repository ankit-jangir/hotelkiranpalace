<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'country_code',
        'phone',
        'room_type',
        'checkin_date',
        'checkout_date',
        'comments',
    ];

    protected $casts = [
        'checkin_date' => 'date',
        'checkout_date' => 'date',
    ];
}
