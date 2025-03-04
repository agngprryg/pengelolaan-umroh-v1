<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingHotel extends Model
{
    use HasFactory;
    protected $table = 'setting_hotel';
    protected $fillable = ['nama_hotel', 'harga_quad', 'harga_triple', 'harga_double', 'lokasi', 'keterangan'];
}
