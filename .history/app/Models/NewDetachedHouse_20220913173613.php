<?php

namespace App\Models;

use App\Models\MyList;
use App\Models\Favorite;
use App\Models\Recommend;
use Illuminate\Support\Facades\DB;
use App\Models\NewDetachedHouseImage;
use Illuminate\Database\Eloquent\Model;

class NewDetachedHouse extends Model
{
    protected $table = 'new_detached_houses';
    protected $fillable = [
        'name',
        'price',
        'tax',
        'pref',
        'municipalities',
        'block',
        'number_of_rooms',
        'type_of_room',
        'land_area',
        'building_area',
        'balcony',
        'balcony_area',
        'building_coverage_ratio',
        'floor_area_ratio',
        'parking',
        'parking_lot',
        'year',
        'month',
        'day',
        'station',
        'access_method',
        'distance_station',
        'building_construction',
        'land_right',
        'other_fee',
        'urban_planning',
        'land_use_zones',
        'restrictions_by_law',
        'land_classification',
        'terrain',
        'adjacent_road',
        'adjacent_road_direction',
        'adjacent_road_width',
        'private_road',
        'setback',
        'setback_length',
        'water_supply',
        'sewage_line',
        'gas',
        'building_certification_number',
        'status',
        'delivery_date',
        'elementary_school_name',
        'elementary_school_district',
        'junior_high_school_name',
        'junior_high_school_district',
        'conditions_of_transactions',
        'terms_and_conditions',
        'property_introduction',
        'sales_comment',
        'created_at',
        'updated_at',
    ];

    // process
    public function signUp($request) {
        DB::transaction(function() use($request) {
            $new_detached_house = new NewDetachedHouse;
            $new_detached_house->fill([
                'name' => $request->name,
                'price' => $request->price,
                'tax' => $request->tax,
                'pref' => $request->pref,
                'municipalities' => $request->municipalities,
                'block' => $request->block,
                'land_area' => $request->land_area,
                'building_area' => $request->building_area,
                'balcony_area' => $request->balcony_area,
                'number_of_rooms' => $request->number_of_rooms,
                'type_of_room' => $request->type_of_room,
                'building_coverage_ratio' => $request->building_coverage_ratio,
                'floor_area_ratio' => $request->floor_area_ratio,
                'parking' => $request->parking,
                'parking_lot' => $request->parking_lot,
                'year' => $request->year,
                'month' => $request->month,
                'day' => $request->day,
                'station' => $request->station,
                'access_method' => $request->access_method,
                'distance_station' => $request->distance_station,
                'building_construction' => $request->building_construction,
                'land_right' => $request->land_right,
                'urban_planning' => $request->urban_planning,
                'land_use_zones' => $request->land_use_zones,
                'restrictions_by_law' => $request->restrictions_by_law,
                'land_classification' => $request->land_classification,
                'terrain' => $request->terrain,
                'adjacent_road' => $request->adjacent_road,
                'adjacent_road_direction' => $request->adjacent_road_direction,
                'adjacent_road_width' => $request->adjacent_road_width,
                'private_road' => $request->private_road,
                'setback' => $request->setback,
                'setback_length' => $request->setback_length,
                'water_supply' => $request->water_supply,
                'sewage_line' => $request->sewage_line,
                'gas' => $request->gas,
                'building_certification_number' => $request->building_certification_number,
                'other_fee' => $request->other_fee,
                'status' => $request->status,
                'delivery_date' => $request->delivery_date,
                'property_introduction' => $request->property_introduction,
                'sales_comment' => $request->sales_comment,
                'elementary_school_name' => $request->elementary_school_name,
                'elementary_school_district' => $request->elementary_school_district,
                'junior_high_school_name' => $request->junior_high_school_name,
                'junior_high_school_district' => $request->junior_high_school_district,
                'terms_and_conditions' => $request->terms_and_conditions,
                'conditions_of_transactions' => $request->conditions_of_transactions,
            ]);
            $new_detached_house->save();

            $image_counter = 1;
            for($i=1; $i<21; $i++) {
                if(!empty($request->file('image' . $i))) {
                    $extension = $request->file('image' . $i)->guessExtension();
                    $file_name = "No{$new_detached_house->id}_{$image_counter}.{$extension}";
                    $request->file('image' . $i)->storeAs('/storage/property_images/new_detached_house', $file_name);
                    $new_detached_house_image = new NewDetachedHouseImage;
                    $new_detached_house_image->fill([
                        'new_detached_house_id' => $new_detached_house->id,
                        'image_id' => $image_counter,
                        'category' => $request->input('category' . $i),
                        'comment' => $request->input('comment' . $i),
                        'path' => $file_name,
                    ]);
                    $new_detached_house_image->save();
                    $image_counter++;
                }
            }
        });
        return;
    }
    public function updateNewDetachedHouse($id, $request) {
        DB::transaction(function() use($id, $request) {
            $new_detached_house = NewDetachedHouse::find($id);
            $new_detached_house->fill([
                'name' => $request->name,
                'price' => $request->price,
                'tax' => $request->tax,
                'pref' => $request->pref,
                'municipalities' => $request->municipalities,
                'block' => $request->block,
                'number_of_rooms' => $request->number_of_rooms,
                'type_of_room' => $request->type_of_room,
                'land_area' => $request->land_area,
                'building_area' => $request->building_area,
                'balcony' => $request->balcony,
                'balcony_area' => $request->balcony_area,
                'building_coverage_ratio' => $request->building_coverage_ratio,
                'floor_area_ratio' => $request->floor_area_ratio,
                'parking' => $request->parking,
                'parking_lot' => $request->parking_lot,
                'year' => $request->year,
                'month' => $request->month,
                'day' => $request->day,
                'station' => $request->station,
                'access_method' => $request->access_method,
                'distance_station' => $request->distance_station,
                'building_construction' => $request->building_construction,
                'land_right' => $request->land_right,
                'urban_planning' => $request->urban_planning,
                'land_use_zones' => $request->land_use_zones,
                'restrictions_by_law' => $request->restrictions_by_law,
                'land_classification' => $request->land_classification,
                'terrain' => $request->terrain,
                'adjacent_road' => $request->adjacent_road,
                'adjacent_road_direction' => $request->adjacent_road_direction,
                'adjacent_road_width' => $request->adjacent_road_width,
                'private_road' => $request->private_road,
                'setback' => $request->setback,
                'setback_length' => $request->setback_length,
                'water_supply' => $request->water_supply,
                'sewage_line' => $request->sewage_line,
                'gas' => $request->gas,
                'building_certification_number' => $request->building_certification_number,
                'other_fee' => $request->other_fee,
                'status' => $request->status,
                'delivery_date' => $request->delivery_date,
                'property_introduction' => $request->property_introduction,
                'sales_comment' => $request->sales_comment,
                'elementary_school_name' => $request->elementary_school_name,
                'elementary_school_district' => $request->elementary_school_district,
                'junior_high_school_name' => $request->junior_high_school_name,
                'junior_high_school_district' => $request->junior_high_school_district,
                'terms_and_conditions' => $request->terms_and_conditions,
                'conditions_of_transactions' => $request->conditions_of_transactions,
            ]);
            $new_detached_house->update();
        });
        return;
    }
    public function recommend($id) {
        DB::transaction(function() use($id) {
            $new_detached_house = NewDetachedHouse::find($id);
            $recommend = new Recommend;
            $recommend->new_detached_house_id = $new_detached_house->id;
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
        if($request->sort == "建物面積が狭い順" || $request->sort == "建物面積が広い順") {
            $column = 'building_area';
        }
        if($request->sort == "間取りが広い順" || $request->sort == "間取りが狭い順") {
            $column = 'number_of_rooms';
        }
        if($request->sort == "築年数が古い順" || $request->sort == "築年数が新しい順") {
            $column = 'year';
        }
        return $column;
    }
    public function sort($request) {
        if($request->sort == "新着順" || $request->sort == "価格が高い順" || $request->sort == "土地面積が広い順" || $request->sort == "建物面積が広い順" || $request->sort == "間取りが広い順" || $request->sort == "築年数が新しい順") {
            $type = 'desc';
        }
        if($request->sort == "価格が安い順" || $request->sort == "土地面積が狭い順" || $request->sort == "建物面積が狭い順" || $request->sort == "間取りが狭い順" || $request->sort == "築年数が古い順") {
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
    public function scopeWhereLowestBuildingArea($query, $request) {
        $lowest_building_area = $request->lowest_building_area;
        if(!empty($lowest_building_area)) {
            $query->where('building_area', '>=', $lowest_building_area);
        }
    }
    public function scopeWhereHighestBuildingArea($query, $request) {
        $highest_building_area = $request->highest_building_area;
        if(!empty($highest_building_area)) {
            $query->where('building_area', '<', $highest_building_area);
        }
    }
    public function scopeWherePlan($query, $request) {
        $plan = $request->plan;
        if(!empty($plan)) {
            for ($i = 0; $i < count($plan); $i++){
                if($plan[$i] < 5) {
                    $query->orwhere('number_of_rooms', '=',  $plan[$i]);
                } else {
                    $query->orwhere('number_of_rooms', '>=',  5);
                }
            }
        }
    }
    public function scopeWhereTypeOfRoom($query, $request) {
        $type_of_room = $request->type_of_room;
        if(!empty($type_of_room)) {
            $query->where('type_of_room', '=', $type_of_room);
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
    public function scopeWhereWalkingDistanceStation($query, $request) {
        $distance_station = $request->distance_station;
        if(!empty($distance_station)) {
            $query->where('access_method', '=', '徒歩')
                    ->where('distance_station', '<=', $distance_station);
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
    public function scopeWhereKeyword($query, $request) {
        $keyword = $request->keyword ?? '';
        if(!empty($keyword)) {
            $query->where('name', 'like',  '%' . addcslashes($keyword, '%_\\') . '%')
                ->orwhere('pref', 'like',  '%' . addcslashes($keyword, '%_\\') . '%')
                ->orwhere('municipalities', 'like',  '%' . addcslashes($keyword, '%_\\') . '%')
                ->orwhere('station', 'like',  '%' . addcslashes($keyword, '%_\\') . '%')
                ->orwhere('building_construction', 'like',  '%' . addcslashes($keyword, '%_\\') . '%')
                ->orwhere('elementary_school_name', 'like',  '%' . addcslashes($keyword, '%_\\') . '%')
                ->orwhere('junior_high_school_name', 'like',  '%' . addcslashes($keyword, '%_\\') . '%')
                ->orwhere('terms_and_conditions', 'like',  '%' . addcslashes($keyword, '%_\\') . '%')
                ->orwhere('property_introduction', 'like',  '%' . addcslashes($keyword, '%_\\') . '%')
                ->orwhere('sales_comment', 'like',  '%' . addcslashes($keyword, '%_\\') . '%');
        }
    }
    public function scopeWhereKeyword($query, $request) {
        $keyword = $request->keyword ?? '';
        if(!empty($keyword)) {
            $query->where('name', 'like',  '%' . addcslashes($keyword, '%_\\') . '%')
                ->orwhere('pref', 'like',  '%' . addcslashes($keyword, '%_\\') . '%')
                ->orwhere('municipalities', 'like',  '%' . addcslashes($keyword, '%_\\') . '%')
                ->orwhere('station', 'like',  '%' . addcslashes($keyword, '%_\\') . '%')
                ->orwhere('building_construction', 'like',  '%' . addcslashes($keyword, '%_\\') . '%')
                ->orwhere('elementary_school_name', 'like',  '%' . addcslashes($keyword, '%_\\') . '%')
                ->orwhere('junior_high_school_name', 'like',  '%' . addcslashes($keyword, '%_\\') . '%')
                ->orwhere('terms_and_conditions', 'like',  '%' . addcslashes($keyword, '%_\\') . '%')
                ->orwhere('property_introduction', 'like',  '%' . addcslashes($keyword, '%_\\') . '%')
                ->orwhere('sales_comment', 'like',  '%' . addcslashes($keyword, '%_\\') . '%');
        }
    }

    // Relation
    public function newDetachedHouseImages() {
        return $this->hasMany(NewDetachedHouseImage::class, 'new_detached_house_id', 'id');
    }
    public function recommends() {
        return $this->hasMany(Recommend::class, 'mansion_id', 'id');
    }
    public function favorites() {
        return $this->hasMany(Favorite::class, 'old_detached_house_id', 'id');
    }
}
