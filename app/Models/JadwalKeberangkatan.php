<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKeberangkatan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_keberangkatan';
    protected $fillable = ['nama_paket', 'tanggal_berangkat', 'tanggal_selesai', 'durasi', 'jumlah_seat'];
}
