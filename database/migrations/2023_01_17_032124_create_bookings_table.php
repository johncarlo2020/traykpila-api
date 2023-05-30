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
            $table->string('passenger_lat');
            $table->string('passenger_lng');
            $table->string('destination_lat');
            $table->string('destination_lng');
            $table->string('driver_lat')->nullable();
            $table->string('driver_lng')->nullable();
            $table->string('fare')->nullable();
            $table->string('notes')->nullable();
            $table->string('passenger_count')->nullable();
            $table->string('payment_type')->comment('0=cash,1=tpl');
            $table->string('status')->comment('0=waiting,1=accepted,2=done');
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
