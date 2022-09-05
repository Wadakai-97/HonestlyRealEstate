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
            'room' => ['required', 'integer', 'regex:/^[!-~]+$/'],
            'price' => 'required',
            'tax' => 'required',
            'pref' => 'required',
            'municipalities' => 'required',
            'block' => 'nullable',
            'land_area' => 'nullable',
            'building_area' => 'nullable',
            'number_of_rooms' => ['required', 'integer', 'regex:/^[!-~]+$/'],
            'type_of_room' => 'required',
            'measuring_method' => 'required',
            'occupation_area' => ['required', 'numeric', 'regex:/^[!-~]+$/'],
            'balcony' => ['required', 'string'],
            'balcony_area' => ['nullable', 'numeric', 'regex:/^[!-~]+$/'],
            'parking_lot' => 'nullable',
            'floor' => 'required',
            'story' => 'required',
            'year' => ['required', 'integer', 'between:1900,2100', 'regex:/^[!-~]+$/'],
            'month' => ['required', 'integer', 'between:1,12', 'regex:/^[!-~]+$/'],
            'day' => ['nullable', 'integer', 'between:1,31', 'regex:/^[!-~]+$/'],
            'direction' => 'required',
            'building_construction' => 'required',
            'total_number_of_households' => ['required', 'integer', 'regex:/^[!-~]+$/'],
            'land_right' => 'required',
            'land_use_zones' => 'required',
            'management_company' => 'required',
            'management_system' => 'required',
            'maintenance_fee' => ['required', 'integer', 'regex:/^[!-~]+$/'],
            'reserve_fund_for_repair' => ['required', 'integer', 'regex:/^[!-~]+$/'],
            'other_fee' => 'nullable',
            'status' => 'required',
            'delivery_date' => 'required',
            'conditions_of_transactions' => 'required',
            'station' => 'required',
            'walking_distance_station' => 'required',
            'elementary_school_name' => 'nullable',
            'elementary_school_district' => ['nullable', 'integer', 'regex:/^[!-~]+$/'],
            'junior_high_school_name' => 'nullable',
            'junior_high_school_district' => ['nullable', 'integer', 'regex:/^[!-~]+$/'],
            'sales_comment' => ['nullable', 'max:200'],
            'property_introduction' => ['nullable', 'max:800'],
            'terms_and_conditions' => ['nullable', 'max:200'],
            'image1' => ['nullable', ],
        ];
    }

    public function messages() {
        return [
            'apartment_name.required' => '建物名は入力必須です。',
            'room.required' => '号室は入力必須です。',
            'room.integer' => '号室は整数のみ入力可能です。',
            'room.regex:/^[!-~]+$/' => '号室は半角数字で入力してください。',
            'price.required' => '販売価格は入力必須です。',
            'tax.required' => '税込表記は選択必須です。',
            'images.file' => '画像はファイル形式で送信してください。',
            'images.mimes:jpg,jpeg,png,pdf' => 'ファイル形式はjpg,jpeg,png,pdfのみ登録可能です。',
            'images.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'images.max:1040' => '画像ファイルは最大10MB以内に抑えてください。',
            'pref.required' => '都道府県は入力必須です。',
            'municipalities.required' => '市区町村は入力必須です。',
            'measuring_method.required' => '測定方法は入力必須です。',
            'occupation_area.required' => '専有面積は入力必須です。',
            'occupation_area.numeric' => '専有面積は数字と小数点のみ入力してください。。',
            'number_of_rooms.required' => '部屋数は入力必須です。',
            'number_of_rooms.integer' => '部屋数は整数のみ入力可能です。',
            'number_of_rooms.regex:/^[!-~]+$/' => '部屋数は半角数字で入力してください。',
            'type_of_room.required' => '間取りは入力必須です。',
            'occupation_area.regex:/^[!-~]+$/' => '専有面積は半角数字で入力してください。',
            'balcony.required' => 'バルコニーの有無は選択必須です。',
            'balcony.string' => 'バルコニーの有無は正しく選択してください。',
            'balcony_area.numeric' => 'バルコニー面積は数字と小数点のみ入力してください。',
            'balcony_area.regex:/^[!-~]+$/' => 'バルコニー面積は半角数字で入力してください。',
            'floor.required' => '所在階は入力必須です。',
            'story.required' => '階建は入力必須です。',
            'year.required' => '築年数（年）は入力必須です。',
            'year.integer' => '築年数（年）は整数のみ入力可能です。',
            'year.regex:/^[!-~]+$/' => '築年数（年）は半角数字で入力してください。',
            'year.between:1900,2100' => 'その築年数（年）は存在しません。',
            'month.required' => '築年数（月）は入力必須です。',
            'month.integer' => '築年数（月）は整数のみ入力可能です。',
            'month.regex:/^[!-~]+$/' => '築年数（月）は半角数字で入力してください。',
            'month.between:1,12' => '築年数（月）が正しくありません。',
            'day.integer' => '築年数（日）は整数のみ入力可能です。',
            'day.regex:/^[!-~]+$/' => '築年数（日）は半角数字で入力してください。。',
            'day.between:1,31' => '築年数（日）が正しくありません。',
            'direction.required' => '方角は選択必須です。',
            'building_construction.required' => '建物構造は入力必須です。',
            'total_number_of_households.required' => '総戸数は入力必須です。',
            'total_number_of_households.integer' => '総戸数は整数のみ入力可能です。',
            'total_number_of_households.regex:/^[!-~]+$/' => '総戸数は半角数字で入力してください。',
            'land_right.required' => '土地権利は選択必須です。',
            'land_use_zones.required' => '用途地域は選択必須です。',
            'management_company.required' => '管理会社は入力必須です。',
            'management_system.required' => '管理形態は選択必須です。',
            'maintenance_fee.required' => '管理費は入力必須です。',
            'maintenance_fee.integer' => '管理費は整数のみ入力可能です。。',
            'maintenance_fee.regex:/^[!-~]+$/' => '管理費は半角数字で入力してください。',
            'reserve_fund_for_repair.required' => '修繕積立金は入力必須です。',
            'reserve_fund_for_repair.integer' => '修繕積立金は整数のみ入力可能です。',
            'reserve_fund_for_repair.regex:/^[!-~]+$/' => '修繕積立金は半角数字で入力してください。',
            'station.required' => '最寄り駅は入力必須です。',
            'walking_distance_station.required' => '最寄り駅までの徒歩距離は入力必須です。',
            'status.required' => '現況は選択必須です。',
            'delivery_date.required' => '入居時期は入力必須です。',
            'elementary_school_district.integer' => '小学校までの距離（分）は整数のみ入力可能です。',
            'elementary_school_district.regex:/^[!-~]+$/' => '小学校までの距離（分）は半角数字で入力してください。',
            'junior_high_school_district.integer' => '中学校までの距離（分）は整数のみ入力可能です。',
            'junior_high_school_district.regex:/^[!-~]+$/' => '中学校までの距離（分）は半角数字で入力してください。',
            'conditions_of_transactions.required' => '取引態様は選択必須です。',
            'sales_comment.max:200' => 'セールスコメントは最大２００文字まで入力可能です。',
            'property_introduction.max:800' => '物件紹介コメントは最大８００文字まで入力可能です。',
            'terms_and_conditions.max:200' => '設備条件は最大２００文字まで入力可能です。',
            'image1.file' => '画像がよろしくないのでは',
            'image1.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image1.max:1024' => '画像は10MB未満まで登録可能です。',
            'category1.max:20' => '分類は正しく選択してください。',
            'comment1.max:120' => 'コメントは120文字以内に入力してください。',
        ];
    }
}
