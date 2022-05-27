@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Kondisi Barang</h1>
        <!-- Button trigger modal -->
        @role('Admin')
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                + Tambah
            </button>
        @endrole
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kondisi Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('kondisi.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="barang">Nama Barang :</label>
                            <select style="width:100%" name="barang_id" id="barang" class="form-control select" required>
                                @foreach ($barang as $b)
                                    <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="baik">Kondisi Baik :</label>
                            <input type="number" name="baik" class="form-control" id="baik">
                        </div>
                        <div class="form-group">
                            <label for="rusak_ringan">Kondisi Rusak Ringan :</label>
                            <input type="number" name="rusak_ringan" class="form-control" id="rusak_ringan">
                        </div>
                        <div class="form-group">
                            <label for="rusak_berat">Kondisi Rusak Berat :</label>
                            <input type="number" name="rusak_berat" class="form-control" id="rusak_berat">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
                        <input type="submit" class="btn btn-primary btn-send" value="Simpan">
                    </div>
            </div>
            </form>


        </div>
    </div>
    {{-- modal tambah dokter --}}



    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>Kode Barang</th>
                            {{-- <th>Tanggal</th> --}}
                            <th>Nama Barang</th>
                            <th>Kondisi Baik</th>
                            <th>Rusak Ringan</th>
                            <th>Rusak Berat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kondisi as $k)
                            <tr align="center">
                                <td>{{ $k->barang->kode_barang }}</td>
                                {{-- <td>{{ $k->created_at->format('d-m-Y') }}</td> --}}
                                <td>{{ $k->barang->nama_barang }}</td>
                                <td>{{ $k->baik }}</td>
                                <td>{{ $k->rusak_ringan }}</td>
                                <td>{{ $k->rusak_berat }}</td>
                                <td align="center" width="10%">
                                    @role('Admin')
                                        <a href="{{ route('kondisi.edit', [$k->id]) }}" data-toggle="tooltip" title="Edit"
                                            class="d-none  d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                            <i class="fas fa-edit fa-sm text-white-50"></i>
                                        </a>
                                        <a href="/kondisi/hapus/{{ $k->id }}" data-toggle="tooltip" title="Hapus"
                                            onclick="return confirm('Yakin Ingin menghapus data?')"
                                            class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-trash-alt fa-sm text-white-50"></i>
                                        </a>
                                    @endrole
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
