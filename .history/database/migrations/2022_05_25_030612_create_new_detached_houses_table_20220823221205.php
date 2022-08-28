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
            $table->bigIncrements('id')->comment('ID');
            $table->string('name')->comment('物件名');
            $table->string('price')->comment('販売価格');
            $table->string('tax')->comment('税金');
            $table->string('pref')->comment('都道府県');
            $table->string('municipalities')->comment('市区町村');
            $table->string('block')->nullable()->comment('番町番地');
            $table->integer('number_of_rooms')->comment('部屋数');
            $table->string('type_of_room')->comment('間取り');
            $table->integer('land_area')->comment('土地面積');
            $table->integer('building_area')->comment('建物面積');
            $table->string('balcony')->comment('バルコニー');
            $table->integer('balcony_area')->nullable()->comment('バルコニー面積');
            $table->integer('building_coverage_ratio')->comment('建ぺい率');
            $table->integer('floor_area_ratio')->comment('容積率');
            $table->string('parking_lot')->nullable()->comment('駐車場');
            $table->integer('year')->comment('築年');
            $table->integer('month')->comment('築月');
            $table->integer('day')->nullable()->comment('築日');
            $table->string('station')->comment('最寄り駅');
            $table->integer('walking_distance_station')->comment('最寄り駅までの徒歩距離');
            $table->string('building_construction')->comment('建物構造');
            $table->string('land_right')->comment('土地権利');
            $table->integer('other_fee')->nullable()->comment('その他の費用');
            $table->string('urban_planning')->comment('都市計画');
            $table->string('land_use_zones')->comment('用途地域');
            $table->string('restrictions_by_law')->nullable()->comment('法令上の制限');
            $table->string('land_classification')->comment('地目');
            $table->string('terrain')->nullable()->comment('地勢');
            $table->string('adjacent_road')->comment('');
            $table->integer('adjacent_road_width')->comment('');
            $table->string('private_road')->comment('');
            $table->string('setback')->comment('');
            $table->integer('setback_length')->nullable()->comment('');
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
        Schema::dropIfExists('new_detached_houses');
    }
}
