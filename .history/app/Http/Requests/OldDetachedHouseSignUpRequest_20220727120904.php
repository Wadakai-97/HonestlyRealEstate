<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OldDetachedHouseSignUpRequest extends FormRequest
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
            'price' => 'required',
            'tax' => 'required',
            'images' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf'],
            'pref' => 'required',
            'municipalities' => 'required',
            'block' => 'nullable',
            'land_area' => ['required', 'numeric', 'regex:/^[!-~]+$/'],
            'building_area' => ['required', 'numeric', 'regex:/^[!-~]+$/'],
            'building_coverage_ratio' => 'required',
            'floor_area_ratio' => 'required',
            'balcony' => ['required', 'string'],
            'balcony_area' => ['nullable', 'numeric', 'regex:/^[!-~]+$/'],
            'number_of_rooms' => ['required', 'integer', 'regex:/^[!-~]+$/'],
            'type_of_room' => 'required',
            'year' => ['required', 'integer', 'between:1900,2100', 'regex:/^[!-~]+$/'],
            'month' => ['required', 'integer', 'between:1,12', 'regex:/^[!-~]+$/'],
            'day' => ['nullable', 'integer', 'between:1,31', 'regex:/^[!-~]+$/'],
            'building_construction' => 'required',
            'parking_lot' => 'nullable',
            'urban_planning' => 'required',
            'land_use_zones' => 'required',
            'land_classification' => 'required',
            'land_right' => 'required',
            'status' => 'required',
            'other_fee' => 'nullable',
            'terrain' => 'nullable',
            'adjacent_road' => 'required',
            'adjacent_road_with' => 'required',
            'private_road' => 'required',
            'setback' => 'required',
            'water_supply' => 'required',
            'sewage_line' => 'required',
            'gas' => 'required',
            'building_certification_number' => 'required',
            'station' => 'required',
            'walking_distance_station' => 'required',
            'delivery_date' => 'required',
            'elementary_school_name' => 'nullable',
            'elementary_school_district' => ['nullable', 'integer', 'regex:/^[!-~]+$/'],
            'junior_high_school_name' => 'nullable',
            'junior_high_school_district' => ['nullable', 'integer', 'regex:/^[!-~]+$/'],
            'conditions_of_transactions' => 'required',
            'sales_comment' => ['nullable', 'max:200'],
            'property_introduction' => ['nullable', 'max:800'],
            'terms_and_conditions' => ['nullable', 'max:200'],
        ];
    }

    public function messages() {
        return [
            'name.required' => '建物名は入力必須です。',
            'price.required' => '販売価格は入力必須です。',
            'tax.required' => '税込表記は選択必須です。',
            'images.file' => '画像はファイル形式で送信してください。',
            'images.mimes:jpg,jpeg,png,pdf' => 'ファイル形式はjpg,jpeg,png,pdfのみ登録可能です。',
            'pref.required' => '都道府県は入力必須です。',
            'municipalities.required' => '市区町村は入力必須です。',
            'land_area.required' => '土地面積は入力必須です。',
            'land_area.numeric' => '土地面積は数字と小数点のみ入力可能です。',
            'land_area.regex:/^[!-~]+$/' => '土地面積は半角数字で入力してください。',
            'building_area.required' => '建物面積は入力必須です。',
            'building_area.numeric' => '建物面積は数字と小数点のみ入力可能です。',
            'building_area.regex:/^[!-~]+$/' => '建物面積は半角数字で入力してください。',
            'building_coverage_ratio.required' => '建ぺい率は入力必須です。',
            'floor_area_ratio.required' => '容積率は入力必須です。',
            'balcony.required' => 'バルコニーの有無は選択必須です。',
            'balcony.string' => 'バルコニーの有無は正しく選択してください。',
            'balcony_area.numeric' => 'バルコニー面積は数字と小数点のみ入力してください。',
            'balcony_area.regex:/^[!-~]+$/' => 'バルコニー面積は半角数字で入力してください。',
            'number_of_rooms.required' => '部屋数は入力必須です。',
            'number_of_rooms.integer' => '部屋数は整数のみ入力可能です。',
            'number_of_rooms.regex:/^[!-~]+$/' => '部屋数は半角数字で入力してください。',
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
            'adjacent_road.required' => '接道種類は選択必須です。',
            'adjacent_road_with.required' => '接道幅は入力必須です。',
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
