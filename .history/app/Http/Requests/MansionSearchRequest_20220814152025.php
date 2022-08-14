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

    public function withValidator(Validator $validator)
    {
        $validator->sometimes('lowest_price', 'required | max', function ($input) {
            return $input->lowest_price >= $input->highest_price;
        });

        $validator->sometimes('lowest_occupation_area', 'required | max', function ($input) {
            return $input->lowest_occupation_area > $input->highest_occupation_area;
        });
    }
}
