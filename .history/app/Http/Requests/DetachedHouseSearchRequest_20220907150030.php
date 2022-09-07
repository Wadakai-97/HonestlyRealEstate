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
            'lowest__area' => ['nullable', 'numeric', 'regex:/^[!-~]+$/', 'required_if:,あり'],
            'highest__area' => ['nullable', 'numeric', 'regex:/^[!-~]+$/', 'required_if:,あり',
                function($attribute, $value, $fail) {
                    $request = $this->all();
                    if (!empty($request['lowest__area']) && !empty($request['highest__area'])) {
                        if(($request['highest__area'] - $request['lowest__area']) < 0) {
                            $fail('最高バルコニー面積は最低バルコニー面積よりも大きい面積、もしくは等しい面積を入力してください。');
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
