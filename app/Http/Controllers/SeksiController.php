<?php

namespace App\Http\Controllers;

use App\Models\Seksi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SeksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seksi = seksi::all();
        return view('seksi.index', compact('seksi'));
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
        $seksi = new seksi();
        $seksi->nama_seksi = $request->nama_seksi;
        $seksi->save();
        Alert::success('Berhasil', 'Data berhasil ditambahkan');
        return redirect()->route('seksi.index');
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
        $seksi = seksi::findOrFail($id);
        return view('seksi.edit', compact('seksi'));
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
        $seksi = seksi::findOrFail($id);
        $seksi->nama_seksi = $request->nama_seksi;
        $seksi->save();
        Alert::success('Berhasil', 'Data berhasil diubah');
        return redirect()->route('seksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $seksi = Seksi::findOrFail($id);
        $seksi->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('seksi.index');
    }
}