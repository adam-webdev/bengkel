@extends('layouts.layout')
@section('title', 'Detail Pertanyaan')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pertanyaan </h1>
        <!-- Button trigger modal -->
        {{-- @hasanyrole('Admin|User')
            <a href="{{ route('pertanyaan.edit', [$pertanyaan->id]) }}" class="btn btn-secondary">
                Edit Pertanyaan
            </a>
        @endhasanyrole --}}

    </div>

    <div class="card p-4">
        <div class="row">
            <div class="col-md-6">
                <div class="left">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>Kode Pertanyaan</td>
                                <td>:</td>
                                <td>{{ $pertanyaan->kode_pertanyaan }}</td>
                            </tr>
                            <tr>
                                <td>Nama Pertanyaan </td>
                                <td>:</td>
                                <td>{{ $pertanyaan->nama_pertanyaan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="left">

                </div>
            </div>
        </div>
    </div>



    {{-- <div class="row m-3 ">
        @hasanyrole('Admin|User')
            <div class="col-md-6 flex-grow-1">
                <a href="{{ route('pertanyaan.tambah', [$pertanyaan->id]) }}" class="btn btn-primary">Tambah pertanyaan</a>
            </div>
        @endhasanyrole
    </div> --}}

@endsection
