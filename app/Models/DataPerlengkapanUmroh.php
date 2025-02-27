<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPerlengkapanUmroh extends Model
{
    use HasFactory;
    protected $table = 'data_perlengkapan_umroh';
    protected $fillable = ['nama_barang', 'stok', 'status'];

    public function data_cabang()
    {
        return $this->hasMany(DataCabang::class, 'data_perlengkapan_umroh_id');
    }
    public function cabang()
    {
        return $this->belongsToMany(DataCabang::class, 'cabang_perlengkapan')->withPivot('jumlah')->withTimestamps();
    }

    public function kelengkapan_umroh()
    {
        return $this->hasMany(KelengkapanUmroh::class, 'perlengkapan_umroh_id');
    }
}
