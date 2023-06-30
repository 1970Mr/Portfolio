<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::where('status', true)->first();
        return view('contact', compact('contact'));
    }
}
