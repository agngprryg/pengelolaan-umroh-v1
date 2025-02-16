<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrasiHajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrasi_haji', function (Blueprint $table) {
            $table->id();
            $table->integer('no_registrasi');
            $table->date('tanggal_daftar');
            $table->string('agen');
            $table->integer('tahun_berangkat');
            $table->string('bps');
            $table->string('cabang');
            $table->string('no_porsi');
            $table->string('spph');
            $table->bigInteger('no_rekening');
            $table->string('alamat');
            $table->string('nama_lengkap');
            $table->string('nama_passport');
            $table->string('alamat_passport');
            $table->bigInteger('nik');
            $table->string('bin_binti');
            $table->string('jenis_kelamin');
            $table->string('status_pernikahan');
            $table->string('golongan_darah');
            $table->string('tampat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat_1');
            $table->string('alamat_2');
            $table->string('pendidikan');
            $table->string('foto');
            $table->json('dokumen_kelengkapan');
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
        Schema::dropIfExists('registrasi_haji');
    }
}
