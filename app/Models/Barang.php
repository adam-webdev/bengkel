<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barangs";

    public function barang_rusak()
    {
        return $this->hasOne(BarangRusak::class);
    }
    public function pindahbarang()
    {
        return $this->belongsTo(PindahBarang::class);
    }
    public function barang_masuk()
    {
        return $this->hasOne(Barang_masuk::class);
    }
    public function kondisi()
    {
        return $this->hasOne(Kondisi::class);
    }
    // public function ruangan()
    // {
    //     return $this->belongsToMany(Ruangan::class);
    // }
}