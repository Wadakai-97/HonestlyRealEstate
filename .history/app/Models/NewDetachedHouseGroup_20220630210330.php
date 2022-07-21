<?php

namespace App\Models;

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
        'lowest_parking_lot',
        'highest_parking_lot',
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

    public function signUp() {

    }

    public function updateNewDetachedHouseGroup() {
        DB::transaction(function() use($id, $request) {
            $new_detached_house_group = NewDetachedHouseGroup::find($id);
            $new_detached_house_group->fill([
                'name' => $request->name,
                    'lowest_price' => $request->lowest_price;
                    'highest_price' => $request->highest_price;
                    'tax' => $request->tax;
                    'pref' => $request->pref;
                    'municipalities' => $request->municipalities;
                    'block' => $request->block;
                    'lowest_land_area' => $request->lowest_land_area;
                    'highest_land_area' => $request->highest_land_area;
                    'lowest_building_area' => $request->lowest_building_area;
                    'highest_building_area' => $request->highest_building_area;
                    'lowest_balcony_area' => $request->lowest_balcony_area;
                    'highest_balcony_area' => $request->highest_balcony_area;
                    'lowest_number_of_rooms' => $request->lowest_number_of_rooms;
                    'highest_number_of_rooms' => $request->highest_number_of_rooms;
                    'lowest_type_of_room' => $request->lowest_type_of_room;
                    'highest_type_of_room' => $request->highest_type_of_room;
                    'lowest_building_coverage_ratio' => $request->lowest_building_coverage_ratio;
                    'highest_building_coverage_ratio' => $request->highest_building_coverage_ratio;
                    'lowest_floor_area_ratio' => $request->lowest_floor_area_ratio;
                    'highest_floor_area_ratio' => $request->highest_floor_area_ratio;
                    'lowest_parking_lot' => $request->lowest_parking_lot;
                    'highest_parking_lot' => $request->highest_parking_lot;
                    'year' => $request->year;
                    'month' => $request->month;
                    'day' => $request->day;
                    'station' = $request->station;
                    'walking_distance_station' = $request->walking_distance_station;
                    'building_construction' = $request->building_construction;
                    'land_right' = $request->land_right;
                    'urban_planning' = $request->urban_planning;
                    'land_use_zonesv' = $request->land_use_zones;
                    'restrictions_by_law' = $request->restrictions_by_law;
                    'land_classification' = $request->land_classification;
                    'terrain' = $request->terrain;
                    'adjacent_roadv' = $request->adjacent_road;
                    'adjacent_road_width' = $request->adjacent_road_width;
                    'private_road' = $request->private_road;
                    'setback' = $request->setback;
                    'water_supply' = $request->water_supply;
                    'sewage_line' = $request->sewage_line;
                    'gas' = $request->gas;
                    'building_certification_number' = $request->building_certification_number;
                    'other_fee' = $request->other_fee;
                    'status' = $request->status;
                    'delivery_date' = $request->delivery_date;
                    'property_introduction' = $request->property_introduction;
                    'sales_comment' = $request->sales_comment;
                    'elementary_school_name' = $request->elementary_school_name;
                    'elementary_school_district' = $request->elementary_school_district;
                    'junior_high_school_name' = $request->junior_high_school_name;
                    'junior_high_school_district' = $request->junior_high_school_district;
                    'terms_and_conditions' = $request->terms_and_conditions;
                    'conditions_of_transactions' = $request->conditions_of_transactions;
            ]);
            $new_detached_house_group->save();
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
                $new_detached_house_group->images = $file_name;
                $new_detached_house_group->save();
            }
        });
        return;
    }

    public function newDetachedHouseGroupImages() {
        return $this->hasMany(NewDetachedHouseGroupImage::class, 'new_detached_house_group_id', 'id');
    }
}
