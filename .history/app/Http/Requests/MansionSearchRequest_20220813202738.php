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
            'highest_price' => 'min:lowest_price',
            'highest_occupation_area' => 'min:lowest_occupation_area',
        ];
    }

    public function messages() {
        return [
            'highest_price.min' => '最高価格は最低価格以上に設定してください。',
            'highest_occupation_area.min' => '最高面積は最低面積以上に設定してください。',
        ];
    }
}
