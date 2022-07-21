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

            ]);

            $new_detached_house_group->lowest_price = $request->lowest_price;
            $new_detached_house_group->highest_price = $request->highest_price;
            $new_detached_house_group->tax = $request->tax;
            $new_detached_house_group->pref = $request->pref;
            $new_detached_house_group->municipalities = $request->municipalities;
            $new_detached_house_group->block = $request->block;
            $new_detached_house_group->lowest_land_area = $request->lowest_land_area;
            $new_detached_house_group->highest_land_area = $request->highest_land_area;
            $new_detached_house_group->lowest_building_area = $request->lowest_building_area;
            $new_detached_house_group->highest_building_area = $request->highest_building_area;
            $new_detached_house_group->lowest_balcony_area = $request->lowest_balcony_area;
            $new_detached_house_group->highest_balcony_area = $request->highest_balcony_area;
            $new_detached_house_group->lowest_number_of_rooms = $request->lowest_number_of_rooms;
            $new_detached_house_group->highest_number_of_rooms = $request->highest_number_of_rooms;
            $new_detached_house_group->lowest_type_of_room = $request->lowest_type_of_room;
            $new_detached_house_group->highest_type_of_room = $request->highest_type_of_room;
            $new_detached_house_group->lowest_building_coverage_ratio = $request->lowest_building_coverage_ratio;
            $new_detached_house_group->highest_building_coverage_ratio = $request->highest_building_coverage_ratio;
            $new_detached_house_group->lowest_floor_area_ratio = $request->lowest_floor_area_ratio;
            $new_detached_house_group->highest_floor_area_ratio = $request->highest_floor_area_ratio;
            $new_detached_house_group->lowest_parking_lot = $request->lowest_parking_lot;
            $new_detached_house_group->highest_parking_lot = $request->highest_parking_lot;
            $new_detached_house_group->year = $request->year;
            $new_detached_house_group->month = $request->month;
            $new_detached_house_group->day = $request->day;
            $new_detached_house_group->station = $request->station;
            $new_detached_house_group->walking_distance_station = $request->walking_distance_station;
            $new_detached_house_group->building_construction = $request->building_construction;
            $new_detached_house_group->land_right = $request->land_right;
            $new_detached_house_group->urban_planning = $request->urban_planning;
            $new_detached_house_group->land_use_zones = $request->land_use_zones;
            $new_detached_house_group->restrictions_by_law = $request->restrictions_by_law;
            $new_detached_house_group->land_classification = $request->land_classification;
            $new_detached_house_group->terrain = $request->terrain;
            $new_detached_house_group->adjacent_road = $request->adjacent_road;
            $new_detached_house_group->adjacent_road_width = $request->adjacent_road_width;
            $new_detached_house_group->private_road = $request->private_road;
            $new_detached_house_group->setback = $request->setback;
            $new_detached_house_group->water_supply = $request->water_supply;
            $new_detached_house_group->sewage_line = $request->sewage_line;
            $new_detached_house_group->gas = $request->gas;
            $new_detached_house_group->building_certification_number = $request->building_certification_number;
            $new_detached_house_group->other_fee = $request->other_fee;
            $new_detached_house_group->status = $request->status;
            $new_detached_house_group->delivery_date = $request->delivery_date;
            $new_detached_house_group->property_introduction = $request->property_introduction;
            $new_detached_house_group->sales_comment = $request->sales_comment;
            $new_detached_house_group->elementary_school_name = $request->elementary_school_name;
            $new_detached_house_group->elementary_school_district = $request->elementary_school_district;
            $new_detached_house_group->junior_high_school_name = $request->junior_high_school_name;
            $new_detached_house_group->junior_high_school_district = $request->junior_high_school_district;
            $new_detached_house_group->terms_and_conditions = $request->terms_and_conditions;
            $new_detached_house_group->conditions_of_transactions = $request->conditions_of_transactions;
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
