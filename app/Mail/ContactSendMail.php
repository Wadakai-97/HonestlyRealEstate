<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactSendMail extends Mailable
{
    use Queueable, SerializesModels;

    private $email;
    private $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $inputs )
    {
        $this->email = $inputs['email'];
        $this->name = $inputs['name'];
        $this->phone  = $inputs['phone'];
        $this->address  = $inputs['address'];
        $this->type  = $inputs['type'];
        $this->contents  = $inputs['contents'];
        $this->customer_request = $inputs['customer_request'];
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
    }
}
