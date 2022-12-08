<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Auth::user()->name;
        $pengguna = User::count();

        return view("dashboard", compact("data", "pengguna"));
    }
}