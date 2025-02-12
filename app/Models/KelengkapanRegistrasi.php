<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelengkapanRegistrasi extends Model
{
    use HasFactory;
    protected $table = "kelengkapan_registrasi";
    protected $fillable = ['urutan_tampil', 'nama_dokumen'];
}
