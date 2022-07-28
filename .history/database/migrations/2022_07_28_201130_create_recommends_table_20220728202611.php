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
            $table->bigInteger('_id')->unsigned();
            $table->foreign('_id')->references('id')->on('s');
            $table->bigInteger('mansion_id')->unsigned();
            $table->foreign('mansion_id')->references('id')->on('mansions');
            $table->bigInteger('mansion_id')->unsigned();
            $table->foreign('mansion_id')->references('id')->on('mansions');
            $table->bigInteger('mansion_id')->unsigned();
            $table->foreign('mansion_id')->references('id')->on('mansions');
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
