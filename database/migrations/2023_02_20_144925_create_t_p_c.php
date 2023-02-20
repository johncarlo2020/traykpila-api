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
            $table->string('tpcstatus');
            $table->bigInteger('wallet');
            $table->bigInteger('cashin');
            $table->bigInteger('cashout');
            $table->timestamp('date_time')->nullable();
            $table->bigInteger('farein');
            $table->bigInteger('fareout');
            $table->bigInteger('driver_id')->unsigned()->index()->nullable();
            $table->foreign('driver_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('passenger_id')->unsigned()->index()->nullable();
            $table->foreign('passenger_id')->references('id')->on('users')->onDelete('cascade');

            
            
            
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
