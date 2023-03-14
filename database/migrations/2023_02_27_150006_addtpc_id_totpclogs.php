<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddtpcIdTotpclogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tpclogs', function (Blueprint $table) {
            $table->bigInteger('tpc_id')->unsigned()->index()->nullable();
            $table->foreign('tpc_id')->references('id')->on('tpc')->onDelete('cascade');
          
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
