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

    public function signUpOld() {
        DB::transaction(function() use($id, $request) {
            $ex_old_detached_house = OldDetachedHouse::find($id);
            $ex_old_detached_house->name = $request->name;
            $ex_old_detached_house->price = $request->price;
            $ex_old_detached_house->tax = $request->tax;
            $ex_old_detached_house->pref = $request->pref;
            $ex_old_detached_house->municipalities = $request->municipalities;
            $ex_old_detached_house->block = $request->block;
            $ex_old_detached_house->land_area = $request->land_area;
            $ex_old_detached_house->building_area = $request->building_area;
            $ex_old_detached_house->balcony_area = $request->balcony_area;
            $ex_old_detached_house->number_of_rooms = $request->number_of_rooms;
            $ex_old_detached_house->type_of_room = $request->type_of_room;
            $ex_old_detached_house->building_coverage_ratio = $request->building_coverage_ratio;
            $ex_old_detached_house->floor_area_ratio = $request->floor_area_ratio;
            $ex_old_detached_house->parking_lot = $request->parking_lot;
            $ex_old_detached_house->year = $request->year;
            $ex_old_detached_house->month = $request->month;
            $ex_old_detached_house->day = $request->day;
            $ex_old_detached_house->station = $request->station;
            $ex_old_detached_house->walking_distance_station = $request->walking_distance_station;
            $ex_old_detached_house->building_construction = $request->building_construction;
            $ex_old_detached_house->land_right = $request->land_right;
            $ex_old_detached_house->urban_planning = $request->urban_planning;
            $ex_old_detached_house->land_use_zones = $request->land_use_zones;
            $ex_old_detached_house->restrictions_by_law = $request->restrictions_by_law;
            $ex_old_detached_house->land_classification = $request->land_classification;
            $ex_old_detached_house->terrain = $request->terrain;
            $ex_old_detached_house->adjacent_road = $request->adjacent_road;
            $ex_old_detached_house->adjacent_road_width = $request->adjacent_road_width;
            $ex_old_detached_house->private_road = $request->private_road;
            $ex_old_detached_house->setback = $request->setback;
            $ex_old_detached_house->water_supply = $request->water_supply;
            $ex_old_detached_house->sewage_line = $request->sewage_line;
            $ex_old_detached_house->gas = $request->gas;
            $ex_old_detached_house->building_certification_number = $request->building_certification_number;
            $ex_old_detached_house->other_fee = $request->other_fee;
            $ex_old_detached_house->status = $request->status;
            $ex_old_detached_house->delivery_date = $request->delivery_date;
            $ex_old_detached_house->property_introduction = $request->property_introduction;
            $ex_old_detached_house->sales_comment = $request->sales_comment;
            $ex_old_detached_house->elementary_school_name = $request->elementary_school_name;
            $ex_old_detached_house->elementary_school_district = $request->elementary_school_district;
            $ex_old_detached_house->junior_high_school_name = $request->junior_high_school_name;
            $ex_old_detached_house->junior_high_school_district = $request->junior_high_school_district;
            $ex_old_detached_house->terms_and_conditions = $request->terms_and_conditions;
            $ex_old_detached_house->conditions_of_transactions = $request->conditions_of_transactions;
            $ex_old_detached_house->save();
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
                $ex_old_detached_house->images = $file_name;
                $ex_old_detached_house->save();
            }
        });
        $old_detached_house = OldDetachedHouse::find($id);
        $request->session()->regenerateToken();
        Session::flash('message', '編集内容を登録しました。');
        return view('admin.old_detached_house.edit', compact('old_detached_house'));
    }

    public function myLists() {
        return $this->hasMany(MyList::class, 'old_detached_house_id', 'id');
    }

    public function oldDetachedHouseImages() {
        return $this->hasMany(OldDetachedHouseImage::class, 'old_detached_house_id', 'id');
    }
}
