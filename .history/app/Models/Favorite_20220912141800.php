<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'blogs';

    protected $fillable = [
        ''
        'created_at',
        'updated_at',
    ];
}
