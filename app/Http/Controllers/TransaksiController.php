<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\Transaksi;
use Illuminate\Http\Request;
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

        $transaksi = Transaksi::all();
        return view('transaksi.index', compact('transaksi'));
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
        $request->validate([
            'no_po' => 'required|integer',
            'judul_po' => 'required',
            'nilai_po' => 'required|integer',
            'total_shipment' => 'required|integer',
            'total_nilai_import' => 'required|integer',
            'total_remaining_amount' => 'required|integer'
        ]);

        $transaksi = new Transaksi();
        $transaksi->no_po = $request->no_po;
        $transaksi->judul_po = $request->judul_po;
        $transaksi->nilai_po = $request->nilai_po;
        $transaksi->total_shipment = $request->total_shipment;
        $transaksi->total_nilai_import = $request->total_nilai_impor;
        $transaksi->remaining_amount = $request->remaining_amount;
        $transaksi->save();
        Alert::success("Berhasil", "Data Berhasil ditambahkan");
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $shipment = Shipment::where('transaksi_id', $id)->get();
        return view('transaksi.detail', compact('transaksi', 'shipment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.edit', compact('transaksi'));
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
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->no_po = $request->no_po;
        $transaksi->judul_po = $request->judul_po;
        $transaksi->nilai_po = $request->nilai_po;
        $transaksi->nilai_impor = $request->nilai_impor;
        $transaksi->total_shipment = $request->total_shipment;
        $transaksi->total_nilai_import = $request->total_nilai_impor;
        $transaksi->remaining_amount = $request->remaining_amount;
        $transaksi->save();
        Alert::success("Berhasil", "Data Berhasil diupdate");
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        Alert::success("Berhasil", "Data Berhasil dihapus");
        return redirect()->route('transaksi.index');
    }
}