<?php

namespace App\Models;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable = [
        'title',
        'images',
        'content',
        'staff_id',
        'created_at',
        'updated_at',
    ];

    public function staff() {
        return $this->belongsTo(Staff::class);
    }
}
