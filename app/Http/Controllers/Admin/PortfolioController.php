<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PortfolioRequest;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    private Portfolio $portfolio;
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
        $media = $this->uploadAnyFile($request);

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
        $this->portfolio = $portfolio;
        $request['status'] = $request->has('status');
        $inputs = $request->all();
        unset($inputs['media_type']);
        if (
            $request->hasFile('image') ||
            $request->hasFile('slider') ||
            $request->hasFile('video') ||
            $request->hasFile('video_link')
        ) {
            $media = $this->uploadAnyFile($request);

            if (
                $request['media_type'] != 'slider' &&
                !$request->hasFile('slider') &&
                count($request->file('slider')) >= 3
            )
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
        $media = ['type' => Portfolio::$mediaTypes[1]];
        $files = $request->file('slider');

        if (strtolower($request['_method']) == 'put') {
            $media = $this->sliderUpdate($files);
        } else {
            $path = public_path("images/portfolio/" . uniqid(time() . mt_rand()));
            foreach ($files as $key => $image) {
                $media['slider'][$key] = image_upload($image, $path);
            }
        }

        return $media;
    }

    private function sliderUpdate($files)
    {
        try {
            $media = $this->portfolio->media;
            $path = dirname($media['slider'][0]['relative_path']);
            foreach ($files as $key => $image) {
                $old_image = $media['slider'][$key];
                $media['slider'][$key] = image_upload($image, $path);

                $old_image_path = public_path($old_image['relative_path']);
                file_delete($old_image_path);
            }
            return $media;
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'عملیات حذف با موفقیت انجام نشد']);
        }
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
            $this->filesDelete($portfolio, 'slider');
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

    private function filesDelete($portfolio, $type)
    {
        try {
            foreach ($portfolio->media[$type] as $fileInfo) {
                $path = public_path($fileInfo['relative_path']);
                file_delete($path);
                $dir = dirname($path);
            }
            rmdir($dir);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'عملیات حذف با موفقیت انجام نشد']);
        }
    }

    private function uploadAnyFile($request)
    {
        $media = [];

        if ($request->media_type == Portfolio::$mediaTypes[0])
            $media = $this->imageUpload($request);
        if ($request->media_type == Portfolio::$mediaTypes[1])
            $media = $this->sliderUpload($request);
        if ($request->media_type == Portfolio::$mediaTypes[2])
            $media = $this->videoUpload($request);

        if ($media)
            return $media;

        return redirect()->back()->with(['error' => 'عملیات با موفقیت انجام نشد']);
    }
}
