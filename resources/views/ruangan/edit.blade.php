@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')
    <form action="{{ route('ruangan.update', [$ruangan->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <fieldset>
            <legend>Edit Barang masuk</legend>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="ruangan">Nama Ruangan :</label>
                    <input type="text" name="nama_ruangan" value="{{ $ruangan->nama_ruangan }}" class="form-control"
                        id="ruangan" required>
                </div>
                <div class="col-md-5">
                    <label for="kode">Kode Ruangan :</label>
                    <input type="text" name="kode_ruangan" value="{{ $ruangan->kode_ruangan }}" class="form-control"
                        id="kode" required>
                </div>
            </div>
            <input type="submit" class="btn btn-success btn-send" value="Update">
            <input type="Button" class="btn btn-primary btn-send" value="Kembali" onclick="history.go(-1)">
        </fieldset>
    </form>
@endsection
