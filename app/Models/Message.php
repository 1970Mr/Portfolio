<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notification;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'is_read',
        'response',
    ];

    public function routeNotificationFor(): array|string
    {
        // Return email address and name...
        return [config('mail.from.address') => config('mail.from.name')];
    }
}
