<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMansionImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mansion_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('mansion_id')->unsigned();
            $table->foreign('mansion_id')->references('id')->on('mansions')->cascadeOnDelete();
            $table->integer('image_id');
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
        Schema::dropIfExists('mansion_images');
    }
}
