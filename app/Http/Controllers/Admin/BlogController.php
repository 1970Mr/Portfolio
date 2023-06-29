<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogRequest;
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

    public function store(BlogRequest $request)
    {
        $request['status'] = $request->has('status');

        $request['photo'] = $this->imageUpload($request);

        Blog::create($request->all());

		return to_route('admin.panel.blogs')->with(['success' => 'عملیات ایجاد با موفقیت انجام شد']);
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    private function imageUpload($request)
    {
        return image_upload($request->file('photo'), public_path("images/blog"));
    }
}
