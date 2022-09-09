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
            'name' => ['required', 'max:32'],
            'lowest_price' => ['required', 'numeric', 'regex:/^[!-~]+$/' ],
            'highest_price' => ['required', 'numeric', 'regex:/^[!-~]+$/',
                function($attribute, $value, $fail) {
                    $request = $this->all();
                    if (!empty($request['lowest_price']) && !empty($request['highest_price'])) {
                        if(($request['highest_price'] - $request['lowest_price']) < 0) {
                            $fail('最高価格は最低価格よりも大きい金額、もしくは等しい金額を入力してください。');
                        }
                    }
                }
            ],
            'tax' => 'required',
            'images' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf'],
            'pref' => 'required',
            'municipalities' => 'required',
            'block' => 'nullable',
            'lowest_land_area' => ['required', 'numeric', 'regex:/^[!-~]+$/'],
            'highest_land_area' => ['required', 'numeric', 'regex:/^[!-~]+$/',
                function($attribute, $value, $fail) {
                    $request = $this->all();
                    if (!empty($request['lowest_land_area']) && !empty($request['highest_land_area'])) {
                        if(($request['highest_land_area'] - $request['lowest_land_area']) < 0) {
                            $fail('最高土地面積は最低土地面積よりも大きい面積、もしくは等しい面積を入力してください。');
                        }
                    }
                }
            ],
            'lowest_building_area' => ['required', 'numeric', 'regex:/^[!-~]+$/'],
            'highest_building_area' => ['required', 'numeric', 'regex:/^[!-~]+$/',
                function($attribute, $value, $fail) {
                    $request = $this->all();
                    if (!empty($request['lowest_building_area']) && !empty($request['highest_building_area'])) {
                        if(($request['highest_building_area'] - $request['lowest_building_area']) < 0) {
                            $fail('最高建物面積は最低建物面積よりも大きい面積、もしくは等しい面積を入力してください。');
                        }
                    }
                }
            ],
            'lowest_building_coverage_ratio' => ['required', 'integer', 'regex:/^[!-~]+$/', 'between:30,80'],
            'highest_building_coverage_ratio' => ['required', 'integer', 'regex:/^[!-~]+$/', 'between:30,80',
                function($attribute, $value, $fail) {
                    $request = $this->all();
                    if (!empty($request['lowest_building_coverage_ratio']) && !empty($request['highest_building_coverage_ratio'])) {
                        if(($request['highest_building_coverage_ratio'] - $request['lowest_building_coverage_ratio']) < 0) {
                            $fail('最高建ぺい率は最低建ぺい率よりも大きい割合、もしくは等しい割合を入力してください。');
                        }
                    }
                }
            ],
            'lowest_floor_area_ratio' => ['required', 'integer', 'regex:/^[!-~]+$/', 'between:50,1300'],
            'highest_floor_area_ratio' => ['required', 'integer', 'regex:/^[!-~]+$/', 'between:50,1300',
                function($attribute, $value, $fail) {
                    $request = $this->all();
                    if (!empty($request['lowest_floor_area_ratio']) && !empty($request['highest_floor_area_ratio'])) {
                        if(($request['highest_floor_area_ratio'] - $request['lowest_floor_area_ratio']) < 0) {
                            $fail('最高容積率は最低容積率よりも多い割合、もしくは等しい割合を入力してください。');
                        }
                    }
                }
            ],
            'balcony' => ['required', 'string'],
            'lowest_balcony_area' => ['nullable', 'numeric', 'regex:/^[!-~]+$/', 'required_if:balcony,あり'],
            'highest_balcony_area' => ['nullable', 'numeric', 'regex:/^[!-~]+$/', 'required_if:balcony,あり',
                function($attribute, $value, $fail) {
                    $request = $this->all();
                    if (!empty($request['lowest_balcony_area']) && !empty($request['highest_balcony_area'])) {
                        if(($request['highest_balcony_area'] - $request['lowest_balcony_area']) < 0) {
                            $fail('最高バルコニー面積は最低バルコニー面積よりも大きい面積、もしくは等しい面積を入力してください。');
                        }
                    }
                }
            ],
            'lowest_number_of_rooms' => ['required', 'integer', 'regex:/^[!-~]+$/'],
            'highest_number_of_rooms' => ['required', 'integer', 'regex:/^[!-~]+$/',
                function($attribute, $value, $fail) {
                    $request = $this->all();
                    if (!empty($request['lowest_number_of_rooms']) && !empty($request['highest_number_of_rooms'])) {
                        if(($request['highest_number_of_rooms'] - $request['lowest_number_of_rooms']) < 0) {
                            $fail('最高部屋数は最低部屋数よりも多い部屋数、もしくは等しい部屋数を入力してください。');
                        }
                    }
                }
            ],
            'lowest_type_of_room' => 'required',
            'highest_type_of_room' => 'required',
            'year' => ['required', 'integer', 'between:1900,2100', 'regex:/^[!-~]+$/'],
            'month' => ['required', 'integer', 'between:1,12', 'regex:/^[!-~]+$/'],
            'day' => ['nullable', 'integer', 'between:1,31', 'regex:/^[!-~]+$/'],
            'building_construction' => 'required',
            'parking' => 'required',
            'lowest_parking_lot' => ['nullable', 'integer', 'regex:/^[!-~]+$/', 'required_if:parking_lot,あり'],
            'highest_parking_lot' => ['nullable', 'integer', 'regex:/^[!-~]+$/', 'required_if:parking_lot,あり',
                function($attribute, $value, $fail) {
                    $request = $this->all();
                    if (!empty($request['lowest_parking_lot']) && !empty($request['highest_parking_lot'])) {
                        if(($request['highest_parking_lot'] - $request['lowest_parking_lot']) < 0) {
                            $fail('最高駐車場数は最低駐車場数よりも多い駐車場数、もしくは等しい駐車場数を入力してください。');
                        }
                    }
                }
            ],
            'urban_planning' => 'required',
            'land_use_zones' => 'required',
            'land_classification' => 'required',
            'land_right' => 'required',
            'status' => 'required',
            'other_fee' => 'nullable',
            'terrain' => 'nullable',
            'adjacent_road_direction' => 'required',
            'adjacent_road' => 'required',
            'lowest_adjacent_road_width' => 'required',
            'highest_adjacent_road_width' => 'required',
            'private_road' => 'required',
            'setback' => 'required',
            'lowest_setback_length' => ['nullable', 'required_if:setback,あり', 'between:0.01,4.00'],
            'highest_setback_length' => ['nullable', 'required_if:setback,あり', 'between:0.01,4.00'],
            'water_supply' => 'required',
            'sewage_line' => 'required',
            'gas' => 'required',
            'station' => 'required',
            'access_method' => 'required',
            'distance_station' => 'required',
            'delivery_date' => 'required',
            'elementary_school_name' => 'nullable',
            'elementary_school_district' => ['nullable', 'integer', 'regex:/^[!-~]+$/', 'between:1,60'],
            'junior_high_school_name' => 'nullable',
            'junior_high_school_district' => ['nullable', 'integer', 'regex:/^[!-~]+$/', 'between:1,60'],
            'conditions_of_transactions' => 'required',
            'building_certification_number' => 'required',
            'property_introduction' => ['nullable', 'max:800'],
            'sales_comment' => ['nullable', 'max:200'],
            'terms_and_conditions' => 'nullable',
            'sales_comment' => ['nullable', 'max:200'],
            'property_introduction' => ['nullable', 'max:800'],
            'terms_and_conditions' => ['nullable', 'max:200'],
            'image1' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category1' => ['nullable', 'max:20'],
            'comment1' => ['nullable', 'max:120'],
            'image2' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category2' => ['nullable', 'max:20'],
            'comment2' => ['nullable', 'max:120'],
            'image3' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category3' => ['nullable', 'max:20'],
            'comment3' => ['nullable', 'max:120'],
            'image4' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category4' => ['nullable', 'max:20'],
            'comment4' => ['nullable', 'max:120'],
            'image5' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category5' => ['nullable', 'max:20'],
            'comment5' => ['nullable', 'max:120'],
            'image6' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category6' => ['nullable', 'max:20'],
            'comment6' => ['nullable', 'max:120'],
            'image7' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category7' => ['nullable', 'max:20'],
            'comment7' => ['nullable', 'max:120'],
            'image8' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category8' => ['nullable', 'max:20'],
            'comment8' => ['nullable', 'max:120'],
            'image9' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category9' => ['nullable', 'max:20'],
            'comment9' => ['nullable', 'max:120'],
            'image10' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category10' => ['nullable', 'max:20'],
            'comment10' => ['nullable', 'max:120'],
            'image11' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category11' => ['nullable', 'max:20'],
            'comment11' => ['nullable', 'max:120'],
            'image12' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category12' => ['nullable', 'max:20'],
            'comment12' => ['nullable', 'max:120'],
            'image13' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category13' => ['nullable', 'max:20'],
            'comment14' => ['nullable', 'max:120'],
            'image14' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category14' => ['nullable', 'max:20'],
            'comment14' => ['nullable', 'max:120'],
            'image15' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category15' => ['nullable', 'max:20'],
            'comment15' => ['nullable', 'max:120'],
            'image16' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category16' => ['nullable', 'max:20'],
            'comment16' => ['nullable', 'max:120'],
            'image17' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category17' => ['nullable', 'max:20'],
            'comment17' => ['nullable', 'max:120'],
            'image18' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category18' => ['nullable', 'max:20'],
            'comment18' => ['nullable', 'max:120'],
            'image19' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category19' => ['nullable', 'max:20'],
            'comment19' => ['nullable', 'max:120'],
            'image20' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category20' => ['nullable', 'max:20'],
            'comment20' => ['nullable', 'max:120'],
            'image21' => ['nullable', 'file', 'mimes:jpg,jpeg', 'max:1024', 'dimensions:width=480,height=240'],
            'category21' => ['nullable', 'max:20'],
            'comment21' => ['nullable', 'max:120'],
        ];
    }

    public function messages() {
        return [
            'name.required' => '物件名は入力必須です。',
            'name.max' => '物件名は32文字以内で入力してください。',
            'lowest_price.required' => '最低価格は入力必須です。',
            'lowest_price.numeric' => '最低価格は数字と小数点のみ入力可能です。',
            'lowest_price.regex' => '最低価格は半角数字で入力してください。',
            'highest_price.required' => '最高価格は入力必須です。',
            'highest_price.numeric' => '最高価格は数字と小数点のみ入力可能です。',
            'highest_price.regex' => '最高価格は半角数字で入力してください。',
            'tax.required' => '税込表記は選択必須です。',
            'pref.required' => '都道府県は入力必須です。',
            'municipalities.required' => '市区町村は入力必須です。',
            'lowest_land_area.required' => '土地面積(最低)は入力必須です。',
            'lowest_land_area.numeric' => '土地面積(最低)は数字と小数点のみ入力可能です。',
            'lowest_land_area.regex' => '土地面積(最低)は半角数字で入力してください。',
            'lowest_land_area.between' => '土地面積は:min〜:max以内の数値を入力してください。',
            'highest_land_area.required' => '土地面積(最高)は入力必須です。',
            'highest_land_area.numeric' => '土地面積(最高)は数字と小数点のみ入力可能です。',
            'highest_land_area.regex' => '土地面積(最高)は半角数字で入力してください。',
            'land_area.between' => '土地面積は:min〜:max以内の数値を入力してください。',
            'lowest_building_area.required' => '建物面積(最低)は入力必須です。',
            'lowest_building_area.numeric' => '建物面積(最低)は数字と小数点のみ入力可能です。',
            'lowest_building_area.regex' => '建物面積(最低)は半角数字で入力してください。',
            'lowest_building_area.between' => '建物面積(最低)は:min〜:max以内の数値を入力してください。',
            'highest_building_area.required' => '建物面積(最高)は入力必須です。',
            'highest_building_area.numeric' => '建物面積(最高)は数字と小数点のみ入力可能です。',
            'highest_building_area.regex' => '建物面積(最高)は半角数字で入力してください。',
            'highest_building_area.between' => '建物面積(最高)は:min〜:max以内の数値を入力してください。',
            'lowest_building_coverage_ratio.required' => '建ぺい率(最低)は入力必須です。',
            'lowest_building_coverage_ratio.numeric' => '建ぺい率(最低)は数字と小数点のみ入力可能です。',
            'lowest_building_coverage_ratio.regex' => '建ぺい率(最低)は半角数字で入力してください。',
            'lowest_building_coverage_ratio.between' => '建ぺい率(最低)は:min〜:max以内の数値を入力してください。',
            'highest_building_coverage_ratio.required' => '建ぺい率(最高)は入力必須です。',
            'highest_building_coverage_ratio.numeric' => '建ぺい率(最高)は数字と小数点のみ入力可能です。',
            'highest_building_coverage_ratio.regex' => '建ぺい率(最高)は半角数字で入力してください。',
            'highest_building_coverage_ratio.between' => '建ぺい率(最高)は:min〜;max以内の数値を入力してください。',
            'lowest_floor_area_ratio.required' => '容積率(最低)は入力必須です。',
            'lowest_floor_area_ratio.numeric' => '容積率(最低)は数字と小数点のみ入力可能です。',
            'lowest_floor_area_ratio.regex' => '容積率(最低)は半角数字で入力してください。',
            'lowest_floor_area_ratio.between' => '容積率(最低)は:min〜:max以内の数値を入力してください。',
            'highest_floor_area_ratio.required' => '容積率(最高)は入力必須です。',
            'highest_floor_area_ratio.numeric' => '容積率(最高)は数字と小数点のみ入力可能です。',
            'highest_floor_area_ratio.regex' => '容積率(最高)は半角数字で入力してください。',
            'highest_floor_area_ratio.between' => '容積率(最高)は:min〜:max以内の数値を入力してください。',
            'balcony.required' => 'バルコニーの有無は選択必須です。',
            'balcony.string' => 'バルコニーの有無は正しく選択してください。',
            'lowest_balcony_area.numeric' => 'バルコニー面積(最低)は数字と小数点のみ入力してください。',
            'lowest_balcony_area.regex' => 'バルコニー面積(最低)は半角数字で入力してください。',
            'lowest_balcony_area.required_if' => 'バルコニーがある場合にはバルコニー面積(最低)を入力してください。',
            'highest_balcony_area.numeric' => 'バルコニー面積(最高)は数字と小数点のみ入力してください。',
            'highest_balcony_area.regex' => 'バルコニー面積(最高)は半角数字で入力してください。',
            'highest_balcony_area.required_if' => 'バルコニーがある場合にはバルコニー面積(最高)を入力してください。',
            'lowest_number_of_rooms.required' => '部屋数(最低)は入力必須です。',
            'lowest_number_of_rooms.integer' => '部屋数(最低)は整数のみ入力可能です。',
            'lowest_number_of_rooms.regex' => '部屋数(最低)は半角数字で入力してください。',
            'highest_number_of_rooms.required' => '部屋数(最高)は入力必須です。',
            'highest_number_of_rooms.integer' => '部屋数(最高)は整数のみ入力可能です。',
            'highest_number_of_rooms.regex' => '部屋数(最高)は半角数字で入力してください。',
            'lowest_type_of_room.required' => '間取り(最低)は選択必須です。',
            'highest_type_of_room.required' => '間取り(最高)は選択必須です。',
            'year.required' => '完成時期（年）は入力必須です。',
            'year.integer' => '築年数（年）は整数のみ入力可能です。',
            'year.regex' => '築年数（年）は半角数字で入力してください。',
            'year.between' => 'その築年数（年）は存在しません。',
            'month.required' => '完成時期（月）は入力必須です。',
            'month.integer' => '築年数（月）は整数のみ入力可能です。',
            'month.between' => '築年数（月）が正しくありません。',
            'month.regex' => '築年数（月）は半角数字で入力してください。',
            'day.integer' => '築年数（日）は整数のみ入力可能です。',
            'day.regex' => '築年数（日）は半角数字で入力してください。。',
            'day.between' => '築年数（日）が正しくありません。',
            'building_construction.required' => '建物構造は入力必須です。',
            'parking.required' => '駐車場の有無は選択必須です。',
            'lowest_parking_lot.integer' => '最低駐車場数は整数のみ入力可能です。',
            'lowest_parking_lot.regex' => '最低駐車場数は半角数字で入力してください。',
            'lowest_parking_lot.required_if' => '駐車場がある場合には最低駐車場数を入力してください。',
            'highest_parking_lot.integer' => '最高駐車場数は整数のみ入力可能です。',
            'highest_parking_lot.regex' => '最高駐車場数は半角数字で入力してください。',
            'highest_parking_lot.required_if' => '駐車場がある場合には最高駐車場数を入力してください。',
            'urban_planning.required' => '都市計画は選択必須です。',
            'land_use_zones.required' => '用途地域は選択必須です。',
            'land_classification.required' => '地目は入力必須です。',
            'land_right.required' => '土地権利は選択必須です。',
            'status.required' => '現況は選択必須です。',
            'adjacent_road_direction.required' => '接道方向は選択必須です。',
            'adjacent_road.required' => '接道種類は選択必須です。',
            'lowest_adjacent_road_width.required' => '最小接道幅は入力必須です。',
            'highest_adjacent_road_width.required' => '最大接道幅は入力必須です。',
            'private_road.required' => '私道負担は選択必須です。',
            'setback.required' => 'セットバックは選択必須です。',
            'lowest_setback_length.required_if' => '最低セットバック幅を入力してください。',
            'lowest_setback_length.between' => '最小セットバック幅は:min〜:max以内の数値を入力してください。',
            'highest_setback_length.required_if' => '最大セットバック幅を入力してください。',
            'highest_setback_length.between' => '最大セットバック幅は:min〜:max以内の数値を入力してください。',
            'water_supply.required' => '上水道は選択必須です。',
            'sewage_line.required' => '下水道は選択必須です。',
            'gas.required' => 'ガスは選択必須です。',
            'building_certification_number.required' => '建築確認番号は入力必須です。',
            'station.required' => '最寄り駅は入力必須です。',
            'access_method.required' => '最寄り駅までのアクセス方法は選択必須です。',
            'distance_station.required' => '最寄り駅までの距離は入力必須です。',
            'elementary_school_district.integer' => '小学校までの距離（分）は整数のみ入力可能です。',
            'elementary_school_district.regex' => '小学校までの距離（分）は半角数字で入力してください。',
            'elementary_school_district.between' => '小学校までの距離は:min〜:max以内の数値を入力してください。',
            'junior_high_school_district.integer' => '中学校までの距離（分）は整数のみ入力可能です。',
            'junior_high_school_district.regex' => '中学校までの距離（分）は半角数字で入力してください。',
            'junior_high_school_district.between' => '中学校までの距離は:min〜:max以内の数値を入力してください。',
            'conditions_of_transactions.required' => '取引態様は選択必須です。',
            'delivery_date.required' => '入居時期は入力必須です。',
            'sales_comment.max' => 'セールスコメントは最大２００文字までです。',
            'property_introduction.max' => '物件紹介コメントは最大８００文字までです。',
            'terms_and_conditions.max' => '設備条件は最大２００文字までです。',
            'image1.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image1.max' => '画像は10MB未満まで登録可能です。',
            'image1.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category1.max' => '分類は正しく選択してください。',
            'comment1.max' => 'コメントは120文字以内に入力してください。',
            'image2.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image2.max' => '画像は10MB未満まで登録可能です。',
            'image2.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category2.max' => '分類は正しく選択してください。',
            'comment2.max' => 'コメントは120文字以内に入力してください。',
            'image3.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image3.max' => '画像は10MB未満まで登録可能です。',
            'image3.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category3.max' => '分類は正しく選択してください。',
            'comment3.max' => 'コメントは120文字以内に入力してください。',
            'image4.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image4.max' => '画像は10MB未満まで登録可能です。',
            'image4.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category4.max' => '分類は正しく選択してください。',
            'comment4.max' => 'コメントは120文字以内に入力してください。',
            'image5.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image5.max' => '画像は10MB未満まで登録可能です。',
            'image5.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category5.max' => '分類は正しく選択してください。',
            'comment5.max' => 'コメントは120文字以内に入力してください。',
            'imag6.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image6.max' => '画像は10MB未満まで登録可能です。',
            'image6.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category6.max' => '分類は正しく選択してください。',
            'comment6.max' => 'コメントは120文字以内に入力してください。',
            'image7.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image7.max' => '画像は10MB未満まで登録可能です。',
            'image7.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category7.max' => '分類は正しく選択してください。',
            'comment7.max' => 'コメントは120文字以内に入力してください。',
            'image8.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image8.max' => '画像は10MB未満まで登録可能です。',
            'image8.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category8.max' => '分類は正しく選択してください。',
            'comment8.max' => 'コメントは120文字以内に入力してください。',
            'image9.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image9.max' => '画像は10MB未満まで登録可能です。',
            'image9.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category9.max' => '分類は正しく選択してください。',
            'comment9.max' => 'コメントは120文字以内に入力してください。',
            'image10.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image10.max' => '画像は10MB未満まで登録可能です。',
            'image10.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category10.max' => '分類は正しく選択してください。',
            'comment10.max' => 'コメントは120文字以内に入力してください。',
            'image11.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image11.max' => '画像は10MB未満まで登録可能です。',
            'image11.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category11.max' => '分類は正しく選択してください。',
            'comment11.max' => 'コメントは120文字以内に入力してください。',
            'image12.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image12.max' => '画像は10MB未満まで登録可能です。',
            'image12.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category12.max' => '分類は正しく選択してください。',
            'comment12.max' => 'コメントは120文字以内に入力してください。',
            'image13.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image13.max' => '画像は10MB未満まで登録可能です。',
            'image13.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category13.max' => '分類は正しく選択してください。',
            'comment13.max' => 'コメントは120文字以内に入力してください。',
            'image14.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image14.max' => '画像は10MB未満まで登録可能です。',
            'image14.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category14.max' => '分類は正しく選択してください。',
            'comment14.max' => 'コメントは120文字以内に入力してください。',
            'image15.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image15.max' => '画像は10MB未満まで登録可能です。',
            'image15.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category15.max' => '分類は正しく選択してください。',
            'comment15.max' => 'コメントは120文字以内に入力してください。',
            'image16.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image16.max' => '画像は10MB未満まで登録可能です。',
            'image16.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category16.max' => '分類は正しく選択してください。',
            'comment16.max' => 'コメントは120文字以内に入力してください。',
            'image17.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image17.max' => '画像は10MB未満まで登録可能です。',
            'image17.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category17.max' => '分類は正しく選択してください。',
            'comment17.max' => 'コメントは120文字以内に入力してください。',
            'image18.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image18.max' => '画像は10MB未満まで登録可能です。',
            'image18.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category18.max' => '分類は正しく選択してください。',
            'comment18.max' => 'コメントは120文字以内に入力してください。',
            'image19.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image19.max' => '画像は10MB未満まで登録可能です。',
            'image19.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category19.max' => '分類は正しく選択してください。',
            'comment19.max' => 'コメントは120文字以内に入力してください。',
            'image20.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image20.max' => '画像は10MB未満まで登録可能です。',
            'image20.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category20.max' => '分類は正しく選択してください。',
            'comment20.max' => 'コメントは120文字以内に入力してください。',
            'image21.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image21.max' => '画像は10MB未満まで登録可能です。',
            'image21.dimensions' => '画像サイズは横480px、縦240px以内にしてください。',
            'category21.max' => '分類は正しく選択してください。',
            'comment21.max' => 'コメントは120文字以内に入力してください。',
        ];
    }
}
