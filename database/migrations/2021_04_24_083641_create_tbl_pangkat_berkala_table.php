<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPangkatBerkalaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pangkat_berkala', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('No', 50);
            $table->string('pegawai_id', 25)->index('pegawai_id');
            $table->date('tgl');
            $table->string('pangkat_lama', 11);
            $table->string('pangkat_baru', 11);
            $table->string('pejabat', 150);
            $table->date('tgl_berlaku_L');
            $table->string('masa_L_tahun', 5)->nullable();
            $table->integer('masa_L_bulan')->nullable();
            $table->string('tgl_no_L', 50)->comment('Tanggal dan Normor surat sebelumnya');
            $table->date('tgl_berlaku_B');
            $table->string('masa_kerja_tahun_B', 5);
            $table->string('masa_kerja_bulan_B', 5);
            $table->string('master_gol_id', 5);
            $table->date('tgl_berlaku_S')->comment('tanggal masa berlaku hingga');
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
        Schema::dropIfExists('tbl_pangkat_berkala');
    }
}
