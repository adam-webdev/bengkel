<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UlasanController extends BaseController
{
    public function index($bengkel_id)
    {
        $ulasan = Ulasan::with('user', 'bengkel')->where('bengkel_id', $bengkel_id)->get();
        if ($ulasan) {
            return $this->success($ulasan, 'Data berhasil dikirim');
        } else {
            return $this->error("Data tidak ditemukan");
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "user_id" => "required",
                "bengkel_id" => "required",
                "ulasan" => "required",
                "foto_ulasan" => "mimes:png,jpg,jpeg|max:4096",
                "angka_ulasan" => "required",
                "tanggal_ulasan" => "required",
            ]
        );

        if ($validator->fails()) {
            return $this->error("Gagal tersimpan", $validator->errors());
        }
        if ($request->file('foto_ulasan')) {
            $foto = cloudinary()->upload($request->file('foto_ulasan')->getRealPath());
            $secure_url = $foto->getSecurePath();
            $public_id = $foto->getPublicId();
        } else {
            $secure_url = "";
            $public_id = "";
        }
        $ulasan = new Ulasan();
        $ulasan->user_id = $request->user_id;
        $ulasan->bengkel_id = $request->bengkel_id;
        $ulasan->ulasan = $request->ulasan;
        $ulasan->tanggal_ulasan = $request->tanggal_ulasan;
        $ulasan->angka_ulasan = $request->angka_ulasan;
        $ulasan->foto_ulasan = $secure_url;
        $ulasan->public_id = $public_id;
        if ($ulasan->save()) {
            return $this->success("Data berhasil disimpan", 201);
        } else {
            return $this->error("Data Gagal disimpan", 401);
        }
    }
    public function show($id)
    {
        $ulasan = Ulasan::with('user', 'bengkel')->where('id', $id)->first();
        if ($ulasan) {
            return $this->success($ulasan, "Data berhasil dikirim");
        } else {
            return $this->error("Data tidak ditemukan", 404);
        }
    }
    public function update(Request $request, $user_id, $id)
    {
        $ulasan_id = Ulasan::findOrFail($id);
        if ($request->file('foto_ulasan')) {
            if ($ulasan_id->public_id) {
                cloudinary()->destroy($ulasan_id->public_id);
            }
            $foto = cloudinary()->upload($request->file('foto_ulasan')->getRealPath());
            $secure_url = $foto->getSecurePath();
            $public_id = $foto->getPublicId();
        } else {
            $secure_url = $ulasan_id->foto_ulasan;
            $public_id = $ulasan_id->public_id;
        }
        $ulasan = Ulasan::where('user_id', $user_id)->where('id', $id)->update([
            "ulasan" => $request->ulasan,
            "angka_ulasan" => $request->angka_ulasan,
            "tanggal_ulasan" => $request->tanggal_ulasan,
            "public_id" => $public_id,
            "foto_ulasan" => $secure_url
        ]);
    }
}
