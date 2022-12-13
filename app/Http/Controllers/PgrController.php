<?php

namespace App\Http\Controllers;

use App\Models\Pgr;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PgrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pgr = pgr::all();
        return view('pgr.index', compact('pgr'));
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
        $pgr = new pgr();
        $pgr->kode_pgr = $request->kode_pgr;
        $pgr->save();
        Alert::success('Berhasil', 'Data berhasil ditambahkan');
        return redirect()->route('pgr.index');
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
        $pgr = pgr::findOrFail($id);
        return view('pgr.edit', compact('pgr'));
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
        $pgr = Pgr::findOrFail($id);
        $pgr->kode_pgr = $request->kode_pgr;
        $pgr->save();
        Alert::success('Berhasil', 'Data berhasil diubah');
        return redirect()->route('pgr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $pgr = pgr::findOrFail($id);
        $pgr->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect()->route('pgr.index');
    }
}