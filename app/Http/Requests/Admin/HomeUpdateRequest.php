<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HomeUpdateRequest extends FormRequest
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
            'photo' => 'nullable|image',
            'mobilePhoto' => 'nullable|image',
        ];
    }

    public function messages()
    {
        return [
            'mobilePhoto.image' => 'فیلد تصویر موبایل باید یک تصویر معتبر باشد.',
        ];
    }
}
