@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')
    @role('Admin')
        <form action="{{ route('barang.update', [$barang->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="kode_barang">Kode Barang :</label>
                <input type="text" name="kode_barang" value="{{ $barang->kode_barang }}" class="form-control"
                    id="kode_barang" required>
            </div>
            <div class="form-group">
                <label for="barang">Nama Barang :</label>
                <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" class="form-control" id="barang"
                    required>
            </div>
            <div class="form-group">
                <label for="jumlah_barang">Jumlah Barang :</label>
                <input type="number" name="jumlah_barang" value="{{ $barang->jumlah_barang }}" class="form-control"
                    id="jumlah_barang" required>
            </div>

            <div class="form-group">
                <label for="type">Merk type :</label>
                <input type="text" name="merk_type" value="{{ $barang->merk_type }}" class=" form-control" id="type" required>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun Perolehan :</label>
                <input type="number" name="tahun" value="{{ $barang->tahun }}" class="form-control" id="tahun" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto Barang :</label><br>
                <img src="/storage/{{ $barang->image }}" alt="barang" width="150" height="150">
                <input type="file" name="image" class="form-control mt-2" id="foto">
            </div>

            <div class="modal-footer">
                <input type="submit" class="btn btn-primary btn-send" value="Simpan">
            </div>
        </form>
    @endrole
@endsection
