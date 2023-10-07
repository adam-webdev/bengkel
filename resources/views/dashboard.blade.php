@extends('layouts.layout')
@section('content')
    <div class="card p-2">
        <h4 class="p-2">Selamat Datang <b>{{ Auth::user()->name }}</b></h4>



    </div>
    <div class="row px-4 mt-3">
        <div class="col-md-3">
            <a href="{{ route('bengkel.index') }}" class="card p-4 text-decoration-none "style="color:black">
                <img src="{{ asset('asset/img/approve.svg') }}" width="50px" alt="">
                <p style="font-size: 20px; margin-top:10px"> {{ $bengkel }}</p>
                <p>Data Bengkel</p>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('order.index') }}" class="card p-4 text-decoration-none "style="color:black">
                <img src="{{ asset('asset/img/pembayaran.svg') }}" width="50px" alt="">
                <p style="font-size: 20px; margin-top:10px"> {{ $order }}</p>
                <p>Data Order</p>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('user.index') }}" class="card p-4 text-decoration-none "style="color:black">
                <img src="{{ asset('asset/img/merah.svg') }}" width="50px"alt="">
                <p style="font-size: 20px; margin-top:10px"> {{ $pengguna }}</p>
                <p>Data Pengguna</p>
            </a>
        </div>
        {{-- <div class="col-md-3">
            <a href="" class="card p-4 text-decoration-none "style="color:black">
                <img src="{{ asset('asset/img/merah.svg') }}" width="50px"alt="">
                <p style="font-size: 20px; margin-top:10px"> {{ $pengguna }}</p>
                <p>Data Pengguna</p>
            </a>
        </div> --}}

        {{-- <div class="col-md-2">
                <img src="{{ asset('asset/img/delivery.svg') }}" width="50px" alt="">
                <p style="font-size: 20px; margin-top:10px"> {{ $delivery }}</p>
                <p>Delivery</p>
            </div>
            <div class="col-md-2">
                <img src="{{ asset('asset/img/ceklis.png') }}" width="50px" alt="">
                <p style="font-size: 20px; margin-top:10px"> {{ $spv_verif }}</p>
                <p>Spv Verification</p>
            </div> --}}
    </div>
    {{-- <div class="row align-items-center">
        <div class="col-md-4 ml-4">
            <img width="400px" height="400px" src="{{ asset('asset/img/company.svg') }}" alt="">
        </div>
        <div class="col-md-6">
            <div class="row">

                <div class="col-md-4">
                    <a style="text-decoration:none; color:black; hover" href="{{ route('user.index') }}">
                        <div class="card p-4">
                            <p style="font-weight: 700">Pengguna</p>
                            <p style="font-weight: 700; font-size:38px;">{{ $pengguna }}</p>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </div> --}}
@endsection
