<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangRusak;
use App\Models\Kondisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class KondisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $kondisi = Kondisi::with('barang')->get();
        return view('kondisi.index', compact('kondisi', 'barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $foto = $request->file('image');
        $foto = $foto->store('images/kondisi');
        $kondisi = new Kondisi();
        $kondisi->barang_id = $request->barang_id;
        $kondisi->baik = $request->baik;
        $kondisi->rusak_ringan = $request->rusak_ringan;
        $kondisi->rusak_berat = $request->rusak_berat;
        $kondisi->image = $foto;
        $kondisi->save();
        Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
        return redirect()->route('kondisi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::all();
        $kondisi = Kondisi::findOrFail($id);
        // $kondisi = $kondisi->with('barang')->get();
        return view('kondisi.edit', compact('kondisi', 'barang'));
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
        $foto = $request->file('image');
        $kondisi = Kondisi::findOrFail($id);
        if ($foto) {
            Storage::delete($kondisi->image);
            $foto = $foto->store('images/kondisi');
        } else {
            $foto = $kondisi->image;
        }
        $kondisi = Kondisi::findOrFail($id);
        $kondisi->barang_id = $request->barang_id;
        $kondisi->baik = $request->baik;
        $kondisi->rusak_ringan = $request->rusak_ringan;
        $kondisi->rusak_berat = $request->rusak_berat;
        $kondisi->image = $foto;
        $kondisi->save();
        Alert::success('Berhasil', 'Data Berhasil Diubah');
        return redirect()->route('kondisi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kondisi = Kondisi::findOrFail($id);
        Storage::delete($kondisi->image);
        $kondisi->delete();
        Alert::success('Berhasil', 'Data Berhasil DiHapus');
        return redirect()->route('kondisi.index');
    }
}