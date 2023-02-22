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
    $aboutsData = About::paginate(10);
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
    $file = $request->file('photo');
    $destinationPath = public_path('images/about');
    $photoInfo = image_upload($file, $destinationPath);

    $mobilePhoto = $request->file('mobilePhoto');
    $destinationPathMobile = public_path('images/about/mobile');
    $mobilePhotoInfo = image_upload($mobilePhoto, $destinationPathMobile);

    $status = $request->has('status') ? $request->has('status') : false;

    About::create([
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

    return to_route('admin.panel.about')->with(['success' => 'عملیات ایجاد با موفقیت انجام شد']);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   */
  public function edit($id)
  {
    $aboutDetails = About::findOrfail($id);
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
    $status = $request->has('status') ? $request->has('status') : false;
    $data = $this->initialUpdateData($about);

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
      $data = $this->photoUpload($request, $data, $about);
    }
    if ($request->has('mobilePhoto')) {
      $data = $this->mobilePhotoUpload($request, $data, $about);
    }

    $about->updateOrFail($data);

    return to_route('admin.panel.about')->with(['success' => 'عملیات ویرایش با موفقیت انجام شد']);
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
      $imagePath = public_path($aboutDetails->photo['relative_path']);
      image_delete($imagePath);
      $mobileImagePath = public_path($aboutDetails->photo['mobile']['relative_path']);
      image_delete($mobileImagePath);
      $aboutDetails->delete($id);

      return redirect()->back()->with(['success' => 'عملیات حذف با موفقیت انجام شد']);
    } catch (\Exception $e) {
      return redirect()->back()->with('admin.panel.about')->with(['error' => 'عملیات حذف با موفقیت انجام نشد']);
    }
  }

  private function photoUpload($request, $data, $about)
  {
    $file = $request->file('photo');
    $destinationPath = public_path('images/about');
    $photoInfo = image_upload($file, $destinationPath);
    $data['photo']['name'] = $photoInfo['name'];
    $data['photo']['relative_path'] = $photoInfo['relative_path'];

    $imagePath = public_path($about->photo['relative_path']);
    image_delete($imagePath);
    return $data;
  }

  private function mobilePhotoUpload($request, $data, $about)
  {
    $mobilePhoto = $request->file('mobilePhoto');
      $destinationPathMobile = public_path('images/about/mobile');
      $mobilePhotoInfo = image_upload($mobilePhoto, $destinationPathMobile);
      $data['photo']['mobile']['name'] = $mobilePhotoInfo['name'];
      $data['photo']['mobile']['relative_path'] = $mobilePhotoInfo['relative_path'];

      $mobileImagePath = public_path($about->photo['mobile']['relative_path']);
      image_delete($mobileImagePath);
      return $data;
  }

  private function initialUpdateData($about)
  {
    return [
      'photo' => [
        'name' => $about->photo['name'],
        'relative_path' => $about->photo['relative_path'],
        'mobile' => [
          'name' => $about->photo['mobile']['name'],
          'relative_path' => $about->photo['mobile']['relative_path'],
        ],
      ],
    ];
  }
}
