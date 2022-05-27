@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Letak Barang</h1>
        <!-- Button trigger modal -->
        @role('Admin')
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            + Tambah
        </button>
        @endrole
    </div>

    <!-- Modal -->
    <div  class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Letak Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('pindah-barang.store') }}" method="POST">
                    @csrf
                    <div class="modal-body ">
                        <div class="form-group add-data row">
                            <div class="col-md-4">
                                <label  for="barang">Nama Barang :</label>
                                <select style="width:100%" name="barang_id[]" id="barang" class="form-control select" required>
                                    @foreach ($barangs as $b)
                                        <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="ruangan">Nama Ruangan :</label>
                                <select style="width:100%" name="ruangan_id[]" id="ruangan" class="form-control select" required>
                                    @foreach ($ruangan as $r)
                                        <option value="{{ $r->id }}">{{ $r->nama_ruangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 ">
                                <label " for="jumlah">Jumlah :</label>
                                <input type="number" name="jumlah[]" class="form-control" id="baik">
                            </div>
                            <div class="col-md-1 add">
                                <label># </label>
                                <button id="add" name="add" type="button" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button>
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
    </div>
    {{-- modal tambah dokter --}}



    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>Kode </th>
                            {{-- <th>Tanggal</th> --}}
                            <th>Nama Ruangan</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pindahBarang as $k)
                            <tr align="center">
                                <td>{{ $k->barangpindah_id }}</td>
                                {{-- <td>{{ $k->created_at->format('d-m-Y') }}</td> --}}
                                <td>{{ $k->ruangan->nama_ruangan }}</td>
                                <td>{{ $k->barang->nama_barang }}</td>
                                <td>{{ $k->jumlah }}</td>
                                <td align="center" width="10%">
                                    <a href="{{ route('pindah-barang.edit', [$k->barangpindah_id]) }}" data-toggle="tooltip" title="Edit"
                                        class="d-none  d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                        <i class="fas fa-edit fa-sm text-white-50"></i>
                                    </a>
                                    <a href="/pindah-barang/hapus/{{ $k->barangpindah_id }}" data-toggle="tooltip" title="Hapus"
                                        onclick="return confirm('Yakin Ingin menghapus data?')"
                                        class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                        <i class="fas fa-trash-alt fa-sm text-white-50"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
{{-- @section('scripts')
    <script>
        $(document).ready(function() {
            $('.select').select2({
                tags: true,
                width: 'resolve'
            });
        });
    </script>
@endsection --}}
@section('scripts')

    <script>
        $(document).ready(function() {
            $(add).on('click', function() {
                $('.add-data').append(` <div class="form-group row child px-3 mt-3">
                    <div class="col-md-4">
                        <label for="finishgood">Nama Barang :</label>
                        <select type="text" name="barang_id[]" class="form-control" id="finishgood" required>
                            <option value="">-- Pilih Nama Barang --</option>
                                    @foreach ($barangs as $b)
                                        <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                                    @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="finishgood">Nama Ruangan :</label>
                        <select type="text" name="ruangan_id[]" class="form-control" id="finishgood" required>
                            <option value="">-- Pilih Nama Ruangan --</option>
                                    @foreach ($ruangan as $r)
                                        <option value="{{ $r->id }}">{{ $r->nama_ruangan }}</option>
                                    @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="jumlah">Jumlah :</label>
                        <input type="number" name="jumlah[]" class="form-control" id="jumlah" required>
                    </div>
                    <div class="col-md-1 add">
                        <label>#</label>
                        <button id="add" name="add" type="button" class="btn btn-sm btn-danger delete-child btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </div>
                    </div>`)
            })

            $(document).on('click', '.delete-child', function() {
                $(this).parents('.child').remove()
            })

        })
    </script>
@endsection

