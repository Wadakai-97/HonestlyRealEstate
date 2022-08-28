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
            $table->bigIncrements('id')->comment('ID');
            $table->bigInteger('old_detached_house_id')->unsigned()->comment('中古戸建ID');
            $table->foreign('old_detached_house_id')->references('id')->on('old_detached_houses')->onDelete('cascade');
            $table->integer('image_id')->comment('画像ID');
            $table->string('category')->comment('カテゴリー');
            $table->string('comment', 120)->comment('コメント');
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
        Schema::dropIfExists('old_detached_house_images');
    }
}
