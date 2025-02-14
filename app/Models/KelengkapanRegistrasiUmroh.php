<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelengkapanRegistrasiUmroh extends Model
{
    use HasFactory;
    protected $table = "kelengkapan_registrasi_umroh";
    protected $fillable = ['urutan_tampil', 'nama_dokumen'];
}
