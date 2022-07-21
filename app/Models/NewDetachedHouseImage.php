<?php

namespace App\Models;

use App\Models\NewDetachedHouse;
use Illuminate\Database\Eloquent\Model;

class NewDetachedHouseImage extends Model
{
    protected $table = 'new_detached_house_images';

    protected $fillable = [
        'new_detached_house_id',
        'path',
    ];

    public function newDetachedHouse() {
        return $this->belongsTo(NewDetachedHouse::class);
    }
}
