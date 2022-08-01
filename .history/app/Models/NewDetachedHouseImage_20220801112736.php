<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use App\Models\NewDetachedHouse;
use Illuminate\Database\Eloquent\Model;

class NewDetachedHouseImage extends Model
{
    protected $table = 'new_detached_house_images';

    protected $fillable = [
        'new_detached_house_id',
        'image_id',
        'category',
        'comment',
        'path',
        'created_at',
        'updated_at',
    ];

    public function newDetachedHouse() {
        return $this->belongsTo(NewDetachedHouse::class);
    }
}
