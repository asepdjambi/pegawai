<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterTeknisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_teknis', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('pegawai_id', 25)->index('pegawai_id');
            $table->string('nama_t', 150);
            $table->string('lama', 150);
            $table->date('tgl_m');
            $table->date('tgl_s');
            $table->string('no_sertifikat', 150);
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
        Schema::dropIfExists('master_teknis');
    }
}
