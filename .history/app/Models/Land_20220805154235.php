<?php

namespace App\Models;

use App\Models\MyList;
use App\Models\Recommend;
use App\Models\LandImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    protected $table = 'lands';
    protected $fillable = [
        'name',
        'price',
        'tax',
        'images',
        'pref',
        'municipalities',
        'construction_conditions',
        'land_area',
        'building_coverage_ratio',
        'floor_area_ratio',
        'station',
        'walking_distance_station',
        'land_right',
        'other_fee',
        'urban_planning',
        'land_use_zones',
        'restrictions_by_law',
        'national_land_utilization_law',
        'land_classification',
        'terrain',
        'adjacent_road',
        'adjacent_road_width',
        'private_road',
        'setback',
        'setback_length',
        'water_supply',
        'sewage_line',
        'gas',
        'status',
        'delivery_date',
        'property_introduction',
        'sales_comment',
        'elementary_school_name',
        'elementary_school_district',
        'junior_high_school_name',
        'junior_high_school_district',
        'terms_and_conditions',
        'conditions_of_transactions',
        'created_at',
        'updated_at',
    ];

    public function signUp($request) {
        DB::transaction(function() use($request) {
            $post = new land;
            $post->fill([
                'name' => $request->name,
                'price' => $request->price,
                'tax' => $request->tax,
                'pref' => $request->pref,
                'municipalities' => $request->municipalities,
                'block' => $request->block,
                'construction_conditions' => $request->construction_conditions,
                'land_area' => $request->land_area,
                'building_coverage_ratio' => $request->building_coverage_ratio,
                'floor_area_ratio' => $request->floor_area_ratio,
                'land_right' => $request->land_right,
                'other_fee' => $request->other_fee,
                'urban_planning' => $request->urban_planning,
                'land_use_zones' => $request->land_use_zones,
                'restrictions_by_law' => $request->restrictions_by_law,
                'national_land_utilization_law' => $request->national_land_utilization_law,
                'land_classification' => $request->land_classification,
                'terrain' => $request->terrain,
                'adjacent_road' => $request->adjacent_road_width,
                'adjacent_road_widh' => $request->adjacent_road_width,
                'private' => $request->private_road,
                'setback' => $request->setback,
                'setback_length' => $request->setback_length,
                'water_supply' => $request->water_supply,
                'sewage_line' => $request->sewage_line,
                'gas' => $request->gas,
                'status' => $request->status,
                'delivery_date' => $request->delivery_date,
                'property_introduction' => $request->property_introduction,
                'sales_comment' => $request->sales_comment,
                'station' => $request->station,
                'walking_distance_station' => $request->walking_distance_station,
                'elementary_school_name' => $request->elementary_school_name,
                'elementary_school_district' => $request->elementary_school_district,
                'junior_high_school_name' => $request->junior_high_school_name,
                'junior_high_school_district' => $request->junior_high_school_district,
                'terms_and_conditions' => $request->terms_and_conditions,
                'conditions_of_transactions' => $request->conditions_of_transactions,
            ]);
            $post->save();
        });
        return;
    }
    public function updateLand($id, $request) {
        DB::transaction(function() use($request) {
            $land = land::find($id);
            $land->fill([
                'name' => $request->name,
                'price' => $request->price,
                'tax' => $request->tax,
                'pref' => $request->pref,
                'municipalities' => $request->municipalities,
                'block' => $request->block,
                'construction_conditions' => $request->construction_conditions,
                'land_area' => $request->land_area,
                'building_coverage_ratio' => $request->building_coverage_ratio,
                'floor_area_ratio' => $request->floor_area_ratio,
                'land_right' => $request->land_right,
                'other_fee' => $request->other_fee,
                'urban_planning' => $request->urban_planning,
                'land_use_zones' => $request->land_use_zones,
                'restrictions_by_law' => $request->restrictions_by_law,
                'national_land_utilization_law' => $request->national_land_utilization_law,
                'land_classification' => $request->land_classification,
                'terrain' => $request->terrain,
                'adjacent_road' => $request->adjacent_road_width,
                'adjacent_road_widh' => $request->adjacent_road_width,
                'private' => $request->private_road,
                'setback' => $request->setback,
                'setback_length' => $request->setback_length,
                'water_supply' => $request->water_supply,
                'sewage_line' => $request->sewage_line,
                'gas' => $request->gas,
                'status' => $request->status,
                'delivery_date' => $request->delivery_date,
                'property_introduction' => $request->property_introduction,
                'sales_comment' => $request->sales_comment,
                'station' => $request->station,
                'walking_distance_station' => $request->walking_distance_station,
                'elementary_school_name' => $request->elementary_school_name,
                'elementary_school_district' => $request->elementary_school_district,
                'junior_high_school_name' => $request->junior_high_school_name,
                'junior_high_school_district' => $request->junior_high_school_district,
                'terms_and_conditions' => $request->terms_and_conditions,
                'conditions_of_transactions' => $request->conditions_of_transactions,
            ]);
            $post->update();

            if(!empty($request->file('files'))) {
                foreach ($request->file('files') as $index => $e) {
                    $ext = $e['image']->guessExtension();
                    $file_name = "{$request->name}_{$index}.{$ext}";
                    $e['image']->storeAs('public/land_images', $file_name);
                    $images = LandImage::find($id);
                    $images->path = $file_name;
                    $images->land_id = $land->id;
                    $images->save();
                }
            }
        });
        return;
    }
    public function recommend($id) {
        DB::transaction(function() use($id) {
            $land = Land::find($id);
            $recommend = new Recommend;
            $recommend->land_id = $land->id;
            $recommend->save();
        });
    }

    // Scope
    public function scopeWherePref($query, $pref) {
        if(!empty($pref)) {
            for ($i = 0; $i < count($pref); $i++){
                    $query->orwhere('pref', '=',  $pref[$i]);
            }
        }
    }
    public function scopeWhereMunicipalities($query, $municipalities) {
        if(!empty($municipalities)) {
            $query->where('municipalities', 'like',  '%' . addcslashes($municipalities, '%_\\') . '%');
        }
    }
    public function scopeWhereLowestPrice($query, $lowest_price) {
        if(!empty($lowest_price)) {
            $query->where('price', '>=', $lowest_price);
        }
    }
    public function scopeWhereHighestPrice($query, $highest_price) {
        if(!empty($highest_price)) {
            $query->where('price', '<=', $highest_price);
        }
    }
    public function scopeWhereLowestLandArea($query, $lowest_land_area) {
        if(!empty($lowest_land_area)) {
            $query->where('land_area', '>=', $lowest_land_area);
        }
    }
    public function scopeWhereHighestLandArea($query, $highest_land_area) {
        if(!empty($highest_land_area)) {
            $query->where('land_area', '<=', $highest_land_area);
        }
    }
    public function scopeWhereLandArea($query, $land_right) {
        if(!empty($land_right)) {
            $query->where('land_right', '=', $land_right);
        }
    }
    public function scopeWhereConstructionConditions($query, $construction_conditions) {
        if(!empty($construction_conditions)) {
            $query->where('construction_conditions', '=', $construction_conditions);
        }
    }
    public function scopeWhereStation($query, $station) {
        if(!empty($station)) {
            $query->where('station', '=', $station);
        }
    }
    public function scopeWhereWalkingDistanceStation($query, $walking_distance_station) {
        if(!empty($walking_distance_station)) {
            $query->where('walking_distance_station', '<=', $walking_distance_station);
        }
    }

    //Relaton
    public function myLists() {
        return $this->hasMany(MyList::class, 'land_id', 'id');
    }
    public function landImages() {
        return $this->hasMany(LandImage::class, 'land_id', 'id');
    }
    public function recommends() {
        return $this->recommends(Recommend::class, 'mansion_id', 'id');
    }
}
