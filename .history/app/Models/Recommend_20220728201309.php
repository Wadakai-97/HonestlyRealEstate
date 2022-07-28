<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    protected $table = 'reccomends';

    protected $fillable = [
        'land_id',
        'mansion_id',
        'new_detached_house_id',
        'new_detached_house_group_id'
        'created_at',
        'updated_at',
    ];
}
