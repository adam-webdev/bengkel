<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends BaseController
{
    public function store(Request $request)
    {
        // var_dump($request->all(), $user_id, $bengkel_id);

        $date_now = Carbon::now()->format('d-m-Y');

        $new_order = new Order();
        $new_order->tanggal = $date_now;
        $new_order->user_id = $request->user_id;
        $new_order->bengkel_id = $request->bengkel_id;
        $new_order->status = "Diproses";
        $new_order->keterangan = $request->keterangan;
        $new_order->lng = $request->lng;
        $new_order->lat = $request->lat;
        // var_dump($new_order);
        if ($new_order->save()) {
            return $this->success('Data berhasil tersimpan', 201);
        } else {
            return $this->error('Data gagal tersimpan', 401);
        }
    }
    public function orderByUser($user_id)
    {
        $order = Order::where('user_id', $user_id)->with('bengkel')->orderBy('created_at', 'desc')->get();
        // echo '<pre>' . var_dump($order) . '</pre>';
        if ($order) {
            return $this->success($order,  200);
        } else {
            return $this->error("Terjadi kesalahan periksa koneksi anda", 401);
        }
    }
}
