<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatchJob extends Model
{
    protected $table = 's';

    protected $fillable = [
        'job_name',
        'created_at',
        'updated_at',
    ];
}
