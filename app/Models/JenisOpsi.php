<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisOpsi extends Model
{
    use HasFactory;
    protected $table = 'jenis_opsi';
    protected $fillable = ['nama', 'status'];

    public function data_opsi()
    {
        return $this->hasMany(DataOpsi::class, 'jenis_opsi_id', 'id');
    }
}
