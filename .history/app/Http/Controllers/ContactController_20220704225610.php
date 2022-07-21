<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactSendmail;

class ContactController extends Controller
{
    public function confirm(Request $request) {
        $inputs = $request->all();
        return view('contact.confirm', compact('inputs'));
    }

    public function send(Request $request) {
        $action = $request->input('action');
        $inputs = $request->except('action');

        if($action !== 'submit'){
            return redirect()
                ->route('contact.index')
                ->withInput($inputs);
        } else {
            \Mail::to($inputs['email'])->send(new ContactSendmail($inputs));
            $request->session()->regenerateToken();
            return view('contact.thanks');
        }
    }
}
