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
        Schema::create('pertemuans', function (Blueprint $table) {
            $table->id();
            $table->string('minggu_ke');
            $table->string('kemampuan_akhir');
            $table->string('bahan_kajian');
            $table->string('metode_pembelajaran');
            $table->integer('waktu');
            $table->string('pengalaman_belajar');
            $table->integer('bobot_nilai');
            $table->unsignedBigInteger('topik_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('topik_id')->references('id')->on('topiks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertemuans');
    }
};
