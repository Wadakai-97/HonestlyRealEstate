<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewDetachedHouseGroupImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_detached_house_group_images', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->bigInteger('new_detached_house_g_id')->unsigned()->comment('新築分譲住宅ID');
            $table->foreign('new_detached_house_g_id')->references('id')->on('new_detached_house_groups')->onDelete('cascade');
            $table->integer('image_id')->comment('画像ID');
            $table->string('category')->comment('カテゴリー');
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
        Schema::dropIfExists('new_detached_house_group_images');
    }
}
