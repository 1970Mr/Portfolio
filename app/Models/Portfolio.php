<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'project_type',
        'customer',
        'link',
        'technology',
        'media_type',
        'media',
        'status',
    ];

    public static $mediaTypes = [
        'image',
        'slider',
        'video',
        'video_link',
    ];
}
