<?php

namespace App\Models;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = [
        'name',
        'review',
        'staff_id',
        'comment',
        'created_at',
        'updated_at',
    ];

    public function staff() {
        return $this->belongsTo(Staff::class);
    }
}
