<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('price');
            $table->string('tax');
            $table->string('pref');
            $table->string('municipalities');
            $table->string('block')->nullable();
            $table->string('construction_conditions');
            $table->integer('land_area');
            $table->integer('building_coverage_ratio');
            $table->integer('floor_area_ratio');
            $table->string('station');
            $table->integer('walking_distance_station');
            $table->string('land_right');
            $table->integer('other_fee')->nullable();
            $table->string('urban_planning');
            $table->string('land_use_zones');
            $table->string('restrictions_by_law')->nullable();
            $table->string('national_land_utilization_law');
            $table->string('land_classification');
            $table->string('terrain');
            $table->string('adjacent_road');
            $table->integer('adjacent_road_width');
            $table->string('private_road');
            $table->string('setback');
            $table->integer('setback_length')->nullable();
            $table->string('water_supply');
            $table->string('sewage_line');
            $table->string('gas');
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
        Schema::dropIfExists('lands');
    }
}
