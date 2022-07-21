<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewDetachedHouseGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_detached_house_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('lowest_price');
            $table->integer('highest_price');
            $table->string('tax');
            $table->string('pref');
            $table->string('municipalities');
            $table->string('block')->nullable();
            $table->integer('lowest_number_of_rooms');
            $table->integer('highest_number_of_rooms');
            $table->string('lowest_type_of_room');
            $table->string('highest_type_of_room');
            $table->integer('lowest_land_area');
            $table->integer('highest_land_area');
            $table->integer('lowest_building_area');
            $table->integer('highest_building_area');
            $table->string('lowest_balcony_area')->nullable();
            $table->string('highest_balcony_area')->nullable();
            $table->integer('lowest_building_coverage_ratio');
            $table->integer('highest_building_coverage_ratio');
            $table->integer('lowest_floor_area_ratio');
            $table->integer('floor_area_ratio');
            $table->string('lowest_parking_lot')->nullable();
            $table->string('parking_lot')->nullable();
            $table->integer('year');
            $table->integer('month');
            $table->integer('day')->nullable();
            $table->string('station');
            $table->integer('walking_distance_station');
            $table->string('building_construction');
            $table->string('land_right');
            $table->integer('other_fee')->nullable();
            $table->string('urban_planning');
            $table->string('land_use_zones');
            $table->string('restrictions_by_law')->nullable();
            $table->string('land_classification');
            $table->string('terrain')->nullable();
            $table->string('adjacent_road');
            $table->integer('adjacent_road_width');
            $table->string('private_road');
            $table->string('setback');
            $table->string('water_supply');
            $table->string('sewage_line');
            $table->string('gas');
            $table->string('building_certification_number');
            $table->string('status');
            $table->string('delivery_date');
            $table->string('conditions_of_transactions');
            $table->string('elementary_school_name')->nullable();
            $table->integer('elementary_school_district')->nullable();
            $table->string('junior_high_school_name')->nullable();
            $table->integer('junior_high_school_district')->nullable();
            $table->string('terms_and_conditions')->nullable();
            $table->string('property_introduction')->nullable();
            $table->string('sales_comment')->nullable();
            $table->string('images')->nullable()->uniqid();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_detached_house_groups');
    }
}
