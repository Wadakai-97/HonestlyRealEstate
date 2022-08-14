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
    public function scopeWhereCustomerName($query, $request) {
        $customer_name = $request->customer_name ?? '';
        if(!empty($customer_name)) {
            $query->where('name', 'like',  '%' . addcslashes($customer_name, '%_\\') . '%');
        }
    }
    public function scopeWhereType($query, $request) {
        $type = $request->type;
        if(!empty($type)) {
            $query->where('type', '=', $type);
        }
    }
    public function scopeWherePhone($query, $request) {
        $phone = $request->phone ?? '';
        if(!empty($phone)) {
            $query->where('phone', 'like',  '%' . addcslashes($phone, '%_\\') . '%');
        }
    }
    public function scopeWhereEmail($query, $request) {
        $email = $request->email ?? '';
        if(!empty($email)) {
            $query->where('email', 'like',  '%' . addcslashes($email, '%_\\') . '%');
        }
    }
    public function scopeWhere($query, $request) {
        $email = $request->email ?? '';
        if(!empty($email)) {
            $query->where('email', 'like',  '%' . addcslashes($email, '%_\\') . '%');
        }
    }
}
