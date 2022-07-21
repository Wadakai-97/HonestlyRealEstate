<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
            //
        ];
    }

    public function messages() {
        return [
            'name.required' => '建物名は入力必須です。',
            'price.required' => '販売価格は入力必須です。',
            'price.integer' => '販売価格は整数のみ入力可能です。',
            'price.regex:/^[!-~]+$/' => '販売価格は半角数字で入力してください。',
            'tax.required' => '税込表記は選択必須です。',
            'images.file' => '画像はファイル形式で送信してください。',
            'images.mimes:jpg,jpeg,png,pdf' => 'ファイル形式はjpg,jpeg,png,pdfのみ登録可能です。',
            'pref.required' => '都道府県は入力必須です。',
            'municipalities.required' => '市区町村は入力必須です。',
            'land_area.required' => '土地面積は入力必須です。',
            'land_area.numeric' => '土地面積は数字と小数点のみ入力可能です。',
            'land_area.rege
        ];
    }
}
