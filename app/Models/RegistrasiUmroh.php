<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiUmroh extends Model
{
    use HasFactory;
    protected $table = 'registrasi_umroh';

    protected $fillable = [
        'nomor_id',
        'paket_umroh',
        'jadwal_keberangkatan',
        'agen',
        'tanggal_pendaftaran',
        'fasilitas',
        'sisa_kursi',
        'tanggal_berangkat',
        'nama_lengkap',
        'nama_passpor',
        'nama_ayah',
        'nik',
        'tanggal_lahir',
        'tempat_lahir',
        'kelompok_usia',
        'usia',
        'status_pernikahan',
        'nama_mahram',
        'status_mahram',
        'no_passpor',
        'kota_passpor_dikeluarkan',
        'tanggal_dikeluarkan',
        'tanggal_akhir_berlakunya',
        'no_telepon',
        'handphone',
        'kecamatan',
        'kelurahan',
        'kode_pos',
        'alamat_rumah',
        'email',
        'pekerjaan',
        'pendidikan_terakhir',
        'pernah_pergi_umroh',
        'pernah_pergi_haji',
        'merokok',
        'memiliki_penyakit_khusus',
        'penyakit',
        'apakah_perlu_penanganan_khusus',
        'fasilitas_kursi_roda',
        'foto',
        'dokumen_kelengkapan',
        'merchandise_diterima'
    ];
    protected $casts = [
        'dokumen_kelengkapan' => 'array',
        'merchandise_diterima' => 'array',
    ];
}
