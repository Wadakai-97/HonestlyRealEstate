<?php

namespace App\Models;

use App\Models\MyList;
use App\Models\MansionImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Mansion extends Model
{
    protected $table = 'mansions';

    protected $fillable = [
        'apartment_name',
        'room',
        'price',
        'tax',
        'pref',
        'municipalities',
        'block',
        'land_area',
        'building_area',
        'number_of_rooms',
        'type_of_room',
        'measuring_method',
        'occupation_area',
        'balcony',
        'balcony_area',
        'parking_lot',
        'floor',
        'story',
        'year',
        'month',
        'day',
        'direction',
        'station',
        'walking_distance_station',
        'building_construction',
        'total_number_of_households',
        'land_right',
        'land_use_zones',
        'management_company',
        'management_system',
        'maintenance_fee',
        'reserve_fund_for_repair',
        'other_fee',
        'status',
        'delivery_date',
        'conditions_of_transactions',
        'images',
        'elementary_school_name',
        'elementary_school_district',
        'junior_high_school_name',
        'junior_high_school_district',
        'terms_and_conditions',
        'property_introduction',
        'sales_comment',
        'created_at',
        'updated_at',
    ];

    public function signUp($request) {
        DB::transaction(function() use($request) {
            $post = new Mansion;
            $post->fill([
                'apartment_name' => $request->apartment_name,
                'room' => $request->room,
                'price' => $request->price,
                'tax' => $request->tax,
                'pref' => $request->pref,
                'municipalities' => $request->municipalities,
                'block' => $request->block,
                'land_area' => $request->land_area,
                'building_area' => $request->building_area,
                'number_of_rooms' => $request->number_of_rooms,
                'type_of_room' => $request->type_of_room,
                'measuring_method' => $request->measuring_method,
                'occupation_area' => $request->occupation_area,
                'balcony_area' => $request->balcony_area,
                'parking_lot' => $request->parking_lot,
                'floor' => $request->floor,
                'story' => $request->story,
                'year' => $request->year,
                'month' => $request->month,
                'day' => $request->day,
                'direction' => $request->direction,
                'station' => $request->station,
                'walking_distance_station' => $request->walking_distance_station,
                'building_construction' => $request->building_construction,
                'total_number_of_households' => $request->total_number_of_households,
                'land_right' => $request->land_right,
                'land_use_zones' => $request->land_use_zones,
                'management_company' => $request->management_company,
                'management_system' => $request->management_system,
                'maintenance_fee' => $request->maintenance_fee,
                'reserve_fund_for_repair' => $request->reserve_fund_for_repair,
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
                    $file_name = "{$request->apartment_name}_{$index}.{$ext}";
                    // $path = $e['image']->storeAs('public/mansion_images', $file_name);
                    $e['image']->storeAs('public/mansion_images', $file_name);
                    $images = new MansionImage;
                    $images->path = $file_name;
                    $images->mansion_id = $post->id;
                    $images->save();
                }
                $post->images = $file_name;
                $post->save();
            }
        });
        return;
    }

    public function update() {
        DB::transaction(function() use($id, $request) {
            $mansion = Mansion::find($id);
            $mansion->apartment_name = $request->apartment_name;
            $mansion->room = $request->room;
            $mansion->price = $request->price;
            $mansion->tax = $request->tax;
            $mansion->pref = $request->pref;
            $mansion->municipalities = $request->municipalities;
            $mansion->block = $request->block;
            $mansion->land_area = $request->land_area;
            $mansion->building_area = $request->building_area;
            $mansion->number_of_rooms = $request->number_of_rooms;
            $mansion->type_of_room = $request->type_of_room;
            $mansion->measuring_method = $request->measuring_method;
            $mansion->occupation_area = $request->occupation_area;
            $mansion->balcony_area = $request->balcony_area;
            $mansion->parking_lot = $request->parking_lot;
            $mansion->floor = $request->floor;
            $mansion->story = $request->story;
            $mansion->year = $request->year;
            $mansion->month = $request->month;
            $mansion->day = $request->day;
            $mansion->direction = $request->direction;
            $mansion->station = $request->station;
            $mansion->walking_distance_station = $request->walking_distance_station;
            $mansion->building_construction = $request->building_construction;
            $mansion->total_number_of_households = $request->total_number_of_households;
            $mansion->land_right = $request->land_right;
            $mansion->land_use_zones = $request->land_use_zones;
            $mansion->management_company = $request->management_company;
            $mansion->management_system = $request->management_system;
            $mansion->maintenance_fee = $request->maintenance_fee;
            $mansion->reserve_fund_for_repair = $request->reserve_fund_for_repair;
            $mansion->other_fee = $request->other_fee;
            $mansion->status = $request->status;
            $mansion->delivery_date = $request->delivery_date;
            $mansion->property_introduction = $request->property_introduction;
            $mansion->sales_comment = $request->sales_comment;
            $mansion->elementary_school_name = $request->elementary_school_name;
            $mansion->elementary_school_district = $request->elementary_school_district;
            $mansion->junior_high_school_name = $request->junior_high_school_name;
            $mansion->junior_high_school_district = $request->junior_high_school_district;
            $mansion->terms_and_conditions = $request->terms_and_conditions;
            $mansion->conditions_of_transactions = $request->conditions_of_transactions;
            $mansion->save();
            if(!empty($request->file('files'))) {
                foreach ($request->file('files') as $index => $e) {
                    $ext = $e['image']->guessExtension();
                    $file_name = "{$request->apartment_name}_{$index}.{$ext}";
                    $e['image']->storeAs('public/mansion_images', $file_name);
                    $images = MansionImage::find($id);
                    $images->path = $file_name;
                    $images->mansion_id = $mansion->id;
                    $images->save();
                }
                $mansion->images = $file_name;
                $mansion->save();
            }
        });
    }

    public function myLists() {
        return $this->hasMany(MyList::class, 'mansion_id', 'id');
    }

    public function mansionImages() {
        return $this->hasMany(MansionImage::class, 'mansion_id', 'id');
    }
}
