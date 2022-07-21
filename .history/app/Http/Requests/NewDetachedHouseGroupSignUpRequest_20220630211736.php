<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewDetachedHouseGroupSignUpRequest extends FormRequest
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
            'name' => 'required',
            'lowest_price' => 'required',
            'highest_price' => 'required',
            'tax' => 'required',
            'images' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf'],
            'pref' => 'required',
            'municipalities' => 'required',
            'block' => 'nullable',
            'lowest_land_area' => ['required', 'numeric', 'regex:/^[!-~]+$/'],
            'highest_land_area' => ['required', 'numeric', 'regex:/^[!-~]+$/'],
            'lowest_building_area' => ['required', 'numeric', 'regex:/^[!-~]+$/'],
            'highest_building_area' => ['required', 'numeric', 'regex:/^[!-~]+$/'],
            'lowest_building_coverage_ratio' => ['required', 'integer', 'regex:/^[!-~]+$/', 'digits_between:2,3'],
            'highest_building_coverage_ratio' => ['required', 'integer', 'regex:/^[!-~]+$/', 'digits_between:2,3'],
            'lowest_floor_area_ratio' => ['required', 'integer', 'regex:/^[!-~]+$/', 'digits_between:2,3'],
            'highest_floor_area_ratio' => ['required', 'integer', 'regex:/^[!-~]+$/', 'digits_between:2,3'],
            'balcony' => ['required', 'string'],
            'lowest_balcony_area' => ['nullable', 'numeric', 'regex:/^[!-~]+$/'],
            'highest_balcony_area' => ['nullable', 'numeric', 'regex:/^[!-~]+$/'],
            'lowest_number_of_rooms' => ['required', 'integer', 'regex:/^[!-~]+$/'],
            'highest_number_of_rooms' => ['required', 'integer', 'regex:/^[!-~]+$/'],
            'type_of_room' => 'required',
            'year' => ['required', 'integer', 'between:1900,2100', 'regex:/^[!-~]+$/'],
            'month' => ['required', 'integer', 'between:1,12', 'regex:/^[!-~]+$/'],
            'day' => ['nullable', 'integer', 'between:1,31', 'regex:/^[!-~]+$/'],
            'building_construction' => 'required',
            'lowest_parking_lot' => 'nullable',
            'highest_parking_lot' => 'nullable',
            'urban_planning' => 'required',
            'land_use_zones' => 'required',
            'land_classification' => 'required',
            'land_right' => 'required',
            'status' => 'required',
            'other_fee' => 'nullable',
            'terrain' => 'required',
            'adjacent_road' => 'required',
            'adjacent_road_width' => 'required',
            'private_road' => 'required',
            'setback' => 'required',
            'water_supply' => 'required',
            'sewage_line' => 'required',
            'gas' => 'required',
            'station' => 'required',
            'walking_distance_station' => 'required',
            'delivery_date' => 'required',
            'elementary_school_name' => 'nullable',
            'elementary_school_district' => ['nullable', 'integer', 'regex:/^[!-~]+$/'],
            'junior_high_school_name' => 'nullable',
            'junior_high_school_district' => ['nullable', 'integer', 'regex:/^[!-~]+$/'],
            'conditions_of_transactions' => 'required',
            building_certification_number
            'property_introduction' => ['nullable', 'max:800'],
            'sales_comment' => ['nullable', 'max:200'],
            'terms_and_conditions' => 'nullable',
            'sales_comment' => ['nullable', 'max:200'],
            'property_introduction' => ['nullable', 'max:800'],
            'terms_and_conditions' => ['nullable', 'max:200'],
        ];
    }

    public function messages() {
        return [
            'name.required' => '建物名は入力必須です。',
            'lowest_price.required' => '最低価格は入力必須です。',
            'highest_price.required' => '最高価格は入力必須です。',
            'tax.required' => '税込表記は選択必須です。',
            'images.file' => '画像はファイル形式で送信してください。',
            'images.mimes:jpg,jpeg,png,pdf' => 'ファイル形式はjpg,jpeg,png,pdfのみ登録可能です。',
            'pref.required' => '都道府県は入力必須です。',
            'municipalities.required' => '市区町村は入力必須です。',
            'lowest_land_area.required' => '土地面積(最低)は入力必須です。',
            'lowest_land_area.numeric' => '土地面積(最低)は数字と小数点のみ入力可能です。',
            'lowest_land_area.regex:/^[!-~]+$/' => '土地面積(最低)は半角数字で入力してください。',
            'highest_land_area.required' => '土地面積(最高)は入力必須です。',
            'highest_land_area.numeric' => '土地面積(最高)は数字と小数点のみ入力可能です。',
            'highest_land_area.regex:/^[!-~]+$/' => '土地面積(最高)は半角数字で入力してください。',
            'lowest_building_area.required' => '建物面積(最低)は入力必須です。',
            'lowest_building_area.numeric' => '建物面積(最低)は数字と小数点のみ入力可能です。',
            'lowest_building_area.regex:/^[!-~]+$/' => '建物面積(最低)は半角数字で入力してください。',
            'lowest_building_area.digits_between:2,3' => '建物面積(最低)は正しい桁数で入力してください。',
            'highest_building_area.required' => '建物面積(最高)は入力必須です。',
            'highest_building_area.numeric' => '建物面積(最高)は数字と小数点のみ入力可能です。',
            'highest_building_area.regex:/^[!-~]+$/' => '建物面積(最高)は半角数字で入力してください。',
            'highest_building_area.digits_between:2,3' => '建物面積(最高)は正しい桁数で入力してください。',
            'lowest_building_coverage_ratio.required' => '建ぺい率(最低)は入力必須です。',
            'lowest_building_coverage_ratio.numeric' => '建ぺい率(最低)は数字と小数点のみ入力可能です。',
            'lowest_building_coverage_ratio.regex:/^[!-~]+$/' => '建ぺい率(最低)は半角数字で入力してください。',
            'lowest_building_coverage_ratio.digits_between:2,3' => '建ぺい率(最低)は正しい桁数で入力してください。',
            'highest_building_coverage_ratio.required' => '建ぺい率(最高)は入力必須です。',
            'highest_building_coverage_ratio.numeric' => '建ぺい率(最高)は数字と小数点のみ入力可能です。',
            'highest_building_coverage_ratio.regex:/^[!-~]+$/' => '建ぺい率(最高)は半角数字で入力してください。',
            'highest_building_coverage_ratio.digits_between:2,3' => '建ぺい率(最高)は正しい桁数で入力してください。',
            'lowest_floor_area_ratio.required' => '容積率(最低)は入力必須です。',
            'lowest_floor_area_ratio.numeric' => '容積率(最低)は数字と小数点のみ入力可能です。',
            'lowest_floor_area_ratio.regex:/^[!-~]+$/' => '容積率(最低)は半角数字で入力してください。',
            'highest_floor_area_ratio.required' => '容積率(最高)は入力必須です。',
            'highest_floor_area_ratio.numeric' => '容積率(最高)は数字と小数点のみ入力可能です。',
            'highest_floor_area_ratio.regex:/^[!-~]+$/' => '容積率(最高)は半角数字で入力してください。',
            'balcony.required' => 'バルコニーの有無は選択必須です。',
            'balcony.string' => 'バルコニーの有無は正しく選択してください。',
            'lowest_balcony_area.numeric' => 'バルコニー面積(最低)は数字と小数点のみ入力してください。',
            'lowest_balcony_area.regex:/^[!-~]+$/' => 'バルコニー面積(最低)は半角数字で入力してください。',
            'highest_balcony_area.numeric' => 'バルコニー面積(最高)は数字と小数点のみ入力してください。',
            'highest_balcony_area.regex:/^[!-~]+$/' => 'バルコニー面積(最高)は半角数字で入力してください。',
            'lowest_number_of_rooms.required' => '部屋数(最低)は入力必須です。',
            'lowest_number_of_rooms.integer' => '部屋数(最低)は整数のみ入力可能です。',
            'lowest_number_of_rooms.regex:/^[!-~]+$/' => '部屋数(最低)は半角数字で入力してください。',
            'highest_number_of_rooms.required' => '部屋数(最高)は入力必須です。',
            'highest_number_of_rooms.integer' => '部屋数(最高)は整数のみ入力可能です。',
            'highest_number_of_rooms.regex:/^[!-~]+$/' => '部屋数(最高)は半角数字で入力してください。',
            'type_of_room.required' => '間取りは選択必須です。',
            'year.required' => '完成時期（年）は入力必須です。',
            'year.integer' => '築年数（年）は整数のみ入力可能です。',
            'year.regex:/^[!-~]+$/' => '築年数（年）は半角数字で入力してください。',
            'year.between:1900,2100' => 'その築年数（年）は存在しません。',
            'month.required' => '完成時期（月）は入力必須です。',
            'month.integer' => '築年数（月）は整数のみ入力可能です。',
            'month.between:1,12' => '築年数（月）が正しくありません。',
            'month.regex:/^[!-~]+$/' => '築年数（月）は半角数字で入力してください。',
            'day.integer' => '築年数（日）は整数のみ入力可能です。',
            'day.regex:/^[!-~]+$/' => '築年数（日）は半角数字で入力してください。。',
            'day.between:1,31' => '築年数（日）が正しくありません。',
            'building_construction.required' => '建物構造は入力必須です。',
            'urban_planning.required' => '都市計画は選択必須です。',
            'land_use_zones.required' => '用途地域は選択必須です。',
            'land_classification.required' => '地目は入力必須です。',
            'land_right.required' => '土地権利は選択必須です。',
            'status.required' => '現況は選択必須です。',
            'terrain.required' => '地勢は入力必須です。',
            'adjacent_road.required' => '接道種類は選択必須です。',
            'adjacent_road_width.required' => '接道幅は入力必須です。',
            'private_road.required' => '私道負担は選択必須です。',
            'setback.required' => 'セットバックは入力必須です。',
            'water_supply.required' => '上水道は選択必須です。',
            'sewage_line.required' => '下水道は選択必須です。',
            'gas.required' => 'ガスは選択必須です。',
            'station.required' => '最寄り駅は入力必須です。',
            'walking_distance_station' => '最寄り駅までの徒歩距離は入力必須です。',
            'elementary_school_district.integer' => '小学校までの距離（分）は整数のみ入力可能です。',
            'elementary_school_district.regex:/^[!-~]+$/' => '小学校までの距離（分）は半角数字で入力してください。',
            'junior_high_school_district.integer' => '中学校までの距離（分）は整数のみ入力可能です。',
            'junior_high_school_district.regex:/^[!-~]+$/' => '中学校までの距離（分）は半角数字で入力してください。',
            'conditions_of_transactions.required' => '取引態様は選択必須です。',
            'delivery_date.required' => '入居時期は入力必須です。',
            'sales_comment.max:200' => 'セールスコメントは最大２００文字までです。',
            'property_introduction.max:800' => '物件紹介コメントは最大８００文字までです。',
            'terms_and_conditions.max:200' => '設備条件は最大２００文字までです。',
        ];
    }
}
