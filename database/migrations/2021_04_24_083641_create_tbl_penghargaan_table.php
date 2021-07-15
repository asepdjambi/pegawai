<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPenghargaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_penghargaan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('pegawai_id', 25)->index('pegawai_id');
            $table->string('Jenis', 255);
            $table->string('no_sk', 255);
            $table->date('tgl_sk');
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
        Schema::dropIfExists('tbl_penghargaan');
    }
}
