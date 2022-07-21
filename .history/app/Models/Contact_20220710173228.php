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
            $post = new Mansion;
            $post->fill([
        ]);
                    $post->save();
        return;

}
