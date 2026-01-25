<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'discount_price',
        'type',
        'main_image',
        'sub_images',
        'facilities',
        'edit_message',
        'available_rooms',
        'is_active',
        'order'
    ];

    protected $casts = [
        'sub_images' => 'array',
        'facilities' => 'array',
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'available_rooms' => 'integer',
        'is_active' => 'boolean',
        'order' => 'integer'
    ];
}
