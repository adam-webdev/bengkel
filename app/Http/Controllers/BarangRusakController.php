<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangRusak;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BarangRusakController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        $barang_rusak = BarangRusak::with('barang')->get();
        return view('barang_rusak.index', compact("barang_rusak", "barangs"));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $barang_rusak = new BarangRusak();
        $barang_rusak->barang_id = $request->barang_id;
        $barang_rusak->jumlah = $request->jumlah;
        $barang = Barang::select("jumlah_barang")->where("id", $request->barang_id)->get();
        // dd($barang);
        if ($barang > $request->jumlah) {
            $barang_rusak->save();
            Alert::success("Tersimpan", "Data Berhasil Disimpan");
            return redirect()->route('barang_rusak.index');
        }
        Alert::error("Gagal", "Jumlah barang tidak cukup maksimal {{$barang}} ");
        return redirect()->route('barang_rusak.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $barang_rusak = BarangRusak::findOrFail($id);
        $barang = Barang::all();
        return view("barang_rusak.edit", compact("barang_rusak", "barang"));
    }

    public function update(Request $request, $id)
    {
        $barang_rusak = BarangRusak::findOrFail($id);
        $barang_rusak->barang_id = $request->barang_id;
        $barang_rusak->jumlah = $request->jumlah;
        $barang_rusak->save();
        Alert::success("Terupdate", "Data Berhasil Diupdate");
        return redirect()->route('barang_rusak.index');
    }


    public function delete($id)
    {
        $barang_rusak = BarangRusak::findOrFail($id);
        $barang_rusak->delete();
        Alert::success("Terhapus", "Data Berhasil Dihapus");
        return redirect()->route('barang_rusak.index');
    }
}