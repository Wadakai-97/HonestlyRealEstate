<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatchJob extends Model
{
    protected $table = 's';

    protected $fillable = [
        'title',
        'image',
        'content',
        'staff_id',
        'created_at',
        'updated_at',
    ];
}
