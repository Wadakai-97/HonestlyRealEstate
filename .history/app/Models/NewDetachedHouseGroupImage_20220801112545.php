<?php

namespace App\Models;

use App\Models\NewDetachedHouseGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class NewDetachedHouseGroupImage extends Model
{
    protected $table = 'new_detached_house_group_images';

    protected $fillable = [
        'new_detached_house_group_id',
        'image_id',
        'category',
        'comment',
        'path',
        'created_at',
        'updated_at',
    ];

    public function newDetachedHouse() {
        return $this->belongsTo(NewDetachedHouseGroup::class);
    }
}
