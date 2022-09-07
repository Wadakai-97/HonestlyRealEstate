<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerSignUpRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'type' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'お客様名は入力必須です。',
            'name.required' => 'は入力必須です。',
            'name.required' => 'お客様名は入力必須です。',
            'name.required' => 'お客様名は入力必須です。',
            'name.required' => 'お客様名は入力必須です。',
        ];
    }
}
