<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchandiseUmroh extends Model
{
    use HasFactory;
    protected $table = "merchandise_umroh";
    protected $fillable = ['urutan_tampil', 'nama_merchandise'];
}
