<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BengkelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bengkel = Bengkel::all();
        return view('bengkel.index', compact('bengkel'));
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
        $newbengkel->jenis_kelamin = $request->jenis_kelamin;
        $newbengkel->foto = $foto;

        $newbengkel->save();
        Alert::success("Tersimpan", "Data Berhasil Disimpan!");
        return redirect()->route('user.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrfail($id);
        return view('admin.edit', compact('user'));
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
        $user = User::findOrfail($id);
        $foto = $request->file('foto');
        if ($foto) {
            Storage::delete($user->foto);
            $foto = $foto->storeAs('user/profil', $request->file('foto')->getClientOriginalName());
        } else {
            $foto = $user->foto;
        }

        $user->name = $request->name;
        $user->no_hp = $request->no_hp;
        $user->tipe_user = $request->tipe_user;
        $user->provinsi_id = $request->provinsi_id;
        $user->kota_id = $request->kota_id;
        $user->kecamatan_id = $request->kecamatan_id;
        $user->desa_id = $request->desa_id;
        $user->email = $request->email;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->foto = $foto;
        $user->password = bcrypt($request->password);
        if ($request->get('roles') === "Admin") {
            $user->removeRole("Admin", "Admin Bengkel", "User");
            $user->assignRole("Admin");
        } else if ($request->get('roles') === "Admin Bengkel") {
            $user->removeRole("Admin", "Admin Bengkel", "User");
            $user->assignRole("Admin Bengkel");
        } else {
            $user->removeRole("Admin", "Admin Bengkel", "User");
            $user->assignRole("User");
        }
        $user->save();
        Alert::success("Tersimpan", "Data Berhasil Disimpan!");
        return redirect()->route('user.index', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);
        Storage::delete($user->foto);
        $user->delete();
        $user->removeRole("Admin", "Admin Bengkel", "User");
        Alert::success("Terhapus", "Data Berhasil Terhapus");
        return redirect()->route('user.index');
    }
}