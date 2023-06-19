<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

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
    // public function pertanyaan(Request $request,$id)
    // {
    //     $pertanyaan = Pertanyaan
    // }
}
