<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'type' => $request->type,
                'content' => $request->content,
            ]);
            $post->save();
        });
        return;
    }
    public function updateCustomer($id, $request) {
        DB::transaction(function() use($id, $request) {
            $customer = Contact::find($id);
            $customer->fill([
                'name' => $request->name,
                'email' => $request->email,
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
    public function scopeWhereAddress($query, $request) {
        $address = $request->address ?? '';
        if(!empty($address)) {
            $query->where('address', 'like',  '%' . addcslashes($address, '%_\\') . '%');
        }
    }
    public function scopeWhereKeyword($query, $request) {
        $keyword = $request->keyword ?? '';
        if(!empty($keyword)) {
            $query->where('content', 'like',  '%' . addcslashes($keyword, '%_\\') . '%');
        }
    }
    public function scopeWhereContact($query, $request) {
        $contact = $request->contact;
        if(!empty($contact)) {
            $today = Carbon::today();
            $years_ago = $today->subYear($contact);
            $query->where('created_at', '>=', $years_ago);
        }
    }
    public function scopeWhereUpdate($query, $request) {
        $update = $request->update;
        if(!empty($update)) {
            $today = Carbon::today();
            $years_ago = $today->subDays($update);
            $query->where('updated_at', '>=', $years_ago);
        }
    }
}
