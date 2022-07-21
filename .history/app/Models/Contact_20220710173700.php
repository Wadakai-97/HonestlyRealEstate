<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable =  [
        'name',
        'email',
        'phone',
        'address',
        'type',
        'contents',
        'message',
    ];

    public function signUp($request) {
        DB::transaction(function() use($request) {
            $post = new Contact;
            $post->fill([

            ]);
            $post->save();
        });
        return;
    }

    public function updateCustomer(Request $request) {
        DB::transaction(function() use($request) {
            DB::transaction(function() use($id, $request) {
                $customer = customer::find($id);
                $customer->fill([
    ]);
            $customer->save();
        });
        return;
    }
}
