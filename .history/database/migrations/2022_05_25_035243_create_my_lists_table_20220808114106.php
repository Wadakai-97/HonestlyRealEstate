<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');

            // $table->bigInteger('land_id')->nullable()->unsigned();
            // $table->foreign('land_id')->references('id')->on('lands')->onDelete('cascade');

            // $table->bigInteger('mansion_id')->nullable()->unsigned();
            // $table->foreign('mansion_id')->references('id')->on('mansions')->onDelete('cascade');

            // $table->bigInteger('new_detached_house_id')->nullable()->unsigned();
            // $table->foreign('new_detached_house_id')->references('id')->on('new_detached_houses')->onDelete('cascade');

            // $table->bigInteger('new_detached_house_group_id')->nullable()->unsigned();
            // $table->foreign('new_detached_house_group_id')->references('id')->on('new_detached_house_groups')->onDelete('cascade');

            // $table->bigInteger('old_detached_house_id')->nullable()->unsigned();
            // $table->foreign('old_detached_house_id')->references('id')->on('old_detached_houses')->onDelete('cascade');
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
        Schema::dropIfExists('my_lists');
    }
}
