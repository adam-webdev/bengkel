@extends('layouts.layout')
@section('content')
    <div class="card">
        <h4 class="p-2">Selamat Datang <b>{{ $data }}</b></h4>
    </div>

    <div class="row align-items-center">
        <div class="col-md-4 ml-4">
            <img width="400px" height="400px" src="{{ asset('asset/img/company.svg') }}" alt="">
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4">
                    <a style="text-decoration:none; color:black; hover" href="{{ route('ruangan.index') }}">
                        <div class="card p-4">
                            <p style="font-weight: 700">Data Ruangan</p>
                            <p style="font-weight: 700; font-size:38px;">{{ $ruangan }}</p>
                        </div>
                    </a>
                </div>
                <div class=" col-md-4">
                    <a style="text-decoration:none; color:black; hover" href="{{ route('barang.index') }}">
                        <div class="card p-4">
                            <p style="font-weight: 700">Data Barang</p>
                            <p style="font-weight: 700; font-size:38px;">{{ $barang }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a style="text-decoration:none; color:black; hover" href="{{ route('user.index') }}">
                        <div class="card p-4">
                            <p style="font-weight: 700">Pengguna</p>
                            <p style="font-weight: 700; font-size:38px;">{{ $pengguna }}</p>
                        </div>
                    </a>
                </div>

            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <a style="text-decoration:none; color:black; hover" href="{{ route('barang_masuk.index') }}">
                        <div class="card p-4">
                            <p style="font-weight: 700">Barang Masuk</p>
                            <p style="font-weight: 700; font-size:38px;">{{ $barang_masuk }}</p>
                        </div>
                    </a>
                </div>
                {{-- <div class="col-md-4">
                    <a style="text-decoration:none; color:black; hover" href="{{ route('barang_rusak.index') }}">
                        <div class="card p-4">
                            <p style="font-weight: 700">Barang Rusak</p>
                            <p style="font-weight: 700; font-size:38px;">{{ $barang_rusak }}</p>
                        </div>
                    </a>
                </div> --}}

            </div>

        </div>
    </div>
@endsection
