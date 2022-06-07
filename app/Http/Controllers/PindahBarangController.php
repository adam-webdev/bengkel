<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\PindahBarang;
use App\Models\Ruangan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PindahBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pindahBarang = PindahBarang::with('barang', 'ruangan')->get();
        $barangs = Barang::all();
        $ruangan = Ruangan::all();
        return view('pindahbarang.index', compact('pindahBarang', 'barangs', 'ruangan'));
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
        $barang_id = $request->input('barang_id', []);
        $ruangan_id = $request->input('ruangan_id', []);
        $jumlah = $request->input('jumlah', []);

        foreach ($barang_id as $index => $value) {

            $data[] = [
                'barangpindah_id' => PindahBarang::kode_id(),
                'barang_id' => $barang_id[$index],
                'ruangan_id' => $ruangan_id[$index],
                'jumlah' => $jumlah[$index],
                'tanggal' => $request->tanggal,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }
        DB::table('pindah_barangs')->insert($data);
        Alert::success('Berhasil', 'Data Berhasil Disimpan.');
        return redirect()->route('pindah-barang.index');
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
        $pindahBarang = PindahBarang::where('barangpindah_id', $id)->get();
        $barang = Barang::all();
        $ruangan = Ruangan::all();
        return view('pindahbarang.edit', compact('pindahBarang', 'barang', 'ruangan'));
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
        PindahBarang::where('barangpindah_id', $id)->delete();

        $barang_id = $request->input('barang_id', []);
        $ruangan_id = $request->input('ruangan_id', []);
        $jumlah = $request->input('jumlah', []);

        foreach ($barang_id as $index => $value) {

            $data[] = [
                'barangpindah_id' => $id,
                'barang_id' => $barang_id[$index],
                'ruangan_id' => $ruangan_id[$index],
                'jumlah' => $jumlah[$index],
                'tanggal' => $request->tanggal,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }
        DB::table('pindah_barangs')->insert($data);
        Alert::success('Berhasil', 'Data Berhasil Disimpan.');
        return redirect()->route('pindah-barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PindahBarang::where('barangpindah_id', $id)->delete();
        Alert::success('Berhasil', 'Data Berhasil Disimpan.');
        return redirect()->route('pindah-barang.index');
    }
}