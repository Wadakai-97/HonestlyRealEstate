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
            'image' => ['nullable', 'mimes:jpg,jpeg', 'dimensions:min_width=100,max_width=400,min_height=100,max_height=400', 'max:1024'],
            'category' => ['nullable', 'max:20', ],
            'comment' => ['nullable', 'max:120', ],
        ];
    }

    public function messages() {
        return [
            'image.mimes:jpg,jpeg' => 'ファイル形式はjpg/jpegのみ登録可能です。',
            'image.max:1024' => '画像は10MB以内まで登録可能です。',
            'image.dimensions' => '画像は横幅200px〜400px/縦幅100px〜240px以内にて登録可能です。',
            'category.max:20' => '分類は正しく選択してください。',
            'comment.max:120' => 'コメントは120文字以内にて入力してください。'
        ];
    }
}
