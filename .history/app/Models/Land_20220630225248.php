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
        DB::transaction(function() use($request) {
            $post = new land;
            $post->fill([
                'name' => $request->name,
                'price' = $request->price,
                'tax' = $request->tax,
                'pref' = $request->pref,
                'municipalities' = $request->municipalities,
                'block' = $request->block,
                'land_area' = $request->land_area,
                'station' = $request->station,
                'walking_distance_station' = $request->walking_distance_station,
                'land_right' = $request->land_right,
                'land_use_zones' = $request->land_use_zones,
                'other_fee' = $request->other_fee,
                'status' = $request->status,
                'delivery_date' = $request->delivery_date,
                'property_introduction' = $request->property_introduction,
                'sales_comment' = $request->sales_comment,
                'elementary_school_name' = $request->elementary_school_name,
                'elementary_school_district' = $request->elementary_school_district,
                'junior_high_school_name' = $request->junior_high_school_name,
                'junior_high_school_district' = $request->junior_high_school_district,
                'terms_and_conditions' = $request->terms_and_conditions,
                'conditions_of_transactions' = $request->conditions_of_transactions,
            ]);

            $post->update();
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
                $post->images = $file_name;
                $post->update();
            }
        });
        return;
    }

    public function updateLand($id, $request) {
        DB::transaction(function() use($id, $request) {
            $land = land::find($id);
            $land->name = $request->name;
            $land->price = $request->price;
            $land->tax = $request->tax;
            $land->pref = $request->pref;
            $land->municipalities = $request->municipalities;
            $land->block = $request->block;
            $land->land_area = $request->land_area;
            $land->station = $request->station;
            $land->walking_distance_station = $request->walking_distance_station;
            $land->land_right = $request->land_right;
            $land->land_use_zones = $request->land_use_zones;
            $land->other_fee = $request->other_fee;
            $land->status = $request->status;
            $land->delivery_date = $request->delivery_date;
            $land->property_introduction = $request->property_introduction;
            $land->sales_comment = $request->sales_comment;
            $land->elementary_school_name = $request->elementary_school_name;
            $land->elementary_school_district = $request->elementary_school_district;
            $land->junior_high_school_name = $request->junior_high_school_name;
            $land->junior_high_school_district = $request->junior_high_school_district;
            $land->terms_and_conditions = $request->terms_and_conditions;
            $land->conditions_of_transactions = $request->conditions_of_transactions;
            $land->update();
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
                $land->images = $file_name;
                $land->update();
            }
        });
        return;
    }

    public function myLists() {
        return $this->hasMany(MyList::class, 'land_id', 'id');
    }

    public function landImages() {
        return $this->hasMany(LandImage::class, 'land_id', 'id');
    }
}
