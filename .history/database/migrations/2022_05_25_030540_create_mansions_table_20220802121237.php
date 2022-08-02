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
            $table->string('price');
            $table->string('tax');
            $table->string('pref');
            $table->string('municipalities');
            $table->string('block')->nullable();
            $table->integer('land_area')->nullable();
            $table->string('building_area')->nullable();
            $table->integer('number_of_rooms');
            $table->string('type_of_room');
            $table->string('measuring_method');
            $table->integer('occupation_area');
            $table->string('balcony');
            $table->integer('balcony_area')->nullable();
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
            $table->string('elementary_school_name')->nullable();
            $table->integer('elementary_school_district')->nullable();
            $table->string('junior_high_school_name')->nullable();
            $table->integer('junior_high_school_district')->nullable();
            $table->string('terms_and_conditions')->nullable();
            $table->string('conditions_of_transactions');
            $table->text('property_introduction')->nullable();
            $table->text('sales_comment')->nullable();
            $table->dateTime('similar_updated_at')->nullable()->comment('類似物件を更新した日時');
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
