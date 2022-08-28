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
            $table->string('price')->comment('販売価格');
            $table->string('tax')->comment('税金');
            $table->string('pref')->comment('都道府県');
            $table->string('municipalities')->comment('市区町村');
            $table->string('block')->nullable()->comment('番町番地');
            $table->string('construction_conditions')->comment('建築条件');
            $table->integer('land_area')->comment('土地面積');
            $table->integer('building_coverage_ratio')->comment('建ぺい率');
            $table->integer('floor_area_ratio')->comment('容積率');
            $table->string('station')->comment('最寄り駅');
            $table->integer('walking_distance_station')->comment('最寄り駅までの徒歩距離');
            $table->string('land_right')->comment('土地権利');
            $table->integer('other_fee')->nullable()->comment('その他の費用');
            $table->string('urban_planning')->comment('都市計画');
            $table->string('land_use_zones')->comment('用途地域');
            $table->string('restrictions_by_law')->nullable()->comment('法令上の制限');
            $table->string('national_land_utilization_law')->comment('国土法届出');
            $table->string('land_classification')->comment('地目');
            $table->string('terrain')->comment('地勢');
            $table->string('adjacent_road')->comment('接道');
            $table->integer('adjacent_road_width')->comment('接道幅');
            $table->string('private_road')->comment('私道');
            $table->string('setback')->comment('セットバック');
            $table->integer('setback_length')->nullable()->comment('セットバック幅');
            $table->string('water_supply')->comment('上水道');
            $table->string('sewage_line')->comment('下水道');
            $table->string('gas')->comment('ガス');
            $table->string('status')->comment('現況');
            $table->string('delivery_date')->comment('引き渡し日');
            $table->string('elementary_school_name')->nullable()->comment('小学校');
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
