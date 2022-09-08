<?php

namespace App\Models;

use App\Models\Recommend;
use Illuminate\Support\Facades\DB;
use App\Models\NewDeatchedHouseGroup;
use Illuminate\Database\Eloquent\Model;

class NewDetachedHouseGroup extends Model
{
    protected $table = 'new_detached_house_groups';
    protected $fillable = [
        'name',
        'lowest_price',
        'highest_price',
        'tax',
        'images',
        'pref',
        'municipalities',
        'block',
        'lowest_number_of_rooms',
        'highest_number_of_rooms',
        'lowest_type_of_room',
        'highest_type_of_room',
        'lowest_land_area',
        'highest_land_area',
        'lowest_building_area',
        'highest_building_area',
        'balcony',
        'lowest_balcony_area',
        'highest_balcony_area',
        'lowest_building_coverage_ratio',
        'highest_building_coverage_ratio',
        'lowest_floor_area_ratio',
        'highest_floor_area_ratio',
        'parking',
        'lowest_parking_lot',
        'highest_parking_lot',
        'floor',
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
        'lowest_adjacent_road_width',
        'highest_adjacent_road_width',
        'private_road',
        'setback',
        'setbacl_length',
        'water_supply',
        'sewage_line',
        'gas',
        'building_certification_number',
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

    // process
    public function signUp($request) {
        DB::transaction(function() use($request) {
            $new_detached_house_group = new NewDetachedHouseGroup;
            $new_detached_house_group->fill([
                'name' => $request->name,
                'lowest_price' => $request->lowest_price,
                'highest_price' => $request->highest_price,
                'tax' => $request->tax,
                'pref' => $request->pref,
                'municipalities' => $request->municipalities,
                'block' => $request->block,
                'lowest_land_area' => $request->lowest_land_area,
                'highest_land_area' => $request->highest_land_area,
                'lowest_building_area' => $request->lowest_building_area,
                'highest_building_area' => $request->highest_building_area,
                'lowest_balcony_area' => $request->lowest_balcony_area,
                'highest_balcony_area' => $request->highest_balcony_area,
                'lowest_number_of_rooms' => $request->lowest_number_of_rooms,
                'highest_number_of_rooms' => $request->highest_number_of_rooms,
                'lowest_type_of_room' => $request->lowest_type_of_room,
                'highest_type_of_room' => $request->highest_type_of_room,
                'lowest_building_coverage_ratio' => $request->lowest_building_coverage_ratio,
                'highest_building_coverage_ratio' => $request->highest_building_coverage_ratio,
                'lowest_floor_area_ratio' => $request->lowest_floor_area_ratio,
                'highest_floor_area_ratio' => $request->highest_floor_area_ratio,
                'parking' => $request->parking,
                'lowest_parking_lot' => $request->lowest_parking_lot,
                'highest_parking_lot' => $request->highest_parking_lot,
                'year' => $request->year,
                'month' => $request->month,
                'day' => $request->day,
                'station' => $request->station,
                'access_method' => $request->access_method,
                'distance_station' => $request->distance_station,
                'building_construction' => $request->building_construction,
                'land_right' => $request->land_right,
                'urban_planning' => $request->urban_planning,
                'land_use_zonesv' => $request->land_use_zones,
                'restrictions_by_law' => $request->restrictions_by_law,
                'land_classification' => $request->land_classification,
                'terrain' => $request->terrain,
                'adjacent_roadv' => $request->adjacent_road,
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
            $new_detached_house_group->save();

            $image_counter = 1;
            for($i=1; $i<21; $i++) {
                if(!empty($request->file('image' . $i))) {
                    $extension = $request->file('image' . $i)->guessExtension();
                    $file_name = "No{$new_detached_house_group->id}_{$image_counter}.{$extension}";
                    $request->file('image' . $i)->storeAs('/storage/property_images/new_detached_house_group', $file_name);
                    $new_detached_house_group_image = new NewDetachedHouseGroupImage;
                    $new_detached_house_group_image->fill([
                        'new_detached_house_group_id' => $new_detached_house_group->id,
                        'image_id' => $image_counter,
                        'category' => $request->input('category' . $i),
                        'comment' => $request->input('comment' . $i),
                        'path' => $file_name,
                    ]);
                    $new_detached_house_group_image->save();
                    $image_counter++;
                }
            }
        });
        return;
    }
    public function recommend($id) {
        DB::transaction(function() use($id) {
            $new_detached_house_group = NewDetachedHouseGroup::find($id);
            $recommend = new Recommend;
            $recommend->new_detached_house_group_id = $new_detached_house_group->id;
            $recommend->save();
        });
    }
    public function column($request) {
        if($request->sort == "新着順") {
            $column = 'updated_at';
        }
        if($request->sort == "価格が安い順") {
            $column = 'lowest_price';
        }
        if($request->sort == "価格が高い順") {
            $column = 'highest_price';
        }
        if($request->sort == "土地面積が狭い順") {
            $column = 'lowest_land_area';
        }
        if($request->sort == "土地面積が広い順") {
            $column = 'highest_land_area';
        }
        if($request->sort == "建物面積が狭い順") {
            $column = 'lowest_building_area';
        }
        if($request->sort == "建物面積が広い順") {
            $column = 'highest_building_area';
        }
        if($request->sort == "間取りが狭い順") {
            $column = 'lowest_number_of_rooms';
        }
        if($request->sort == "間取りが広い順") {
            $column = 'highest_number_of_rooms';
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
        $address = $request->address;
        if(!empty($address)) {
            $query->where('pref', 'like',  '%' . addcslashes($address, '%_\\') . '%')
                ->orwhere('municipalities', 'like',  '%' . addcslashes($address, '%_\\') . '%');
        }
    }
    public function scopeWherePref($query, $request) {
        $pref = $request->pref;
        if(!empty($pref)) {
            for ($i = 0; $i < count($pref); $i++){
                $query->orwhere('pref', '=',  $pref[$i]);
            }
        }
    }
    public function scopeWhereMunicipalities($query, $request) {
        $municialities = $request->municipalities;
        if(!empty($municipalities)) {
            $query->where('municipalities', 'like',  '%' . addcslashes($municipalities, '%_\\') . '%');
        }
    }
    public function scopeWhereLowestPrice($query, $request) {
        $lowest_price = $request->lowest_price;
        if(!empty($lowest_price)) {
            $query->where('highest_price', '>=', (int)$lowest_price);
        }
    }
    public function scopeWhereHighestPrice($query, $request) {
        $highest_price = $request->highest_price;
        if(!empty($highest_price)) {
            $query->where('lowest_price', '<', (int)$highest_price);
        }
    }
    public function scopeWhereLowestLandArea($query, $request) {
        $lowest_land_area = $request->lowest_land_area;
        if(!empty($lowest_land_area)) {
            $query->where('highest_land_area', '>=', $lowest_land_area);
        }
    }
    public function scopeWhereHighestLandArea($query, $request) {
        $highest_land_area = $request->highest_land_area;
        if(!empty($highest_land_area)) {
            $query->where('lowest_land_area', '<', $highest_land_area);
        }
    }
    public function scopeWhereLowestBuildingArea($query, $request) {
        $lowest_building_area = $request->lowest_building_area;
        if(!empty($lowest_building_area)) {
            $query->where('highest_building_area', '>=', $lowest_building_area);
        }
    }
    public function scopeWhereHighestBuildingArea($query, $request) {
        $highest_building_area = $request->highest_building_area;
        if(!empty($highest_building_area)) {
            $query->where('lowest_building_area', '<', $highest_building_area);
        }
    }
    public function scopeWherePlan($query, $request) {
        $plan = $request->plan;
        if(!empty($plan)) {
            for ($i = 0; $i < count($plan); $i++){
                if($plan[$i] < 5) {
                    $query->orwhere('lowest_number_of_rooms', '=',  $plan[$i]);
                    $query->orwhere('highest_number_of_rooms', '=',  $plan[$i]);
                } else {
                    $query->orwhere('lowest_number_of_rooms', '>=',  5);
                    $query->orwhere('highestnumber_of_rooms', '>=',  5);
                }
            }
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

    // Relation
    public function updateNewDetachedHouseGroup($id, $request) {
        DB::transaction(function() use($id, $request) {
            $new_detached_house_group = NewDetachedHouseGroup::find($id);
            $new_detached_house_group->fill([
                'name' => $request->name,
                    'lowest_price' => $request->lowest_price,
                    'highest_price' => $request->highest_price,
                    'tax' => $request->tax,
                    'pref' => $request->pref,
                    'municipalities' => $request->municipalities,
                    'block' => $request->block,
                    'lowest_land_area' => $request->lowest_land_area,
                    'highest_land_area' => $request->highest_land_area,
                    'lowest_building_area' => $request->lowest_building_area,
                    'highest_building_area' => $request->highest_building_area,
                    'lowest_balcony_area' => $request->lowest_balcony_area,
                    'highest_balcony_area' => $request->highest_balcony_area,
                    'lowest_number_of_rooms' => $request->lowest_number_of_rooms,
                    'highest_number_of_rooms' => $request->highest_number_of_rooms,
                    'lowest_type_of_room' => $request->lowest_type_of_room,
                    'highest_type_of_room' => $request->highest_type_of_room,
                    'lowest_building_coverage_ratio' => $request->lowest_building_coverage_ratio,
                    'highest_building_coverage_ratio' => $request->highest_building_coverage_ratio,
                    'lowest_floor_area_ratio' => $request->lowest_floor_area_ratio,
                    'highest_floor_area_ratio' => $request->highest_floor_area_ratio,
                    'parking' => $request->parking,
                    'lowest_parking_lot' => $request->lowest_parking_lot,
                    'highest_parking_lot' => $request->highest_parking_lot,
                    'year' => $request->year,
                    'month' => $request->month,
                    'day' => $request->day,
                    'station' => $request->station,
                    'distance_station' => $request->distance_station,
                    'building_construction' => $request->building_construction,
                    'land_right' => $request->land_right,
                    'urban_planning' => $request->urban_planning,
                    'land_use_zonesv' => $request->land_use_zones,
                    'restrictions_by_law' => $request->restrictions_by_law,
                    'land_classification' => $request->land_classification,
                    'terrain' => $request->terrain,
                    'adjacent_roadv' => $request->adjacent_road,
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
            $new_detached_house_group->update();
            if(!empty($request->file('files'))) {
                foreach ($request->file('files') as $index => $e) {
                    $ext = $e['image']->guessExtension();
                    $file_name = "{$request->apartment_name}_{$index}.{$ext}";
                    $e['image']->storeAs('public/new_detached_house_images', $file_name);
                    $images = NewDetachedHouseImage::find($id);
                    $images->path = $file_name;
                    $images->new_detached_house_id = $new_detached_house->id;
                    $images->save();
                }
            }
        });
        return;
    }
    public function newDetachedHouseGroupImages() {
        return $this->hasMany(NewDetachedHouseGroupImage::class, 'new_detached_house_group_id', 'id');
    }
    public function recommends() {
        return $this->recommends(Recommend::class, 'mansion_id', 'id');
    }
}
