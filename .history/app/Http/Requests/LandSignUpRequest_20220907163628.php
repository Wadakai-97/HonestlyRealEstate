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
            'name' => ['required', 'max:32'],
            'price' => ['required', 'integer', 'regex:/^[!-~]+$/'],
            'tax' => 'required',
            'pref' => ['required', 'max:4'],
            'municipalities' => ['required', 'max:70'],
            'block' => ['nullable', 'max:30'],
            'construction_conditions' => 'required',
            'land_area' => ['required', 'numeric'],
            'floor_area_ratio' => ['required', 'integer', 'digits_between:1.4'],
            'building_coverage_ratio' => ['required', 'integer', 'digits_between:1.4'],
            'land_right' => 'required',
            'other_fee' => 'nullable',
            'urban_planning' => 'required',
            'land_use_zones' => 'required',
            'restrictions_by_law' => 'nullable',
            'national_land_utilization_law' => 'required',
            'land_classification' => 'required',
            'terrain' => 'required',
            'adjacent_road' => 'required',
            'adjacent_road_width' => ['required', 'numeric'],
            'private_road' => 'required',
            'setback' => 'required',
            'setback_length' => ['nullable', 'required_if:setback,あり', 'numeric', 'digits_between:1,3'],
            'water_supply' => 'required',
            'sewage_line' => 'required',
            'gas' => 'required',
            'status' => 'required',
            'delivery_date' => 'required',
            'conditions_of_transactions' => 'required',
            'station' => 'required',
            'access_method' => 'required',
            'distance_station' => 'required',
            'elementary_school_name' => 'nullable',
            'elementary_school_district' => ['nullable', 'numeric', 'digits_between:1.3'],
            'junior_high_school_name' => 'nullable',
            'junior_high_school_district' => ['nullable', 'numeric', 'digits_between:1.3'],
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
            'name.required' => '土地名は入力必須です。',
            'name.max' => '土地名は32文字以内で入力してください。',
            'price.required' => '販売価格は入力必須です。',
            'price.integer' => '販売価格は整数のみ入力可能です。',
            'price.regex' => '販売価格は半角数字で入力してください。',
            'tax.required' => '税込表記は選択必須です。',
            'pref.required' => '都道府県は入力必須です。',
            'pref.max' => '都道府県を正しく入力してください。',
            'municipalities.required' => '市区町村は入力必須です。',
            'municipalities.required' => '市区町村を正しく入力してください。',
            'block.max' => '丁目番地を正しく入力してください。',
            'construction_conditions.required' => '建築条件は選択必須です。',
            'land_area.required' => '土地面積は入力必須です。',
            'land_area.numeric' => '土地面積には数値を入力してください。',
            'floor_area_ratio.required' => '容積率は入力必須です。',
            'floor_area_ratio.integer' => '容積率には整数のみ入力可能です。',
            'floor_area_ratio.digits_between' => '容積率は４桁まで入力可能です。',
            'building_coverage_ratio.required' => '建ぺい率は入力必須です。',
            'building_coverage_ratio.integer' => '建ぺい率には整数のみ入力可能です。',
            'building_coverage_ratio.digits_between:1.4' => '建ぺい率は４桁まで入力可能です。',
            'station.required' => '最寄り駅は入力必須です。',
            'access_method.required' => '最寄り駅までのアクセス方法は選択必須です。',
            'distance_station.required' => '最寄り駅までの距離は入力必須です。',
            'land_right.required' => '土地権利は選択必須です。',
            'urban_planning.required' => '都市計画は選択必須です。',
            'land_use_zones.required' => '用途地域は選択必須です。',
            'national_land_utilization_law.required' => '国土法届出は選択必須です。',
            'land_classification.required' => '地目は入力必須です。',
            'terrain.required' => '地勢は入力必須です。',
            'adjacent_road.required' => '接道種類は選択必須です。',
            'adjacent_road_width.required' => '接道幅は入力必須です。',
            'adjacent_road_width.numeric' => '接道幅には数値を入力してください。',
            'private_road.required' => '私道負担は選択必須です。',
            'setback.required' => 'セットバックは入力必須です。',
            'setback_length.required_if' => 'セットバックがある場合にはセットバック幅を入力してください。',
            'setback_length.numeric' => 'セットバック幅には数値を入力してください。',
            'setback_length.digits_between' => 'セットバック幅の桁数は３桁以内にしてください。',
            'water_supply.required' => '上水道は選択必須です。',
            'sewage_line.required' => '下水道は選択必須です。',
            'gas.required' => 'ガスは選択必須です。',
            'status.required' => '現況は選択必須です。',
            'delivery_date.required' => '引渡し日は入力必須です。',
            'conditions_of_transactions.required' => '取引態様は選択必須です。',
            'elementary_school_district.numeric' => '',
            'elementary_school_district.digits_between' => '',
            'junior_high_school_district.numeric' => '',
            'junior_high_school_district.digits_between' => '',
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
