<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang_masuk extends Model
{
    use HasFactory;
    protected $table = "barang_masuks";

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}