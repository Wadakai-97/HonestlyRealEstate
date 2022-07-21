<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMarkdown extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from('example@gmail.com')
        ->subject('【正直不動産】ホームページよりお問い合わせありがとうございました。')
        ->text('user.contact.mail')
        ->with([
            'email' => $this->email,
            'name' => $this->name,
            'phone'  => $this->phone,
            'address' => $this->address,
            'type' => $this->type,
            'contents' => $this->contents,
            'customer_request' => $this->customer_request,
        ]);
        ->markdown('emails.mail-markdown');
    }
}
