<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('driver_id')->unsigned()->index()->nullable();
            $table->foreign('driver_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('passenger_id')->unsigned()->index()->nullable();
            $table->foreign('passenger_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('terminal_id')->unsigned()->index()->nullable();
            $table->foreign('terminal_id')->references('id')->on('terminals')->onDelete('cascade');
            $table->bigInteger('tricycle_id')->unsigned()->index()->nullable();
            $table->foreign('tricycle_id')->references('id')->on('tricycles')->onDelete('cascade');
            $table->string('passenger_lat');
            $table->string('passenger_lng');
            $table->string('driver_lat')->nullable();
            $table->string('driver_lng')->nullable();
            $table->string('passenger_count')->nullable();
            $table->string('status')->comment('0=waiting,1=accepted,2=done');;
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
        Schema::dropIfExists('bookings');
    }
}
