<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMansionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mansions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('apartment_name');
            $table->integer('room');
            $table->integer('price');
            $table->string('tax');
            $table->string('pref');
            $table->string('municipalities');
            $table->string('block')->nullable();
            $table->integer('land_area');
            $table->string('building_area');
            $table->integer('number_of_rooms');
            $table->string('type_of_room');
            $table->string('measuring_method');
            $table->integer('occupation_area')->nullable();
            $table->string('')
            $table->integer('balcony_area');
            $table->string('parking_lot')->nullable();
            $table->integer('floor');
            $table->string('story');
            $table->integer('year');
            $table->integer('month');
            $table->integer('day')->nullable();
            $table->string('direction');
            $table->string('station');
            $table->integer('walking_distance_station');
            $table->string('building_construction');
            $table->integer('total_number_of_households');
            $table->string('land_right');
            $table->string('land_use_zones');
            $table->string('management_company');
            $table->string('management_system');
            $table->integer('maintenance_fee');
            $table->integer('reserve_fund_for_repair');
            $table->string('other_fee')->nullable();
            $table->string('status');
            $table->string('delivery_date');
            $table->string('conditions_of_transactions');
            $table->string('elementary_school_name')->nullable();
            $table->integer('elementary_school_district')->nullable();
            $table->string('junior_high_school_name')->nullable();
            $table->integer('junior_high_school_district')->nullable();
            $table->string('terms_and_conditions')->nullable();
            $table->text('property_introduction')->nullable();
            $table->text('sales_comment')->nullable();
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
        Schema::dropIfExists('mansions');
    }
}
