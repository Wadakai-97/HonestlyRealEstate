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
            $table->string('balcony')->comment('バルコニー');
            $table->integer('balcony_area')->nullable()->comment('バルコニー面積');
            $table->string('parking_lot')->nullable()->comment('駐車場');
            $table->integer('floor')->comment('階数');
            $table->string('story')->comment('建物構造');
            $table->integer('year')->comment('築年');
            $table->integer('month')->comment('築月');
            $table->integer('day')->nullable()->comment('築日');
            $table->string('direction')->comment('方角');
            $table->string('station')->comment('最寄り駅');
            $table->integer('walking_distance_station')->comment('最寄り駅までの徒歩距離');
            $table->string('building_construction')->comment('建物構造');
            $table->integer('total_number_of_households')->comment('総戸数');
            $table->string('land_right')->comment('土地権利');
            $table->string('land_use_zones')->comment('用途地域');
            $table->string('management_company')->comment('管理会社');
            $table->string('management_system')->comment('管理形態');
            $table->integer('maintenance_fee')->comment('管理費');
            $table->integer('reserve_fund_for_repair')->comment('修繕積立金');
            $table->string('other_fee')->nullable()->comment('その他の費用');
            $table->string('status')->comment('現況');
            $table->string('delivery_date')->comment('引渡し日');
            $table->string('elementary_school_name')->nullable()->comment('小学校');
            $table->integer('elementary_school_district')->nullable()->comment('小学校までの徒歩距離');
            $table->string('junior_high_school_name')->nullable()->comment('中学校');
            $table->integer('junior_high_school_district')->nullable()->comment('中学校までの徒歩距離');
            $table->string('terms_and_conditions')->nullable()->comment(''現況);
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
