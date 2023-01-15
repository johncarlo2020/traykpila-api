<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsOnUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('users', function (Blueprint $table) {
            $table->String('active')->nullable();
            $table->bigInteger('terminal_id')->unsigned()->index()->nullable();
            $table->foreign('terminal_id')->references('id')->on('terminals')->onDelete('cascade');
            $table->bigInteger('tricycle_id')->unsigned()->index()->nullable();
            $table->foreign('tricycle_id')->references('id')->on('tricycles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
