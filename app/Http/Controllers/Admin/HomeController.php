<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeRequest;
use App\Http\Requests\Admin\HomeUpdateRequest;
use App\Models\Home;

class HomeController extends Controller
{
    public function index()
    {
        $homes = Home::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.home.index', compact('homes'));
    }

    public function create()
    {
        return view('admin.home.create');
    }

    public function store(HomeRequest $request)
    {
        $photoInfo = image_upload(file: $request->file('photo'), destinationPath: 'images/home');
        $mobilePhotoInfo = image_upload(file: $request->file('mobilePhoto'), destinationPath: 'images/home/mobile');

        $status = $request->has('status');

        $home = Home::create([
            'title' => $request->title,
            'sub_title' => $request->subTitle,
            'description' => $request->description,
            'photo' => [
                'name' => $photoInfo['name'],
                'relative_path' => $photoInfo['relative_path'],
                'mobile' => [
                    'name' => $mobilePhotoInfo['name'],
                    'relative_path' => $mobilePhotoInfo['relative_path'],
                ],
            ],
            'status' => $status,
        ]);
        disableAllStatus(Home::class, $status, $home->id);
        return to_route('admin.panel.home.index')->with(['success' => 'عملیات ایجاد با موفقیت انجام شد']);
    }

    public function edit(Home $home)
    {
        return view('admin.home.edit', compact('home'));
    }

    public function update(HomeUpdateRequest $request, Home $home)
    {
        $data = array_filter($request->all(), function ($value) {
            return $value !== null;
        });
        $data['status'] = $request->has('status');
        $data['sub_title'] = $request->subTitle;

        $data['photo'] = $this->initialPhotoDataUpdate($home);
        if ($request->has('photo')) {
            $data['photo'] = $this->updatePhoto($request, $data['photo'], $home);
        }
        if ($request->has('mobilePhoto')) {
            $data['photo'] = $this->updateMobilePhoto($request, $data['photo'], $home);
        }

        $home->updateOrFail($data);
        disableAllStatus(Home::class, $data['status'], $home->id, true);
        return to_route('admin.panel.home.index')->with(['success' => 'عملیات ویرایش با موفقیت انجام شد']);
    }

    public function destroy(Home $home)
    {
        try {
            $imagePath = public_path($home->photo['relative_path']);
            image_delete($imagePath);
            $mobileImagePath = public_path($home->photo['mobile']['relative_path']);
            image_delete($mobileImagePath);
            $home->delete();

            return redirect()->back()->with(['success' => 'عملیات حذف با موفقیت انجام شد']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'عملیات حذف با موفقیت انجام نشد']);
        }
    }

    // photo upload for update data
    private function updatePhoto($request, $photoData, $home)
    {
        $file = $request->file('photo');
        $destinationPath = public_path('images/home');
        $photoInfo = image_upload($file, $destinationPath);
        $photoData['name'] = $photoInfo['name'];
        $photoData['relative_path'] = $photoInfo['relative_path'];
        $imagePath = public_path($home->photo['relative_path']);
        image_delete($imagePath);
        return $photoData;
    }

    // mobilePhoto upload for update data
    private function updateMobilePhoto($request, $photoData, $home)
    {
        $mobilePhoto = $request->file('mobilePhoto');
        $destinationPathMobile = public_path('images/home/mobile');
        $mobilePhotoInfo = image_upload($mobilePhoto, $destinationPathMobile);
        $photoData['mobile']['name'] = $mobilePhotoInfo['name'];
        $photoData['mobile']['relative_path'] = $mobilePhotoInfo['relative_path'];

        $mobileImagePath = public_path($home->photo['mobile']['relative_path']);
        image_delete($mobileImagePath);
        return $photoData;
    }

    private function initialPhotoDataUpdate($home)
    {
        return [
            'name' => $home->photo['name'],
            'relative_path' => $home->photo['relative_path'],
            'mobile' => [
                'name' => $home->photo['mobile']['name'],
                'relative_path' => $home->photo['mobile']['relative_path'],
            ],
        ];
    }
}
