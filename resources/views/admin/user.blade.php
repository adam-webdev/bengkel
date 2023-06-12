@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')
    <div class="card p-4">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pengguna</h1>
            @hasanyrole('Admin')
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">
                    + Tambah
                </button>
            @endhasanyrole
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Nama</th>
                                <th>No HP</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->no_hp }}</td>
                                    <td>{{ $row->jenis_kelamin }}</td>
                                    <td>{{ $row->email }}</td>
                                    @php
                                        $string = $row->roles->pluck('name');
                                        
                                        $role = substr($string, 2, -2);
                                    @endphp
                                    <td>
                                        {{ $role }}
                                    </td>
                                    {{-- @foreach ($row->roles->pluck('name') as $r)
                                        <td>
                                            {{ $r }}
                                        </td>
                                    @endforeach --}}
                                    <td> <img src="{{ $row->foto }}" width="120px" alt="profile"> </td>
                                    <td width="15%" align="center">
                                        @role('Admin')
                                            <a href="{{ route('user.show', [$row->id]) }}" data-toggle="tooltip" title="Detail"
                                                class="d-none  d-sm-inline-block mt-2 btn btn-sm btn-success shadow-sm">
                                                <i class="fas fa-eye   fa-sm text-white-50"></i>
                                            </a>
                                            <a href="/user/hapus/{{ $row->id }}"
                                                onclick="return confirm('Yakin Ingin menghapus data?')" title="Hapus"
                                                class="d-none d-sm-inline-block mt-2 btn btn-sm btn-danger shadow-sm">
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
        <!-- modal add data-->
        <div class="modal inmodal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-xs">
                <form name="frm_add" id="frm_add" class="form-horizontal" action="{{ route('user.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data User</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama User :</label>
                                <input type="text" name="name" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>No HP :</label>
                                <input type="number" name="no_hp" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email User :</label>
                                <input type="email" name="email" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin :</label>
                                <select id="roles" name="jenis_kelamin" class="form-control" required>
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="Laki laki">Laki laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Foto :</label>
                                <input type="file" name="foto" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Roles/Akses :</label>
                                <select id="roles" name="roles" class="form-control" required>
                                    <option value="">--Pilih Roles--</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Admin Bengkel">Admin Bengkel</option>
                                    <option value="User">User</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Password :</label>
                                <input type="password" name="password" required class="form-control">
                            </div>
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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                            @role('Admin')
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            @endrole
                        </div>
                </form>
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
