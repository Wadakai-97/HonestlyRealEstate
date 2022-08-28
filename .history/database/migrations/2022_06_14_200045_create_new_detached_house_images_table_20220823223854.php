<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewDetachedHouseImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_detached_house_images', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('');
            $table->bigInteger('new_detached_house_id')->unsigned()->comment('');
            $table->foreign('new_detached_house_id')->references('id')->on('new_detached_houses')->onDelete('cascade');
            $table->integer('image_id')->comment('');
            $table->string('category')->comment('');
            $table->string('comment', 120)->comment('');
            $table->string('path')->comment('');
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
        Schema::dropIfExists('new_detached_house_images');
    }
}
