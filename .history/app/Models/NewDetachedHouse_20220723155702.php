<?php

namespace App\Models;

use App\Models\MyList;
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

    public function signUp($request) {
        DB::transaction(function() use($request) {
            $post = new NewDetachedHouse;
            $post->fill([
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
            $post->save();
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

    // Scope
    public function scopeWherePref($query, $pref) {
        if(!empty($request->pref)) {
            $query->Where(function ($request) use($pref) {
                for ($i = 0; $i < count($pref); $i++){
                    $query->where('pref', '=',  $pref[$i]);
                }
            });
        }
    }
    public function scopeWhereLowestPrice($query, $request) {
        if(!empty($request->lowest_price)) {
            $query->where('lowest_price', '=', $request->lowest_price);
        }
    }
    public function scopeWhereHighestPrice($query, $request) {
        if(!empty($request->highest_price)) {
            $query->where('highest_price', '=', $request->highest_price);
        }
    }

    // Relation
    public function myLists() {
        return $this->hasMany(MyList::class, 'new_detached_house_id', 'id');
    }
    public function newDetachedHouseImages() {
        return $this->hasMany(NewDetachedHouseImage::class, 'new_detached_house_id', 'id');
    }
}
