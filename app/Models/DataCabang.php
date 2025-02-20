<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCabang extends Model
{
    use HasFactory;
    protected $table = 'data_cabang';
    protected $fillable = ['nama_cabang', 'email', 'password', 'alamat', 'status'];
}
