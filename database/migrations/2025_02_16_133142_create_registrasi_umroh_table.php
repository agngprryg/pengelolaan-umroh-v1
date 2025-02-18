<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrasiUmrohTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrasi_umroh', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nomer_id');
            $table->string('paket_umroh');
            $table->string('jadwal_keberangkatan');
            $table->string('agen');
            $table->date('tanggal_pendaftaran');
            $table->string('fasilitas');
            $table->date('tanggal_berangkat');
            $table->string('nama_lengkap');
            $table->string('nama_passpor');
            $table->string('nama_ayah');
            $table->bigInteger('nik');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('kelompok_usia');
            $table->integer('usia');
            $table->string('status_pernikahan');
            $table->string('nama_mahram');
            $table->string('status_mahram');
            $table->integer('no_passpor');
            $table->string('kota_passpor_dikeluarkan');
            $table->date('tanggal_dikeluarkan');
            $table->date('tanggal_akhir_berlakunya');
            $table->bigInteger('no_telepon');
            $table->string('handphone');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->integer('kode_pos');
            $table->string('alamat_rumah');
            $table->string('email');
            $table->string('pendidikan_terakhir');
            $table->string('pekerjaan');
            $table->string('pernah_pergi_umroh');
            $table->string('pernah_pergi_haji');
            $table->string('merokok');
            $table->boolean('memiliki_penyakit_khusus');
            $table->string('peyakit');
            $table->boolean('apakah_perlu_penanganan_khusus');
            $table->string('fasilitas_kursi_roda');
            $table->string('foto');
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
        Schema::dropIfExists('registrasi_umroh');
    }
}
