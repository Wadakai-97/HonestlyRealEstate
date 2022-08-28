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
            $table->bigIncrements('id')->comment('');
            $table->bigInteger('mansion_id')->unsigned()->comment('');
            $table->foreign('mansion_id')->references('id')->on('mansions')->onDelete('cascade');
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
        Schema::dropIfExists('mansion_images');
    }
}
