<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
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
            'staff_name' => 'required',
            'position' => 'required',
            'number_of_contracts' => ['required', 'integer' ],
            'birthplace' => 'required',
            'hobby' => 'required',
            'comment' => 'required',
        ];
    }

    public function messages() {
        return [
            'staff_name.required' => "スタッフ名は入力必須です。"
        ];
    }
}
