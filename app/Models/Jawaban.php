<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;
    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }
}
