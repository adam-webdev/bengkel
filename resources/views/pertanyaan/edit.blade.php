@extends('layouts.layout')
@section('title', 'Edit Pertanyaan')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Pertanyaan </h1>
    </div>
    <div class="card p-4">
        <form action="{{ route('pertanyaan.update', [$pertanyaan->id]) }}" method="POST">
            @method('put')
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_pertanyaan">Kode Pertanyaan :</label>
                            <input type="number" name="kode_pertanyaan" value="{{ $pertanyaan->kode_pertanyaan }}"
                                class="form-control" id="kode_pertanyaan" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_pertanyaan">Pertanyaan :</label>
                            <input type="text" name="nama_pertanyaan" value="{{ $pertanyaan->nama_pertanyaan }}"
                                class="form-control" id="nama_pertanyaan" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="history.back(-1)"> Batal</button>
                @hasanyrole('Admin|User')
                    <input type="submit" class="btn btn-primary btn-send" value="Simpan">
                @endhasanyrole
            </div>
        </form>
    </div>
@endsection
