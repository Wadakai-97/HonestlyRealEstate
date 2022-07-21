<?php

namespace App\Models;

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

    public function newDetachedHouseGroupImages() {
        return $this->hasMany(NewDetachedHouseGroupImage::class, 'new_detached_house_group_id', 'id');
    }
}
