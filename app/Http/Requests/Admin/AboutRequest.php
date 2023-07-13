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
            'phone_number' => 'required',
            'email' => 'required|email',
            'github' => 'required',
            'language' => 'required',
            'experiences' => 'required|numeric',
            'projects' => 'required|numeric',
            'awards' => 'required|numeric',
            'resume_file' => 'required|file|mimes:pdf,txt,doc,docx|max:3072',
            'status' => 'nullable',
        ];
    }
}
