<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barang_keluar;
use App\Models\Barang_masuk;
use App\Models\BarangRusak;
use App\Models\Kondisi;
use App\Models\PindahBarang;
use App\Models\Ruangan;
use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function view_barang()
    {
        return view('laporan.barang.index');
    }

    public function barang(Request $request)
    {
        $periode = $request->periode;
        if ($periode == "all") {
            $data = Barang::get();
            $pdf = PDF::loadview('laporan.barang.print', compact('data', 'periode'))->setPaper('A4');
            return $pdf->stream('laporan-all.pdf');
        } else if ($periode == "periode") {
            $tahun = $request->tahun;
            // $tgl_akhir = $request->akhir;
            $data = Barang::where('tahun', $tahun)
                ->orderBy('created_at', 'DESC')->get();
            $pdf = PDF::loadview('laporan.barang.print', compact('data', 'periode', 'tahun'))->setPaper('A4');
            return $pdf->stream('laporan-periode-barang.pdf');
        }
    }
    public function view_ruangan()
    {
        return view('laporan.ruangan.index');
    }

    public function ruangan(Request $request)
    {
        $periode = $request->periode;
        if ($periode == "all") {
            $data = Ruangan::get();
            $pdf = PDF::loadview('laporan.ruangan.print', compact('data', 'periode'))->setPaper('A4');
            return $pdf->stream('laporan-all.pdf');
        } else if ($periode == "periode") {
            $tgl_awal = $request->awal;
            $tgl_akhir = $request->akhir;
            $data = Ruangan::whereBetween('created_at', [$tgl_awal, $tgl_akhir])
                ->orderBy('created_at', 'ASC')->get();
            $pdf = PDF::loadview('laporan.ruangan.print', compact('data', 'periode', 'tahun'))->setPaper('A4');
            return $pdf->stream('laporan-periode-ruangan.pdf');
        }
    }

    // public function view_barang_rusak()
    // {
    //     return view('laporan.barang-rusak.index');
    // }
    // public function barang_rusak(Request $request)
    // {
    //     $periode2 = $request->periode;
    //     if ($periode2 == "all") {
    //         $data2 = BarangRusak::with("barang")->get();
    //         $pdf2 = PDF::loadview('laporan.barang-rusak.print', compact('data2', 'periode2'))->setPaper('A4');
    //         return $pdf2->stream('laporan-all.pdf');
    //     } else if ($periode2 == "periode") {
    //         $tgl_awal2 = $request->awal;
    //         $tgl_akhir2 = $request->akhir;
    //         $data2 = BarangRusak::whereBetween('created_at', [$tgl_awal2, $tgl_akhir2])
    //             ->orderBy('created_at', 'ASC')->get();
    //         $pdf2 = PDF::loadview('laporan.barang-rusak.print', compact('data2', 'periode2', 'tgl_awal2', 'tgl_akhir2'))->setPaper('A4');
    //         return $pdf2->stream('laporan-periode-barang-rusak.pdf');
    //     }
    // }
    public function view_kondisi()
    {
        return view('laporan.kondisi.index');
    }
    public function kondisi(Request $request)
    {
        $periode = $request->periode;
        if ($periode == "all") {
            $data = Kondisi::get();
            $pdf = PDF::loadview('laporan.kondisi.print', compact('data', 'periode'))->setPaper('A4');
            return $pdf->stream('laporan-all.pdf');
        } else if ($periode == "periode") {
            $tgl_awal = $request->awal;
            $tgl_akhir = $request->akhir;
            $data = Kondisi::whereBetween('created_at', [$tgl_awal, $tgl_akhir])
                ->orderBy('created_at', 'ASC')->get();
            $pdf = PDF::loadview('laporan.kondisi.print', compact('data', 'periode', 'tgl_awal', 'tgl_akhir'))->setPaper('A4');
            return $pdf->stream('laporan-periode-kondisi.pdf');
        }
    }
    public function view_letak_barang()
    {
        return view('laporan.letak_barang.index');
    }
    public function letak_barang(Request $request)
    {
        $periode = $request->periode;
        if ($periode == "all") {
            $data = PindahBarang::get();
            $pdf = PDF::loadview('laporan.letak_barang.print', compact('data', 'periode'))->setPaper('A4');
            return $pdf->stream('laporan-all.pdf');
        } else if ($periode == "periode") {
            $tgl_awal = $request->awal;
            $tgl_akhir = $request->akhir;
            $data = PindahBarang::whereBetween('created_at', [$tgl_awal, $tgl_akhir])
                ->orderBy('created_at', 'ASC')->get();
            $pdf = PDF::loadview('laporan.letak_barang.print', compact('data', 'periode', 'tgl_awal', 'tgl_akhir'))->setPaper('A4');
            return $pdf->stream('laporan-periode-letak_barang.pdf');
        }
    }
}