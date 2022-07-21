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

        // メールが送られていないことを確認
        Mail::assertNothingSent();

        $name = 'テスト太郎';
        $email = 'test@example.com';
        $body = 'これはテストメッセージです';

        // メール送信処理を実施
        $response = $this->post('/execute', ['name' => $name, 'email' => $email, 'body' => $body]);

        Mail::assertSent(MailSend::class, function ($mail) use ($email) {
            return $mail->hasTo($email);
        });

        Mail::assertSent(MailSend::class, 1);

        }
    }
}
