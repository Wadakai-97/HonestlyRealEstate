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
            'customer_name' => ['required', 'max:30'],
            'email' => ['required', 'email'],
            'phone' => 'required',
            'address' => 'required',
            'type' => 'required',
            'content' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => 'お客様名は入力必須です。',
            'email.required' => 'メールアドレスは入力必須です。',
            'phone.required' => '電話番号は入力必須です。',
            'address.required' => '種類は入力必須です。',
            'type.required' => '住所は入力必須です。',
        ];
    }
}
