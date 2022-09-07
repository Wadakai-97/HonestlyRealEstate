<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetachedHouseSearchRequest extends FormRequest
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
            'lowest_land_area' => ['nullable', 'numeric', 'regex:/^[!-~]+$/', 'required_if:land,あり'],
            'highest_land_area' => ['nullable', 'numeric', 'regex:/^[!-~]+$/', 'required_if:land,あり',
                function($attribute, $value, $fail) {
                    $request = $this->all();
                    if (!empty($request['lowest_land_area']) && !empty($request['highest_land_area'])) {
                        if(($request['highest_land_area'] - $request['lowest_land_area']) < 0) {
                            $fail('最高土地面積は最低土地面積よりも大きい面積、もしくは等しい面積を入力してください。');
                        }
                    }
                }
            ],
            'highest_land_area' => 'gt:lowest_land_area',
            'highest_building_area' => 'gt:lowest_building_area',
        ];
    }

    public function messages() {
        return [
            'highest_price.gt' => '最高価格は最低価格を超える金額を選択してください。',
            'highest_land_area.gt' => '土地面積(最高)は土地面積(最低)を超える土地面積を選択してください。',
            'highest_building_area.gt' => '建物面積(最高)は建物面積(最低)を超える建物面積を選択してください。',
        ];
    }
}
