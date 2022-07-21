<?php

namespace App\Models;

use App\Models\Mansion;
use App\Models\NewDetachedHouse;
use App\Models\OldDetachedHouse;
use App\Models\Land;
use Illuminate\Database\Eloquent\Model;

class MyList extends Model
{
    protected $table = 'my_lists';

    protected $fillable = [
        'mansion_id',
        'new_detached_house_id',
        'old_detached_house_id',
        'land_id',
        'created_at',
        'updated_at',
    ];

    public function mansion() {
        return $this->belongsTo(Mansion::class);
    }

    public function newDetachedHouse() {
        return $this->belongsTo(NewDetachedHouse::class);
    }

    public function oldDetachedHouse() {
        return $this->belongsTo(OldDetachedHouse::class);
    }

    public function land() {
        return $this->belongsTo(Land::class);
    }
}
