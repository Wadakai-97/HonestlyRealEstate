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
            'title' => ['required', 'max:32'],
            'body' => ['required', 'max:800'],
        ];
    }
    public function messages() {
        return [
            'title.required' => 'タイトルは入力必須です。',
            'title.max:32' => 'タイトルです。',
            'body.required' => 'ニュース内容は入力必須です。',
            'body.max:800' => 'ニュース内容は800文字まで入力可能です。',
        ];
    }
}
