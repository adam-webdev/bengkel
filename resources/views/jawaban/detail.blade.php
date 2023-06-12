@extends('layouts.layout')
@section('title', 'Detail Jawaban')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Jawaban </h1>
        <!-- Button trigger modal -->
        {{-- @hasanyrole('Admin|User')
            <a href="{{ route('jawaban.edit', [$jawaban->id]) }}" class="btn btn-secondary">
                Edit Jawaban
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
                                <td>Kode Jawaban</td>
                                <td>:</td>
                                <td>{{ $jawaban->kode_jawaban }}</td>
                            </tr>
                            <tr>
                                <td>Jawaban </td>
                                <td>:</td>
                                <td>{{ $jawaban->isi_jawaban }}</td>
                            </tr>
                            <tr>
                                <td>Pertanyaan </td>
                                <td>:</td>
                                <td>{{ $jawaban->pertanyaan->nama_petanyaan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>



    {{-- <div class="row m-3 ">
        @hasanyrole('Admin|User')
            <div class="col-md-6 flex-grow-1">
                <a href="{{ route('.tambah', [$pertanyaan->id]) }}" class="btn btn-primary">Tambah pertanyaan</a>
            </div>
        @endhasanyrole
    </div> --}}

@endsection
