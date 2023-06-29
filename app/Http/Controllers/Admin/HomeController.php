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
    $homesData = Home::paginate(10);
    return view('admin.home.home', compact('homesData'));
  }

  public function create()
  {
    return view('admin.home.create');
  }

  public function store(HomeRequest $request)
  {
    $photoInfo = $this->imageUpload(file: $request->file('photo'), path: 'images/home');
    $mobilePhotoInfo = $this->imageUpload(file: $request->file('mobilePhoto'), path: 'images/home/mobile');

    $status = $request->has('status');

    Home::create([
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

    return to_route('admin.panel.home')->with(['success' => 'عملیات ایجاد با موفقیت انجام شد']);
  }

  public function edit($id)
  {
    $homeDetails = Home::findOrFail($id);
    return view('admin.home.edit', compact('homeDetails'));
  }

  public function update(HomeUpdateRequest $request, Home $home)
  {
    $status = $request->has('status');
    $data = $this->initialUpdateData($home);

    if ($request->has('title')) {
      $data['title'] = $request->title;
    }
    if ($request->has('sub_title')) {
      $data['sub_title'] = $request->subTitle;
    }
    if ($request->has('description')) {
      $data['description'] = $request->description;
    }
    if ($request->has('status')) {
      $data['status'] = $status;
    }
    else {
      $data['status'] = false;
    }

    if ($request->has('photo')) {
      $data = $this->photoUpload($request, $data, $home);
    }
    if ($request->has('mobilePhoto')) {
      $data = $this->mobilePhotoUpload($request, $data, $home);
    }

    $home->updateOrFail($data);

    return to_route('admin.panel.home')->with(['success' => 'عملیات ویرایش با موفقیت انجام شد']);
  }

  public function destroy($id)
  {
    try {
      $homeDetails = Home::findOrfail($id);
      $imagePath = public_path($homeDetails->photo['relative_path']);
      image_delete($imagePath);
      $mobileImagePath = public_path($homeDetails->photo['mobile']['relative_path']);
      image_delete($mobileImagePath);
      $homeDetails->delete();

      return redirect()->back()->with(['success' => 'عملیات حذف با موفقیت انجام شد']);
    } catch (\Exception $e) {
      return redirect()->back()->with(['error' => 'عملیات حذف با موفقیت انجام نشد']);
    }
  }

  // photo field upload for update data
  private function photoUpload($request, $data, $home)
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

  // mobilePhoto field upload for update data
  private function mobilePhotoUpload($request, $data, $home)
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

  private function imageUpload($file, $path)
  {
    // $file = $request->file('photo');
    $destinationPath = public_path($path);
    return image_upload($file, $destinationPath);
  }
}
