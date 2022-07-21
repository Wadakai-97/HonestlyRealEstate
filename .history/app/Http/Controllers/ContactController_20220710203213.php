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
        return view('admin.customer.sign_up');
    }
    public function signUp(Request $request) {
        $post = new Contact;
        $post->signUp($request);
        return redirect()->route('admin.customer.signUp')->with('message', '登録が完了しました。');
    }
    public function list() {
        return view('admin.customer.list');
    }
    public function delete($id) {
        DB::transaction(function() use($id) {
            $target = Contact::find($id);
            $target->delete();
        });
    }
    public function showDetail($id) {
        $customer = Contact::find($id);
        return view('admin.customer.detail', compact('customer'));
    }
    public function edit($id) {
        $customer = Contact::find($id);
        return view('admin.customer.edit', compact('customer'));
    }
    public function update($id, Request $request) {
        $customer = Contact::find($id);
        $Contact->updateCustomer($id, $request);
        $request->session()->regenerateToken();
        return redirect()->route('admin.customer.edit', ['id' => $customer->id])->with('message', '変更内容を登録しました。');
    }
}
