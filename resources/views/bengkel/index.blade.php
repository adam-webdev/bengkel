@extends('layouts.layout')
@section('title', 'Data Bengkel')
@section('content')
    @include('sweetalert::alert')
    <div class="card p-4">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Bengkel </h1>
            <!-- Button trigger modal -->
            @hasanyrole('Admin')
                <a href="{{ route('bengkel.create') }}">
                    <button type="button" class="btn btn-primary">
                        + Tambah
                    </button>
                </a>
            @endhasanyrole

        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bengkel</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('bengkel.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_bengkel">Nama Bengkel :</label>
                                        <input type="text" name="nama_bengkel" value="{{ old('nama_bengkel') }}"
                                            class="form-control @error('nama_bengkel') is-invalid @enderror"
                                            id="nama_bengkel" required>
                                        @error('nama_bengkel')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_hp">No HP :</label>
                                        <input type="number" min="1" name="no_hp" value="{{ old('no_hp') }}"
                                            class="form-control @error('no_hp')  is-invalid @enderror" id="no_hp"
                                            required>
                                        @error('no_hp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email :</label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            required>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="foto_bengkel">Picture :</label>
                                        <input type="file" name="foto_bengkel" value="{{ old('foto_bengkel') }}" required
                                            class="form-control @error('foto_bengkel')  is-invalid @enderror"
                                            id="foto_bengkel">
                                        @error('foto_bengkel')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jam_buka">Jam Buka :</label>
                                        <input type="time" name="jam_buka" value="{{ old('jam_buka') }}"
                                            class="form-control  @error('jam_buka') is-invalid @enderror" id="jam_buka"
                                            required>
                                        @error('jam_buka')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jam_tutup">Jam Tutup :</label>
                                        <input type="time" name="jam_tutup" value="{{ old('jam_tutup') }}"
                                            class="form-control  @error('jam_tutup') is-invalid @enderror" id="jam_tutup"
                                            required>
                                        @error('jam_tutup')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror


                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="longitude">Longitude :</label>
                                        <input type="text" name="longitude" value="{{ old('longitude') }}"
                                            class="form-control  @error('longitude') is-invalid @enderror" id="longitude">
                                        @error('longitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="latitude">Latitude :</label>
                                        <input type="text" name="latitude" value="{{ old('latitude') }}"
                                            class="form-control  @error('latitude') is-invalid @enderror" id="latitude">
                                        @error('latitude')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror


                                    </div>
                                </div>

                            </div>

                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="angka_ulasan">Angka Ulasan :</label>
                                        <input type="number" min="1" max="5"
                                            value="{{ old('angka_ulasan') }}" name="angka_ulasan"
                                            class="form-control @error('angka_ulasan') is-invalid @enderror"
                                            id="angka_ulasan" placeholder="Masukan angka 1 sampai 5">
                                        @error('angka_ulasan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ulasan">Ulasan :</label>
                                        <input type="text" name="ulasan" value="{{ old('ulasan') }}"
                                            class="form-control @error('ulasan') is-invalid @enderror" id="ulasan">
                                        @error('ulasan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-12" id="provinsi_id">
                                    <div class="form-group">
                                        <label for="">Provinsi :</label>
                                        <select class="form-control provinsi input--custom" name="provinsi_id"
                                            style="width:100%" id="provinsi">
                                            <option selected value="">--- Pilih Provinsi ---</option>
                                            @foreach ($provinsi as $provinsi)
                                                <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" id="kota_id">
                                    <div class="form-group">
                                        <label for="kota">Kota / Kabupaten :</label>
                                        <select class="form-control kota input--custom" name="kota_id" id="kota"
                                            style="width:100%">
                                            <option selected value="">--- Pilih Kota / Kab ---</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" id="kecamatan_id">
                                    <div class="form-group">
                                        <label for="kecamatan">Kecamatan :</label>
                                        <select class="form-control kecamatan input--custom" name="kecamatan_id"
                                            style="width:100%" id="kecamatan">
                                            <option selected value="">--- Pilih Kecamatan---</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" id="desa_id">
                                    <div class="form-group">
                                        <label for="Desa">Desa :</label>
                                        <select class="form-control desa input--custom" name="desa_id" id="desa"
                                            style="width:100%">
                                            <option selected value="">--- Pilih Desa---</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" id="alamat">
                                    <div class="form-group">
                                        <label for="alamat">Alamat Lengkap :</label>
                                        <textarea class="form-control" name="alamat_lengkap" id="alamat" cols="5" rows="5"></textarea>
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
                                <th>Nama Bengkel </th>
                                <th>No HP </th>
                                <th>Admin Bengkel</th>
                                <th>Foto </th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bengkel as $t)
                                <tr align="center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $t->nama_bengkel }}</td>
                                    <td>{{ $t->no_hp }}</td>
                                    <td>{{ $t->user->name }}</td>
                                    <td> <img src="{{ $t->foto_bengkel }}" width="150px" alt="Foto Bengkel">
                                    </td>
                                    <td align="center" width="15%">
                                        {{-- <a href="{{ route('bengkel.show', [$t->id]) }}" data-toggle="tooltip" title="Detail"
                                        class="d-none  d-sm-inline-block btn btn-sm btn-warning shadow-sm">
                                        <i class="fas fa-eye fa-sm text-white-50"></i>
                                    </a> --}}

                                        <a href="{{ route('bengkel.edit', [$t->id]) }}" data-toggle="tooltip"
                                            title="Edit"
                                            class="d-none  d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                            <i class="fas fa-edit fa-sm text-white-50"></i>
                                        </a>
                                        <a href="/bengkel/hapus/{{ $t->id }}" data-toggle="tooltip"
                                            title="Hapus" onclick="return confirm('Yakin Ingin menghapus data?')"
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
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // $('#exampleModal').modal('show')
            $('.provinsi').select2()
            $('.kota').select2()
            $('.kecamatan').select2()
            $('.desa').select2()

            function onChangeSelect(url, id, name) {
                // console.log(url)
                // console.log(id)
                // console.log(name)
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(data) {
                        // console.log(data)
                        $('#' + name).empty()
                        $('#' + name).append(`<option>--- Pilih ` + name + ` --- </option>`)
                        $.each(data, function(key, value) {
                            // console.log(value)
                            $('#' + name).append('<option value="' + value.id + '">' + value
                                .name +
                                '</option>')
                        })
                    }
                })
            }

            $('#provinsi').on('change', function() {
                onChangeSelect("{{ url('/kota') }}", $(this).val(), 'kota')
            })
            $('#kota').on('change', function() {
                onChangeSelect("{{ url('/kecamatan') }}", $(this).val(), 'kecamatan')
            })
            $('#kecamatan').on('change', function() {
                onChangeSelect("{{ url('/desa') }}", $(this).val(), 'desa')
            })
        })
    </script>
@endsection
