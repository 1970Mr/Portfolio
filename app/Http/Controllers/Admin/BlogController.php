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

        $request['photo'] = $this->photoUpload($request);

        Blog::create($request->all());

        return to_route('admin.panel.blogs')->with(['success' => 'عملیات ایجاد با موفقیت انجام شد']);
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        $request['status'] = $request->has('status');
        if ($request->has('photo')) {
            $request['photo'] = $this->photoUpload($request);
        }

        $blog->updateOrFail($request->all());
        return to_route('admin.panel.blogs')->with(['success' => 'عملیات ویرایش با موفقیت انجام شد']);
    }

    public function destroy(Blog $blog)
    {
        $this->photoDelete($blog);
        $blog->delete();
		return redirect()->back()->with(['success' => 'عملیات حذف با موفقیت انجام شد']);
    }

    private function photoUpload($request)
    {
        return image_upload($request->file('photo'), public_path("images/blog"));
    }

    private function photoDelete($blog)
    {
        try {
            $path = public_path($blog->photo['relative_path']);
            file_delete($path);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'عملیات حذف با موفقیت انجام نشد']);
        }
    }
}
