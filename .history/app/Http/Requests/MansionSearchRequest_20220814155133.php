<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MansionSearchRequest extends FormRequest
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
    public function rules() {
        return [
            'lowest_price' => 'integer',
            'highest_price' => ['integer', 'gt:lowest_price'],
            'lowest_occupation_area' => 'integer',
            'highest_occupation_area' => ['integer', 'gt:lowest_occupation_area'],
        ];
    }

    public function messages() {
        return [
            'lowest_price.integer' => '最低価格は数値を入力してください。',
            'highest_price.integer' => '最高価格は数値を入力してください。',
            'highest_price.gt' => '',
            'lowest_occupation_area.max' => '数値あかんで。',
            'lowest_occupation_area.integer' => '最低面積は数値を入力してください。',
            'highest_occupation_area.integer' => '最高面積は数値を入力してください。',
        ];
    }
}
