<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutRequest;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.about.about', compact('abouts'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(AboutRequest $request)
    {
        $data = [
            ...$request->all(),
            'resume_file' => file_upload($request->resume_file, 'files/about'),
            'status' => $request->has('status'),
        ];
        $about = About::create($data);
        disableAllStatus(About::class, $request->has('status'), $about->id);
        return to_route('admin.panel.about.personal')->with(['success' => 'عملیات ایجاد با موفقیت انجام شد']);
    }

    public function edit(About $about)
    {
        // $aboutDetails = About::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }

    public function update(AboutRequest $request, About $about)
    {
        $data = [
            ...$request->all(),
            'status' => $request->has('status'),
        ];
        if ($request->has('resume_file')) {
            file_delete(public_path(
                $about->resume_file['relative_path']
            ));
            $data['resume_file'] = file_upload($request->resume_file, 'files/about');
        }
        $about->updateOrFail($data);
        disableAllStatus(About::class, $request->has('status'), $about->id, true);
        return to_route('admin.panel.about.personal')->with(['success' => 'عملیات ویرایش با موفقیت انجام شد']);
    }

    public function destroy($id)
    {
        try {
            $about = About::findOrFail($id);
            file_delete(public_path(
                $about->resume_file['relative_path']
            ));
            $about->delete();

            return redirect()->back()->with(['success' => 'عملیات حذف با موفقیت انجام شد']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'عملیات حذف با موفقیت انجام نشد']);
        }
    }
}
