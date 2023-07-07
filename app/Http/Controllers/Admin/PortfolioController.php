<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PortfolioRequest;
use App\Models\Portfolio;
use App\Services\Aparat\AparatHandler;

class PortfolioController extends Controller
{
    // for Update
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
        $request['status'] = $request->has('status');
        $media = $this->uploadAnyFile($request);

        $inputs = $request->all();
        $inputs['media'] = $media;

        if(!$this->mediaChecker($inputs))
            return back()->with(['error' => 'عملیات با موفقیت انجام نشد']);
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
        if (
            $request->hasFile('image') ||
            $request->hasFile('slider') ||
            $request->hasFile('video') ||
            $request->hasFile('video_link')
        ) {
            $media = $this->uploadAnyFile($request);
            $this->deleteAnyFile($portfolio);
            $inputs['media'] = $media;
            $inputs['media_type'] = $request['media_type'];
        }

        if(!$this->mediaChecker($inputs))
            return back()->with(['error' => 'عملیات با موفقیت انجام نشد']);
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

    private function videoAparatUpload($request)
    {
        $uid = $this->aparat->uploadVideo($request->file('video_link'), $request->title);
        $frame = $this->aparat->videoInfo($uid)['frame'];

        $media = ['type' => Portfolio::$mediaTypes[3]];
        $media['video_link'] = [
            'uid' => $uid,
            'frame' => $frame,
        ];
        return $media;
    }

    private function sliderUpload($request)
    {
        $media = ['type' => Portfolio::$mediaTypes[1]];
        $files = $request->file('slider');
        $path = public_path("images/portfolio/" . uniqid(time() . mt_rand()));
        foreach ($files as $key => $image) {
            $media['slider'][$key] = image_upload($image, $path);
        }
        return $media;
    }

    private function sliderUpdate($request)
    {
        try {
            $files = $request->file('slider');
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
        {
            if (
                // if is no update, delete files
                strtolower(request()['_method']) != 'put' ||
                (
                    // if is update and slider type convert to another type, delete files
                    strtolower(request()['_method']) == 'put' && request()['media_type'] != 'slider'
                )
            )
                $this->filesDelete($portfolio, 'slider');
        }

        if ($portfolio->media_type == Portfolio::$mediaTypes[2])
            $this->fileDelete($portfolio, 'video');
        if ($portfolio->media_type == Portfolio::$mediaTypes[3])
            $this->videoLinkDelete($portfolio);
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

    private function videoLinkDelete($portfolio)
    {
        $this->aparat->deleteVideo($portfolio['media']['video_link']['uid']);
    }

    private function uploadAnyFile($request)
    {
        $media = [];

        if ($request->media_type == Portfolio::$mediaTypes[0])
            $media = $this->imageUpload($request);

        if ($request->media_type == Portfolio::$mediaTypes[1])
        {
            if(strtolower($request['_method']) == 'put' && $this->portfolio->media_type == Portfolio::$mediaTypes[1])
            {
                // update slider to slider
                $media = $this->sliderUpdate($request);
            }
            else {
                // update another type to slider or store slider
                $media = $this->sliderUpload($request);
            }
        }

        if ($request->media_type == Portfolio::$mediaTypes[2])
            $media = $this->videoUpload($request);
        if ($request->media_type == Portfolio::$mediaTypes[3])
            $media = $this->videoAparatUpload($request);

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

    private function mediaChecker($inputs)
    {
        foreach ($inputs['media'] as $key => $value) {
            if(array_search($key, Portfolio::$mediaTypes) != false)
                return true;
        }
        return false;
    }
}
