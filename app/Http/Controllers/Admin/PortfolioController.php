<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PortfolioRequest;
use App\Models\Portfolio;
use App\Services\Aparat\AparatHandler;

class PortfolioController extends Controller
{
    private Portfolio $portfolio;

    public function __construct(public AparatHandler $aparat)
    {
    }

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
        $uid = $this->aparat->uploadFile($request->file('video'), $request->title);
        $frame = $this->aparat->fileInfo($uid)['frame'];
        dd($frame);

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
                $request['media_type'] != 'slider' ||
                ($request['media_type'] == 'slider' && $portfolio->media_type != 'slider')
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
        // return $this->fileUpload($request, Portfolio::$mediaTypes[0]);
        return $this->fileUpload($request, 'image');
    }

    private function videoUpload($request)
    {
        // return $this->fileUpload($request, Portfolio::$mediaTypes[2]);
        return $this->fileUpload($request, 'video');
    }

    private function sliderUpload($request)
    {
        $media = ['type' => Portfolio::$mediaTypes[1]];
        $files = $request->file('slider');

        if (strtolower($request['_method']) == 'put' && $this->portfolio->media_type == 'slider') {
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

    private function fileUpload($request, $type)
    {
        $media = ['type' => $type];
        $media[$type] = image_upload($request->file($type), public_path("{$type}s/portfolio"));
        return $media;
    }
}
