<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleDataPengguna extends Model
{
    use HasFactory;
    protected $table = 'role_data_pengguna';
    protected $fillable = ['nama_role', 'deskripsi'];


    public function data_pengguna()
    {
        return $this->hasMany(DataPengguna::class);
    }
}
