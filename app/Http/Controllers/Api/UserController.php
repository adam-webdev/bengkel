<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    public function index()
    {
        $user = User::all();
        if ($user) {
            return $this->success(UserResource::collection($user), "Data Berhasil dikirim");
        } else {
            return $this->error("Data tidak ditemukan!");
        }
    }

    public function show($id)
    {

        $user = User::findOrFail($id);
        if ($user) {
            return $this->success($user, "Data Berhasil dikirim");
        } else {
            return $this->error("Data tidak ditemukan");
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "nama" => "required",
                "foto" => "mimes:png,jpg,jpeg|max:4096",
                "no_hp" => "required",
                "email" => "required|email",
                "password" => "required"
            ]
        );

        if ($validator->fails()) {
            return $this->error("terjadi kesalahan berikut", $validator->errors());
        }
        $exist_email = User::where('email', $request->email)->first();
        if ($exist_email) {
            return $this->error("Email sudah digunakan!");
        }
        $user = new User();

        if ($request->file('foto')) {
            $foto = cloudinary()->upload($request->file('foto')->getRealPath());
            $secure_url = $foto->getSecurePath();
            $public_id = $foto->getPublicId();
        } else {
            $secure_url = "";
            $public_id = "";
        }

        $user->name = $request->name;
        $user->foto = $secure_url;
        $user->public_id = $public_id;
        $user->no_hp = $request->no_hp;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->provinsi_id = $request->provinsi_id;
        $user->kota_id = $request->kota_id;
        $user->kecamatan_id = $request->kecamatan_id;
        $user->desa_id = $request->desa_id;
        $user->email = $request->email;
        if ($user->save()) {
            return $this->success("Data berhasil ditambahkan", 201);
        } else {
            return $this->error("Data gagal disimpan");
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            if ($user->foto) {
                if ($request->file('foto')) {
                    if ($user->public_id == null) {
                        $foto = cloudinary()->upload($request->file('foto')->getRealPath());
                        $secure_url = $foto->getSecurePath();
                        $public_id = $foto->getPublicId();
                    } else {

                        cloudinary()->destroy($user->public_id);
                        $foto = cloudinary()->upload($request->file('foto')->getRealPath());
                        $secure_url = $foto->getSecurePath();
                        $public_id = $foto->getPublicId();
                    }
                } else {
                    $secure_url = $user->foto;
                    $public_id = $user->foto;
                }
            } else {
                $foto = cloudinary()->upload($request->file('foto')->getRealPath());
                $secure_url = $foto->getSecurePath();
                $public_id = $foto->getPublicId();
            }

            $user->name = $request->name;
            $user->foto = $secure_url;
            $user->public_id = $public_id;
            $user->no_hp = $request->no_hp;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->provinsi_id = $request->provinsi_id;
            $user->kota_id = $request->kota_id;
            $user->kecamatan_id = $request->kecamatan_id;
            $user->desa_id = $request->desa_id;
            $user->email = $request->email;
            if ($user->save()) {
                return $this->success("Data berhasil diubah", 201);
            } else {
                return $this->error("Data gagal diubah");
            }
        } else {
            return $this->error("Data tidak ditemukan");
        }
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            if ($user->public_id) {
                cloudinary()->destroy($user->public_id);
            }
            $user->delete();
            return $this->success('Data berhasil dihapus', 200);
        } else {
            return $this->error('Data Tidak ditemukan', 404);
        }
    }
}
