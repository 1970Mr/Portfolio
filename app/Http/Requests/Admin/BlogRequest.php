<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{

    private $isRequired = '';

    public function __construct()
    {
        $this->isRequired = 'required';
        if (strtolower(request()->get('_method')) == 'put') {
            $this->isRequired = 'nullable';
        }
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
        return [
            'title' => 'required',
            'text' => 'required',
            'author' => 'required',
            'keywords' => 'required',
            'photo' => "{$this->isRequired}",
            'status' => 'nullable',
        ];
    }
}
