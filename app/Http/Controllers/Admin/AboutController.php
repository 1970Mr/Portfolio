<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutRequest;
use App\Http\Requests\Admin\AboutUpdateRequest;
use App\Models\About;
use Illuminate\Contracts\View\View;

class AboutController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return View
	 */
	public function index()
	{
		$aboutsData = About::paginate(5);
		return view('admin.about.about', compact('aboutsData'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return View
	 */
	public function create()
	{
		return view('admin.about.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 */
	public function store(AboutRequest $request)
	{
		$status = $request->has('status') ? $request->has('status') : false;

		About::create([
			'name' => $request->name,
			'family' => $request->family,
			'age' => $request->age,
			'country' => $request->country,
			'job' => $request->job,
			'address' => $request->address,
			'phone_number' => $request->phoneNumber,
			'email' => $request->email,
			'github' => [
				'username' => $request->githubUsername,
				'url' => $request->githubUrl
			],
			'language' => $request->language,
			'experiences' => $request->experiences,
			'projects' => $request->projects,
			'awards' => $request->awards,
			'status' => $status,
		]);

		return to_route('admin.panel.about.personal')->with(['success' => 'عملیات ایجاد با موفقیت انجام شد']);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 */
	public function edit($id)
	{
		$aboutDetails = About::findOrFail($id);
		return view('admin.about.edit', compact('aboutDetails'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(AboutUpdateRequest $request, About $about)
	{
        $data['github'] = [
            'username' => $request->githubUsername,
            'url' => $request->githubUrl
        ];
		$data['status'] = $request->has('status') ? $request->has('status') : false;
        $data = [...$request->all(), ...$data];


		$about->updateOrFail($data);

		return to_route('admin.panel.about.personal')->with(['success' => 'عملیات ویرایش با موفقیت انجام شد']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		try {
			$aboutDetails = About::findOrfail($id);
			$aboutDetails->delete($id);

			return redirect()->back()->with(['success' => 'عملیات حذف با موفقیت انجام شد']);
		} catch (\Exception $e) {
			return redirect()->back()->with(['error' => 'عملیات حذف با موفقیت انجام نشد']);
		}
	}
}
