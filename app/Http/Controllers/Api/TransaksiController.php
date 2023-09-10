<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;

use App\Http\Controllers\Controller;
use App\Models\Bengkel;
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
            $userid['order_id'] = $id;
            $sendNotifToAdmin = [$admin, $adminBengkel];
            foreach ($sendNotifToAdmin as $sendNotifToAdmin) {
                Notification::send($sendNotifToAdmin, new NewOrderNotification($userid));
                // Notification::send($adminBengkel, new NewOrderNotification($userid, $id));
            }
            return $this->success('Data berhasil tersimpan', 201);
        } else {
            return $this->error('Data gagal tersimpan', 401);
        }
    }
    public function orderByUser($user_id)
    {
        // $order = Order::select('orders.*', 'bengkel.id AS id_bengkel', 'bengkel.nama_bengkel')
        //     ->join('bengkel', 'orders.bengkel_id', '=', 'bengkel.id')
        //     ->where('orders.user_id', $user_id)
        //     ->orderBy('orders.created_at', 'desc')
        //     ->get();

        // $order = Order::with(['bengkel' => function ($query) {
        //     $query->select('id as bengkel_id', 'nama_bengkel');
        // }])
        // ->where('user_id', $user_id)
        // ->orderBy('created_at', 'desc')
        // ->get();
        $order = Order::with('bengkel:id,nama_bengkel')->where('user_id', $user_id)->orderBy('created_at', 'desc')->get();

        // return '<pre>' . print_r($order) . '</pre>';
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

    public function orderMasuk($user_id)
    {
        $user = User::findOrFail($user_id);
        if ($user->tipe_user === 'Admin') {
            $order = Order::with('user:id,name')->orderBy('created_at', 'desc')->get();
            if ($order) {
                return $this->success($order, "Data Order Berhasil dikirim");
            } else {
                return $this->error('Data Gagal Terkirim.', 401);
            }
        }

        $bengkel = Bengkel::where('user_id', $user_id)->pluck('id');
        $order = Order::with('user:id,name')->whereIn('bengkel_id', $bengkel)->with('user')->orderBy('created_at', 'desc')->get();
        if ($order) {
            return $this->success($order, "Data Order Berhasil dikirim");
        } else {
            return $this->error('Data Gagal Terkirim.', 401);
        }
    }
    public function orderStatusUpdate($order_id)
    {
        $order = Order::where('id', $order_id)->update(['status' => 'Selesai']);
        if ($order) {
            return $this->success($order, "Status Order Selesai");
        }
        return $this->error('Upps Terjadi Kesalahan.', 401);
    }
}
