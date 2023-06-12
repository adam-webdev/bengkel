<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JawabanController extends Controller
{
    public function index()
    {
        $jawaban = Jawaban::with('pertanyaan')->get();
        $pertanyaan = Pertanyaan::all();
        return view('jawaban.index', compact('jawaban', 'pertanyaan'));
    }
    public function create()
    {
        return view('jawaban.create');
    }
    public function store(Request $request)
    {

        $new_jawaban = new jawaban();
        $new_jawaban->kode_jawaban = $request->kode_jawaban;
        $new_jawaban->pertanyaan_id = $request->pertanyaan_id;
        $new_jawaban->isi_jawaban = $request->isi_jawaban;
        $new_jawaban->save();
        Alert::success("Tersimpan", "Data Berhasil Disimpan!");
        return redirect()->route('jawaban.index');
    }
    // public function show($id)
    // {
    //     $jawaban = Jawaban::findOrFail($id);
    //     $jawaban = $jawaban->with('pertanyaan')->get();
    //     return view('jawaban.detail', compact('jawaban'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jawaban = jawaban::findOrFail($id);
        $pertanyaan = Pertanyaan::all();
        return view('jawaban.edit', compact('jawaban', 'pertanyaan'));
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
        $jawaban = jawaban::findOrFail($id);
        $jawaban->kode_jawaban = $request->kode_jawaban;
        $jawaban->pertanyaan_id = $request->pertanyaan_id;
        $jawaban->isi_jawaban = $request->isi_jawaban;
        $jawaban->save();
        Alert::success("Berhasil", "Data Berhasil diupdate");
        return redirect()->route('jawaban.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $jawaban = jawaban::findOrFail($id);
        $jawaban->delete();
        Alert::success("Berhasil", "Data Berhasil dihapus");
        return redirect()->route('jawaban.index');
    }
}
