<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\MyList;
use App\Models\Recommend;
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

    //Process
    public function mansionSignUp($request) {
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
                'direction' => $request->direction,
                'balcony' => $request->balcony,
                'balcony_area' => $request->balcony_area,
                'parking_lot' => $request->parking_lot,
                'floor' => $request->floor,
                'story' => $request->story,
                'year' => $request->year,
                'month' => $request->month,
                'day' => $request->day,
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

            $image_counter = 1;
            for($i=1; $i<21; $i++) {
                if(!empty($request->file('image' . $i))) {
                    $extension = $request->file('image' . $i)->guessExtension();
                    $file_name = "No{$mansion->id}_{$image_counter}.{$extension}";
                    $request->file('image' . $i)->storeAs('/storage/mansion_images', $file_name);
                    $mansion_image = new MansionImage;
                    $mansion_image->fill([
                        'mansion_id' => $mansion->id,
                        'image_id' => $image_counter,
                        'category' => $request->input('category' . $i),
                        'comment' => $request->input('comment' . $i),
                        'path' => $file_name,
                    ]);
                    $mansion_image->save();
                    $image_counter++;
                }
            }
        });
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
            $mansion->update();
        });
    }
    public function recommend($id) {
        DB::transaction(function() use($id) {
            $mansion = Mansion::find($id);
            $recommend = new Recommend;
            $recommend->mansion_id = $mansion->id;
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
    public function scopeWhereApartmentName($query, $request) {
        $apartment_name = $request->apartment_name ?? '';
        if(!empty($apartment_name)) {
            $query->where('apartmnet_name', 'like',  '%' . addcslashes($apartment_name, '%_\\') . '%');
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
    public function scopeWhereLowestOccupationArea($query, $request) {
        $lowest_occupation_area = $request->lowest_occupation_area;
        if(!empty($lowest_occupation_area)) {
            $query->where('occupation_area', '>=', (int)$lowest_occupation_area);
        }
    }
    public function scopeWhereHighestOccupationArea($query, $request) {
        $highest_occupation_area = $request->highest_occupation_area;
        if(!empty($highest_occupation_area)) {
            $query->where('occupation_area', '<', (int)$highest_occupation_area);
        }
    }
    public function scopeWherePlan($query, $request) {
        $plan = $request->plan;
        if(!empty($plan)) {
            for ($i = 0; $i < count($plan); $i++){
                if($plan = 5)
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
    public function scopeWhereOld($query, $request) {
        $old = $request->old;
        if(!empty($old)) {
            $years_ago = Carbon::today()->year - $old;
            $query->where('year', '>=', $years_ago);
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

    //Relation
    public function myLists() {
        return $this->hasMany(MyList::class, 'mansion_id', 'id');
    }
    public function mansionImages() {
        return $this->hasMany(MansionImage::class, 'mansion_id', 'id');
    }
    public function recommends() {
        return $this->recommends(Recommend::class, 'mansion_id', 'id');
    }
}

