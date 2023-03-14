<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('driver_id')->unsigned()->index()->nullable();
            $table->foreign('driver_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('passenger_id')->unsigned()->index()->nullable();
            $table->foreign('passenger_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('ReportStatus');
            $table->timestamp('ReportDate');
            $table->string('ReportDesc');
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
        Schema::dropIfExists('reports');
    }
}
