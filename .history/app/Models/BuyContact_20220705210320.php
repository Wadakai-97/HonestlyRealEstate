<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyContact extends Model
{
    $table->id();
    $table->string('name');
    $table->string('address'); // 暗号化対象
    $table->string('email'); // 暗号化対象
    $table->string('phone'); //暗号化対象
    $table->string('contents');
    $table->string('message');
    $table->timestamps();

    protected $casts = [
            'address' => 'encrypted',
            'email' => 'encrypted',
            'phone' => 'encrypted',
            ];
}
