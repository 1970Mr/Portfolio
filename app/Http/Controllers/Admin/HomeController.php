<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeRequest;
use App\Http\Requests\Admin\HomeUpdateRequest;
use App\Models\Home;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index()
    {
        $homesData = Home::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.home.home', compact('homesData'));
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
        return to_route('admin.panel.home')->with(['success' => 'عملیات ایجاد با موفقیت انجام شد']);
    }

    public function edit(Home $home)
    {
        return view('admin.home.edit', compact('home'));
    }

    public function update(HomeUpdateRequest $request, Home $home)
    {
        $data = $this->initialUpdateData($home);
        $data['status'] = $request->has('status');

        if ($request->has('title')) {
            $data['title'] = $request->title;
        }
        if ($request->has('sub_title')) {
            $data['sub_title'] = $request->subTitle;
        }
        if ($request->has('description')) {
            $data['description'] = $request->description;
        }

        if ($request->has('photo')) {
            $data = $this->updatePhoto($request, $data, $home);
        }
        if ($request->has('mobilePhoto')) {
            $data = $this->updateMobilePhoto($request, $data, $home);
        }

        if(!$data['status'])
            return cantDisable(Home::class);

        $home->updateOrFail($data);
        disableAllStatus(Home::class, $data['status'], $home->id);
        return to_route('admin.panel.home')->with(['success' => 'عملیات ویرایش با موفقیت انجام شد']);
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
    private function updatePhoto($request, $data, $home)
    {
        $file = $request->file('photo');
        $destinationPath = public_path('images/home');
        $photoInfo = image_upload($file, $destinationPath);
        $data['photo']['name'] = $photoInfo['name'];
        $data['photo']['relative_path'] = $photoInfo['relative_path'];

        $imagePath = public_path($home->photo['relative_path']);
        image_delete($imagePath);
        return $data;
    }

    // mobilePhoto upload for update data
    private function updateMobilePhoto($request, $data, $home)
    {
        $mobilePhoto = $request->file('mobilePhoto');
        $destinationPathMobile = public_path('images/home/mobile');
        $mobilePhotoInfo = image_upload($mobilePhoto, $destinationPathMobile);
        $data['photo']['mobile']['name'] = $mobilePhotoInfo['name'];
        $data['photo']['mobile']['relative_path'] = $mobilePhotoInfo['relative_path'];

        $mobileImagePath = public_path($home->photo['mobile']['relative_path']);
        image_delete($mobileImagePath);
        return $data;
    }

    private function initialUpdateData($home)
    {
        return [
            'photo' => [
                'name' => $home->photo['name'],
                'relative_path' => $home->photo['relative_path'],
                'mobile' => [
                    'name' => $home->photo['mobile']['name'],
                    'relative_path' => $home->photo['mobile']['relative_path'],
                ],
            ],
        ];
    }
}
