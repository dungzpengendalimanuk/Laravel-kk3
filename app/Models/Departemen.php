<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $fillable = ['nama_departemen', 'deskripsi'];

    // Relasi: Satu departemen memiliki banyak karyawan
    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}
