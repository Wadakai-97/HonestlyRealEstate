<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_images', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->bigInteger('land_id')->unsigned()->comment('');
            $table->foreign('land_id')->references('id')->on('lands')->onDelete('cascade');
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
        Schema::dropIfExists('land_images');
    }
}
