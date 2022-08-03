<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimilarMansionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('similar_mansions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mansion_id')->comment('マンションID');
            $table->unsignedBigInteger('original_mansion_id')->comment('マンションID(コピー元)');
            $table->integer('access_count')->comment('アクセス件数');
            $table->timestamps();

            $table->foreign('mansion_id')->references('id')->on('mansions');
            $table->foreign('original_mansion_id')->references('id')->on('mansions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('similar_mansions');
    }
}
