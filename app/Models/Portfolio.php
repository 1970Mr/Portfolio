<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'featured_image',
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

    protected function media(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => [
                'media_type' => $this->media_type,
                ...json_decode($value, true),
            ],

            set: fn ($value) => json_encode($value),
        );
    }

    protected function featuredImage(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }
}
