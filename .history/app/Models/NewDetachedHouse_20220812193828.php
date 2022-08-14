<?php

namespace App\Models;

use App\Models\MyList;
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
        'images',
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
        'parking_lot',
        'floor',
        'year',
        'month',
        'day',
        'station',
        'walking_distance_station',
        'building_construction',
        'land_right',
        'other_fee',
        'urban_planning',
        'land_use_zones',
        'restrictions_by_law',
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
                'parking_lot' => $request->parking_lot,
                'year' => $request->year,
                'month' => $request->month,
                'day' => $request->day,
                'station' => $request->station,
                'walking_distance_station' => $request->walking_distance_station,
                'building_construction' => $request->building_construction,
                'land_right' => $request->land_right,
                'urban_planning' => $request->urban_planning,
                'land_use_zones' => $request->land_use_zones,
                'restrictions_by_law' => $request->restrictions_by_law,
                'land_classification' => $request->land_classification,
                'terrain' => $request->terrain,
                'adjacent_road' => $request->adjacent_road,
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
                    $request->file('image' . $i)->storeAs('/storage/new_detached_house_images', $file_name);
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
                'land_area' => $request->land_area,
                'building_area' => $request->building_area,
                'balcony_area' => $request->balcony_area,
                'number_of_rooms' => $request->number_of_rooms,
                'type_of_room' => $request->type_of_room,
                'building_coverage_ratio' => $request->building_coverage_ratio,
                'floor_area_ratio' => $request->floor_area_ratio,
                'parking_lot' => $request->parking_lot,
                'year' => $request->year,
                'month' => $request->month,
                'day' => $request->day,
                'station' => $request->station,
                'walking_distance_station' => $request->walking_distance_station,
                'building_construction' => $request->building_construction,
                'land_right' => $request->land_right,
                'urban_planning' => $request->urban_planning,
                'land_use_zones' => $request->land_use_zones,
                'restrictions_by_law' => $request->restrictions_by_law,
                'land_classification' => $request->land_classification,
                'terrain' => $request->terrain,
                'adjacent_road' => $request->adjacent_road,
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

            if(!empty($request->file('files'))) {
                foreach ($request->file('files') as $index => $e) {
                    $ext = $e['image']->guessExtension();
                    $file_name = "{$request->name}_{$index}.{$ext}";
                    $e['image']->storeAs('public/new_detached_house_images', $file_name);
                    $images = new NewDetachedHouseImage;
                    $images->path = $file_name;
                    $images->new_detached_house_id = $post->id;
                    $images->save();
                }
            }
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
                $query->orwhere('number_of_rooms', '=',  $plan[$i]);
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
    public function scopeWhereWalkingDistanceStation($query, $request) {
        $walking_distance_station = $request->walking_distance_station;
        if(!empty($walking_distance_station)) {
            $query->where('walking_distance_station', '<=', $walking_distance_station);
        }
    }
    public function scopeWhereLandRight($query, $request) {
        $land_right = $request->land_right;
        if(!empty($land_right)) {
            $query->where('land_right', '=', $land_right);
        }
    }

    // Relation
    public function myLists() {
        return $this->hasMany(MyList::class, 'new_detached_house_id', 'id');
    }
    public function newDetachedHouseImages() {
        return $this->hasMany(NewDetachedHouseImage::class, 'new_detached_house_id', 'id');
    }
    public function recommends() {
        return $this->recommends(Recommend::class, 'mansion_id', 'id');
    }
}
