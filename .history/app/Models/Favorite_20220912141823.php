<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'blogs';

    protected $fillable = [
        'user_id',
        'type',
        'property_id',
        'ip',
        'created_at',
        'updated_at',
    ];
}