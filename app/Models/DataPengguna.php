<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPengguna extends Model
{
    use HasFactory;
    protected $table = 'data_pengguna';
    protected $fillable = ['username', 'password', 'nama_pengguna', 'alamat', 'no_telepon', 'role_id'];

    public function role_data_pengguna()
    {
        return $this->belongsTo(RoleDataPengguna::class, 'role_id', 'id');
    }
}
