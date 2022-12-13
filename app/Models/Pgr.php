<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pgr extends Model
{
    use HasFactory;
    protected $table = 'pgr';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}