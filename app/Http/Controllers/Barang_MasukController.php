<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barang_masuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class Barang_MasukController extends Controller
{

    public function index()
    {
        $barangs = Barang::all();
        $barang_masuk = Barang_masuk::with('barang')->get();
        return view('barang_masuk.index', compact("barang_masuk", "barangs"));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $foto = $request->file('image');
        $foto = $foto->store('images/barang-masuk');
        $barang_masuk = new Barang_masuk;
        $barang_masuk->barang_id = $request->barang_id;
        $barang_masuk->jumlah = $request->jumlah;
        $barang_masuk->image = $foto;
        $barang_masuk->save();
        Alert::success("Tersimpan", "Data Berhasil Disimpan");
        return redirect()->route('barang_masuk.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $barang_masuk = Barang_masuk::findOrFail($id);
        $barang = Barang::all();
        return view("barang_masuk.edit", compact("barang_masuk", "barang"));
    }

    public function update(Request $request, $id)
    {
        $foto = $request->file('image');
        $barang_masuk = Barang_masuk::findOrFail($id);
        if ($foto) {
            Storage::delete($barang_masuk->image);
            $foto = $foto->store('images/barang-masuk');
        } else {
            $foto = $barang_masuk->image;
        }
        $barang_masuk->barang_id = $request->barang_id;
        $barang_masuk->jumlah = $request->jumlah;
        $barang_masuk->image = $foto;
        $barang_masuk->save();
        Alert::success("Terupdate", "Data Berhasil Diupdate");
        return redirect()->route('barang_masuk.index');
    }

    public function delete($id)
    {
        $barang_masuk = Barang_masuk::findOrFail($id);
        Storage::delete($barang_masuk->image);
        $barang_masuk->delete();
        Alert::success("Terhapus", "Data Berhasil Dihapus");
        return redirect()->route('barang_masuk.index');
    }
}