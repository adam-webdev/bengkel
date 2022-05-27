<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruangan = Ruangan::all();
        return view('ruangan.index', compact('ruangan'));
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
        $ruangan = new Ruangan();
        $ruangan->kode_ruangan = $request->kode_ruangan;
        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->save();
        Alert::success('Berhasil', 'Data Berhasil Disimpan');
        return redirect()->route('ruangan.index');
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
        $ruangan = Ruangan::findOrFail($id);
        return view('ruangan.edit', compact('ruangan'));
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
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->kode_ruangan = $request->kode_ruangan;
        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->save();
        Alert::success('Berhasil', 'Data Berhasil Diubah');
        return redirect()->route('ruangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ruangan = Ruangan::findOrFail($id);
        $ruangan->delete();
        Alert::success('Berhasil', 'Data Berhasil Dihapus');
        return redirect()->route('ruangan.index');
    }
}