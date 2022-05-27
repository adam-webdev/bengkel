@extends('layouts.layout')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Kondisi Barang</h1>

    </div>

    <form action="{{ route('laporan.kondisi') }}" method="post">
        @csrf
        <div class="card p-4 flex justify-content-between">
            <div class="row">
                <div class="col-md-3">
                    <label for="periode">Pilih Periode Transaksi :</label>
                    <select name="periode" id="periode" class="form-control">
                        <option value="all">Semua</option>
                        <option value="periode">Periode</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="awal">Pilih Dari Bulan : </label>
                    <input type="date" name="awal" id="awal" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="akhir">Sampai Bulan :</label>
                    <input type="date" name="akhir" id="akhir" class="form-control">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary mt-4" style="margin-top:32px !important;"><i
                            class="fas fa-print mr-2"></i>Cetak</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal -->
@endsection
