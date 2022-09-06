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
            $table->string('price')->unsigned()->comment('販売価格');
            $table->string('tax')->comment('税金');
            $table->string('pref')->comment('都道府県');
            $table->string('municipalities')->comment('市区町村');
            $table->string('block')->nullable()->comment('番町番地');
            $table->string('construction_conditions')->comment('建築条件');
            $table->integer('land_area')->unsigned()->comment('土地面積');
            $table->integer('building_coverage_ratio')->unsigned()->comment('建ぺい率');
            $table->integer('floor_area_ratio')->unsigned()->comment('容積率');
            $table->string('station')->comment('最寄り駅');
            $table->string('access_method')->comment('最寄り駅までのアクセス方法');
            $table->integer('distance_station')->unsigned()->comment('最寄り駅までの所要時間');
            $table->string('land_right')->comment('土地権利');
            $table->integer('other_fee')->nullable()->comment('その他の費用');
            $table->string('urban_planning')->comment('都市計画');
            $table->string('land_use_zones')->comment('用途地域');
            $table->string('restrictions_by_law')->nullable()->comment('法令上の制限');
            $table->string('national_land_utilization_law')->comment('国土法届出');
            $table->string('land_classification')->comment('地目');
            $table->string('terrain')->comment('地勢');
            $table->string('adjacent_road')->comment('接道');
            $table->integer('adjacent_road_width')->unsigned()->comment('接道幅');
            $table->string('private_road')->comment('私道');
            $table->string('setback')->comment('セットバック');
            $table->integer('setback_length')->unsigned()->nullable()->comment('セットバック幅');
            $table->string('water_supply')->comment('上水道');
            $table->string('sewage_line')->comment('下水道');
            $table->string('gas')->comment('ガス');
            $table->string('status')->comment('現況');
            $table->string('delivery_date')->comment('引き渡し日');
            $table->string('elementary_school_name')->nullable()->comment('小学校');
            $table->integer('elementary_school_district')->nullable()->comment('小学校までの徒歩距離');
            $table->string('junior_high_school_name')->nullable()->comment('中学校');
            $table->integer('junior_high_school_district')->nullable()->comment('中学校までの徒歩距離');
            $table->string('terms_and_conditions')->nullable()->comment('設備条件');
            $table->string('conditions_of_transactions')->comment('取引態様');
            $table->string('property_introduction')->nullable()->comment('物件紹介');
            $table->string('sales_comment')->nullable()->comment('セールスコメント');
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
