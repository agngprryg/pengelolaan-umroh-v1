<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketUmroh extends Model
{
    use HasFactory;
    protected $table = 'paket_umroh';
    protected $fillable = ['jadwal_keberangkatan_id', 'nama_paket', 'tipe_kamar', 'harga', 'hotel', 'pesawat', 'durasi', 'status', 'kelengkapan_umroh'];
    protected $casts = [
        'tipe_kamar' => 'array',
        'harga' => 'array',
        'hotel' => 'array',
        'pesawat' => 'array',
        'kelengkapan_umroh' => 'array',
    ];

    public function jadwal_keberangkatan()
    {
        return $this->belongsTo(JadwalKeberangkatan::class);
    }

    public function registrasi_umroh()
    {
        return $this->hasMany(RegistrasiUmroh::class, 'paket_umroh_id');
    }

    public function registrasi_umroh_new()
    {
        return $this->hasMany(RegistrasiUmroh::class, 'paket_umroh_id');
    }
}
