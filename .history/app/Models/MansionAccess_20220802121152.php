<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MansionAccess extends Model
{
    protected $table = 'mansion_accesss';
    protected $fillable = [
        'created_at',
        'updated_at',
    ];
}
