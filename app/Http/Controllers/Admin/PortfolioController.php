<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PortfolioRequest;
use App\Models\Portfolio;

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

    public function store(PortfolioRequest $request)
    {
        $request['status'] = $request->has('status');
        if ($request->media_type == Portfolio::$mediaTypes[0])
            $media = $this->imageUpload($request);
        if ($request->media_type == Portfolio::$mediaTypes[1])
            $media = $this->sliderUpload($request);
        if ($request->media_type == Portfolio::$mediaTypes[2])
            $media = $this->videoUpload($request);

        $inputs = $request->all();
        $inputs['media'] = $media;

        Portfolio::create($inputs);
        return to_route('admin.panel.portfolio')->with(['success' => 'عملیات ایجاد با موفقیت انجام شد']);
    }

    public function edit(Portfolio $portfolio)
    {
        $mediaTypes = Portfolio::$mediaTypes;
        return view('admin.portfolio.edit', compact('portfolio', 'mediaTypes'));
    }

    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        $request['status'] = $request->has('status');
        $inputs = $request->all();
        unset($inputs['media_type']);
        if(
            $request->hasFile('image') ||
            $request->hasFile('slider') ||
            $request->hasFile('video') ||
            $request->hasFile('video_link')
        )
        {
            if ($request->media_type == Portfolio::$mediaTypes[0])
                $media = $this->imageUpload($request);
            if ($request->media_type == Portfolio::$mediaTypes[1])
                $media = $this->sliderUpload($request);

            $this->deleteAnyFile($portfolio);
            $inputs['media'] = $media;
            $inputs['media_type'] = $request['media_type'];
        }

        $portfolio->updateOrFail($inputs);
        return to_route('admin.panel.portfolio')->with(['success' => 'عملیات ویرایش با موفقیت انجام شد']);
    }

    public function destroy(Portfolio $portfolio)
    {
        $this->deleteAnyFile($portfolio);

        $portfolio->delete();

        return redirect()->back()->with(['success' => 'عملیات حذف با موفقیت انجام شد']);
    }

    private function imageUpload($request)
    {
        $media = ['type' => Portfolio::$mediaTypes[0]];
        $media['image'] = image_upload($request->file('image'), public_path('images/portfolio'));
        return $media;
    }

    private function sliderUpload($request)
    {
        // $media = ['type' => Portfolio::$mediaTypes[0]];
        // $media['image'] = image_upload($request->file(), public_path('images/portfolio'));
        // return $media;
    }

    private function sliderDelete($portfolio)
    {
        // try {
        //     $imagePath = public_path($portfolio->media['image']['relative_path']);
        //     image_delete($imagePath);
        // } catch (\Exception $e) {
        //     return redirect()->back()->with(['error' => 'عملیات حذف با موفقیت انجام نشد']);
        // }
    }

    private function videoUpload($request)
    {
        $media = ['type' => Portfolio::$mediaTypes[2]];
        $media['video'] = video_upload($request->file('video'), public_path('videos/portfolio'));
        return $media;
    }

    private function deleteAnyFile($portfolio)
    {
        if ($portfolio->media_type == Portfolio::$mediaTypes[0])
            $this->fileDelete($portfolio, 'image');
        if ($portfolio->media_type == Portfolio::$mediaTypes[1])
            $this->sliderDelete($portfolio);
        if ($portfolio->media_type == Portfolio::$mediaTypes[2])
            $this->fileDelete($portfolio, 'video');
    }

    private function fileDelete($portfolio, $type)
    {
        try {
            $path = public_path($portfolio->media[$type]['relative_path']);
            file_delete($path);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'عملیات حذف با موفقیت انجام نشد']);
        }
    }
}
