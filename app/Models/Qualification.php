<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'period',
        'title',
        'descriptions',
        'type',
        'status',
    ];

    public static $types = [
        'experience',
        'education',
    ];
}
