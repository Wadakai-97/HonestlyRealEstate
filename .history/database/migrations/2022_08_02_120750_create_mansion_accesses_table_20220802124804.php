<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMansionAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mansion_accesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mansion_id')->comment('マンションID');
            $table->string('ip');
            $table->timestamps();
            $table->foreign('mansion_id')->references('id')->on('mansions');
            $table->unique(['mansion_id', 'ip']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mansion_accesses');
    }
}
