<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterPnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_pns', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('pegawai_id', 25)->index('pegawai_id');
            $table->string('no_capeg', 25);
            $table->string('master_gol_id', 5)->index('master_gol_id');
            $table->date('tmt_capeg');
            $table->string('scan_capeg', 255);
            $table->string('no_skumptk', 25);
            $table->date('tmt_skumptk');
            $table->string('scan_skumptk', 255);
            $table->string('no_pns', 25);
            $table->date('tmt_pns');
            $table->string('scan_pns', 255);
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
        Schema::dropIfExists('master_pns');
    }
}
