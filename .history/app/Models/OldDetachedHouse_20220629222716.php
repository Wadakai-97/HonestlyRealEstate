<?php

namespace App\Models;

use App\Models\MyList;
use Illuminate\Support\Facades\DB;
use App\Models\OldDetachedHouseImage;
use Illuminate\Database\Eloquent\Model;

class OldDetachedHouse extends Model
{
    protected $table = 'old_detached_houses';

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

    public function signUp() {
        DB::transaction(function() use($request) {
            $post = new OldDetachedHouse;
            $post->fill([
                'price' => $request->price,
                'tax' = $request->tax,
                'pref' = $request->pref,
                'municipalities' = $request->municipalities,
                'block' = $request->block,
                'land_area' = $request->land_area,
                'building_area' = $request->building_area,
                'balcony_area' = $request->balcony_area,
                'number_of_rooms' = $request->number_of_rooms,
                'type_of_room' = $request->type_of_room,
                'building_coverage_ratio' = $request->building_coverage_ratio,
                'floor_area_ratio' = $request->floor_area_ratio,
                'parking_lot' = $request->parking_lot,
                'year' = $request->year,
                'month' = $request->month,
                'day' = $request->day,
                'station' = $request->station,
                'walking_distance_station' = $request->walking_distance_station,
                'building_construction' = $request->building_construction,
                'land_right' = $request->land_right,
                'urban_planning' = $request->urban_planning,
                'land_use_zones' = $request->land_use_zones,
                'restrictions_by_law' = $request->restrictions_by_law,
                'land_classification' = $request->land_classification,
                'terrain' = $request->terrain,
                'adjacent_road' = $request->adjacent_road,
                'adjacent_road_width = $request->adjacent_road_width,
                'private_road = $request->private_road,
                'setback = $request->setback,
                'water_supply = $request->water_supply,
                'sewage_line = $request->sewage_line,
                'gas = $request->gas,
                'building_certification_number = $request->building_certification_number,
                'other_fee = $request->other_fee,
                'status = $request->status,
                'delivery_date = $request->delivery_date,
                'property_introduction = $request->property_introduction,
                'sales_comment = $request->sales_comment,
                'elementary_school_name = $request->elementary_school_name,
                'elementary_school_district = $request->elementary_school_district,
                'junior_high_school_name = $request->junior_high_school_name,
                'junior_high_school_district = $request->junior_high_school_district,
                'terms_and_conditions = $request->terms_and_conditions,
                'conditions_of_transactions = $request->conditions_of_transactions,
            ]);

            name = $request->name;

            $post->save();
            if(!empty($request->file('files'))) {
                foreach ($request->file('files') as $index => $e) {
                    $ext = $e['image']->guessExtension();
                    $file_name = "{$request->apartment_name}_{$index}.{$ext}";
                    $e['image']->storeAs('public/old_detached_house_images', $file_name);
                    $images = OldDetachedHouseImage::find($id);
                    $images->path = $file_name;
                    $images->old_detached_house_id = $old_detached_house->id;
                    $images->save();
                }
                $post->images = $file_name;
                $post->save();
            }
        });
        return;
    }

    public function update($id, $request) {
        DB::transaction(function() use($id, $request) {
            $old_detached_house = OldDetachedHouse::find($id);
            $old_detached_house->name = $request->name;
            $old_detached_house->price = $request->price;
            $old_detached_house->tax = $request->tax;
            $old_detached_house->pref = $request->pref;
            $old_detached_house->municipalities = $request->municipalities;
            $old_detached_house->block = $request->block;
            $old_detached_house->land_area = $request->land_area;
            $old_detached_house->building_area = $request->building_area;
            $old_detached_house->balcony_area = $request->balcony_area;
            $old_detached_house->number_of_rooms = $request->number_of_rooms;
            $old_detached_house->type_of_room = $request->type_of_room;
            $old_detached_house->building_coverage_ratio = $request->building_coverage_ratio;
            $old_detached_house->floor_area_ratio = $request->floor_area_ratio;
            $old_detached_house->parking_lot = $request->parking_lot;
            $old_detached_house->year = $request->year;
            $old_detached_house->month = $request->month;
            $old_detached_house->day = $request->day;
            $old_detached_house->station = $request->station;
            $old_detached_house->walking_distance_station = $request->walking_distance_station;
            $old_detached_house->building_construction = $request->building_construction;
            $old_detached_house->land_right = $request->land_right;
            $old_detached_house->urban_planning = $request->urban_planning;
            $old_detached_house->land_use_zones = $request->land_use_zones;
            $old_detached_house->restrictions_by_law = $request->restrictions_by_law;
            $old_detached_house->land_classification = $request->land_classification;
            $old_detached_house->terrain = $request->terrain;
            $old_detached_house->adjacent_road = $request->adjacent_road;
            $old_detached_house->adjacent_road_width = $request->adjacent_road_width;
            $old_detached_house->private_road = $request->private_road;
            $old_detached_house->setback = $request->setback;
            $old_detached_house->water_supply = $request->water_supply;
            $old_detached_house->sewage_line = $request->sewage_line;
            $old_detached_house->gas = $request->gas;
            $old_detached_house->building_certification_number = $request->building_certification_number;
            $old_detached_house->other_fee = $request->other_fee;
            $old_detached_house->status = $request->status;
            $old_detached_house->delivery_date = $request->delivery_date;
            $old_detached_house->property_introduction = $request->property_introduction;
            $old_detached_house->sales_comment = $request->sales_comment;
            $old_detached_house->elementary_school_name = $request->elementary_school_name;
            $old_detached_house->elementary_school_district = $request->elementary_school_district;
            $old_detached_house->junior_high_school_name = $request->junior_high_school_name;
            $old_detached_house->junior_high_school_district = $request->junior_high_school_district;
            $old_detached_house->terms_and_conditions = $request->terms_and_conditions;
            $old_detached_house->conditions_of_transactions = $request->conditions_of_transactions;
            $old_detached_house->save();
            if(!empty($request->file('files'))) {
                foreach ($request->file('files') as $index => $e) {
                    $ext = $e['image']->guessExtension();
                    $file_name = "{$request->apartment_name}_{$index}.{$ext}";
                    $e['image']->storeAs('public/old_detached_house_images', $file_name);
                    $images = OldDetachedHouseImage::find($id);
                    $images->path = $file_name;
                    $images->old_detached_house_id = $old_detached_house->id;
                    $images->save();
                }
                $old_detached_house->images = $file_name;
                $old_detached_house->save();
            }
        });
        return;
    }

    public function myLists() {
        return $this->hasMany(MyList::class, 'old_detached_house_id', 'id');
    }

    public function oldDetachedHouseImages() {
        return $this->hasMany(OldDetachedHouseImage::class, 'old_detached_house_id', 'id');
    }
}
