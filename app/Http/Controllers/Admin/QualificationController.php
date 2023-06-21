<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QualificationRequest;
use App\Models\Qualification;
use Illuminate\Http\Request;

class QualificationController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(QualificationRequest $request)
    {
        //
    }

    public function edit(Qualification $qualification)
    {
        return view('admin.qualification.edit', compact('qualification'));
    }

    public function update(Request $request, Qualification $qualification)
    {
        $request['status'] = $request->has('status');
        $qualification->updateOrFail($request->all());

		return redirect()->back()->with(['success' => 'عملیات ویرایش با موفقیت انجام شد']);
    }

    public function destroy(Qualification $qualification)
    {
        $qualification->delete();

		return redirect()->back()->with(['success' => 'عملیات حذف با موفقیت انجام شد']);
    }
}
