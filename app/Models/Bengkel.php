<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bengkel extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function order()
    {
        return $this->hasOne(Order::class);
    }
    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }
    public function tracking()
    {
        return $this->hasOne(Tracking::class);
    }
}
