<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiHaji extends Model
{
    use HasFactory;
    protected $table = 'registrasi_haji';
    protected $fillable = [
        'biaya_registrasi_haji_id',
        'no_registrasi',
        'tanggal_daftar',
        'jenis_haji',
        'agen',
        'tahun_berangkat',
        'bps',
        'no_porsi',
        'spph',
        'no_rekening',
        'nama_lengkap',
        'nama_passport',
        'alamat_passport',
        'nik',
        'bin_binti',
        'jenis_kelamin',
        'status_pernikahan',
        'golongan_darah',
        'tempat_lahir',
        'tanggal_lahir',
        'jalan',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'kode_pos',
        'alamat_lengkap',
        'pendidikan',
        'foto',
        'dokumen_kelengkapan',
    ];
    protected $casts = [
        'dokumen_kelengkapan' => 'array',
    ];

    public function biaya_registrasi_haji()
    {
        return $this->belongsTo(BiayaRegistrasiHaji::class);
    }

    public function pembayaran_haji()
    {
        return $this->hasMany(PembayaranHaji::class, 'registrasi_haji_id');
    }
}
