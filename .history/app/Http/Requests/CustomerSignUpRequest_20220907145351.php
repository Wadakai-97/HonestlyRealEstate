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
            'phone' => ['required', 'numeric', 'digits_between:10,11'],
            'address' => ['required', 'max:100'],
            'type' => 'required',
            'content' => ['nullable', 'max:1000'],
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => 'お客様名は入力必須です。',
            'customer_name.max' => 'お名前は20文字以内に入力してください。',
            'email.required' => 'メールアドレスは入力必須です。',
            'email.email' => 'メールアドレスを正しく入力してください。',
            'phone.required' => '電話番号は入力必須です。',
            'phone.numeric' => '電話番号は数値のみ入力可能です。',
            'phone.digits_between' => '電話番号の桁数を確認してください。',
            'address.required' => '種類は入力必須です。',
            'address.max' => '住所は100文字以内で入力してください。',
            'type.required' => '住所は入力必須です。',
            'name.required' => 'お名前を入力してください。',

'type.required' => 'お問い合わせ種類は選択必須です。',
'contents.required' => 'お問い合わせ内容は入力必須です。',
'contents.max' => 'お問い合わせ内容は1000文字以内で入力してください。',
        ];
    }
}
