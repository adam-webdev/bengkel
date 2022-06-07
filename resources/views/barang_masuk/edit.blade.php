@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')
    <form action="{{ route('barang_masuk.update', [$barang_masuk->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <fieldset>
            <legend>Edit Barang masuk</legend>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="barang">Nama Barang :</label>
                    <select style="width:100%" name="barang_id" id="barang" class="form-control select" required>
                        <option value="{{ $barang_masuk->barang->id }}">{{ $barang_masuk->barang->nama_barang }}
                        </option>
                        @foreach ($barang as $b)
                            <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-5">
                    <label for="jumlah_barang">Jumlah Barang</label>
                    <input id="jumlah_barang" type="text" name="jumlah" class="form-control" required
                        value="{{ $barang_masuk->jumlah }}">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-5">
                    <label for="foto">Foto Barang :</label><br>
                    <img src="/storage/{{ $barang_masuk->image }}" alt="barang" width="150" height="150">
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
