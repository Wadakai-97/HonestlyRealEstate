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
            'name.required' => '建物名は入力必須です。',
            'price.required' => '販売価格は入力必須です。',
            'tax.required' => '税込表記は選択必須です。',
            'pref.required' => '都道府県は入力必須です。',
            'municipalities.required' => '市区町村は入力必須です。',
            'land_area.required' => '土地面積は入力必須です。',
            'building_area.required' => '建物面積は入力必須です。',
            'building_coverage_ratio.required' => '建ぺい率は入力必須です。',
            'floor_area_ratio.required' => '容積率は入力必須です。',
            'balcony_area.required' => 'バルコニー面積は入力必須です。',
            'number_of_rooms.required' => '部屋数は入力必須です。',
            'type_of_room.required' => '間取りは選択必須です。',
            'year.required' => '完成時期（年）は入力必須です。',
            'month.required' => '完成時期（月）は入力必須です。',
            'building_construction.required' => '建物構造は入力必須です。',


            'urban_planning.required' => '都市計画は選択必須です。',
            'land_use_zones.required' => '用途地域は選択必須です。',
            'land_classification.required' => '地目は入力必須です。',
            'land_right.required' => '土地権利は入力必須です。',
            'status.required' => '現況は選択必須です。',
            'terrain.required' => '地勢は入力必須です。',
            'adjacent_road.required' => '接道種類は選択必須です。',
            'adjacent_road_with.required' => '接道幅は入力必須です。',
            'private_road.required' => '私道負担は選択必須です。',
            'setback.required' => 'セットバックは入力必須です。',
            'water_supply.required' => '上水道は選択必須です。',
            'sewage_line.required' => '下水道は選択必須です。',
            'gas.required' => 'ガスは選択必須です。',
            'station.required' => '最寄り駅は入力必須です。',
            'walking_distance_station' => '最寄り駅までの徒歩距離は入力必須です。',
            'conditions_of_transactions.required' => '取引態様は入力必須です。',
            'delivery_date.required' => '入居時期は入力必須です。',
        ];
    }
}
