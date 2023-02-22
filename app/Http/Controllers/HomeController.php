<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $homeData = Home::where('status', true)->first();
        return view('home', compact('homeData'));
    }
}
