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
            $table->string('apartment_name')->comment('建物名');
            $table->integer('room')->comment('部屋番号');
            $table->string('price')->comment('販売価格');
            $table->string('tax')->comment('税込み');
            $table->string('pref')->comment('都道府県');
            $table->string('municipalities')->comment('市区町村');
            $table->string('block')->nullable()->comment('番町番地');
            $table->integer('land_area')->nullable()->comment('土地面積');
            $table->string('building_area')->nullable()->comment('建物面積');
            $table->integer('number_of_rooms')->comment('部屋数');
            $table->string('type_of_room')->comment('間取り');
            $table->string('measuring_method')->comment('測定方法');
            $table->integer('occupation_area')->comment('専有面積');
            $table->string('balcony')->comment('バルコニー面積');
            $table->integer('balcony_area')->nullable()->comment('バルコニー面積');
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
            $table->integer('elementary_school_district')->nullable()->comment('');
            $table->string('junior_high_school_name')->nullable()->comment('');
            $table->integer('junior_high_school_district')->nullable()->comment('');
            $table->string('terms_and_conditions')->nullable()->comment('');
            $table->string('conditions_of_transactions')->comment('');
            $table->text('property_introduction')->nullable()->comment('');
            $table->text('sales_comment')->nullable()->comment('');
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
