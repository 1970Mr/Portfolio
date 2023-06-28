<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'description' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'telegram' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'youtube' => 'required',
            'facebook' => 'required',
            'linkedin' => 'required',
            'github' => 'required',
        ];
    }
}
