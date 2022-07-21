<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // public function confirm(ContactRequest $request) {
    //     $name = $request->input('name');
    //     $mail = $request->input('mail');
    //     $phone = $request->input('phone');
    //     $content = $request->$_POST['content'];
    //     $content_detail = $request->textarea('content_detail');
    //     return view('contact.confirm', compact('name', 'mail', 'phone', 'content', 'content_detail'));
    // }

    // public function send(ContactRequest $request) {
    //     $action = $request->input('action');
    //     $inputs = $request->except('action');

    //     if($action !== 'submit'){
    //         return redirect()
    //             ->route('contact.index')
    //             ->withInput($inputs);

    //     } else {
    //         \Mail::to($inputs['mail'])->send(new ContactSendmail($inputs));
    //         $request->session()->regenerateToken();
    //         return view('contact.send');

    //     }
    // }
}
