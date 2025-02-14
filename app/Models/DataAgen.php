<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAgen extends Model
{
    use HasFactory;
    protected $table = 'data_agen';
    protected $fillable = ['nama_agen', 'grup_agen', 'alamat', 'no_telepon', 'email', 'status'];
}
