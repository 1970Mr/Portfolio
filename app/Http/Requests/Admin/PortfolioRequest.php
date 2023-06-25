<?php

namespace App\Http\Requests\Admin;

use App\Models\Portfolio;
use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
{
    private $mediaTypes;
    private $rules = [];

    public function __construct()
    {
        $this->mediaTypes = Portfolio::$mediaTypes[0];

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
        // $this->mediaTypes = Portfolio::$mediaTypes[0]; TDOD: fix this
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
            'media_type' => "required|in:$this->mediaTypes[0], $this->mediaTypes[1], $this->mediaTypes[2], $this->mediaTypes[3]",
        ]);

        if (request()['media_type'] == 'image') $this->rules[] = $this->imageRules();
        if (request()['media_type'] == 'slider') $this->rules[] = $this->sliderRules();
        if (request()['media_type'] == 'video') $this->rules[] = $this->videoRules();
        if (request()['media_type'] == 'video_link') $this->rules[] = $this->videoLinkRules();

        return $this->rules;
    }

    private function imageRules()
    {
        return [
            'media' => 'required|file|image|size:4096',
        ];
    }

    private function sliderRules()
    {
        return [
            'media.*' => 'required|file|image|size:4096',
        ];
    }

    private function videoRules()
    {
        return [
            'media' => 'required|file|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4|max:30720',
        ];
    }

    private function videoLinkRules()
    {
        return [
            'media' => 'required|url',
        ];
    }
}
