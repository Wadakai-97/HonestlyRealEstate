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

    public function messages() {
        return [
            'apartment_name.required' => '建物名は入力必須です。',
            'room.required' => '号室は入力必須です。',
            'price.required' => '販売価格は入力必須です。',
            'tax.required' => '税込表記は選択必須です。',
            'pref.required' => '都道府県は入力必須です。',
            'municipalities.required' => '市区町村は入力必須です。',
            'measuring_method.required' => '測定方法は入力必須です。',
            'number_of_rooms.required' => '部屋数は入力必須です。',
            'type_of_room.required' => '間取りは入力必須です。',
            'occupation_area.required' => '専有面積は入力必須です。',
            'balcony_area.required' => 'バルコニー面積は入力必須です。',
            'floor.required' => '所在階は入力必須です。',
            'story.required' => '階建ては入力必須です。',
            'year.required' => '築年数（年）は入力必須です。',
            'month.required' => '築年数（月）は入力必須です。',
            'building_construction.required' => '建物構造は入力必須です。',
            'total_number_of_households.required' => '総戸数は入力必須です。',
            'land_right.required' => '土地権利は入力必須です。',
            'land_use_zones.required' => '用途地域は選択必須です。',
            'management_company.required' => '管理会社は入力必須です。',
            'management_system.required' => '管理形態は選択必須です。',
            'maintenance_fee.required' => '管理費は入力必須です。',
            'reserve_fund_for_repair.required' => '修繕積立金は入力必須です。',
            'station.required' => '最寄り駅は入力必須です。',
            'walking_distance_station' => '最寄り駅までの徒歩距離は入力必須です。',
            'status.required' => '現況は選択必須です。',
            'delivery_date.required' => '入居時期は入力必須です。',
            'conditions_of_transactions.required' => '取引態様は入力必須です。',
        ];
    }
}
