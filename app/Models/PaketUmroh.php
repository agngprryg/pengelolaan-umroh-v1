<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketUmroh extends Model
{
    use HasFactory;
    protected $table = 'paket_umroh';
    protected $fillable = ['nama_paket', 'fasilitas', 'harga', 'durasi', 'status'];
    protected $casts = [
        'fasilitas' => 'array',
        'harga' => 'array'
    ];

    public function jadwal_keberangkatan()
    {
        return $this->hasMany(JadwalKeberangkatan::class, 'paket_umroh_id');
    }
}
