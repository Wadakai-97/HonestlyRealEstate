<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('land_id')->nullable()->unsigned()->comment('土地ID');
            $table->foreign('land_id')->references('id')->on('lands')->onDelete('cascade');

            $table->bigInteger('mansion_id')->nullable()->unsigned()->comment('マンションID');
            $table->foreign('mansion_id')->references('id')->on('mansions')->onDelete('cascade');

            $table->bigInteger('new_detached_house_id')->nullable()->unsigned()->comment('新築戸建ID');
            $table->foreign('new_detached_house_id')->references('id')->on('new_detached_houses')->onDelete('cascade');

            $table->bigInteger('new_detached_house_group_id')->nullable()->unsigned()->comment('新築分譲住宅ID');
            $table->foreign('new_detached_house_group_id')->references('id')->on('new_detached_house_groups')->onDelete('cascade');

            $table->bigInteger('old_detached_house_id')->nullable()->unsigned()->comment('中古戸建ID');
            $table->foreign('old_detached_house_id')->references('id')->on('old_detached_houses')->onDelete('cascade');
            $table->string('ip')->nullable();
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
        Schema::dropIfExists('favorites');
    }
}
