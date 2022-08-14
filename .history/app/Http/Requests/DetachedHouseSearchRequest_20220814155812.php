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
            'highest_price' => 'max:highest_price',
            'highest_land_area' => 'max:highest_land_area',
            'highest_building_area' => 'max:highest_building_area',
        ];
    }

    public function messages() {
        return [
            'highest_price.max' => '最低価格は最高価格未満を選択してください。',
            'highest_land_area.max' => '土地面積(最低)は土地面積(最高)未満を選択してください。',
            'highest_building_area.max' => '建物面積(最低)は建物面積(最高)未満を選択してください。',
        ];
    }

    protected function validateMin($attribute, $value, $parameters)
    {
        if (!is_numeric($parameters[0]) &&
            !is_null($val = $this->getValue($parameters[0])))
        {
            $parameters[0] = $val;
        }

        return parent::validateMin($attribute, $value, $parameters);
    }
    protected function validateMax($attribute, $value, $parameters)
    {
        if (!is_numeric($parameters[0]) &&
            !is_null($val = $this->getValue($parameters[0])))
        {
            $parameters[0] = $val;
        }

        return parent::validateMax($attribute, $value, $parameters);
    }
}
