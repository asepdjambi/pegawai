<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('NIP', 25);
            $table->string('NIP_lama', 15)->nullable();
            $table->string('Nama', 50);
            $table->string('NIK', 20);
            $table->string('KK', 20)->nullable();
            $table->string('tempat_L', 50);
            $table->date('tgl_L');
            $table->string('JK', 1);
            $table->string('Alamat', 100);
            $table->string('hp', 20)->nullable();
            $table->string('email', 25)->nullable();
            $table->string('agama', 15);
            $table->string('status', 10);
            $table->integer('master_jabatan_id');
            $table->string('jab', 100);
            $table->integer('master_gol_id');
            $table->integer('gapok');
            $table->string('NPWP', 50)->nullable();
            $table->string('karpeg', 50)->nullable();
            $table->string('BPJS', 25)->nullable();
            $table->integer('masa_kerja_t')->nullable();
            $table->integer('masa_kerja_b');
            $table->string('asal_ins', 255);
            $table->string('aktif', 10);
            $table->string('foto', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('Updated_at')->nullable();
            $table->index(['master_jabatan_id', 'master_gol_id'], 'master_jabatan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
