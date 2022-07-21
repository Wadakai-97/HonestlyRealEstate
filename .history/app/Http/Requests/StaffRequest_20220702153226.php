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
            'staff_name' => 'required',
            'head_shot' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'dimensions:width=320', 'dimensions:height=240'],
            'position' => 'required',
            'number_of_contracts' => ['required', 'integer', 'regex:/^[!-~]+$/' ],
            'birthplace' => 'required',
            'hobby' => 'required',
            'comment' => ['required', 'max:800'],
        ];
    }

    public function messages() {
        return [
            'staff_name.required' => "スタッフ名は入力必須です。",
            'head_shot.file' => '顔写真はファイル形式で送信してください。',
            'head_shot.mimes:jpg,jpeg,png,pdf' => '顔写真のファイル形式はjpg,jpeg,png,pdfのみ登録可能です。',
            'head_shot.dimensions:width=320' => '顔写真のファイルサイズは幅320px以下に設定してください。',
            'position.required' => "役職は選択必須です。",
            'number_of_contracts.required' => "契約数は入力必須です。",
            'number_of_contracts.integer' => "契約数は数字で入力してください。",
            'number_of_contracts.regex:/^[!-~]+$/' => "契約数は半角数字で入力してください。",
            'birthplace.required' => "出生地は入力必須です。",
            'hobby.required' => "趣味は入力必須です。",
            'comment.required' => "コメントは入力必須です。",
            'comment.max:800' => "コメントは800文字まで入力可能です。",
        ];
    }
}
