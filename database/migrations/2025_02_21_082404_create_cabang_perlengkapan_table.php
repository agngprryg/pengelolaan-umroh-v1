<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabangPerlengkapanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabang_perlengkapan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cabang_id')->constrained('data_cabang')->onDelete('cascade');
            $table->foreignId('perlengkapan_umroh_id')->constrained('data_perlengkapan_umroh')->onDelete('cascade');
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
        Schema::dropIfExists('cabang_perlengkapan');
    }
}
