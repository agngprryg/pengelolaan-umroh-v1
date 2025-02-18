<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nama')->after('password');
            $table->string('alamat')->after('nama');
            $table->string('no_telepon')->after('alamat');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'password', 'nama', 'alamat', 'no_telepon']);
        });
    }
};
