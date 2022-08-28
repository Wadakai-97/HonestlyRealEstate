<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->string('title', 32)->comment('タイトル');
            $table->string('content', 500)->comment('');
            $table->bigInteger('staff_id')->unsigned()->comment('');
            $table->foreign('staff_id')->references('id')->on('staffs')->onDelete('cascade')->comment('');
            $table->string('image')->nullable()->uniqid()->comment('');
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
        Schema::dropIfExists('informations');
    }
}
