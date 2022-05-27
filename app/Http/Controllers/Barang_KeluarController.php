<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barang_keluar;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Barang_KeluarController extends Controller
{
    
    public function index()
    {
        $barangs = Barang::all();
        $barang_keluar = Barang_keluar::with('barang')->get();
        return view('barang_keluar.index',compact("barang_keluar","barangs"));

    }
 
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $barang_keluar = new Barang_keluar;
        $barang_keluar->barang_id = $request->barang_id;
        $barang_keluar->jumlah = $request->jumlah;
        $barang = Barang::select("jumlah_barang")->where("id",$request->barang_id)->get();
        // dd($barang);
        if($barang > $request->jumlah){
            $barang_keluar->save();
            Alert::success("Tersimpan","Data Berhasil Disimpan");
            return redirect()->route('barang_keluar.index');
        }
        Alert::error("Gagal","Jumlah barang tidak cukup maksimal {{$barang}} ");
        return redirect()->route('barang_keluar.index');


    }
  
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $barang_keluar = Barang_keluar::findOrFail($id);
        $barang = Barang::all();
        return view("barang_keluar.edit",compact("barang_keluar","barang"));
    }
    
    public function update(Request $request, $id)
    {
        $barang_keluar = Barang_keluar::findOrFail($id);
        $barang_keluar->barang_id = $request->barang_id;
        $barang_keluar->jumlah = $request->jumlah;
        $barang_keluar->save();
        Alert::success("Terupdate","Data Berhasil Diupdate");
        return redirect()->route('barang_keluar.index');
    }

   
    public function delete($id)
    {
        $barang_keluar = Barang_keluar::findOrFail($id);
        $barang_keluar->delete();
        Alert::success("Terhapus","Data Berhasil Dihapus");
        return redirect()->route('barang_keluar.index');
    }
}
