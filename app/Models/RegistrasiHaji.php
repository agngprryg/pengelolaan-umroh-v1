<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiHaji extends Model
{
    use HasFactory;
    protected $table = 'registrasi_haji';
    protected $fillable = [
        'no_registrasi',
        'tanggal_daftar',
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
}
