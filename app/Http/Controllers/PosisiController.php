<?php

namespace App\Http\Controllers;

use App\Models\Posisi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PosisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posisi = Posisi::all();
        return view('posisi.index', compact('posisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posisi = new Posisi();
        $posisi->nama_posisi = $request->nama_posisi;
        $posisi->save();
        Alert::success('Berhasil', 'Data berhasil ditambahkan');
        return redirect()->route('posisi.index');
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
        $posisi = Posisi::findOrFail($id);
        return view('posisi.edit', compact('posisi'));
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
        $posisi = Posisi::findOrFail($id);
        $posisi->nama_posisi = $request->nama_posisi;
        $posisi->save();
        Alert::success('Berhasil', 'Data berhasil diubah');
        return redirect()->route('posisi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $posisi = Posisi::findOrFail($id);
        $posisi->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('posisi.index');
    }
}