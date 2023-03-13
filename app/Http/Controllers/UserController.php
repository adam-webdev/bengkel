<?php

namespace App\Http\Controllers;

use App\Models\Pgr;
use App\Models\Posisi;
use App\Models\Seksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = DB::table('provinces')->get();
        $user = User::all();
        return view('admin.user', compact('user', 'provinsi'));
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
        $foto = $request->file('foto');
        if ($foto) {
            $foto = $foto->storeAs('user/profil', $request->file('foto')->getClientOriginalName());
        } else {
            $foto = 'default.jpg';
        }

        $new_user = new User;
        $new_user->name = $request->name;
        $new_user->no_hp = $request->no_hp;
        // $new_user->tipe_user = $request->tipe_user;
        $new_user->provinsi_id = $request->provinsi_id;
        $new_user->kota_id = $request->kota_id;
        $new_user->kecamatan_id = $request->kecamatan_id;
        $new_user->desa_id = $request->desa_id;
        $new_user->email = $request->email;
        $new_user->jenis_kelamin = $request->jenis_kelamin;
        $new_user->foto = $foto;
        $new_user->password = bcrypt($request->password);
        if ($request->get('roles') === "Admin") {
            $new_user->assignRole("Admin");
        } else if ($request->get('roles') === "Admin Bengkel") {
            $new_user->assignRole("Admin Bengkel");
        } else {
            $new_user->assignRole("User");
        }
        $new_user->save();
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

        $provinsi = DB::table('provinces')->where('id', $user->provinsi_id)->first();
        $kota = DB::table('regencies')->where('id', $user->kota_id)->first();
        $kecamatan = DB::table('districts')->where('id', $user->kecamatan_id)->first();
        $desa = DB::table('villages')->where('id', $user->desa_id)->first();

        return view('admin.profile', compact('user', 'provinsi', 'kota', 'kecamatan', 'desa'));
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
        // $user->tipe_user = $request->tipe_user;
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
        return redirect()->route('user.index');
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
