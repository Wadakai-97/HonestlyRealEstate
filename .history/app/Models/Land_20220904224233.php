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
        'access_method',
        'distance_station',
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
            $land = new land;
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
                'access_method' => $request->access_method,
                'distance_station' => $request->distance_station,
                'elementary_school_name' => $request->elementary_school_name,
                'elementary_school_district' => $request->elementary_school_district,
                'junior_high_school_name' => $request->junior_high_school_name,
                'junior_high_school_district' => $request->junior_high_school_district,
                'terms_and_conditions' => $request->terms_and_conditions,
                'conditions_of_transactions' => $request->conditions_of_transactions,
            ]);
            $land->save();

            $image_counter = 1;
            for($i=1; $i<21; $i++) {
                if(!empty($request->file('image' . $i))) {
                    $extension = $request->file('image' . $i)->guessExtension();
                    $file_name = "No{$land->id}_{$image_counter}.{$extension}";
                    $request->file('image' . $i)->storeAs('/storage/property_images/land', $file_name);
                    $land_image = new LandImage;
                    $land_image->fill([
                        'land_id' => $land->id,
                        'image_id' => $image_counter,
                        'category' => $request->input('category' . $i),
                        'comment' => $request->input('comment' . $i),
                        'path' => $file_name,
                    ]);
                    $land_image->save();
                    $image_counter++;
                }
            }
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
                'access_method' => $request->access_method,
                'distance_station' => $request->distance_station,
                'elementary_school_name' => $request->elementary_school_name,
                'elementary_school_district' => $request->elementary_school_district,
                'junior_high_school_name' => $request->junior_high_school_name,
                'junior_high_school_district' => $request->junior_high_school_district,
                'terms_and_conditions' => $request->terms_and_conditions,
                'conditions_of_transactions' => $request->conditions_of_transactions,
            ]);
            $land->update();
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
    public function column($request) {
        if($request->sort == "新着順") {
            $column = 'updated_at';
        }
        if($request->sort == "価格が安い順" || $request->sort == "価格が高い順") {
            $column = 'price';
        }
        if($request->sort == "土地面積が狭い順" || $request->sort == "土地面積が広い順") {
            $column = 'land_area';
        }
        if($request->sort == "容積率が小さい順" || $request->sort == "容積率が大きい順") {
            $column = 'floor_area_ratio';
        }
        if($request->sort == "建ぺい率が小さい順" || $request->sort == "建ぺい率が大きい順") {
            $column = 'building_coverage_ratio';
        }
        return $column;
    }
    public function sort($request) {
        if($request->sort == "新着順" || $request->sort == "価格が高い順" || $request->sort == "容積率が大きい順" || $request->sort == "建ぺい率が大きい順") {
            $type = 'desc';
        }
        if($request->sort == "価格が安い順" || $request->sort == "容積率が小さい順" || $request->sort == "建ぺい率が小さい順") {
            $type = 'asc';
        }
        return $type;
    }

    // Scope
    public function scopeWhereAddress($query, $request) {
        $address = $request->address ?? '';
        if(!empty($address)) {
            $query->where('pref', 'like',  '%' . addcslashes($address, '%_\\') . '%')
                ->orwhere('municipalities', 'like',  '%' . addcslashes($address, '%_\\') . '%');
        }
    }
    public function scopeWherePref($query, $request) {
        $pref = $request->pref ?? '';
        if(!empty($pref)) {
            for ($i = 0; $i < count($pref); $i++){
                    $query->orwhere('pref', '=',  $pref[$i]);
            }
        }
    }
    public function scopeWhereMunicipalities($query, $request) {
        $municipalities = $request->municipalities ?? '';
        if(!empty($municipalities)) {
            $query->where('municipalities', 'like',  '%' . addcslashes($municipalities, '%_\\') . '%');
        }
    }
    public function scopeWhereLowestPrice($query, $request) {
        $lowest_price = $request->lowest_price;
        if(!empty($lowest_price)) {
            $query->where('price', '>=', (int)$lowest_price);
        }
    }
    public function scopeWhereHighestPrice($query, $request) {
        $highest_price = $request->highest_price;
        if(!empty($highest_price)) {
            $query->where('price', '<', (int)$highest_price);
        }
    }
    public function scopeWhereLowestLandArea($query, $request) {
        $lowest_land_area = $request->lowest_land_area;
        if(!empty($lowest_land_area)) {
            $query->where('land_area', '>=', $lowest_land_area);
        }
    }
    public function scopeWhereHighestLandArea($query, $request) {
        $highest_land_area = $request->highest_land_area;
        if(!empty($highest_land_area)) {
            $query->where('land_area', '<', $highest_land_area);
        }
    }
    public function scopeWhereLandArea($query, $request) {
        $land_right = $request->land_right;
        if(!empty($land_right)) {
            $query->where('land_right', '=', $land_right);
        }
    }
    public function scopeWhereConstructionConditions($query, $request) {
        $construction_conditions = $request->construction_conditions;
        if(!empty($construction_conditions)) {
            $query->where('construction_conditions', '=', $construction_conditions);
        }
    }
    public function scopeWhereStation($query, $request) {
        $station = $request->station;
        if(!empty($station)) {
            $query->where('station', '=', $station);
        }
    }
    public function scopeWhereAccessMethod($query, $request) {
        $access_method= $request->access_method;
        if(!empty($access_method)) {
            $query->where('access_method', '=', $access_method);
        }
    }
    public function scopeWhereWalkingDistanceStation($query, $walking_distance_station) {
        if(!empty($walking_distance_station)) {
            $query->where('walking_distance_station', '<=', $walking_distance_station)
                    ->where('walking_distance_station', '<=', $walking_distance_station);
        }
    }
    public function scopeWhereDistanceStation($query, $request) {
        $distance_station = $request->distance_station;
        if(!empty($distance_station)) {
            $query->where('distance_station', '<=', $distance_station);
        }
    }
    public function scopeWhereLandRight($query, $request) {
        $land_right = $request->land_right;
        if(!empty($land_right)) {
            $query->where('land_right', '=', $land_right);
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
