<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MansionSignUpRequest extends FormRequest
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
            'apartment_name' => 'required',
            'room' => 'required',
            'price' => 'required',
            'tax' => 'required',
            'images' => 'nullable',
            'pref' => 'required',
            'municipalities' => 'required',
            'block' => 'nullable',
            'land_area' => 'nullable',
            'building_area' => 'nullable',
            'number_of_rooms' => 'required',
            'type_of_room' => 'required',
            'measuring_method' => 'required',
            'occupation_area' => ['required', 'numeric', 'regex:/^[!-~]+$/'],
            'balcony_area' => ['required', 'numeric', 'regex:/^[!-~]+$/'],
            'parking_lot' => 'nullable',
            'floor' => 'required',
            'story' => 'required',
            'year' => 'required',
            'month' => 'required',
            'day' => 'nullable',
            'direction' => 'nullable',
            'station' => 'required',
            'walking_distance_station' => 'required',
            'building_construction' => 'required',
            'total_number_of_households' => ['required', 'integer', 'regex:/^[!-~]+$/'],
            'land_right' => 'required',
            'land_use_zones' => 'required',
            'management_company' => 'required',
            'management_system' => 'required',
            'maintenance_fee' => ['required', 'integer', 'regex:/^[!-~]+$/'],
            'reserve_fund_for_repair' => ['required', 'numeric', 'regex:/^[!-~]+$/'],
            'other_fee' => 'nullable',
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
            'occupation_area.regex:/^[!-~]+$/' => '専有面積は半角数字で入力してください。',
            'balcony_area.required' => 'バルコニー面積は入力必須です。',
            'balcony_area.regex:/^[!-~]+$/' => 'バルコニー面積は半角数字で入力してください。',
            'floor.required' => '所在階は入力必須です。',
            'story.required' => '階建ては入力必須です。',
            'year.required' => '築年数（年）は入力必須です。',
            'month.required' => '築年数（月）は入力必須です。',
            'building_construction.required' => '建物構造は入力必須です。',
            'total_number_of_households.required' => '総戸数は入力必須です。',
            'total_number_of_households.regex:/^[!-~]+$/' => '総戸数は半角数字で入力してください。',
            'land_right.required' => '土地権利は入力必須です。',
            'land_use_zones.required' => '用途地域は選択必須です。',
            'management_company.required' => '管理会社は入力必須です。',
            'management_system.required' => '管理形態は選択必須です。',
            'maintenance_fee.required' => '管理費は入力必須です。',
            'maintenance_fee.regex:/^[!-~]+$/' => '管理費は半角数字で入力してください。',
            'reserve_fund_for_repair.required' => '修繕積立金は入力必須です。',
            'reserve_fund_for_repair.regex:/^[!-~]+$/' => '修繕積立金は半角数字で入力してください。',
            'station.required' => '最寄り駅は入力必須です。',
            'walking_distance_station' => '最寄り駅までの徒歩距離は入力必須です。',
            'status.required' => '現況は選択必須です。',
            'delivery_date.required' => '入居時期は入力必須です。',
            'conditions_of_transactions.required' => '取引態様は入力必須です。',
        ];
    }
}
