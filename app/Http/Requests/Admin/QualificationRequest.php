<?php

namespace App\Http\Requests\Admin;

use App\Models\Qualification;
use Illuminate\Foundation\Http\FormRequest;

class QualificationRequest extends FormRequest
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
        $types = Qualification::$types;
        return [
            'period' => 'required',
            'title' => 'required',
            'descriptions' => 'required',
            'type' => "required|in:$types[0],$types[1]",
            'status' => 'nullable',
        ];
    }
}
