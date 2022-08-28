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
            $table->bigIncrements('id')->comment('');
            $table->string('name')->comment('');
            $table->string('lowest_price')->comment('');
            $table->string('highest_price')->comment('');
            $table->string('tax')->comment('');
            $table->string('pref')->comment('');
            $table->string('municipalities')->comment('');
            $table->string('block')->nullable()->comment('');
            $table->integer('lowest_number_of_rooms')->comment('');
            $table->integer('highest_number_of_rooms')->comment('');
            $table->string('lowest_type_of_room')->comment('');
            $table->string('highest_type_of_room')->comment('');
            $table->integer('lowest_land_area')->comment('');
            $table->integer('highest_land_area')->comment('');
            $table->integer('lowest_building_area')->comment('');
            $table->integer('highest_building_area')->comment('');
            $table->string('balcony')->comment('');
            $table->integer('lowest_balcony_area')->nullable();
            $table->integer('highest_balcony_area')->nullable();
            $table->integer('lowest_building_coverage_ratio');
            $table->integer('highest_building_coverage_ratio');
            $table->integer('lowest_floor_area_ratio');
            $table->integer('highest_floor_area_ratio');
            $table->string('lowest_parking_lot')->nullable();
            $table->string('highest_parking_lot')->nullable();
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
            $table->string('setback_length')->nullable();
            $table->string('water_supply');
            $table->string('sewage_line');
            $table->string('gas');
            $table->string('building_certification_number');
            $table->string('status');
            $table->string('delivery_date');
            $table->string('elementary_school_name')->nullable();
            $table->integer('elementary_school_district')->nullable();
            $table->string('junior_high_school_name')->nullable();
            $table->integer('junior_high_school_district')->nullable();
            $table->string('terms_and_conditions')->nullable();
            $table->string('conditions_of_transactions');
            $table->string('property_introduction')->nullable();
            $table->string('sales_comment')->nullable();
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