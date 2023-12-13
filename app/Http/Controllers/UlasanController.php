<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function index()
    {
        $ulasan = Ulasan::with('bengkel', 'user')->get();
        return view('ulasan.index', compact('ulasan'));
    }
}
