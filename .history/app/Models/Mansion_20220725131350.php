<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\MyList;
use App\Models\MansionImage;
use Kyslik\ColumnSortable\Sortable;
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

    use Sortable;
    public $sortable = ['apartment_name', 'price', 'municipalities', 'walking_distance_station', 'number_of_rooms', 'occupation_area', 'floor', 'year', 'updated_at'];

    //Process
    public function signUp($request) {
        DB::transaction(function() use($request) {
            $mansion = new Mansion;
            $mansion->fill([
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
                'balcony' => $request->balcony,
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
            $mansion->save();

            for($i=1; $i<21; $i++) {
                if(!empty($request->file('image' . $i))) {
                    $ext = $e['image' . $i]->guessExtension();
                    $file_name = "{$mansion->apartment_name}{$mansion->room}_{$i}.{$ext}";
                    $e['image']->storeAs('/storage/mansion_images', $file_name);
                    $mansion_image = new MansionImage;
                    $mansion_image->fill([
                        'mansion_id' => $mansion->id,
                        'image_id' => $i,
                        'category' => input['category' . $i],
                        'comment' => input['comment' . $i],
                        'path' => $file_name,
                    ]);
                    $mansion_image->save();
                }
            }
        });
        return;
    }
    public function updateMansion($id, $request) {
        DB::transaction(function() use($id, $request) {
            $mansion = Mansion::find($id);
            $mansion->fill([
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
                'balcony' => $request->balcony,
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
            $mansion->save();

            if(!empty($request->file('files'))) {
                foreach ($request->file('files') as $index => $e) {
                    $ext = $e['image']->guessExtension();
                    $file_name = "{$request->apartment_name}{$request->room}_{$index}.{$ext}";
                    $e['image']->storeAs('/storage/mansion_images', $file_name);
                    $images = new MansionImage;
                    $images->path = $file_name;
                    $images->mansion_id = $mansion->id;
                    $images->save();
                }
            }
        });
        return;
    }
    public function updateMansionImage($id, $request) {
        DB::transaction(function() use ($id, $request) {
            $mansion = Mansion::find($request->mansion_id);
            $mansion_image = MansionImage::where('mansion_id', '=', $mansion->id)->where('image_id', '=', $id)->get();

            if(!empty($mansion_image)) {
                $mansion_image = new MansionImage;
            }

            if(Storage::exists('mansion_images/' . $mansion_image->path) && !empty($request->file('image'))) {
                Storage::delete('mansion_images/' . $mansion_image->path);
                $ext = $request->file('image')->guessExtension();
                $file_name = "{$mansion->apartment_name}{$mansion->room}_{$id}.{$ext}";
                $request->file('image')->storeAs('/storage/mansion_images/', $file_name);
                $mansion_image->path = $file_name;
            } else if (empty(Storage::exists('mansion_images' . $mansion_image->path)) && !empty($request->file('image'))) {
                $ext = $request->file('image')->guessExtension();
                $file_name = "{$mansion->apartment_name}{$mansion->room}_{$id}.{$ext}";
                $request->file('image')->storeAs('/storage/mansion_images/', $file_name);
                $mansion_image->path = $file_name;
            }

            $mansion_image->fill([
                'mansion_id' => $mansion->id,
                'image_id' => $id,
                'category' => $request->category,
                'comment' => $request->comment,
            ]);
            $mansion_image->save();
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
    public function scopeWhereMunicipalities($query, $municioalities) {
        if(!empty($municipalities)) {
            $query->where('municipalities', '=', $municipalities);
        }
    }
    public function scopeWhereApartmentName($query, $apartment_name) {
        if(!empty($apartment_name) {
            $query()
        })
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
    public function scopeWhereLowestOccupationArea($query, $lowest_occupation_area) {
        if(!empty($lowest_occupation_area)) {
            $query->where('occupation_area', '>=', $lowest_occupation_area);
        }
    }
    public function scopeWhereHighestOccupationArea($query, $hihghest_occupation_area) {
        if(!empty($highest_occupation_area)) {
            $query->where('occupation_area', '<=', $highest_occupation_area);
        }
    }
    public function scopeWherePlan($query, $plan) {
        if(!empty($plan)) {
            for ($i = 0; $i < count($plan); $i++){
                $query->orwhere('number_of_rooms', '=',  $plan[$i]);
            }
        }
    }
    public function scopeWhereOld($query, $old) {
        if(!empty($years_ago)) {
            $old = Carbon::today()->subYear($years_ago);
            $query->where('year', '<=', $old);
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

    //Relation
    public function myLists() {
        return $this->hasMany(MyList::class, 'mansion_id', 'id');
    }
    public function mansionImages() {
        return $this->hasMany(MansionImage::class, 'mansion_id', 'id');
    }
}
