<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PertanyaanController extends Controller
{
    public function index()
    {
        $pertanyaan = Pertanyaan::all();
        return view('pertanyaan.index', compact('pertanyaan'));
    }
    public function create()
    {
        return view('pertanyaan.create');
    }
    public function store(Request $request)
    {

        $new_pertanyaan = new Pertanyaan();
        $new_pertanyaan->kode_pertanyaan = $request->kode_pertanyaan;
        $new_pertanyaan->nama_pertanyaan = $request->nama_pertanyaan;
        $new_pertanyaan->save();
        Alert::success("Tersimpan", "Data Berhasil Disimpan!");
        return redirect()->route('pertanyaan.index');
    }
    public function show($id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);
        return view('pertanyaan.detail', compact('pertanyaan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaan = Pertanyaan::findOrFail($id);
        return view('pertanyaan.edit', compact('pertanyaan'));
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
        $pertanyaan = pertanyaan::findOrFail($id);
        $pertanyaan->kode_pertanyaan = $request->kode_pertanyaan;
        $pertanyaan->nama_pertanyaan = $request->nama_pertanyaan;
        $pertanyaan->save();
        Alert::success("Berhasil", "Data Berhasil diupdate");
        return redirect()->route('pertanyaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $pertanyaan = pertanyaan::findOrFail($id);
        $pertanyaan->delete();
        Alert::success("Berhasil", "Data Berhasil dihapus");
        return redirect()->route('pertanyaan.index');
    }
}
