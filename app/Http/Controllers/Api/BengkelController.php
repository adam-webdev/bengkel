<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Api\BaseController;
use App\Models\Bengkel;
use Illuminate\Support\Facades\DB;

class BengkelController extends BaseController
{
    public function index()
    {
        $bengkel = Bengkel::inRandomOrder()->limit(3)->get();
        if ($bengkel) {
            return $this->success($bengkel, "data berhasil dikirim");
        } else {
            return $this->error("Data tidak ditemukan", "data tidak ditemukan");
        }
    }
    public function kota(Request $request)
    {
        $kota = DB::table('regencies')->where('province_id', $request->id)->get();
        if ($kota) {
            return $this->success($kota, "data berhasil dikirim");
        } else {
            return $this->error("data ditemukan.");
        }
    }
    public function kecamatan(Request $request)
    {

        $kecamatan = DB::table('districts')->where('regency_id', $request->id)->get();
        if ($kecamatan) {
            return $this->success($kecamatan, "data berhasil dikirim");
        } else {
            return $this->error("data ditemukan.");
        }
    }
    public function desa(Request $request)
    {
        $kecamatan = DB::table('villages')->where('district_id', $request->id)->get();
        if ($kecamatan) {
            return $this->success($kecamatan, "data berhasil dikirim");
        } else {
            return $this->error("data ditemukan.");
        }
    }
}
