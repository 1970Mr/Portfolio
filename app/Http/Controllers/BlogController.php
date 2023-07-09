<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 1)->paginate(10);
        return view('blog', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        return view('blog-post', compact('blog'));
    }
}
