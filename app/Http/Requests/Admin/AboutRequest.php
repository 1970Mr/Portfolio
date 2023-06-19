<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'name' => 'required',
            'family' => 'required',
            'age' => 'required',
            'country' => 'required',
            'job' => 'required',
            'address' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required',
            'githubUsername' => 'required',
            'githubUrl' => 'required',
            'language' => 'required',
            'experiences' => 'required',
            'projects' => 'required',
            'awards' => 'required',
            'status' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'phoneNumber.required' => 'فیلد شماره تماس الزامی است.',
            'githubUsername.required' => 'فیلد نام کاربری گیت‌هاب الزامی است.',
            'githubUrl.required' => 'فیلد آدرس گیت‌هاب الزامی است.',
            'experiences.required' => 'فیلد تجربه‌ها الزامی است.',
            'projects.required' => 'فیلد پروژه‌ها الزامی است.',
            'awards.required' => 'فیلد جایزه‌ها الزامی است.',
            'status.required' => 'فیلد وضعیت الزامی است.',
        ];
    }
}
