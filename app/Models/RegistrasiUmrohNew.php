<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiUmrohNew extends Model
{
    use HasFactory;

    protected $table = 'registrasi_umroh_new';

    protected $fillable = [
        'paket_umroh_id',
        'nomor_ktp',
        'nama_paspor',
        'nama_ayah',
        'ttl',
        'jenis_kelamin',
        'status_perkawinan',
        'alamat_ktp',
        'alamat_tempat_tinggal',
        'kode_pos',
        'no_telepon',
        'pendidikan',
        'pekerjaan',
        'nama_suami',
        'hubungan_keluarga',
        'nomor_paspor',
        'tempat_dikeluarkan',
        'golongan_darah',
        'ukuran_baju',
        'rambut',
        'alis',
        'hidung',
        'muka',
        'tinggi_badan',
        'berat_badan',
        'persyaratan',
        'perlengkapan_barang',
    ];

    protected $casts = [
        'persyaratan' => 'array',
        'perlengkapan_barang' => 'array',
    ];

    public function paketUmroh()
    {
        return $this->belongsTo(PaketUmroh::class);
    }
}
