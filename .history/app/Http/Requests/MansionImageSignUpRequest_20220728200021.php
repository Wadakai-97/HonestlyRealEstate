<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MansionImageSignUpRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'image' => ['nullable', 'mimes:jpg,jpeg', 'dimensions:min_width=200,max_width=400,min_height=100,max_height=240', 'max:1024'],
            'category' => ['nullable', 'max:20', ],
            'comment' => ['nullable', 'max:120', ],
        ];
    }

    public function messages() {
        
    }
}
