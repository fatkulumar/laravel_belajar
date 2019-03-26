<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsKendaraan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_kendaraan', function (Blueprint $table) {
            $table->increments('id', 10);
            $table->string('no_plat', 100)->nullable(true);
            $table->string('merek', 100)->nullable(true);
            $table->string('type', 100)->nullable(true);
            $table->string('jenis', 100)->nullable(true);
            $table->string('model', 100)->nullable(true);
            $table->string('tahun', 100)->nullable(true);
            $table->string('cc', 100)->nullable(true);
            $table->string('no_rangka_nik', 100)->nullable(true);
            $table->string('no_mesin', 100)->nullable(true);
            $table->string('tgl_fak', 100)->nullable(true);
            $table->string('bahan_bakar', 100)->nullable(true);
            $table->string('warna_tnkb', 100)->nullable(true);
            $table->string('no_pol_lama', 100)->nullable(true);
            $table->string('kepemilikan', 100)->nullable(true);
            $table->string('no_dok', 100)->nullable(true);
            $table->string('masa_stnk', 100)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_kendaraan');
    }
}
