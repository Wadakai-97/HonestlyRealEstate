<?php

namespace App\Models;

use App\Models\User;
use App\Models\Land;
use App\Models\Mansion;
use App\Models\NewDetachedHouse;
use App\Models\NewDeatchedHouseGroup;
use App\Models\OldDetachedHouse;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';

    protected $fillable = [
        'user_id',
        'land_id',
        'mansion_id',
        'new_detached_house_id',
        'new_detached_house_group_id',
        'old_detached_house_id',
        'ip',
        'created_at',
        'updated_at',
    ];

    public function favoriteSignUp($id, $request) {
        DB::transaction(function() use($id, $request) {
            $type = $request->type;
            $favorite = new favorite;

            if($type = "mansion") {
                $favorite->mansion_id = $id;
            } else if($type = "land") {
                $favorite->mansion_id = $id;
            } else if($type = "new_detached_house") {
                $favorite->mansion_id = $id;
            } else if($type = "new_detached_house_group") {
                $favorite->mansion_id = $id;
            } else if($type = "old_detached_house") {
                $favorite->mansion_id = $id;
            }
            $favorite->fill([
            ]);
            $favorite->save();
        });
    }
    // Relation
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function land() {
        return $this->belongsTo(Land::class);
    }
    public function mansion() {
        return $this->belongsTo(Mansion::class);
    }
    public function new_detached_house() {
        return $this->belongsTo(NewDetachedHouse::class);
    }
    public function new_detached_house_group() {
        return $this->belongsTo(NewDetachedHouseGroup::class);
    }
    public function old_detached_house() {
        return $this->belongsTo(OldDetachedHouse::class);
    }
}
