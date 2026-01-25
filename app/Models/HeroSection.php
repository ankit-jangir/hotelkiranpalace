<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'description',
        'images',
        'video',
        'video_title',
        'video_description',
        'video_extra',
        'is_active',
        'order'
    ];

    protected $casts = [
        'images' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer'
    ];
}
