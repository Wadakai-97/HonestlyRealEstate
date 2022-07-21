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
            'building_area' => 'required',
            'building_coverage_ratio' => 'required',
            'floor_area_ratio' => 'required',
            'balcony_area' => 'required',

            'number_of_rooms' => 'required',
            'type_of_room' => 'required',
            'year' => 'required',
            'month' => 'required',
            'day' => 'nullable',
            'building_construction' => 'required',
            'parking_lot' => 'nullable',
            'urban_planning' => 'required',
            'land_use_zones' => 'required',
            'land_classification' => 'required',
            'land_right' => 'required',
            'status' => 'required',
            'other_fee' => 'nullable',
            'terrain' => 'required',
            'adjacent_road' => 'required',
            'adjacent_road_with' => 'required',
            'private_road' => 'required',
            'setback' => 'required',
            'water_supply' => 'required',
            'sewage_line' => 'required',
            'gas' => 'required',
            'station' => '`required',
            'walking_distance_station' => 'required',
            'conditions_of_transactions' => 'required',
            'delivery_date' => 'required',
            'elementary_school_name' => 'nullable',
            'elementary_school_district' => 'nullable',
            'junior_high_school_name' => 'nullable',
            'junior_high_school_district' => 'nullable',
            'property_introduction' => 'nullable',
            'sales_comment' => 'nullable',
            'terms_and_conditions' => 'nullable',
        ];
    }

    building_area' => 'required',
    'balcony_area' => 'required',
    'number_of_rooms' => 'required',
    'type_of_room' => 'required',
    'year' => 'required',
    'month' => 'required',
    'day' => 'nullable',
    'building_construction' => 'required',
}
