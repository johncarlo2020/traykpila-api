<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTpcLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tpc', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->string('account_number');
            $table->string('account_name');
            $table->string('reference_number');
            $table->string('image');
            $table->string('type')->comment('0=deposit,1=withdraw');
            $table->string('status')->comment('0=pending,1=approved,2=rejected');
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
        //
    }
}
