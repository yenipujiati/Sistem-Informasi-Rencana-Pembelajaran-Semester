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
        Schema::create('rps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matakuliah_id');
            $table->unsignedBigInteger('pengembang_id');
            $table->unsignedBigInteger('koordinator_id');
            $table->unsignedBigInteger('kaprodi_id');
            $table->unsignedBigInteger('cpl_id');
            $table->string('deskripsi_singkat');
            $table->unsignedBigInteger('pustaka_id');
            $table->string('mp_software');
            $table->string('mp_hardware');
            $table->unsignedBigInteger('pengampu_id');
            $table->unsignedBigInteger('matakuliah_syarat_id');
            $table->unsignedBigInteger('pertemuan_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('matakuliah_id')->references('id')->on('matakuliahs');
            $table->foreign('pengembang_id')->references('id')->on('users');
            $table->foreign('koordinator_id')->references('id')->on('users');
            $table->foreign('kaprodi_id')->references('id')->on('users');
            $table->foreign('cpl_id')->references('id')->on('c_p_l_s');
            $table->foreign('pustaka_id')->references('id')->on('pustakas');
            $table->foreign('pengampu_id')->references('id')->on('users');
            $table->foreign('matakuliah_syarat_id')->references('id')->on('matakuliahs');
            $table->foreign('pertemuan_id')->references('id')->on('pertemuans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rps');
    }
};
