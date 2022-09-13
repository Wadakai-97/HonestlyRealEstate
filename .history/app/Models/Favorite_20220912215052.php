<?php

namespace App\Models;

use App\Models\User;
use App\Models\Land;
use App\Models\Mansion;
use App\Models\NewDetachedHouse;
use App\Models\NewDeatchedHouseGroup;
use App\Models\OldDetachedHouse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

    public function favoriteSignUp($request, $id) {
        DB::transaction(function() use($request, $id) {
            $type = $request->type;
            $favorite = new Favorite;

            if($type = "mansion") {
                $favorite->mansion_id = $id;
            } else if($type = "land") {
                $favorite->land_id = $id;
            } else if($type = "new_detached_house") {
                $favorite->new_detached_house_id = $id;
            } else if($type = "new_detached_house_group") {
                $favorite->new_detached_house_group_id = $id;
            } else if($type = "old_detached_house") {
                $favorite->old_detached_house_id = $id;
            }

            if(Auth::check()) {
                $favorite->user_id = Auth::user()->id;
            } else {
                $favorite->ip = $request->ip();
            }

            $favorite->save();
        });
    }

    // Scope
    public function scopeWhereUser($query) {
        $user = Auth::user()->id;
        if(!empty($user)) {
            $query->where('user_id', '=', $user);
        }
    }
    public function scopeWhereGuest($query, $request) {
        $guest = $request->ip();
        if(!empty($guest)) {
            $query->where('ip', '=', $guest);
        }
    }
    public function scopeWhereMansion($query, $id) {
        $query->where('mansion_id', '=', $id);
    }
    public function scopeWhereLand($query, $id) {
        $query->where('land_id', '=', $id);
    }
    public function scopeWhereNewDetachedHouse($query, $id) {
        $query->where('new_detached_house_id', '=', $id);
    }
    public function scopeWhereNewDetachedHouseGroup($query, $id) {
        $query->where('new_detached_house_group_id', '=', $id);
    }
    public function scopeWhereOldDetachedHouse($query, $id) {
        $query->where('old_detached_house_id', '=', $id);
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
