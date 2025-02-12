<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaRegistrasi extends Model
{
    use HasFactory;
    protected $table = 'biaya_registrasi';
    protected $fillable = ['tahun', 'jumlah_biaya', 'rincian_biaya'];
}
