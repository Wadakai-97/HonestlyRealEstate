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
            'pref' => 'required',
            'municipalities' => 'required',
            'block' => 'nullable',
            'construction_conditions' => 'required',
            'land_area' => 'required',
            'floor_area_ratio' => 'required',
            'building_coverage_ratio' => 'required',
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
            'setback_length'
            'water_supply' => 'required',
            'sewage_line' => 'required',
            'gas' => 'required',
            'status' => 'required',
            'delivery_date' => 'required',
            'conditions_of_transactions' => 'required',
            'station' => 'required',
            'walking_distance_station' => 'required',
            'elementary_school_name' => 'nullable',
            'elementary_school_district' => 'nullable',
            'junior_high_school_name' => 'nullable',
            'junior_high_school_district' => 'nullable',
            'sales_comment' => ['nullable', 'max:200'],
            'property_introduction' => ['nullable', 'max:800'],
            'terms_and_conditions' => ['nullable', 'max:200'],
            'image1.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image1.max:1024' => '画像は10MB未満まで登録可能です。',
            'image1.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category1.max:20' => '分類は正しく選択してください。',
            'comment1.max:120' => 'コメントは120文字以内に入力してください。',
            'image2.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image2.max:1024' => '画像は10MB未満まで登録可能です。',
            'image2.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category2.max:20' => '分類は正しく選択してください。',
            'comment2.max:120' => 'コメントは120文字以内に入力してください。',
            'image3.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image3.max:1024' => '画像は10MB未満まで登録可能です。',
            'image3.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category3.max:20' => '分類は正しく選択してください。',
            'comment3.max:120' => 'コメントは120文字以内に入力してください。',
            'image4.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image4.max:1024' => '画像は10MB未満まで登録可能です。',
            'image4.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category4.max:20' => '分類は正しく選択してください。',
            'comment4.max:120' => 'コメントは120文字以内に入力してください。',
            'image5.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image5.max:1024' => '画像は10MB未満まで登録可能です。',
            'image5.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category5.max:20' => '分類は正しく選択してください。',
            'comment5.max:120' => 'コメントは120文字以内に入力してください。',
            'imag6.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image6.max:1024' => '画像は10MB未満まで登録可能です。',
            'image6.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category6.max:20' => '分類は正しく選択してください。',
            'comment6.max:120' => 'コメントは120文字以内に入力してください。',
            'image7.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image7.max:1024' => '画像は10MB未満まで登録可能です。',
            'image7.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category7.max:20' => '分類は正しく選択してください。',
            'comment7.max:120' => 'コメントは120文字以内に入力してください。',
            'image8.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image8.max:1024' => '画像は10MB未満まで登録可能です。',
            'image8.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category8.max:20' => '分類は正しく選択してください。',
            'comment8.max:120' => 'コメントは120文字以内に入力してください。',
            'image9.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image9.max:1024' => '画像は10MB未満まで登録可能です。',
            'image9.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category9.max:20' => '分類は正しく選択してください。',
            'comment9.max:120' => 'コメントは120文字以内に入力してください。',
            'image10.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image10.max:1024' => '画像は10MB未満まで登録可能です。',
            'image10.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category10.max:20' => '分類は正しく選択してください。',
            'comment10.max:120' => 'コメントは120文字以内に入力してください。',
            'image11.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image11.max:1024' => '画像は10MB未満まで登録可能です。',
            'image11.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category11.max:20' => '分類は正しく選択してください。',
            'comment11.max:120' => 'コメントは120文字以内に入力してください。',
            'image12.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image12.max:1024' => '画像は10MB未満まで登録可能です。',
            'image12.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category12.max:20' => '分類は正しく選択してください。',
            'comment12.max:120' => 'コメントは120文字以内に入力してください。',
            'image13.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image13.max:1024' => '画像は10MB未満まで登録可能です。',
            'image13.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category13.max:20' => '分類は正しく選択してください。',
            'comment13.max:120' => 'コメントは120文字以内に入力してください。',
            'image14.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image14.max:1024' => '画像は10MB未満まで登録可能です。',
            'image14.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category14.max:20' => '分類は正しく選択してください。',
            'comment14.max:120' => 'コメントは120文字以内に入力してください。',
            'image15.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image15.max:1024' => '画像は10MB未満まで登録可能です。',
            'image15.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category15.max:20' => '分類は正しく選択してください。',
            'comment15.max:120' => 'コメントは120文字以内に入力してください。',
            'image16.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image16.max:1024' => '画像は10MB未満まで登録可能です。',
            'image16.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category16.max:20' => '分類は正しく選択してください。',
            'comment16.max:120' => 'コメントは120文字以内に入力してください。',
            'image17.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image17.max:1024' => '画像は10MB未満まで登録可能です。',
            'image17.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category17.max:20' => '分類は正しく選択してください。',
            'comment17.max:120' => 'コメントは120文字以内に入力してください。',
            'image18.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image18.max:1024' => '画像は10MB未満まで登録可能です。',
            'image18.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category18.max:20' => '分類は正しく選択してください。',
            'comment18.max:120' => 'コメントは120文字以内に入力してください。',
            'image19.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image19.max:1024' => '画像は10MB未満まで登録可能です。',
            'image19.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category19.max:20' => '分類は正しく選択してください。',
            'comment19.max:120' => 'コメントは120文字以内に入力してください。',
            'image20.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image20.max:1024' => '画像は10MB未満まで登録可能です。',
            'image20.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category20.max:20' => '分類は正しく選択してください。',
            'comment20.max:120' => 'コメントは120文字以内に入力してください。',
            'image21.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image21.max:1024' => '画像は10MB未満まで登録可能です。',
            'image21.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category21.max:20' => '分類は正しく選択してください。',
            'comment21.max:120' => 'コメントは120文字以内に入力してください。',
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
            'conditions_of_transactions.required' => '取引態様は選択必須です。',
            'sales_comment.max:200' => 'セールスコメントは最大２００文字までです。',
            'property_introduction.max:800' => '物件紹介コメントは最大８００文字までです。',
            'terms_and_conditions.max:200' => '設備条件は最大２００文字までです。',
            'image1.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image1.max:1024' => '画像は10MB未満まで登録可能です。',
            'image1.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category1.max:20' => '分類は正しく選択してください。',
            'comment1.max:120' => 'コメントは120文字以内に入力してください。',
            'image2.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image2.max:1024' => '画像は10MB未満まで登録可能です。',
            'image2.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category2.max:20' => '分類は正しく選択してください。',
            'comment2.max:120' => 'コメントは120文字以内に入力してください。',
            'image3.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image3.max:1024' => '画像は10MB未満まで登録可能です。',
            'image3.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category3.max:20' => '分類は正しく選択してください。',
            'comment3.max:120' => 'コメントは120文字以内に入力してください。',
            'image4.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image4.max:1024' => '画像は10MB未満まで登録可能です。',
            'image4.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category4.max:20' => '分類は正しく選択してください。',
            'comment4.max:120' => 'コメントは120文字以内に入力してください。',
            'image5.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image5.max:1024' => '画像は10MB未満まで登録可能です。',
            'image5.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category5.max:20' => '分類は正しく選択してください。',
            'comment5.max:120' => 'コメントは120文字以内に入力してください。',
            'imag6.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image6.max:1024' => '画像は10MB未満まで登録可能です。',
            'image6.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category6.max:20' => '分類は正しく選択してください。',
            'comment6.max:120' => 'コメントは120文字以内に入力してください。',
            'image7.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image7.max:1024' => '画像は10MB未満まで登録可能です。',
            'image7.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category7.max:20' => '分類は正しく選択してください。',
            'comment7.max:120' => 'コメントは120文字以内に入力してください。',
            'image8.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image8.max:1024' => '画像は10MB未満まで登録可能です。',
            'image8.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category8.max:20' => '分類は正しく選択してください。',
            'comment8.max:120' => 'コメントは120文字以内に入力してください。',
            'image9.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image9.max:1024' => '画像は10MB未満まで登録可能です。',
            'image9.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category9.max:20' => '分類は正しく選択してください。',
            'comment9.max:120' => 'コメントは120文字以内に入力してください。',
            'image10.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image10.max:1024' => '画像は10MB未満まで登録可能です。',
            'image10.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category10.max:20' => '分類は正しく選択してください。',
            'comment10.max:120' => 'コメントは120文字以内に入力してください。',
            'image11.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image11.max:1024' => '画像は10MB未満まで登録可能です。',
            'image11.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category11.max:20' => '分類は正しく選択してください。',
            'comment11.max:120' => 'コメントは120文字以内に入力してください。',
            'image12.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image12.max:1024' => '画像は10MB未満まで登録可能です。',
            'image12.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category12.max:20' => '分類は正しく選択してください。',
            'comment12.max:120' => 'コメントは120文字以内に入力してください。',
            'image13.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image13.max:1024' => '画像は10MB未満まで登録可能です。',
            'image13.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category13.max:20' => '分類は正しく選択してください。',
            'comment13.max:120' => 'コメントは120文字以内に入力してください。',
            'image14.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image14.max:1024' => '画像は10MB未満まで登録可能です。',
            'image14.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category14.max:20' => '分類は正しく選択してください。',
            'comment14.max:120' => 'コメントは120文字以内に入力してください。',
            'image15.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image15.max:1024' => '画像は10MB未満まで登録可能です。',
            'image15.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category15.max:20' => '分類は正しく選択してください。',
            'comment15.max:120' => 'コメントは120文字以内に入力してください。',
            'image16.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image16.max:1024' => '画像は10MB未満まで登録可能です。',
            'image16.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category16.max:20' => '分類は正しく選択してください。',
            'comment16.max:120' => 'コメントは120文字以内に入力してください。',
            'image17.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image17.max:1024' => '画像は10MB未満まで登録可能です。',
            'image17.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category17.max:20' => '分類は正しく選択してください。',
            'comment17.max:120' => 'コメントは120文字以内に入力してください。',
            'image18.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image18.max:1024' => '画像は10MB未満まで登録可能です。',
            'image18.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category18.max:20' => '分類は正しく選択してください。',
            'comment18.max:120' => 'コメントは120文字以内に入力してください。',
            'image19.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image19.max:1024' => '画像は10MB未満まで登録可能です。',
            'image19.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category19.max:20' => '分類は正しく選択してください。',
            'comment19.max:120' => 'コメントは120文字以内に入力してください。',
            'image20.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image20.max:1024' => '画像は10MB未満まで登録可能です。',
            'image20.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category20.max:20' => '分類は正しく選択してください。',
            'comment20.max:120' => 'コメントは120文字以内に入力してください。',
            'image21.mimes:jpg,jpeg' => '登録できるファイル形式はjpg/jpegのみです。',
            'image21.max:1024' => '画像は10MB未満まで登録可能です。',
            'image21.dimensions:width=480,height=240' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category21.max:20' => '分類は正しく選択してください。',
            'comment21.max:120' => 'コメントは120文字以内に入力してください。',
        ];
    }
}
