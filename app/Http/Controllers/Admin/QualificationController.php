<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QualificationRequest;
use App\Models\Qualification;

class QualificationController extends Controller
{
    public function index()
    {
        $qualifications = Qualification::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.qualification.index', compact('qualifications'));
    }

    public function create()
    {
        $types = Qualification::$types;
        return view('admin.qualification.create', compact('types'));
    }

    public function store(QualificationRequest $request)
    {
        $request['status'] = $request->has('status');
        Qualification::create($request->all());
        return to_route('admin.panel.about.qualification')->with(['success' => 'عملیات ایجاد با موفقیت انجام شد']);
    }

    public function edit(Qualification $qualification)
    {
        $types = Qualification::$types;
        return view('admin.qualification.edit', compact('qualification', 'types'));
    }

    public function update(QualificationRequest $request, Qualification $qualification)
    {
        $request['status'] = $request->has('status');
        $qualification->updateOrFail($request->all());

		return to_route('admin.panel.about.qualification')->with(['success' => 'عملیات ویرایش با موفقیت انجام شد']);
    }

    public function destroy(Qualification $qualification)
    {
        $qualification->delete();

		return redirect()->back()->with(['success' => 'عملیات حذف با موفقیت انجام شد']);
    }
}
