<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrasiUmrohNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrasi_umroh_new', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paket_umroh_id')->constrained('paket_umroh')->onDelete('cascade');
            $table->bigInteger('nomor_ktp');
            $table->string('nama_paspor');
            $table->string('nama_ayah');
            $table->string('ttl');
            $table->string('jenis_kelamin');
            $table->string('status_perkawinan');
            $table->string('alamat_ktp');
            $table->string('alamat_tempat_tinggal');
            $table->integer('kode_pos');
            $table->bigInteger('no_telepon');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('nama_suami');
            $table->string('hubungan_keluarga');
            $table->integer('nomor_paspor');
            $table->string('tempat_dikeluarkan');
            $table->string('golongan_darah');
            $table->string('ukuran_baju');
            $table->string('rambut');
            $table->string('alis');
            $table->string('hidung');
            $table->string('muka');
            $table->string('tinggi_badan');
            $table->string('berat_badan');
            $table->json('persyaratan');
            $table->json('perlengkapan_barang');
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
        Schema::dropIfExists('registrasi_umroh_new');
    }
}
