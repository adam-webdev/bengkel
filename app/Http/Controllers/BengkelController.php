<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BengkelController extends Controller
{

    public function kota(Request $request)
    {
        $kota = DB::table('regencies')->where('province_id', $request->id)->get();
        return $kota;
    }
    public function kecamatan(Request $request)
    {
        $kecamatan = DB::table('districts')->where('regency_id', $request->id)->get();
        return $kecamatan;
    }
    public function desa(Request $request)
    {
        $desa = DB::table('villages')->where('district_id', $request->id)->get();
        return $desa;
    }

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
        $provinsi = DB::table('provinces')->get();

        return view('bengkel.create', compact('provinsi'));
    }

    public function store(Request $request)
    {
        $foto_bengkel = $request->file('foto_bengkel');

        if ($foto_bengkel) {
            $uploadedImgeUrl = cloudinary()->upload($request->file('foto_bengkel')->getRealPath());
            $secure_url = $uploadedImgeUrl->getSecurePath();
            $public_id = $uploadedImgeUrl->getPublicId();
            // $foto_bengkel = $foto_bengkel->storeAs('bengkel', $request->file('foto_bengkel')->getClientOriginalName());
        } else {
            $foto_bengkel = 'default.jpg';
        }
        // ddd($request->desa_id);
        $newbengkel = new Bengkel;
        $newbengkel->user_id = Auth::user()->id;
        $newbengkel->nama_bengkel = $request->nama_bengkel;
        $newbengkel->jam_buka = $request->jam_buka;
        $newbengkel->jam_tutup = $request->jam_tutup;
        $newbengkel->no_hp = $request->no_hp;
        $newbengkel->alamat_lengkap = $request->alamat_lengkap;
        $newbengkel->longitude = $request->longitude;
        $newbengkel->latitude = $request->latitude;
        $newbengkel->provinsi_id = $request->provinsi_id;
        $newbengkel->kota_id = $request->kota_id;
        $newbengkel->kecamatan_id = $request->kecamatan_id;
        $newbengkel->public_id = $public_id;
        $newbengkel->desa_id = $request->desa_id;
        $newbengkel->email = $request->email;
        $newbengkel->foto_bengkel = $secure_url;
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
        $provinsi = DB::table('provinces')->get();
        $kota = DB::table('regencies')->where('id', $bengkel->kota_id)->first();
        $kecamatan = DB::table('districts')->where('id', $bengkel->kecamatan_id)->first();
        $desa = DB::table('villages')->where('id', $bengkel->desa_id)->first();
        return view('bengkel.edit', compact('bengkel', 'provinsi', 'kota', 'kecamatan', 'desa'));
    }


    public function update(Request $request, $id)
    {
        $bengkel = Bengkel::findOrfail($id);
        $foto = $request->file('foto_bengkel');
        // if ($foto) {
        //     Storage::delete($bengkel->foto);
        //     $foto = $foto->storeAs('bengkel', $request->file('foto_bengkel')->getClientOriginalName());
        // } else {
        //     $foto = $bengkel->foto_bengkel;
        // }
        if ($request->file('foto_bengkel')) {
            // delete picture on cloudinary
            if ($bengkel->public_id) {
                cloudinary()->destroy($bengkel->public_id);
            }
            // upload picture on cloudinary
            $uploadedImgeUrl = cloudinary()->upload($request->file('foto_bengkel')->getRealPath());

            $secure_url = $uploadedImgeUrl->getSecurePath();
            $public_id = $uploadedImgeUrl->getPublicId();
        } else {
            $secure_url = $bengkel->foto_bengkel ?? "-";
            $public_id = $bengkel->public_id ?? "-";
        }
        $bengkel->nama_bengkel = $request->nama_bengkel;
        $bengkel->jam_buka = $request->jam_buka;
        $bengkel->jam_tutup = $request->jam_tutup;
        $bengkel->no_hp = $request->no_hp;
        $bengkel->alamat_lengkap = $request->alamat_lengkap;
        $bengkel->longitude = $request->longitude;
        $bengkel->public_id = $public_id;
        $bengkel->latitude = $request->latitude;
        $bengkel->provinsi_id = $request->provinsi_id;
        $bengkel->kota_id = $request->kota_id;
        $bengkel->kecamatan_id = $request->kecamatan_id;
        $bengkel->desa_id = $request->desa_id;
        $bengkel->email = $request->email;
        $bengkel->foto_bengkel = $secure_url;
        $bengkel->save();
        Alert::success("Tersimpan", "Data Berhasil Disimpan!");
        return redirect()->route('bengkel.index');
    }

    public function delete($id)
    {

        $bengkel = Bengkel::findOrFail($id);
        if ($bengkel) {
            cloudinary()->destroy($bengkel->public_id);
        }
        $bengkel->delete();
        Alert::success("Terhapus", "Data Berhasil Terhapus");
        return redirect()->route('bengkel.index');
    }
}
