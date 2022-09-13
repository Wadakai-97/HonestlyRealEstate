<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';

    protected $fillable = [
        'user_id',
        'land_id',
        'mansion_id',
        'new_detached_house_id',
        'new_detached_house_g_id',
        'old_detached_house_g_id',
        'ip',
        'created_at',
        'updated_at',
    ];
}
