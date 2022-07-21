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

    public function myLists() {
        return $this->hasMany(MyList::class, 'mansion_id', 'id');
    }

    public function mansionImages() {
        return $this->hasMany(MansionImage::class, 'mansion_id', 'id');
    }
}
