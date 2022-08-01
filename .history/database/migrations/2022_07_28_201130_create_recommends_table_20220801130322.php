<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommends', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('land_id')->unsigned()->nullable();
            $table->foreign('land_id')->references('id')->on('lands');
            $table->bigInteger('mansion_id')->unsigned()->nullable();
            $table->foreign('mansion_id')->references('id')->on('mansions');
            $table->bigInteger('new_detached_house_id')->unsigned();
            $table->foreign('new_detached_house_id')->references('id')->on('new_detached_houses');
            $table->bigInteger('new_detached_house_group_id')->unsigned();
            $table->foreign('new_detached_house_group_id')->references('id')->on('new_detached_house_groups');
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
    }
}
