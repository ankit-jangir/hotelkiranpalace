<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'points',
        'image',
        'is_active',
    ];

    protected $casts = [
        'points' => 'array',
        'is_active' => 'boolean',
    ];
}
