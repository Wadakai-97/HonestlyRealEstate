<?php

namespace App\Models;

use App\Models\Land;
use App\Models\Mansion;
use App\Models\NewDetachedHouse;
use App\Models\NewDeatchedHouseGroup;
use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    protected $table = 'reccomends';

    protected $fillable = [
        'land_id',
        'mansion_id',
        'new_detached_house_id',
        'new_detached_house_group_id',
        'created_at',
        'updated_at',
    ];

    public function mansion() {
        return $this->belongsTo(Mansion::class);
    }
}
