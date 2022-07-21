<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOldDetachedHouseImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('old_detached_house_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('old_detached_house_id')->unsigned();
            $table->foreign('old_detached_house_id')->references('id')->on('old_detached_houses');
            $table->string('category');
            $table->string('comment', 120);
            $table->string('path');
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
        Schema::dropIfExists('old_detached_house_images');
    }
}
