<?php

namespace App\Http\Requests;

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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:20'],
            'email' => ['required', 'email'],
            'phone' => ['required', ''],
            'address' => ['required', 'max:100'],
            'type' => 'required',
            'contents' => 'required',
            'cutomer_request' => ['required', 'max:1000'],
        ];
    }

    public function messages() {
        return [
            'name.required' => 'お名前を入力してください。',
            'name.max:20' => 'お名前を省略して入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスを正しく入力してください。',
            'phone.required' => '電話番号を入力してください。',
            'phone.' => '電話番号は数字とハイフンのみ入力可能です。',
            'address.required' => '住所を入力してください。',
            'address.max:100' => '住所は100文字以内で入力してください。',
            'type.required' => 'お問い合わせ種類は選択必須です。',
            'contents.required' => 'お問い合わせ内容は入力必須です。',
            'contents.max:500' => 'お問い合わせ内容は1000文字以内で入力してください。',
        ];
    }
}
