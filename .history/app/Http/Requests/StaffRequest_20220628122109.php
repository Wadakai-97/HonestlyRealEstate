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
            'staff_name' => $request->staff_name,
                'position' => $request->position,
                'number_of_contracts' => $request->number_of_contracts,
                'birthplace' => $request->birthplace,
                'hobby' => $request->hobby,
                'comment'
        ];
    }

    public function messages() {
        return [
            //
        ];
    }
}
