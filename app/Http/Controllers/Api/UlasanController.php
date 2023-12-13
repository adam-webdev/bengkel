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
            return $this->success($ulasan, 'Data Ulasan berhasil dikirim');
        } else {
            return $this->error("Data ulasan tidak ditemukan");
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
                "angka_ulasan" => "required",
            ]
        );

        if ($validator->fails()) {
            return $this->error("Gagal tersimpan", $validator->errors());
        }

        $ulasan = new Ulasan();
        $ulasan->user_id = $request->user_id;
        $ulasan->bengkel_id = $request->bengkel_id;
        $ulasan->ulasan = $request->ulasan;
        $ulasan->angka_ulasan = $request->angka_ulasan;
        if ($ulasan->save()) {
            return $this->success("Data Ulasan berhasil disimpan", 201);
        } else {
            return $this->error("Data Ulasan Gagal disimpan", 401);
        }
    }
    public function show($user_id)
    {
        $ulasan = Ulasan::with('user', 'bengkel')->where('user_id', $user_id)->get();
        if ($ulasan) {
            return $this->success($ulasan, "Data ulasan berhasil dikirim");
        } else {
            return $this->error("Data ulasan tidak ditemukan", 404);
        }
    }
    public function update(Request $request, $user_id, $id)
    {
        $ulasan_id = Ulasan::findOrFail($id);
        $ulasan = Ulasan::where('user_id', $user_id)->where('id', $id)->update([
            "ulasan" => $request->ulasan,
            "angka_ulasan" => $request->angka_ulasan,
        ]);
        if ($ulasan) {
            return $this->success($ulasan, "Data ulasan berhasil dikirim");
        } else {
            return $this->error("Data ulasan tidak ditemukan", 404);
        }
    }
    public function delete($user_id, $id)
    {
        $ulasan_id = Ulasan::findOrFail($id);
        $ulasan = Ulasan::where('user_id', $user_id)->where('id', $id)->delete();
        if ($ulasan) {
            return $this->success($ulasan, "Data ulasan berhasil dikirim");
        } else {
            return $this->error("Data ulasan tidak ditemukan", 404);
        }
    }
}