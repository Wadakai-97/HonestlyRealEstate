<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LandSearchRequest extends FormRequest
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
            'highest_price' => 'gt:lowest_price',
            'highest_land_area' => 'gt:lowest_land_area',
        ];
    }
    public function messages() {
        return [
            'highest_price.gt' => '最高価格は最低価格を超える金額を選択してください。',
            'highest_land_area.gt' => '最高面積は最低面積を超える面積を選択してください。',
        ];
    }
}
