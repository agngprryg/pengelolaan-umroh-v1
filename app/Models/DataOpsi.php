<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataOpsi extends Model
{
    use HasFactory;
    protected $table = 'data_opsi';
    protected $fillable = ['item_opsi', 'status', 'jenis_opsi_id'];

    public function jenis_opsi()
    {
        return $this->belongsTo(JenisOpsi::class);
    }
}
