@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')
    <form action="{{ route('kondisi.update', [$kondisi->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <fieldset>
            <legend>Edit Barang masuk</legend>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="barang">Nama Barang :</label>
                    <select style="width:100%" name="barang_id" id="barang" class="form-control select" required>
                        {{-- <option value="{{ $kondisi->barang->id }}">{{ $kondisi->barang->nama_barang }}</option> --}}
                        @foreach ($barang as $b)
                            <option value="{{ $b->id }}" {{ $kondisi->barang->id === $b->id ? 'selected' : '' }}>
                                {{ $kondisi->barang->nama_barang === $b->nama_barang ? $kondisi->barang->nama_barang : $b->nama_barang }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <label for="baik">Kondisi Baik :</label>
                    <input type="number" name="baik" value="{{ $kondisi->baik }}" class="form-control" id="baik">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-5">
                    <label for="rusak_ringan">Kondisi Rusak Ringan :</label>
                    <input type="number" value="{{ $kondisi->rusak_ringan }}" name="rusak_ringan" class="form-control"
                        id="rusak_ringan">
                </div>
                <div class="col-md-5">
                    <label for="rusak_berat">Kondisi Rusak Berat :</label>
                    <input type="number" value="{{ $kondisi->rusak_berat }}" name="rusak_berat" class="form-control"
                        id="rusak_berat">
                </div>

            </div>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="foto">Foto Barang :</label><br>
                    <img src="/storage/{{ $kondisi->image }}" alt="barang" width="150" height="150">
                    <input type="file" name="image" class="form-control mt-2" id="foto">
                </div>
            </div>
            <input type="submit" class="btn btn-success btn-send" value="Update">
            <input type="Button" class="btn btn-primary btn-send" value="Kembali" onclick="history.go(-1)">
        </fieldset>
    </form>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select').select2({
                tags: true,
                width: 'resolve'
            });
        });
    </script>
@endsection
