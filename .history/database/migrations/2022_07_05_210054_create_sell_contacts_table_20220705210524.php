<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address'); // 暗号化対象
            $table->string('email'); // 暗号化対象
            $table->string('phone'); //暗号化対象
            $table->string('type');
            $table->string('contents');
            $table->string('message');
            $table->timestamps();
        });
    }

    protected $casts = [
        'address' => 'encrypted',
        'email' => 'encrypted',
        'phone' => 'encrypted',
    ];

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_contacts');
    }
}
