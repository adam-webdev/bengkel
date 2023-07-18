<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use App\Models\Order;
use App\Models\Shipment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            // "notifications" => $notifications,
            "user" => Auth::user()->name,
            "pengguna" => User::count(),
            "order" => Order::count(),
            "bengkel" => Bengkel::count(),

        ];
        return view("dashboard", $data);
    }
}
