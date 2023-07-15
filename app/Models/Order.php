<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // protected $table = 'orders';
    public function bengkel()
    {
        return $this->belongsTo(Bengkel::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
