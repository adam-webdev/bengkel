@extends('layouts.layout')
@section('title', 'Edit Jawaban')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Jawaban </h1>
    </div>
    <div class="card p-4">
        <form action="{{ route('jawaban.update', [$jawaban->id]) }}" method="POST">
            @method('put')
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" id="pertanyaan">
                        <div class="form-group">
                            <label for="">Pertanyaan :</label>
                            <select class="form-control provinsi input--custom" name="pertanyaan_id" style="width:100%"
                                id="pertanyaan">
                                <option value="">--- Pilih Pertanyaan ---</option>
                                @foreach ($pertanyaan as $pertanyaan)
                                    <option value="{{ $pertanyaan->id }}"
                                        {{ $jawaban->pertanyaan_id === $pertanyaan->id ? 'selected' : '' }}>
                                        {{ $pertanyaan->nama_pertanyaan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_jawaban">Kode Jawaban :</label>
                            <input type="number" name="kode_jawaban" value="{{ $jawaban->kode_jawaban }}"
                                class="form-control" id="kode_jawaban" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="isi_jawaban">Jawaban :</label>
                            <input type="text" name="isi_jawaban" value="{{ $jawaban->isi_jawaban }}"
                                class="form-control" id="isi_pertanyaan" required>
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
