<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Notifications\NewOrderNotification;
use Carbon\Carbon;
use Notification;
use Illuminate\Http\Request;
// use Illuminate\Notifications\Notification;

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

        $userid = User::where('id', $request->user_id)->first();
        $adminBengkel = User::where('id', $request->admin_bengkel)->first();
        $admin = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'Admin');
            }
        )->get();

        // var_dump($new_order);
        if ($new_order->save()) {
            $id = $new_order->id;
            Notification::send($admin, new NewOrderNotification($userid, $id));
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
    public function orderDetail($order_id)
    {
        $orderDetail = Order::where('id', $order_id)->with('bengkel')->first();
        if ($orderDetail) {
            return $this->success($orderDetail, "Data Order Berhasil dikirim");
        } else {
            return $this->error('Data Gagal Terkirim.', 401);
        }
    }
}
