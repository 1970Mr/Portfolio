<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QualificationRequest;
use App\Models\Portfolio;
use App\Models\Qualification;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::paginate(5);
        return view('admin.portfolio.portfolio', compact('portfolios'));
    }

    public function create()
    {
        $mediaTypes = Portfolio::$mediaTypes;
        return view('admin.portfolio.create', compact('mediaTypes'));
    }

    public function store(QualificationRequest $request)
    {
        $request['status'] = $request->has('status');
        Qualification::create($request->all());
        return to_route('admin.panel.about.portfolio')->with(['success' => 'عملیات ایجاد با موفقیت انجام شد']);
    }

    public function edit(Qualification $qualification)
    {
        $types = Qualification::$types;
        return view('admin.portfolio.edit', compact('qualification', 'types'));
    }

    public function update(QualificationRequest $request, Qualification $qualification)
    {
        $request['status'] = $request->has('status');
        $qualification->updateOrFail($request->all());

        return to_route('admin.panel.about.portfolio')->with(['success' => 'عملیات ویرایش با موفقیت انجام شد']);
    }

    public function destroy(Qualification $qualification)
    {
        $qualification->delete();

        return redirect()->back()->with(['success' => 'عملیات حذف با موفقیت انجام شد']);
    }
}
