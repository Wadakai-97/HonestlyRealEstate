<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationSignUpRequest extends FormRequest
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
            'title' => ['required', 'max:32'],
            'content' => ['required', 'max:800'],
            'staff_id' => ['required', 'integer', 'exists:staffs,id'],
            'image' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf'],
        ];
    }
}
