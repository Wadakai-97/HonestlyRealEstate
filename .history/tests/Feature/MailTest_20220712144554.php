<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Mail\ContactSendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        Mail::fake();
        Mail::assertNothingSent();

        $name = 'テスト太郎';
        $email = 'test@example.com';
        $phone = '080-9382-0531';
        $address = '神奈川兼横浜市中区本牧SUNの他に9-3';
        $type = '住宅購入';
        $contents = '実際に物件を見たい';
        $customer_request = 'これはテストです。よろしくお願いします。';

        $response = $this->post('/execute', ['name' => $name, 'email' => $email, 'phone' => $phone, 'address' => $address, 'type' => $type, 'contents' => $contents, 'customer_request' => $customer_request]);

        Mail::assertSent(ContactSendMail::class, function ($mail) use ($email) {
            return $mail->hasTo($email);
        });

        Mail::assertSent(ContactSendMail::class, 1);
    }
}
