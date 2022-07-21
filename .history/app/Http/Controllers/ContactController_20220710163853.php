<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactSendmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function contact(ContactRequest $request) {
        $inputs = $request->all();
        $contents = $request->contents;
        $contents_arrangement = implode(',', $contents);
        $inputs['contents'] = $contents_arrangement;
        return view('user.contact.confirm', compact('inputs'));
    }

    public function send(ContactRequest $request) {
        $action = $request->input('action');
        $inputs = $request->except('action');

        if($action !== 'submit') {
            return redirect()->route('buy')->withInput($inputs);
        } else {
            \Mail::to($inputs['email'])->send(new ContactSendmail($inputs));
            $request->session()->regenerateToken();
            $name = $request->name;

            $inputs = new Contact;
            $inputs->fill([
                'name' => $request->name,
                'email' => Hash::make($request->email),
                'phone' => Hash::make($request->phone),
                'address' => Hash::make($request->address),
                'type' => $request->type,
                'contents' => $request->contents,
                'customer_request' => $request->customer_request,
            ]);
            $inputs->save();
        }
        return view('user.contact.complete', compact('name'));
    }

    public function showForm() {

    }
    public function signUp() {

    }
    public function list() {

    }
    public function delete() {

    }
    public function showDetail() {

    }
    public function
}
