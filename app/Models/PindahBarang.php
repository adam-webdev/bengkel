<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PindahBarang extends Model
{
    use HasFactory;

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }

    public static function kode_id()
    {
        $angka = PindahBarang::max('id');
        $angka = (int) $angka + 1;
        return $angka;
    }
}