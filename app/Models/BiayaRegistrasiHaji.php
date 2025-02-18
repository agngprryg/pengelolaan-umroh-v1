<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaRegistrasiHaji extends Model
{
    use HasFactory;
    protected $table = 'biaya_registrasi_haji';
    protected $fillable = ['tahun', 'jumlah_biaya', 'rincian_biaya'];

    public function registrasi_haji()
    {
        return $this->hasMany(RegistrasiHaji::class, 'biaya_registrasi_haji_id');
    }
}
