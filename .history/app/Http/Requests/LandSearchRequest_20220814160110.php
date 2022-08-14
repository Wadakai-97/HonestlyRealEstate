<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LandSearchRequest extends FormRequest
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
            'highest_land_area' => 'gt:lowest_land_area',
        ];
    }
}
