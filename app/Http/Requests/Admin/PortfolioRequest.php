<?php

namespace App\Http\Requests\Admin;

use App\Models\Portfolio;
use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
{
    private $mediaTypes = [];
    private $rules = [];

    public function __construct()
    {
        $this->mediaTypes = Portfolio::$mediaTypes;

        $this->rules = [
            'title' => 'required',
            'project_type' => 'required',
            'customer' => 'required',
            'link' => 'required',
            'technology' => 'required',
            'status' => 'nullable',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        request()->validate([
            'media_type' => "required|in:{$this->mediaTypes[0]},{$this->mediaTypes[1]},{$this->mediaTypes[2]},{$this->mediaTypes[3]}",
        ]);
        session()->flash('media.has', true);

        if (request()['media_type'] == 'image') $this->imageRules();
        if (request()['media_type'] == 'slider') $this->sliderRules();
        if (request()['media_type'] == 'video') $this->videoRules();
        if (request()['media_type'] == 'video_link') $this->videoLinkRules();

        return $this->rules;
    }

    private function imageRules()
    {
        session()->flash('media.image', true);
        return $this->rules['image'] = 'required|file|image|max:4096';
    }

    private function sliderRules()
    {
        session()->flash('media.slider', true);
        $this->rules['slider'] = 'required|array|min:3';
        return $this->rules['slider.*'] = 'file|image|max:4096';
    }

    private function videoRules()
    {
        session()->flash('media.video', true);
        return $this->rules['video'] = 'required|file|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4|max:30720';
    }

    private function videoLinkRules()
    {
        session()->flash('media.video_link', true);
        return $this->rules['video_link'] = 'required|url';
    }
}
