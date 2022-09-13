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
            'apartment_name' => ['required', 'max:50'],
            'room' => ['required', 'integer', 'regex:/^[!-~]+$/', 'between:0,9999'],
            'price' => ['required', 'numeric', 'regex:/^[!-~]+$/', 'between:0.1,99999.9'],
            'tax' => 'required',
            'pref' => ['required', 'max:4'],
            'municipalities' => ['required', 'max:70'],
            'block' => ['nullable', 'max:30'],
            'land_area' => ['nullable', 'numeric', 'regex:/^[!-~]+$/', 'between:0.01,99999.99'],
            'building_area' => ['nullable', 'numeric', 'regex:/^[!-~]+$/', 'between:0.01,99999.99'],
            'number_of_rooms' => ['required', 'integer', 'regex:/^[!-~]+$/'],
            'type_of_room' => 'required',
            'measuring_method' => 'required',
            'occupation_area' => ['required', 'numeric', 'regex:/^[!-~]+$/', 'between:0.01,999.99'],
            'balcony' => 'required',
            'balcony_area' => ['nullable', 'numeric', 'regex:/^[!-~]+$/', 'between:0.01,999.99'],
            'parking_lot' => 'nullable',
            'floor' => 'required',
            'story' => 'required',
            'year' => ['required', 'integer', 'between:1900,2100', 'regex:/^[!-~]+$/'],
            'month' => ['required', 'integer', 'between:1,12', 'regex:/^[!-~]+$/'],
            'day' => ['nullable', 'integer', 'between:1,31', 'regex:/^[!-~]+$/'],
            'direction' => 'required',
            'building_construction' => 'required',
            'total_number_of_households' => ['required', 'integer', 'regex:/^[!-~]+$/', 'between:0,9999'],
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
            'access_method' => 'required',
            'distance_station' => ['required', 'integer', 'between:1,60'],
            'elementary_school_name' => 'nullable',
            'elementary_school_district' => ['nullable', 'integer', 'regex:/^[!-~]+$/', 'between:1,60'],
            'junior_high_school_name' => 'nullable',
            'junior_high_school_district' => ['nullable', 'integer', 'regex:/^[!-~]+$/', 'between:1,60'],
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
            'apartment_name.required' => '建物名は入力必須です。',
            'apartment_name.max' => '建物名は50文字以内に入力してください。',
            'room.required' => '号室は入力必須です。',
            'room.integer' => '号室は整数のみ入力可能です。',
            'room.regex' => '号室は半角数字で入力してください。',
            'room.between' => '号室は:min〜:max以内の数値を入力してください。',
            'price.required' => '販売価格は入力必須です。',
            'price.numeric' => '販売価格は数字と小数点のみ入力可能です。',
            'price.regex' => '販売価格は半角数字で入力してください。',
            'price.between' => '販売価格は:min〜:max以内の数値を入力してください。',
            'tax.required' => '税込表記は選択必須です。',
            'pref.required' => '都道府県は入力必須です。',
            'pref.max' => '都道府県を正しく入力してください。',
            'municipalities.required' => '市区町村は入力必須です。',
            'municipalities.required' => '市区町村を正しく入力してください。',
            'block.max' => '丁目番地を正しく入力してください。',
            'land_area.numeric' => '土地面積は数字と小数点のみ入力可能です。',
            'land_area.regex' => '土地面積は半角数字で入力してください。',
            'land_area.between' => '土地面積は:min〜:max以内の数値を入力してください。',
            'building_area.numeric' => '建物面積は数字と小数点のみ入力可能です。',
            'building_area.regex' => '建物面積は半角数字で入力してください。',
            'building_area.between' => '建物面積は:min〜:max以内の数値を入力してください。',
            'measuring_method.required' => '測定方法は入力必須です。',
            'occupation_area.required' => '専有面積は入力必須です。',
            'occupation_area.numeric' => '専有面積は数字と小数点のみ入力してください。',
            'occupation_area.between' => '専有面積は:min〜:max以内の数値を入力してください。',
            'number_of_rooms.required' => '部屋数は入力必須です。',
            'number_of_rooms.integer' => '部屋数は整数のみ入力可能です。',
            'number_of_rooms.regex' => '部屋数は半角数字で入力してください。',
            'type_of_room.required' => '間取りは入力必須です。',
            'occupation_area.regex' => '専有面積は半角数字で入力してください。',
            'balcony.required' => 'バルコニーの有無は選択必須です。',
            'balcony_area.numeric' => 'バルコニー面積は数字と小数点のみ入力してください。',
            'balcony_area.regex' => 'バルコニー面積は半角数字で入力してください。',
            'balcony_area.between' => 'バルコニー面積は:min〜:max以内の数値を入力してください。',
            'floor.required' => '所在階は入力必須です。',
            'story.required' => '階建は入力必須です。',
            'year.required' => '築年数（年）は入力必須です。',
            'year.integer' => '築年数（年）は整数のみ入力可能です。',
            'year.regex' => '築年数（年）は半角数字で入力してください。',
            'year.between' => 'その築年数（年）は存在しません。',
            'month.required' => '築年数（月）は入力必須です。',
            'month.integer' => '築年数（月）は整数のみ入力可能です。',
            'month.regex' => '築年数（月）は半角数字で入力してください。',
            'month.between' => '築年数（月）が正しくありません。',
            'day.integer' => '築年数（日）は整数のみ入力可能です。',
            'day.regex' => '築年数（日）は半角数字で入力してください。。',
            'day.between' => '築年数（日）が正しくありません。',
            'direction.required' => '方角は選択必須です。',
            'building_construction.required' => '建物構造は入力必須です。',
            'total_number_of_households.required' => '総戸数は入力必須です。',
            'total_number_of_households.integer' => '総戸数は整数のみ入力可能です。',
            'total_number_of_households.regex' => '総戸数は半角数字で入力してください。',
            'total_number_of_households.between' => '総戸数は:min〜:max以内の数値を入力してください。',
            'land_right.required' => '土地権利は選択必須です。',
            'land_use_zones.required' => '用途地域は選択必須です。',
            'management_company.required' => '管理会社は入力必須です。',
            'management_system.required' => '管理形態は選択必須です。',
            'maintenance_fee.required' => '管理費は入力必須です。',
            'maintenance_fee.integer' => '管理費は整数のみ入力可能です。。',
            'maintenance_fee.regex' => '管理費は半角数字で入力してください。',
            'reserve_fund_for_repair.required' => '修繕積立金は入力必須です。',
            'reserve_fund_for_repair.integer' => '修繕積立金は整数のみ入力可能です。',
            'reserve_fund_for_repair.regex' => '修繕積立金は半角数字で入力してください。',
            'station.required' => '最寄り駅は入力必須です。',
            'access_method.required' => '最寄り駅までのアクセス方法は選択必須です。',
            'distance_station.required' => '最寄り駅までの距離は入力必須です。',
            'distance_station.integer' => '最寄り駅までの距離は整数のみ入力可能です。',
            'distance_station.between' => '最寄り駅までの距離は:min〜:max以内の数値のみ入力可能です。',
            'status.required' => '現況は選択必須です。',
            'delivery_date.required' => '入居時期は入力必須です。',
            'elementary_school_district.integer' => '小学校までの距離（分）は整数のみ入力可能です。',
            'elementary_school_district.regex' => '小学校までの距離（分）は半角数字で入力してください。',
            'elementary_school_district.between' => '小学校までの距離は:min〜:max以内の数値を入力してください。',
            'junior_high_school_district.integer' => '中学校までの距離（分）は整数のみ入力可能です。',
            'junior_high_school_district.regex' => '中学校までの距離（分）は半角数字で入力してください。',
            'junior_high_school_district.between' => '中学校までの距離は:min〜:max以内の数値を入力してください。',
            'conditions_of_transactions.required' => '取引態様は選択必須です。',
            'sales_comment.max' => 'セールスコメントは最大２００文字まで入力可能です。',
            'property_introduction.max' => '物件紹介コメントは最大８００文字まで入力可能です。',
            'terms_and_conditions.max' => '設備条件は最大２００文字まで入力可能です。',
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
