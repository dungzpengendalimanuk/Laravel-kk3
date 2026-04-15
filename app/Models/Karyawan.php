<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    // Hanya kolom nama, posisi, dan departemen_id yang diizinkan untuk diisi
    protected $fillable = ['nama', 'posisi', 'departemen_id'];

    // Relasi: Karyawan dimiliki oleh satu departemen
    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }
}
