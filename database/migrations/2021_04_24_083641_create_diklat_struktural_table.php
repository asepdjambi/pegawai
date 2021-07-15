<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiklatStrukturalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diklat_struktural', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('pegawai_id', 25)->index('pegawai_id');
            $table->string('nama', 100);
            $table->string('no_sttpl', 50);
            $table->date('tgl_m');
            $table->date('tgl_s');
            $table->string('penyelenggara', 255);
            $table->string('arsip', 255);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diklat_struktural');
    }
}
