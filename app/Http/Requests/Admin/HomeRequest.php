<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HomeRequest extends FormRequest
{
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
        return [
            'title' => 'required',
            'subTitle' => 'required',
            'description' => 'required',
            'photo' => 'required|image',
            'mobilePhoto' => 'required|image',
            'status' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'mobilePhoto.required' => 'فیلد تصویر موبایل الزامی است.',
            'mobilePhoto.image' => 'فیلد تصویر موبایل باید یک تصویر معتبر باشد.',
            'status.required' => 'فیلد وضعیت الزامی است.',
            'subTitle.required' => 'فیلد زیرعنوان الزامی است.',
        ];
    }
}
