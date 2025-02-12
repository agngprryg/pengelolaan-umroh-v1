<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokGudang extends Model
{
    use HasFactory;

    protected $table = 'stok_gudang';
    protected $fillable = ['id_gudang', 'nama_barang', 'stok'];

    public function gudang()
    {
        return $this->belongsTo(Gudang::class);
    }
}
