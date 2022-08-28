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
            $table->bigIncrements('id')->comment('');
            $table->string('name')->comment('');
            $table->string('price')->comment('');
            $table->string('tax')->comment('');
            $table->string('pref')->comment('');
            $table->string('municipalities')->comment('');
            $table->string('block')->nullable()->comment('');
            $table->integer('number_of_rooms')->comment('');
            $table->string('type_of_room')->comment('');
            $table->integer('land_area')->comment('');
            $table->integer('building_area')->comment('');
            $table->string('balcony')->comment('');
            $table->integer('balcony_area')->nullable()->comment('');
            $table->integer('building_coverage_ratio')->comment('');
            $table->integer('floor_area_ratio')->comment('');
            $table->string('parking_lot')->nullable()->comment('');
            $table->integer('year')->comment('');
            $table->integer('month')->comment('');
            $table->integer('day')->nullable()->comment('');
            $table->string('station')->comment('');
            $table->integer('walking_distance_station')->comment('');
            $table->string('building_construction')->comment('');
            $table->string('land_right')->comment('');
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
            $table->integer('setback_length')->nullable();
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
        Schema::dropIfExists('new_detached_houses');
    }
}
