<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Http\Requests\MansionSignUpRequest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MansionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMansionSignUp(array $keys, array $values, bool $expect)
    {
        $requestList = array_combine($keys, $values);

        $request = new MansionSignUpRequest();
        $rules = $request->rules();
        $validator = Validator::make($requestList, $rules);
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
