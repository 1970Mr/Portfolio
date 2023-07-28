<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SkillRequest;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('created_at', 'desc')->paginate(5);
		return view('admin.skill.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skill.create');
    }

    public function store(SkillRequest $request)
    {
        $request['status'] = $request->has('status');
        Skill::create($request->all());
		return to_route('admin.panel.about.skill.index')->with(['success' => 'عملیات ایجاد با موفقیت انجام شد']);
    }

    public function edit(Skill $skill)
    {
        return view('admin.skill.edit', compact('skill'));
    }

    public function update(SkillRequest $request, Skill $skill)
    {
        $request['status'] = $request->has('status');
        $skill->updateOrFail($request->all());
		return to_route('admin.panel.about.skills.index')->with(['success' => 'عملیات ویرایش با موفقیت انجام شد']);
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
		return back()->with(['success' => 'عملیات حذف با موفقیت انجام شد']);
    }
}
