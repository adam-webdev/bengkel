<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BengkelController extends Controller
{

    public function index()
    {
        $user = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'Admin Bengkel');
            }
        )->get();
        $provinsi = DB::table('provinces')->get();
        $bengkel = Bengkel::all();
        return view('bengkel.index', compact('bengkel', 'user', 'provinsi'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $foto_bengkel = $request->file('foto_bengkel');

        if ($foto_bengkel) {
            $foto_bengkel = $foto_bengkel->storeAs('bengkel', $request->file('foto_bengkel')->getClientOriginalName());
        } else {
            $foto = 'default.jpg';
        }

        $newbengkel = new Bengkel;
        $newbengkel->nama_bengkel = $request->nama_bengkel;
        $newbengkel->jam_buka = $request->jam_buka;
        $newbengkel->jam_tutup = $request->jam_tutup;
        $newbengkel->no_hp = $request->no_hp;
        $newbengkel->alamat_lengkap = $request->alamat_lengkap;
        $newbengkel->angka_ulasan = $request->angka_ulasan;
        $newbengkel->ulasan = $request->ulasan;
        $newbengkel->longitude = $request->longitude;
        $newbengkel->latitude = $request->latitude;
        $newbengkel->provinsi_id = $request->provinsi_id;
        $newbengkel->kota_id = $request->kota_id;
        $newbengkel->kecamatan_id = $request->kecamatan_id;
        $newbengkel->desa_id = $request->desa_id;
        $newbengkel->email = $request->email;
        $newbengkel->foto = $foto;
        $newbengkel->save();
        Alert::success("Tersimpan", "Data Berhasil Disimpan!");
        return redirect()->route('bengkel.index');
    }

    public function show($id)
    {
        $bengkel = Bengkel::where('id', $id)->first();
        return view('bengkel.detail', compact('bengkel'));
    }


    public function edit($id)
    {
        $bengkel = Bengkel::findOrfail($id);
        return view('bengkel.edit', compact('bengkel'));
    }

    public function update(Request $request, $id)
    {
        $bengkel = Bengkel::findOrfail($id);
        $foto = $request->file('foto');
        if ($foto) {
            Storage::delete($bengkel->foto);
            $foto = $foto->storeAs('bengkel', $request->file('foto_bengkel')->getClientOriginalName());
        } else {
            $foto = $bengkel->foto;
        }

        $bengkel->nama_bengkel = $request->nama_bengkel;
        $bengkel->jam_buka = $request->jam_buka;
        $bengkel->jam_tutup = $request->jam_tutup;
        $bengkel->no_hp = $request->no_hp;
        $bengkel->alamat_lengkap = $request->alamat_lengkap;
        $bengkel->angka_ulasan = $request->angka_ulasan;
        $bengkel->ulasan = $request->ulasan;
        $bengkel->longitude = $request->longitude;
        $bengkel->latitude = $request->latitude;
        $bengkel->provinsi_id = $request->provinsi_id;
        $bengkel->kota_id = $request->kota_id;
        $bengkel->kecamatan_id = $request->kecamatan_id;
        $bengkel->desa_id = $request->desa_id;
        $bengkel->email = $request->email;
        $bengkel->foto = $foto;
        $bengkel->save();
        Alert::success("Tersimpan", "Data Berhasil Disimpan!");
        return redirect()->route('bengkel.index', [$id]);
    }

    public function delete($id)
    {
        $bengkel = Bengkel::findOrFail($id);
        Storage::delete($bengkel->foto);
        $bengkel->delete();
        $bengkel->removeRole("Admin", "Admin Bengkel", "User");
        Alert::success("Terhapus", "Data Berhasil Terhapus");
        return redirect()->route('bengkel.index');
    }
}