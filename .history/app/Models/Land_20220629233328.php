<?php

namespace App\Models;

use App\Models\MyList;
use App\Models\LandImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    protected $table = 'lands';

    protected $fillable = [
        'name',
        'price',
        'tax',
        'images',
        'pref',
        'municipalities',
        'construction_conditions',
        'land_area',
        'building_coverage_ratio',
        'floor_area_ratio',
        'station',
        'walking_distance_station',
        'land_right',
        'other_fee',
        'urban_planning',
        'land_use_zones',
        'restrictions_by_law',
        'national_land_utilization_law',
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

    }

    public function update($id, $request) {
        DB::transaction(function() use($id, $request) {
            $ex_land = land::find($id);
            $ex_land->name = $request->name;
            $ex_land->price = $request->price;
            $ex_land->tax = $request->tax;
            $ex_land->pref = $request->pref;
            $ex_land->municipalities = $request->municipalities;
            $ex_land->block = $request->block;
            $ex_land->land_area = $request->land_area;
            $ex_land->station = $request->station;
            $ex_land->walking_distance_station = $request->walking_distance_station;
            $ex_land->land_right = $request->land_right;
            $ex_land->land_use_zones = $request->land_use_zones;
            $ex_land->other_fee = $request->other_fee;
            $ex_land->status = $request->status;
            $ex_land->delivery_date = $request->delivery_date;
            $ex_land->property_introduction = $request->property_introduction;
            $ex_land->sales_comment = $request->sales_comment;
            $ex_land->elementary_school_name = $request->elementary_school_name;
            $ex_land->elementary_school_district = $request->elementary_school_district;
            $ex_land->junior_high_school_name = $request->junior_high_school_name;
            $ex_land->junior_high_school_district = $request->junior_high_school_district;
            $ex_land->terms_and_conditions = $request->terms_and_conditions;
            $ex_land->conditions_of_transactions = $request->conditions_of_transactions;
            $ex_land->save();
            if(!empty($request->file('files'))) {
                foreach ($request->file('files') as $index => $e) {
                    $ext = $e['image']->guessExtension();
                    $file_name = "{$request->name}_{$index}.{$ext}";
                    $e['image']->storeAs('public/land_images', $file_name);
                    $images = LandImage::find($id);
                    $images->path = $file_name;
                    $images->land_id = $land->id;
                    $images->save();
                }
                $ex_land->images = $file_name;
                $ex_land->save();
            }
        });
    }

    public function myLists() {
        return $this->hasMany(MyList::class, 'land_id', 'id');
    }

    public function landImages() {
        return $this->hasMany(LandImage::class, 'land_id', 'id');
    }
}
