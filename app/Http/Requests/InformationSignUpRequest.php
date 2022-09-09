<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationSignUpRequest extends FormRequest
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
            'title' => ['required', 'max:32'],
            'content' => ['required', 'max:800'],
            'staff_id' => ['required', 'integer', 'exists:staffs,id'],
            'image' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf'],
        ];
    }

    public function messages() {
        return [
            'title.required' => 'タイトルは入力必須です。',
            'title.max' => 'タイトルは32文字まで入力可能です。',
            'content.required' => 'ニュース内容は入力必須です。',
            'content.max' => 'ニュース内容は800文字まで入力可能です。',
            'staff_id.required' => 'スタッフは選択必須です。',
            'staff_id.integer' => "スタッフは正しく選択してください。",
            'staff_id.exists' => 'このスタッフは登録されていません。',
            'image.file' => '画像はファイル形式で送信してください。',
            'image.mimes' => 'ファイル形式はjpg,jpeg,png,pdfのみ登録可能です。',
        ];
    }
}
