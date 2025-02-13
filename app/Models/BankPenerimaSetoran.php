<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankPenerimaSetoran extends Model
{
    use HasFactory;
    protected $table = 'bank_penerima_setoran';
    protected $fillable = ['nama_bps', 'kode_bank', 'alamat', 'cabang'];
}
