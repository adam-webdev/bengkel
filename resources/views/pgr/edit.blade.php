@extends('layouts.layout')
@section('title', 'Edit PGR')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit PGR </h1>
    </div>

    <div class="card p-4">
        <form action="{{ route('pgr.update', [$pgr->id]) }}" method="POST">
            @method('put')
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="pgr">Kode Pgr :</label>
                            <input type="text" name="kode_pgr" value="{{ $pgr->kode_pgr }}" class="form-control"
                                id="pgr" required>
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
