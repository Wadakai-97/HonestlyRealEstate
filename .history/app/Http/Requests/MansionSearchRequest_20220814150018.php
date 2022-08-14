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
            'lowest_price' => ['integer'],
            'highest_price' => ['integer', 'min:lowest_price'],
            'lowest_occupation_area' => ['integer'],
            'highest_occupation_area' => ['integer', 'min:lowest_occupation_area'],
        ];
    }

    public function messages() {
        return [
            'lowest_price.integer' => '最低価格は数値を入力してください。',
            'highest_price.integer' => '最高価格は数値を入力してください。',
            'highest_price.min' => '最低価格は最高価格未満を選択してください。',
            'lowest_occupation_area.integer' => '最低面積は数値を入力してください。',
            'highest_occupation_area.integer' => '最高面積は数値を入力してください。',
            'highest_occupation_area.min' => '最低面積は最高面積未満を選択してください。',
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
