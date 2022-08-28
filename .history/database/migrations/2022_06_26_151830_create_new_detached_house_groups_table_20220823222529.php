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
            $table->bigIncrements('id')->comment('ID');
            $table->string('name')->comment('物件名');
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
            $table->integer('lowest_balcony_area')->nullable()->comment('');
            $table->integer('highest_balcony_area')->nullable()->comment('');
            $table->integer('lowest_building_coverage_ratio')->comment('');
            $table->integer('highest_building_coverage_ratio')->comment('');
            $table->integer('lowest_floor_area_ratio')->comment('');
            $table->integer('highest_floor_area_ratio')->comment('');
            $table->string('lowest_parking_lot')->nullable()->comment('');
            $table->string('highest_parking_lot')->nullable()->comment('');
            $table->integer('year')->comment('');
            $table->integer('month')->comment('');
            $table->integer('day')->nullable()->comment('');
            $table->string('station')->comment('');
            $table->integer('walking_distance_station')->comment('');
            $table->string('building_construction')->comment('');
            $table->string('land_right')->comment('');
            $table->integer('other_fee')->nullable()->comment('');
            $table->string('urban_planning')->comment('');
            $table->string('land_use_zones')->comment('');
            $table->string('restrictions_by_law')->nullable()->comment('');
            $table->string('land_classification')->comment('');
            $table->string('terrain')->nullable()->comment('');
            $table->string('adjacent_road')->comment('');
            $table->integer('adjacent_road_width')->comment('');
            $table->string('private_road')->comment('');
            $table->string('setback')->comment('');
            $table->string('setback_length')->nullable()->comment('');
            $table->string('water_supply')->comment('');
            $table->string('sewage_line')->comment('');
            $table->string('gas')->comment('');
            $table->string('building_certification_number')->comment('');
            $table->string('status')->comment('');
            $table->string('delivery_date')->comment('');
            $table->string('elementary_school_name')->nullable()->comment('');
            $table->integer('elementary_school_district')->nullable()->comment('');
            $table->string('junior_high_school_name')->nullable()->comment('');
            $table->integer('junior_high_school_district')->nullable()->comment('');
            $table->string('terms_and_conditions')->nullable()->comment('');
            $table->string('conditions_of_transactions')->comment('');
            $table->string('property_introduction')->nullable()->comment('');
            $table->string('sales_comment')->nullable()->comment('');
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
