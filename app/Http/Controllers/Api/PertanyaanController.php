<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Bengkel;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PertanyaanController extends BaseController
{
    public function index()
    {
        $pertanyaan = Pertanyaan::all();
        if ($pertanyaan) {
            return $this->success($pertanyaan, 'Data Berhasil dikirim');
        } else {
            return $this->error('Data tidak ditemukan');
        }
    }
    public function jawaban(Request $request, $id)
    {

        $jawaban = Jawaban::where('pertanyaan_id', $id)->get();
        if ($jawaban) {
            return $this->success($jawaban, 'Data Berhasil dikirim');
        } else {
            return $this->error('Data tidak ditemukan');
        }
    }
    public function jawabanwithquery(Request $request, $id, $query)
    {
        // var_dump($id, $query);
        // get lokasi if id = 1
        if ($id == 1) {
            // var_dump($query);
            $kota_id = DB::table('regencies')->where('name', 'LIKE', '%' . $query . '%')->pluck('id');
            // var_dump($kota_id);

            $bengkel = Bengkel::whereIn('kota_id', $kota_id)->get();
            if ($bengkel) {
                return $this->success($bengkel, 'Data Berhasil dikirim');
            } else {
                return $this->error('Data tidak ditemukan');
            }
            // var_dump($bengkel);
        }
        if ($id == 3) {
            $akun = User::where('id', Auth::user()->id)->get();
            if ($akun) {
                return $this->success($akun, 'Data Berhasil dikirim');
            }
            return $this->error('Data tidak ditemukan');
        }

        // $jawaban = Jawaban::where('pertanyaan_id', $id)->get();
        // if ($jawaban) {
        //     return $this->success($jawaban, 'Data Berhasil dikirim');
        // } else {
        //     return $this->error('Data tidak ditemukan');
        // }
    }
    // public function pertanyaan(Request $request,$id)
    // {
    //     $pertanyaan = Pertanyaan
    // }
}
