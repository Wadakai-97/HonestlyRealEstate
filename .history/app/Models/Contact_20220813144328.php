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
        'content',
        'message',
    ];

    public function signUp($request) {
        DB::transaction(function() use($request) {
            $post = new Contact;
            $post->fill([
                'name',
                'email',
                'phone',
                'address',
                'type',
                'content',
            ]);
            $post->save();
        });
        return;
    }
    public function updateCustomer(Request $request) {
        DB::transaction(function() use($id, $request) {
            $customer = Contact::find($id);
            $customer->fill([
                'name',
                'email',
                'phone',
                'address',
                'type',
                'content',
            ]);
            $customer->save();
        });
        return;
    }

    // scope
    public function scopeWhereAddress($query, $request) {
        $address = $request->address ?? '';
        if(!empty($address)) {
            $query->where('pref', 'like',  '%' . addcslashes($address, '%_\\') . '%')
                ->orwhere('municipalities', 'like',  '%' . addcslashes($address, '%_\\') . '%');
        }
    }
    public function scopeWhereHighestPrice($query, $request) {
        $highest_price = $request->highest_price;
        if(!empty($highest_price)) {
            $query->where('price', '<', (int)$highest_price);
        }
    }
}
