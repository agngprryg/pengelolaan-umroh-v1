<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemanduJamaah extends Model
{
    use HasFactory;
    protected $table = 'pemandu_jamaah';
    protected $fillable = ['nama_pemandu', 'harga', 'status'];
}
