<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingPesawat extends Model
{
    use HasFactory;
    protected $table = 'setting_pesawat';
    protected $fillable = ['nama_maskapai', 'rute', 'harga'];
}
