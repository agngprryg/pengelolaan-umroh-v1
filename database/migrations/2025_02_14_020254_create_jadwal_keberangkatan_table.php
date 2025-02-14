<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalKeberangkatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_keberangkatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->date('tanggal_berangkat');
            $table->date('tanggal_selesai');
            $table->integer('durasi');
            $table->integer('jumlah_seat');
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
        Schema::dropIfExists('jadwal_keberangkatan');
    }
}
