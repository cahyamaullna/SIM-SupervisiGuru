<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBerkasGuru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berkas_guru', function (Blueprint $table) {
            $table->id();
            $table->string('nama_guru');
            $table->string('mata_pelajaran');
            $table->string('kompetensi_dasar');
            $table->string('materi');
            $table->string('rombel');
            $table->datetime('jadwal');
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
        Schema::dropIfExists('berkas_guru');
    }
}
