<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan as Usaha;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Perusahaan extends Controller
{
    public function index()
    {
       
    }
    public function edit()
    {
        $perusahaan = Usaha::get();
        return view('pengaturan',compact('perusahaan'));
    }
    public function update(Request $request)
    {
        $perusahaan = new Perusahaan;
        $perusahaan->nama_usaha = $request->nama_usaha;
        $perusahaan->alamat = $request->alamat;
        $perusahaan->email = $request->email;
        $perusahaan->telepon = $request->telepon;
        $perusahaan->title = $request->title;
        $perusahaan->save();
        Alert::success("Terupdate","Data Berhasil Diupdate");
        return redirect("/dashboard");
    }
}
