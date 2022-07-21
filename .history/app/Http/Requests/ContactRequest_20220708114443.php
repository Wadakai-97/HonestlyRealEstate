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
            'name' => 'required|max:20',
            'wmail' => 'required|email|',
            'phone' => 'required',
            'type' => 'required',
            'contents' => 'required',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'お名前を入力してください。',
            'name.max:20' => 'お名前を省略して入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスを正しく入力してください。',
            'phone.required' => '電話番号を入力してください。',
            'contents.required' => 'お問い合わせ内容についてご教示ください。',
        ];
    }
}
