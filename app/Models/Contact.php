<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'email',
        'phone_number',
        'telegram',
        'instagram',
        'twitter',
        'youtube',
        'facebook',
        'linkedin',
        'github',
    ];
}
