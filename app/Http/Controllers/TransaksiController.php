<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Shipment;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::user()->tipe_user == "Admin Bengkel") {
            $order = Order::with(['user', 'bengkel'])
                ->whereHas('bengkel', function ($query) {
                    $query->where('user_id', Auth::user()->id);
                })->orderBy('created_at', 'desc')->get();
        } else {
            $order = Order::with('user', 'bengkel')->orderBy('created_at', 'desc')->get();
        }
        return view('order.index', compact('order'));
    }
    public function notification()
    {
        $notifications = auth()->user()->unreadNotifications;

        return view('layout', compact('notifications'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = order::findOrFail($id);
        return view('order.detail', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = order::findOrFail($id);
        $order->tanggal = $order->tanggal;
        $order->bengkel_id = $order->bengkel_id;
        $order->user_id = $order->user_id;
        $order->status = $request->status;
        $order->keterangan = $request->keterangan;
        $order->save();
        Alert::success("Berhasil", "Data Berhasil diupdate");
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $order = order::findOrFail($id);
        $order->delete();
        Alert::success("Berhasil", "Data Berhasil dihapus");
        return redirect()->route('order.index');
    }
}