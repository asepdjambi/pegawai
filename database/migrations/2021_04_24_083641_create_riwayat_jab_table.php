<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatJabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_jab', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('pegawai_id', 25);
            $table->string('jabatan', 100);
            $table->string('master_jabatan_id', 6);
            $table->date('tmt')->nullable();
            $table->date('tgl_sk')->nullable();
            $table->date('tmt_lantik')->nullable();
            $table->string('no_sk', 50);
            $table->string('unit_k', 50);
            $table->string('satuan', 50);
            $table->string('arsip', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->index(['pegawai_id', 'master_jabatan_id'], 'pegawai_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_jab');
    }
}
