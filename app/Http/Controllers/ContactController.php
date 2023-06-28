<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $socials = [
            ['name' => 'telegram', 'link' => 'https://t.me'],
            ['name' => 'instagram', 'link' => 'https://instagram.com'],
            ['name' => 'twitter', 'link' => 'https://twitter.com'],
            ['name' => 'youtube', 'link' => 'https://youtube.com'],
            ['name' => 'facebook', 'link' => 'https://facebook.com'],
            ['name' => 'linkedin', 'link' => 'https://linkedin.com/in'],
            ['name' => 'github', 'link' => 'https://github.com'],
        ];
        $contact = Contact::where('status', true)->first();
        return view('contact', compact('contact', 'socials'));
    }
}
