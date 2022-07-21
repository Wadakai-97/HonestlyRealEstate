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
            'phone' => ['nullable', 'integer'],
            'address' => ['nullable', 'max:100'],'
            'type' => 'required',
            'contents' => 'required',
            'cutomer_request' => ['required', 'max:500'],
        ];
    }

    public function messages() {
        return [
            'name.required' => 'お名前を入力してください。',
            'name.max:20' => 'お名前を省略して入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスを正しく入力してください。',
            'phone.integer' => '電話番号はハイフンを除く数字のみ入力可能です。',
            'type.required' => 'お問い合わせ種類は選択必須です。',
            'contents.required' => 'お問い合わせ内容についてご教示ください。',
        ];
    }
}
