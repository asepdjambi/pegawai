<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterPendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_pendidikan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('pegawai_id', 25)->index('pegawai_id');
            $table->string('tingkat', 50);
            $table->string('nama_s', 50);
            $table->string('jurusan', 50)->nullable();
            $table->string('tahun', 5);
            $table->string('no_Ijazah', 50);
            $table->string('gelar', 15)->nullable();
            $table->string('ijazah', 255);
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
        Schema::dropIfExists('master_pendidikan');
    }
}
