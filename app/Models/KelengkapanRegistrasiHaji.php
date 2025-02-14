<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelengkapanRegistrasiHaji extends Model
{
    use HasFactory;
    protected $table = "kelengkapan_registrasi_haji";
    protected $fillable = ['urutan_tampil', 'nama_dokumen'];
}
