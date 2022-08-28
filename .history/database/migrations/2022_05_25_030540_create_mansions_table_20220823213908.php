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
            $table->bigIncrements('id')->comment('ID');
            $table->string('apartment_name')->comment('');
            $table->integer('room')->comment('');
            $table->string('price')->comment('');
            $table->string('tax')->comment('');
            $table->string('pref')->comment('');
            $table->string('municipalities')->comment('');
            $table->string('block')->nullable()->comment('');
            $table->integer('land_area')->nullable()->comment('');
            $table->string('building_area')->nullable()->comment('');
            $table->integer('number_of_rooms')->comment('');
            $table->string('type_of_room')->comment('');
            $table->string('measuring_method')->comment('');
            $table->integer('occupation_area')->comment('');
            $table->string('balcony')->comment('');
            $table->integer('balcony_area')->nullable()->comment('');
            $table->string('parking_lot')->nullable()->comment('');
            $table->integer('floor')->comment('');
            $table->string('story')->comment('');
            $table->integer('year')->comment('');
            $table->integer('month')->comment('');
            $table->integer('day')->nullable()->comment('');
            $table->string('direction')->comment('');
            $table->string('station')->comment('');
            $table->integer('walking_distance_station')->comment('');
            $table->string('building_construction')->comment('');
            $table->integer('total_number_of_households')->comment('');
            $table->string('land_right')->comment('');
            $table->string('land_use_zones')->comment('');
            $table->string('management_company')->comment('');
            $table->string('management_system')->comment('');
            $table->integer('maintenance_fee')->comment('');
            $table->integer('reserve_fund_for_repair')->comment('');
            $table->string('other_fee')->nullable()->comment('');
            $table->string('status')->comment('');
            $table->string('delivery_date')->comment('');
            $table->string('elementary_school_name')->nullable()->comment('');
            $table->integer('elementary_school_district')->nullable();
            $table->string('junior_high_school_name')->nullable();
            $table->integer('junior_high_school_district')->nullable();
            $table->string('terms_and_conditions')->nullable();
            $table->string('conditions_of_transactions');
            $table->text('property_introduction')->nullable();
            $table->text('sales_comment')->nullable();
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
        Schema::dropIfExists('recommends');
        Schema::dropIfExists('mansions');
    }
}
