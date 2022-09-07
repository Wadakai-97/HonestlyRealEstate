<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageSignUpRequest extends FormRequest
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
            'image' => ['nullable', 'mimes:jpg,jpeg', 'dimensions:min_width=100,max_width=400,min_height=100,max_height=400', 'max:1024'],
            'category' => ['nullable', 'max:20', ],
            'comment' => ['nullable', 'max:120', ],
        ];
    }

    public function messages() {
        return [
            'image1.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image1.max' => '画像は10MB未満まで登録可能です。',
            'image1.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category1.max' => '分類は正しく選択してください。',
            'comment1.max' => 'コメントは120文字以内に入力してください。',
            'image2.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image2.max' => '画像は10MB未満まで登録可能です。',
            'image2.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category2.max' => '分類は正しく選択してください。',
            'comment2.max' => 'コメントは120文字以内に入力してください。',
            'image3.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image3.max' => '画像は10MB未満まで登録可能です。',
            'image3.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category3.max' => '分類は正しく選択してください。',
            'comment3.max' => 'コメントは120文字以内に入力してください。',
            'image4.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image4.max' => '画像は10MB未満まで登録可能です。',
            'image4.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category4.max' => '分類は正しく選択してください。',
            'comment4.max' => 'コメントは120文字以内に入力してください。',
            'image5.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image5.max' => '画像は10MB未満まで登録可能です。',
            'image5.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category5.max' => '分類は正しく選択してください。',
            'comment5.max' => 'コメントは120文字以内に入力してください。',
            'imag6.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image6.max' => '画像は10MB未満まで登録可能です。',
            'image6.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category6.max' => '分類は正しく選択してください。',
            'comment6.max' => 'コメントは120文字以内に入力してください。',
            'image7.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image7.max' => '画像は10MB未満まで登録可能です。',
            'image7.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category7.max' => '分類は正しく選択してください。',
            'comment7.max' => 'コメントは120文字以内に入力してください。',
            'image8.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image8.max' => '画像は10MB未満まで登録可能です。',
            'image8.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category8.max' => '分類は正しく選択してください。',
            'comment8.max' => 'コメントは120文字以内に入力してください。',
            'image9.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image9.max' => '画像は10MB未満まで登録可能です。',
            'image9.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category9.max' => '分類は正しく選択してください。',
            'comment9.max' => 'コメントは120文字以内に入力してください。',
            'image10.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image10.max' => '画像は10MB未満まで登録可能です。',
            'image10.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category10.max' => '分類は正しく選択してください。',
            'comment10.max' => 'コメントは120文字以内に入力してください。',
            'image11.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image11.max' => '画像は10MB未満まで登録可能です。',
            'image11.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category11.max' => '分類は正しく選択してください。',
            'comment11.max' => 'コメントは120文字以内に入力してください。',
            'image12.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image12.max' => '画像は10MB未満まで登録可能です。',
            'image12.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category12.max' => '分類は正しく選択してください。',
            'comment12.max' => 'コメントは120文字以内に入力してください。',
            'image13.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image13.max' => '画像は10MB未満まで登録可能です。',
            'image13.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category13.max' => '分類は正しく選択してください。',
            'comment13.max' => 'コメントは120文字以内に入力してください。',
            'image14.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image14.max' => '画像は10MB未満まで登録可能です。',
            'image14.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category14.max' => '分類は正しく選択してください。',
            'comment14.max' => 'コメントは120文字以内に入力してください。',
            'image15.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image15.max' => '画像は10MB未満まで登録可能です。',
            'image15.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category15.max' => '分類は正しく選択してください。',
            'comment15.max' => 'コメントは120文字以内に入力してください。',
            'image16.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image16.max' => '画像は10MB未満まで登録可能です。',
            'image16.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category16.max' => '分類は正しく選択してください。',
            'comment16.max' => 'コメントは120文字以内に入力してください。',
            'image17.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image17.max' => '画像は10MB未満まで登録可能です。',
            'image17.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category17.max' => '分類は正しく選択してください。',
            'comment17.max' => 'コメントは120文字以内に入力してください。',
            'image18.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image18.max' => '画像は10MB未満まで登録可能です。',
            'image18.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category18.max' => '分類は正しく選択してください。',
            'comment18.max' => 'コメントは120文字以内に入力してください。',
            'image19.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image19.max' => '画像は10MB未満まで登録可能です。',
            'image19.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category19.max' => '分類は正しく選択してください。',
            'comment19.max' => 'コメントは120文字以内に入力してください。',
            'image20.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image20.max' => '画像は10MB未満まで登録可能です。',
            'image20.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category20.max' => '分類は正しく選択してください。',
            'comment20.max' => 'コメントは120文字以内に入力してください。',
            'image21.mimes' => '登録できるファイル形式はjpg/jpegのみです。',
            'image21.max' => '画像は10MB未満まで登録可能です。',
            'image21.dimensions' => '画像サイズは横480px、縦240px以内にしてください、。',
            'category21.max' => '分類は正しく選択してください。',
            'comment21.max' => 'コメントは120文字以内に入力してください。',
        ];
    }
}
