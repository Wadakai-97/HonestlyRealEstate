<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MansionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMansion(array $keys, array $values, bool $expect)
    {
        //入力項目の配列（$keys）と値の配列($values)から、連想配列を生成する
        $dataList = array_combine($keys, $values);

        $request = new RegisterRequest();
        //フォームリクエストで定義したルールを取得
        $rules = $request->rules();
        //Validatorファサードでバリデーターのインスタンスを取得、その際に入力情報とバリデーションルールを引数で渡す
        $validator = Validator::make($dataList, $rules);
        //入力情報がバリデーショルールを満たしている場合はtrue、満たしていな場合はfalseが返る
        $result = $validator->passes();
        //期待値($expect)と結果($result)を比較
        $this->assertEquals($expect, $result);
    }

    public function dataUserRegistration()
    {
        return [
            'OK' => [
                ['name', 'email', 'password', 'password_confirmation'],
                ['testuser', 'test@example.com', 'password', 'password'],
                true
            ],
        ];
    }
}
