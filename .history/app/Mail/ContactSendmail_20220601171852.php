<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSendmail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $mail;
    private $phone;
    private $contents;
    private $content_detail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->name = $inputs['name'];
        $this->mail = $inputs['mail'];
        $this->phone  = $inputs['phone'];
        $this->contents = $inputs['contents'];
        $this->content_detail = $inputs['content_detail'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('wadakai1111@gmail.com')
            ->subject('自動送信メール')
            ->view('contact.mail')
            ->with([
                'name' => $this->name,
                'mail' => $this->mail,
                'phone'  => $this->phne,
                'contents' => $this->contents,
                'content_detail' => $this->content_detail,
            ]);
    }
}
