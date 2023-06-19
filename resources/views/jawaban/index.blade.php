@extends('layouts.layout')
@section('title', 'Jawaban')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Jawaban </h1>
        <!-- Button trigger modal -->
        @hasanyrole('Admin')
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jawaban</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('jawaban.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12" id="pertanyaan">
                                <div class="form-group">
                                    <label for="">Pertanyaan :</label>
                                    <select class="form-control provinsi input--custom" name="pertanyaan_id"
                                        style="width:100%" id="pertanyaan">
                                        <option selected value="">--- Pilih Pertanyaan ---</option>
                                        @foreach ($pertanyaan as $pertanyaan)
                                            <option value="{{ $pertanyaan->id }}">{{ $pertanyaan->nama_pertanyaan }}
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
                                    <input type="number" name="kode_jawaban" value="{{ old('kode_jawaban') }}"
                                        class="form-control @error('kode_jawaban') is-invalid @enderror" id="kode_jawaban"
                                        required>
                                    @error('kode_jawaban')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="isi_jawaban">Jawaban :</label>
                                    <textarea rows="5" type="text" name="isi_jawaban"
                                        class="form-control @error('isi_jawaban')  is-invalid @enderror" id="isi_jawaban" required>
                                    </textarea>
                                    {{-- @error('isi_pertanyaan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror --}}
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
                            <th>Kode Jawaban</th>
                            <th>Jawaban </th>
                            <th>Pertanyaan </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jawaban as $p)
                            <tr align="center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->kode_jawaban }}</td>
                                <td>{{ $p->isi_jawaban }}</td>
                                <td>{{ $p->pertanyaan->nama_pertanyaan }}</td>
                                <td align="center" width="15%">
                                    {{-- <a href="{{ route('jawaban.show', [$p->id]) }}" data-toggle="tooltip" title="Detail"
                                        class="d-none  d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                                        <i class="fas fa-eye fa-sm text-white-50"></i>
                                    </a> --}}
                                    @hasanyrole('Admin|User')
                                        <a href="{{ route('jawaban.edit', [$p->id]) }}" data-toggle="tooltip" title="Edit"
                                            class="d-none  d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                            <i class="fas fa-edit fa-sm text-white-50"></i>
                                        </a>
                                        <a href="/jawaban/hapus/{{ $p->id }}" data-toggle="tooltip" title="Hapus"
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
