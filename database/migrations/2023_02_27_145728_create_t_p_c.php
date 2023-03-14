<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPC extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TPC', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->unsigned()->index()->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('tpcstatus');
            $table->bigInteger('wallet');
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
        Schema::dropIfExists('TPC');
    }
}
