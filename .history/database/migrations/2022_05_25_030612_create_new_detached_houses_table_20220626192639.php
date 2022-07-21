<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewDetachedHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_detached_houses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('price');
            $table->string('tax');
            $table->string('pref');
            $table->string('municipalities');
            $table->string('block')->nullable();
            $table->integer('number_of_rooms');
            $table->string('type_of_room');
            $table->integer('land_area');
            $table->integer('building_area');
            $table->string('balcony_area')->nullable();
            $table->integer('building_coverage_ratio');
            $table->integer('floor_area_ratio');
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
        Schema::dropIfExists('new_detached_houses');
    }
}
