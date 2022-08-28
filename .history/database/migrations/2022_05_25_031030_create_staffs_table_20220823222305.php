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
            $table->string('head_shot')->nullable()->comment('');
            $table->string('position')->comment('');
            $table->integer('number_of_contracts')->comment('');
            $table->string('birthplace')->comment('');
            $table->string('hobby')->comment('');
            $table->string('comment')->comment('');
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
