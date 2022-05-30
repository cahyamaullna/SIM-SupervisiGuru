<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilSupervisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_supervisi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('mata_pelajaran');
            $table->integer('rpp');
            $table->integer('pelaksanaan');
            $table->integer('penilaian');
            $table->integer('nilai_akhir');
            $table->string('keterangan');
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
        Schema::dropIfExists('hasil_supervisi');
    }
}
