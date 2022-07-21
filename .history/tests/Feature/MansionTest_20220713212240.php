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
        $result = $validator->passes();
        $this->assertEquals($expect, $result);
    }

    public function dataMansionSignUp()
    {
        return [
            '' => [
                ['name', 'email', 'password', 'password_confirmation'],
                ['testuser', 'test@example.com', 'password', 'password'],
                true
            ],
        ];
    }
}
