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
            $table->bigIncrements('id')->comment('ID');
            $table->string('name')->comment('土地名');
            $table->string('price')->comment('');
            $table->string('tax')->comment('');
            $table->string('pref')->comment('');
            $table->string('municipalities')->comment('');
            $table->string('block')->nullable()->comment('');
            $table->string('construction_conditions')->comment('');
            $table->integer('land_area')->comment('');
            $table->integer('building_coverage_ratio')->comment('');
            $table->integer('floor_area_ratio')->comment('');
            $table->string('station')->comment('');
            $table->integer('walking_distance_station')->comment('');
            $table->string('land_right')->comment('');
            $table->integer('other_fee')->nullable()->comment('');
            $table->string('urban_planning')->comment('');
            $table->string('land_use_zones')->comment('');
            $table->string('restrictions_by_law')->nullable()->comment('');
            $table->string('national_land_utilization_law')->comment('');
            $table->string('land_classification')->comment('');
            $table->string('terrain')->comment('');
            $table->string('adjacent_road')->comment('');
            $table->integer('adjacent_road_width')->comment('');
            $table->string('private_road')->comment('');
            $table->string('setback')->comment('');
            $table->integer('setback_length')->nullable()->comment('');
            $table->string('water_supply')->comment('');
            $table->string('sewage_line')->comment('');
            $table->string('gas')->comment('');
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
        Schema::dropIfExists('lands');
    }
}
