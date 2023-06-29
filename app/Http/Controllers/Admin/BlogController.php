<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(5);
		return view('admin.blog.blog', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }
}
