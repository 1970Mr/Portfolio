<?php

namespace App\Http\Controllers;

use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $aboutData = About::where('status', true)->first();
        return view('about', compact('aboutData'));
    }
}
