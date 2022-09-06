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
            $table->integer('room')->unsigned()->comment('部屋番号');
            $table->string('price')->unsigned()->comment('販売価格');
            $table->string('tax')->comment('税金');
            $table->string('pref')->comment('都道府県');
            $table->string('municipalities')->comment('市区町村');
            $table->string('block')->nullable()->comment('番町番地');
            $table->float('land_area', 5)->unsigned()->nullable()->comment('土地面積');
            $table->float('building_area', 5, )->unsigned()->nullable()->comment('建物面積');
            $table->integer('number_of_rooms')->unsigned()->comment('部屋数');
            $table->string('type_of_room')->comment('間取り');
            $table->string('measuring_method')->comment('測定方法');
            $table->integer('occupation_area')->unsigned()->comment('専有面積');
            $table->string('balcony')->comment('バルコニー');
            $table->integer('balcony_area')->unsigned()->nullable()->comment('バルコニー面積');
            $table->string('parking_lot')->nullable()->comment('駐車場');
            $table->integer('floor')->unsigned()->comment('階数');
            $table->string('story')->comment('建物構造');
            $table->integer('year')->unsigned()->comment('築年');
            $table->integer('month')->unsigned()->comment('築月');
            $table->integer('day')->unsigned()->nullable()->comment('築日');
            $table->string('direction')->comment('方角');
            $table->string('station')->comment('最寄り駅');
            $table->string('access_method')->comment('最寄り駅までのアクセス方法');
            $table->integer('distance_station')->unsigned()->comment('最寄り駅までの所要時間');
            $table->string('building_construction')->comment('建物構造');
            $table->integer('total_number_of_households')->unsigned()->unsigned()->comment('総戸数');
            $table->string('land_right')->comment('土地権利');
            $table->string('land_use_zones')->comment('用途地域');
            $table->string('management_company')->comment('管理会社');
            $table->string('management_system')->comment('管理形態');
            $table->integer('maintenance_fee')->unsigned()->comment('管理費');
            $table->integer('reserve_fund_for_repair')->unsigned()->comment('修繕積立金');
            $table->string('other_fee')->nullable()->comment('その他の費用');
            $table->string('status')->comment('現況');
            $table->string('delivery_date')->comment('引き渡し日');
            $table->string('elementary_school_name')->nullable()->comment('小学校');
            $table->integer('elementary_school_district')->unsigned()->nullable()->comment('小学校までの徒歩距離');
            $table->string('junior_high_school_name')->nullable()->comment('中学校');
            $table->integer('junior_high_school_district')->unsigned()->nullable()->comment('中学校までの徒歩距離');
            $table->string('terms_and_conditions')->nullable()->comment('取引態様');
            $table->string('conditions_of_transactions')->comment('設備条件');
            $table->text('property_introduction')->nullable()->comment('物件紹介コメント');
            $table->text('sales_comment')->nullable()->comment('セールスコメント');
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
