<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewDetachedHouseSignUpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required',
            'tax' => 'required',
            'images' => 'nullable',
            'pref' => 'required',
            'municipalities' => 'required',
            'block' => 'nullable',

            'land_area' => 'required',
            'building_'
            'building_coverage_ratio' => 'required',
            'floor_area_ratio' => 'required',
            'station' => '`required',
            'walking_distance_station' => 'required',
            'land_right' => 'required',
            'other_fee' => 'nullable',
            'urban_planning' => 'required',
            'land_use_zones' => 'required',
            'restrictions_by_law' => 'nullable',

            'land_classification' => 'required',
            'terrain' => 'required',
            'adjacent_road' => 'required',
            'adjacent_road_with' => 'required',
            'private_road' => 'required',
            'setback' => 'required',
            'water_supply' => 'required',
            'sewage_line' => 'required',
            'gas' => 'required',
            'status' => 'required',
            'delivery_date' => 'required',
            'elementary_school_name' => 'nullable',
            'elementary_school_district' => 'nullable',
            'junior_high_school_name' => 'nullable',
            'junior_high_school_district' => 'nullable',
            'property_introduction' => 'nullable',
            'sales_comment' => 'nullable',
            'terms_and_conditions' => 'nullable',
            'conditions_of_transactions' => 'required',
        ];
    }
}
