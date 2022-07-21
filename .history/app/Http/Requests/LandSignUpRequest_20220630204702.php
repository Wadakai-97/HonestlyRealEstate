<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LandSignUpRequest extends FormRequest
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
            'construction_conditions' => 'required',
            'land_area' => 'required',
            'building_coverage_ratio' => 'required',
            'floor_area_ratio' => 'required',
            'station' => 'required',
            'walking_distance_station' => 'required',
            'land_right' => 'required',
            'other_fee' => 'nullable',
            'urban_planning' => 'required',
            'land_use_zones' => 'required',
            'restrictions_by_law' => 'nullable',
            'national_land_utilization_law' => 'required',
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
            'conditions_of_transactions' => 'required',
            'elementary_school_name' => 'nullable',
            'elementary_school_district' => 'nullable',
            'junior_high_school_name' => 'nullable',
            'junior_high_school_district' => 'nullable',
            'sales_comment' => ['nullable', 'max:200'],
            'property_introduction' => ['nullable', 'max:800'],
            'terms_and_conditions' => ['nullable', 'max:200'],
        ];
    }

    public function messages() {
        return [
            'name.required' => '土地名は入力必須です。',
            'price.required' => '販売価格は入力必須です。',
            'tax.required' => '税込表記は選択必須です。',
            'images.file' => '画像はファイル形式で送信してください。',
            'images.mimes:jpg,jpeg,png,pdf' => 'ファイル形式はjpg,jpeg,png,pdfのみ登録可能です。',
            'pref.required' => '都道府県は入力必須です。',
            'municipalities.required' => '市区町村は入力必須です。',
            'construction_conditions.required' => '建築条件は選択必須です。',
            'land_area.required' => '土地面積は入力必須です。',
            'floor_area_ratio.required' => '容積率は入力必須です。',
            'station.required' => '最寄り駅は入力必須です。',
            'walking_distance_station' => '最寄り駅までの徒歩距離は入力必須です。',
            'land_right.required' => '土地権利は選択必須です。',
            'urban_planning.required' => '都市計画は選択必須です。',
            'land_use_zones.required' => '用途地域は選択必須です。',
            'national_land_utilization_law.required' => '国土法届出は選択必須です。',
            'land_classification.required' => '地目は入力必須です。',
            'terrain.required' => '地勢は入力必須です。',
            'adjacent_road.required' => '接道種類は選択必須です。',
            'adjacent_road_with.required' => '接道幅は入力必須です。',
            'private_road.required' => '私道負担は選択必須です。',
            'setback.required' => 'セットバックは入力必須です。',
            'water_supply.required' => '上水道は選択必須です。',
            'sewage_line.required' => '下水道は選択必須です。',
            'gas.required' => 'ガスは選択必須です。',
            'status.required' => '現況は選択必須です。',
            'delivery_date.required' => '引渡し日は入力必須です。',
            'conditions_of_transactions.required' => '取引態様は入力必須です。',
            'sales_comment.max:200' => 'セールスコメントは最大２００文字までです。',
            'property_introduction.max:800' => '物件紹介コメントは最大８００文字までです。',
            'terms_and_conditions.max:200' => '設備条件は最大２００文字までです。',
        ];
    }
}
