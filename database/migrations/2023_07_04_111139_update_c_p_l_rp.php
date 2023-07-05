<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_p_l_rp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rps_id');
            $table->unsignedBigInteger('c_p_l_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('rps_id')->references('id')->on('rps');
            $table->foreign('c_p_l_id')->references('id')->on('c_p_l_s');
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
};
