<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsip_pegawai', function (Blueprint $table) {
            $table->integer('id_peg', true);
            $table->string('NIP', 25);
            $table->string('NIK', 255);
            $table->string('KK', 255);
            $table->string('npwp', 255);
            $table->string('karpeg', 255);
            $table->string('bpjs', 255);
            $table->string('foto', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsip_pegawai');
    }
}
