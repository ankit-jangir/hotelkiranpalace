<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'name',
        'heading',
        'description',
        'main_image',
        'main_video',
        'sub_images',
        'type',
        'file_path'
    ];

    protected $casts = [
        'sub_images' => 'array',
    ];
}
