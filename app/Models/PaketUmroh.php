<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketUmroh extends Model
{
    use HasFactory;
    protected $table = 'paket_umroh';
    protected $fillable = ['jadwal_keberangkatan_id', 'nama_paket', 'tipe_kamar', 'hotel', 'pesawat', 'durasi', 'status'];
    protected $casts = [
        'tipe_kamar' => 'array',
        'hotel' => 'array',
        'pesawat' => 'array',
    ];

    public function jadwal_keberangkatan()
    {
        return $this->belongsTo(JadwalKeberangkatan::class);
    }

    public function registrasi_umroh()
    {
        return $this->hasMany(RegistrasiUmroh::class, 'paket_umroh_id');
    }
}
