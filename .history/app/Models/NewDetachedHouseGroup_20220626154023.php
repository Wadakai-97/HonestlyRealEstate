<?php

namespace App\;

use Illuminate\Database\Eloquent\Model;

class NewDetachedHouseGroup extends Model
{
    protected $table = 'new_detached_house_groups';

    protected $fillable = [
        'name',
        'price',
        'price',
        'tax',
        'images',
        'pref',
        'municipalities',
        'block',
        'number_of_rooms',
        'number_of_rooms',
        'type_of_room',
        'type_of_room',
        'land_area',
        'land_area',
        'building_area',
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
}
