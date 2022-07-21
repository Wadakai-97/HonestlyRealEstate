<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationRequest extends FormRequest
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
            'title' => 'required',
            'body' => ['required', 'max:800'],
        ];
    }
    public function messages() {
        return [
            'title.required' => 'タイトルは入力必須です。',
            'highest_price.min' => '最高価格は最低価格以上に設定してください。',
            'highest_occupation_area.min' => '最高面積は最低面積以上に設定してください。',
        ];
    }
}
