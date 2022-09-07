<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'images' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf'],
            'staff_id' => ['required', 'integer'],
        ];
    }

    public function messages() {
        return [
            'title.required' => "タイトルは入力必須です。",
            'title.max' => 'タイトルは32文字まで入力可能です。',
            'content.required' => '記事内容は入力必須です。',
            'content.max' => '記事内容は800文字まで入力可能です。',
            'images.file' => '画像はファイル形式で送信してください。',
            'images.mimes' => 'ファイル形式はjpg,jpeg,png,pdfのみ登録可能です。',
            'staff_id.required' => "スタッフは選択必須です。",
            'staff_id.integer' => "スタッフは正しく選択してください。",
        ];
    }
}
