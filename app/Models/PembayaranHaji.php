<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranHaji extends Model
{
    use HasFactory;
    protected $table = 'pembayaran_haji'; // Nama tabel di database

    protected $fillable = [
        'registrasi_haji_id',
        'sudah_bayar',
        'sisa_pembayaran',
        'no_kuitansi',
        'tanggal_pembayaran',
        'jenis_pembayaran',
        'jumlah_uang',
        'kembalian',
        'status',
        'tujuan_pembayaran',
        'petugas',
    ];

    public function registrasi_haji()
    {
        return $this->belongsTo(RegistrasiHaji::class);
    }
}
