<?php

namespace App\Models;

use App\Models\Blog;
use App\Models\Review;
use App\Models\Information;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';

    protected $fillable = [
        'staff_name',
        'head_shot',
        'position',
        'number_of_contracts',
        'birthplace',
        'hobby',
        'comment',
        'created_at',
        'updated_at',
    ];

    public function reviews() {
        return $this->hasMany(Review::class, 'staff_id', 'id');
    }

    public function blogs() {
        return $this->hasMany(Blog::class, 'staff_id', 'id');
    }
}
