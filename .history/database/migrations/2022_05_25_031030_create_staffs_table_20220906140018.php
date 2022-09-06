<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->string('staff_name')->comment('スタッフ名');
            $table->string('head_shot')->nullable()->comment('顔写真');
            $table->string('position')->comment('役職');
            $table->integer('number_of_contracts')->comment('契約件数');
            $table->string('birthplace')->comment('誕生日');
            $table->string('hobby')->comment('趣味');
            $table->string('comment')->comment('コメント');
            $table->softDeletes()->comment();
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
        Schema::dropIfExists('staffs');
    }
}
