<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranHajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_haji', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sudah_bayar');
            $table->bigInteger('sisa_pembayaran');
            $table->integer('no_kuitansi');
            $table->date('tanggal_pembayaran');
            $table->string('jenis_pembayaran');
            $table->bigInteger('jumlah_uang');
            $table->bigInteger('kembalian');
            $table->enum('status', ['lunas', 'belum lunas']);
            $table->string('tujuan_pembayaran');
            $table->string('petugas');
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
        Schema::dropIfExists('pembayaran_haji');
    }
}
