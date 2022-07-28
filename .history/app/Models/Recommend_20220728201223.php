<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    protected $table = 'informations';

    protected $fillable = [
        'title',
        'body',
        'images',
        'created_at',
        'updated_at',
    ];
}
