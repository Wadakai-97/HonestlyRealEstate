<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    protected $table = 'reccomends';

    protected $fillable = [
        'title',
        'body',
        'images',
        'created_at',
        'updated_at',
    ];
}
