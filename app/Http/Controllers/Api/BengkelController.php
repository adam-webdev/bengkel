<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\BengkelResource;
use App\Models\Bengkel;
use App\Models\Ulasan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BengkelController extends BaseController
{
    public function index()
    {
        $bengkel = Bengkel::with('user')->inRandomOrder()->get();
        if ($bengkel) {
            return $this->success($bengkel, "data berhasil dikirim",);
        } else {
            return $this->error("Data tidak ditemukan");
        }
    }
    public function provinsi(Request $request)
    {
        $provinsii = DB::table('provinces')->where('id', $request->id)->get();
        // ddd(count($provinsi));
        if (count($provinsii) == 0) {
            return $this->error("Data tidak ditemukan");
        } else {
            return $this->success($provinsii, "data berhasil dikirim");
        }
    }
    public function kota(Request $request)
    {
        $kota = DB::table('regencies')->where('province_id', $request->id)->get();
        if (count($kota) == 0) {
            return $this->error("data tidak ditemukan.");
        } else {
            return $this->success($kota, "data berhasil dikirim");
        }
    }
    public function kecamatan(Request $request)
    {

        $kecamatan = DB::table('districts')->where('regency_id', $request->id)->get();
        if (count($kecamatan) == 0) {
            return $this->success($kecamatan, "data berhasil dikirim");
        } else {
            return $this->error("data ditemukan.");
        }
    }

    public function desa(Request $request)
    {
        $kecamatan = DB::table('villages')->where('district_id', $request->id)->get();
        if (count($kecamatan) == 0) {
            return $this->success($kecamatan, "data berhasil dikirim");
        } else {
            return $this->error("data tidak ditemukan.");
        }
    }

    public function show($id)
    {
        $bengkel = Bengkel::findOrFail($id);

        $total_rating = Ulasan::select('angka_ulasan')->where('bengkel_id', $id)->sum('angka_ulasan');
        $jumlah_rating = Ulasan::select('angka_ulasan')->where('bengkel_id', $id)->count();
        if ($jumlah_rating > 0) {
            $rating = $total_rating / $jumlah_rating;
            $bengkel["rating"] = floor($rating);
            $bengkel["ulasan"] = $jumlah_rating;
        } else {
            $bengkel["rating"] = 0;
            $bengkel["ulasan"] = $jumlah_rating;
        }
        // $data = [
        //     "bengkel" => $bengkel,
        //     "rating" => $rating
        // ];

        if ($bengkel) {
            // $bengkel['foto_bengkel'] = stripslashes(url($bengkel['foto_bengkel']));
            return $this->success($bengkel, "data berhasil dikirim");
        } else {
            return $this->error("data tidak ditemukan.");
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "user_id" => "required",
                "nama_bengkel" => "required",
                "foto_bengkel" => "mimes:png,jpg,jpeg|max:4096",
                "jam_buka" => "required",
                "jam_tutup" => "required",
                "no_hp" => "required",
                "email" => "required|email",
            ]
        );

        if ($validator->fails()) {
            return $this->error("terjadi kesalahan berikut", $validator->errors());
        }
        $exist_email = Bengkel::where('email', $request->email)->first();
        if ($exist_email) {
            return $this->error("Email sudah digunakan!");
        }
        $exist_user = Bengkel::where('user_id', $request->user_id)->first();
        if ($exist_user) {
            return $this->error("Anda sudah pernah membuat bengkel! Maksimal 1 User 1 Bengkel", []);
        }
        // upload image to cloudinary
        $uploadedImgeUrl = cloudinary()->upload($request->file('foto_bengkel')->getRealPath());

        $secure_url = $uploadedImgeUrl->getSecurePath();
        $public_id = $uploadedImgeUrl->getPublicId();

        $newbengkel = new Bengkel();
        $newbengkel->user_id = $request->user_id;
        $newbengkel->nama_bengkel = $request->nama_bengkel;
        $newbengkel->deskripsi = $request->deskripsi;
        $newbengkel->foto_bengkel = $secure_url;
        $newbengkel->public_id = $public_id;
        $newbengkel->jam_buka = $request->jam_buka;
        $newbengkel->jam_tutup = $request->jam_tutup;
        $newbengkel->no_hp = $request->no_hp;
        $newbengkel->email = $request->email;
        $newbengkel->provinsi_id = $request->provinsi_id;
        $newbengkel->kota_id = $request->kota_id;
        $newbengkel->kecamatan_id = $request->kecamatan_id;
        $newbengkel->desa_id = $request->desa_id;
        $newbengkel->ulasan_id = $request->ulasan_id;
        $newbengkel->longitude = $request->longitude;
        $newbengkel->latitude = $request->latitude;
        $newbengkel->alamat_lengkap = $request->alamat_lengkap;
        if ($newbengkel->save()) {
            return $this->success("Data Berhasil disimpan", '', 201);
        } else {
            return $this->error("Gagal kesalahan");
        }
    }
    public function image(Request $request)
    {
        // $uploadedImgeUrl = cloudinary()->upload($request->file('foto_bengkel')->getRealPath())->getSecurePath();
        ddd(cloudinary()->upload($request->file('foto_bengkel')->getRealPath()));
    }
    public function update($id, Request $request)
    {
        $bengkel = Bengkel::findOrFail($id);
        if (!$bengkel) {
            return $this->error("Data tidak ditemukan!");
        } else {
            if ($request->file('foto_bengkel')) {
                // delete picture on cloudinary
                cloudinary()->destroy($bengkel->public_id);
                // upload picture on cloudinary
                $uploadedImgeUrl = cloudinary()->upload($request->file('foto_bengkel')->getRealPath());

                $secure_url = $uploadedImgeUrl->getSecurePath();
                $public_id = $uploadedImgeUrl->getPublicId();
            } else {
                $secure_url = $bengkel->foto_bengkel;
                $public_id = $bengkel->public_id;
            }
            $bengkel->nama_bengkel = $request->nama_bengkel;
            // $bengkel->foto_bengkel = $secure_url;
            $bengkel->deskripsi = $request->deskripsi;

            $bengkel->foto_bengkel = $secure_url;
            $bengkel->email = $request->email;
            $bengkel->no_hp = $request->no_hp;
            $bengkel->alamat_lengkap = $request->alamat_lengkap;
            $bengkel->jam_buka = $request->jam_buka;
            $bengkel->jam_tutup = $request->jam_tutup;
            $bengkel->longitude = $request->longitude;
            $bengkel->latitude = $request->latitude;
            $bengkel->public_id = $public_id;
            $bengkel->provinsi_id = $request->provinsi_id;
            $bengkel->kota_id = $request->kota_id;
            $bengkel->kecamatan_id = $request->kecamatan_id;
            $bengkel->desa_id = $request->desa_id;
            $bengkel->ulasan_id = $request->ulasan_id;
            if ($bengkel->save()) {
                return $this->success("Data Berhasil diupdate", 201);
            } else {
                return $this->error("Data gagal diubah");
            }
        }
    }
    public function delete($id)
    {
        $bengkel = Bengkel::findOrFail($id);
        if ($bengkel) {
            cloudinary()->destroy($bengkel->public_id);
            if ($bengkel->delete()) {
                return $this->success("Data berhasil dihapus", 200);
            } else {
                return $this->error('Data gagal dihapus');
            }
        }
        return $this->error('Data tidak ditemukan', 404);
    }
    // 'LIKE','%'.$term.'%')
    //   ->get();
    public function search($kota)
    {
        $kota_id = DB::table('regencies')->where('name', 'LIKE', '%' . $kota . '%')->pluck('id');
        // var_dump($kota_id);

        $bengkel = Bengkel::whereIn('kota_id', $kota_id)->get();
        if ($bengkel) {
            return $this->success($bengkel, 'Data Berhasil dikirim');
        } else {
            return $this->error('Data tidak ditemukan');
        }
    }
    public function provinsiName(Request $request)
    {
        $provinsii = DB::table('provinces')->where('id', $request->id)->get();
        // ddd(count($provinsi));
        if (count($provinsii) == 0) {
            return $this->error("Data tidak ditemukan");
        } else {
            return $this->success($provinsii, "data berhasil dikirim");
        }
    }
    public function kotaName(Request $request)
    {
        $kota = DB::table('regencies')->where('id', $request->id)->get();
        if (count($kota) == 0) {
            return $this->error("data tidak ditemukan.");
        } else {
            return $this->success($kota, "data berhasil dikirim");
        }
    }
    public function kecamatanName(Request $request)
    {

        $kecamatan = DB::table('districts')->where('id', $request->id)->get();
        if (count($kecamatan) == 0) {
            return $this->success($kecamatan, "data berhasil dikirim");
        } else {
            return $this->error("data ditemukan.");
        }
    }

    public function desaName(Request $request)
    {
        $kecamatan = DB::table('villages')->where('id', $request->id)->get();
        if (count($kecamatan) == 0) {
            return $this->success($kecamatan, "data berhasil dikirim");
        } else {
            return $this->error("data tidak ditemukan.");
        }
    }
}
