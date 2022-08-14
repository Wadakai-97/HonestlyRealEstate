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
            'lowest_price' => 'max:highest_price',
            'lowest_occupation_area' => 'min:lowest_occupation_area',
        ];
    }

    public function messages() {
        return [
            'highest_price.min' => '最高価格は最低価格以上に設定してください。',
            'highest_occupation_area.min' => '最高面積は最低面積以上に設定してください。',
        ];
    }
        /**
     * 最小値 min
     * @param string $attribute
     * @param string $value
     * @param array $parameters 0 => 比較する属性名
     * @return true
     */
    protected function validateMin($attribute, $value, $parameters)
    {
        if (!is_numeric($parameters[0]) &&
            !is_null($val = $this->getValue($parameters[0])))
        {
            $parameters[0] = $val;
        }

        return parent::validateMin($attribute, $value, $parameters);
    }

    /**
     * 最大値 max
     * @param string $attribute
     * @param string $value
     * @param array $parameters 0 => 比較する属性名
     * @return true
     */
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
