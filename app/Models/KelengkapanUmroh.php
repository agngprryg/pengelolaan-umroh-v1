<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelengkapanUmroh extends Model
{
    use HasFactory;
    protected $table = 'kelengkapan_umroh';
    protected $fillable = ['perlengkapan_umroh_id', 'keterangan', 'harga_beli'];

    public function perlengkapan_umroh()
    {
        return $this->belongsTo(DataPerlengkapanUmroh::class);
    }
}
