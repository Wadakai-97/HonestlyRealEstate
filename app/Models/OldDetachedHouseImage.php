<?php

namespace App\Models;

use App\Models\OldDetachedHouse;
use Illuminate\Database\Eloquent\Model;

class OldDetachedHouseImage extends Model
{
    protected $table = 'old_detached_house_images';

    protected $fillable = [
        'old_detached_house_id',
        'path',
    ];

    public function oldDetachedHouse() {
        return $this->belongsTo(OldDetachedHouse::class);
    }
}
