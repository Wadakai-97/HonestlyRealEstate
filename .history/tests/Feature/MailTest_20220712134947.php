<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
        $phone = '080-';
        $body = 'これはテストメッセージです';

        $response = $this->post('/execute', ['name' => $name, 'email' => $email, 'body' => $body]);

        Mail::assertSent(MailSend::class, function ($mail) use ($email) {
            return $mail->hasTo($email);
        });

        Mail::assertSent(MailSend::class, 1);
    }
}
