<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Skill;

class AboutController extends Controller
{
    public function index()
    {
        $aboutData = About::where('status', true)->first();
        $skills = Skill::where('status', true)->get();
        return view('about', compact('aboutData', 'skills'));
    }
}
