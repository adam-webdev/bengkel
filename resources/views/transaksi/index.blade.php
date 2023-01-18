@extends('layouts.layout')
@section('title', 'Transaksi')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Transaksi </h1>
        <!-- Button trigger modal -->
        @hasanyrole('Admin|User')
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                + Tambah
            </button>
        @endhasanyrole

    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_po">No PO :</label>
                                    <input type="number" name="no_po" value="{{ old('no_po') }}"
                                        class="form-control @error('no_po') is-invalid @enderror" id="no_po" required>
                                    @error('no_po')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="judul_po">Judul PO :</label>
                                    <input type="text" name="judul_po" value="{{ old('judul_po') }}"
                                        class="form-control @error('judul_po')  is-invalid @enderror" id="judul_po"
                                        required>
                                    @error('judul_po')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nilai_po">Nila PO :</label>
                                    <input type="number" name="nilai_po" value="{{ old('nilai_po') }}"
                                        class="form-control  @error('nilai_po') is-invalid @enderror" id="nilai_po"
                                        required>
                                    @error('nilai_po')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror


                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="total_shipment">Total Shipment :</label>
                                    <input type="number" name="total_shipment" value="{{ old('total_shipment') }}"
                                        class="form-control @error('total_shipment') is-invalid @enderror"
                                        id="total_shipment" required>
                                    @error('total-shipment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="total_nilai_impor">Total Nilai Impor :</label>
                                    <input type="number" value="{{ old('total_nilai_impor') }}" name="total_nilai_impor"
                                        class="form-control @error('total_nilai_impor') is-invalid @enderror"
                                        id="total_nilai_impor" required>
                                    @error('total_nilai_impor')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="remaining_amount">Remaining Amount :</label>
                                    <input type="text" name="remaining_amount" value="{{ old('remaining_amount') }}"
                                        class="form-control @error('remaining_amount') is-invalid @enderror"
                                        id="remaining_amount" required>
                                    @error('remaining_amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
                        <input type="submit" class="btn btn-primary btn-send" value="Simpan" id="simpan">
                    </div>
                </form>
            </div>


        </div>
    </div>



    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>No PO </th>
                            <th>Judul PO </th>
                            <th>Nilai PO</th>
                            <th>Total Shipment </th>
                            <th>Total Nilai Import </th>
                            <th>Remaining Amount </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $t)
                            <tr align="center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $t->no_po }}</td>
                                <td>{{ $t->judul_po }}</td>
                                <td>{{ $t->nilai_po }}</td>
                                <td>{{ $t->total_shipment }}</td>
                                <td>{{ $t->total_nilai_import }}</td>
                                <td>{{ $t->remaining_amount }}</td>
                                <td align="center" width="15%">
                                    <a href="{{ route('transaksi.show', [$t->id]) }}" data-toggle="tooltip"
                                        title="Detail" class="d-none  d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                                        <i class="fas fa-eye fa-sm text-white-50"></i>
                                    </a>
                                    @hasanyrole('Admin|User')
                                        <a href="{{ route('transaksi.edit', [$t->id]) }}" data-toggle="tooltip"
                                            title="Edit" class="d-none  d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                            <i class="fas fa-edit fa-sm text-white-50"></i>
                                        </a>
                                        <a href="/transaksi/hapus/{{ $t->id }}" data-toggle="tooltip" title="Hapus"
                                            onclick="return confirm('Yakin Ingin menghapus data?')"
                                            class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-trash-alt fa-sm text-white-50"></i>
                                        </a>
                                    @endhasanyrole
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@if (count($errors) > 0)
    @section('scripts')
        <script>
            $(document).ready(function() {
                $('#exampleModal').modal('show')
            })
        </script>
    @endsection
@endif
