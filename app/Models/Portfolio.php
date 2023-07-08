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
            get: fn ($value) => $this->getMedia($value),

            set: fn ($value) => json_encode($value),
        );
    }

    private function getMedia($value)
    {
        $media = ['media_type' => $this->media_type];
        if ($this->media_type == 'image') {
            return [
                ...$media,
                'image' => $this->featured_image
            ];
        }
        return [
            ...$media,
            ...json_decode($value, true),
        ];
    }

    protected function featuredImage(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }
}
