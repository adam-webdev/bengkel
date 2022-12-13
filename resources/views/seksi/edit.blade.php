@extends('layouts.layout')
@section('title', 'Edit Section')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Section </h1>
    </div>

    <div class="card p-4">
        <form action="{{ route('seksi.update', [$seksi->id]) }}" method="POST">
            @method('put')
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="seksi">Nama seksi :</label>
                            <input type="text" name="nama_seksi" value="{{ $seksi->nama_seksi }}" class="form-control"
                                id="seksi" required>
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
