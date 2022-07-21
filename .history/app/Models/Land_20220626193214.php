<?php

namespace App\Models;

use App\Models\MyList;
use App\Models\LandImage;
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

    public function myLists() {
        return $this->hasMany(MyList::class, 'land_id', 'id');
    }

    public function landImages() {
        return $this->hasMany(LandImage::class, 'land_id', 'id');
    }
}
