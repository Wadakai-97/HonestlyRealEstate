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
            $table->string('lowest_price')->comment('最低価格');
            $table->string('highest_price')->comment('最高価格');
            $table->string('tax')->comment('税金');
            $table->string('pref')->comment('都道府県');
            $table->string('municipalities')->comment('市区町村');
            $table->string('block')->nullable()->comment('番町番地');
            $table->integer('lowest_number_of_rooms')->comment('最低部屋数');
            $table->integer('highest_number_of_rooms')->comment('最高部屋数');
            $table->string('lowest_type_of_room')->comment('最低間取り');
            $table->string('highest_type_of_room')->comment('最高間取り');
            $table->integer('lowest_land_area')->comment('最低土地面積');
            $table->integer('highest_land_area')->comment('最高土地面積');
            $table->integer('lowest_building_area')->comment('最低建物面積');
            $table->integer('highest_building_area')->comment('最高建物面積');
            $table->string('balcony')->comment('バルコ二ー');
            $table->integer('lowest_balcony_area')->nullable()->comment('最低バルコニー面積');
            $table->integer('highest_balcony_area')->nullable()->comment('最高バルコニー面積');
            $table->integer('lowest_building_coverage_ratio')->comment('最低建ぺい率');
            $table->integer('highest_building_coverage_ratio')->comment('最高建ぺい率');
            $table->integer('lowest_floor_area_ratio')->comment('最低容積率');
            $table->integer('highest_floor_area_ratio')->comment('最高容積率');
            $table->string('lowest_parking_lot')->nullable()->comment('最低駐車場数');
            $table->string('highest_parking_lot')->nullable()->comment('最高駐車場数');
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
            $table->string('building_certification_number')->comment('建築確認番号');
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
