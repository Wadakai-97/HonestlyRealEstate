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
            'lowest_price' => 'max:highest_price',
            'lowest_land_area' => 'max:highest_land_area',
            'lowest_land_area' => 'max:highest_land_area',
            'lowest_land_area' => 'max:highest_land_area',
        ];
    }

    public function messages() {
        return [
            'lowest_price.max' => '最低価格は最高価格未満を選択してください。',
            'lowest_land_area.max' => '最低面積は最高面積未満を選択してください。',
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
