@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Pengguna</h1>
    </div>
    <hr>
    @role('Admin')
        <div class="card-header py-3" align="right">
            <button class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-add"><i
                    class="fa fa-plus"></i>Tambah</button>
        </div>
    @endrole
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th width="5%">No</th>
                            <th width="25%">Nama</th>
                            <th width="25%">Nik</th>
                            <th width="25%">Jenis Kelamin</th>
                            <th width="20%">Email</th>
                            <th width="15%">Roles</th>
                            <th width="15%">Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->nik }}</td>
                                <td>{{ $row->jenis_kelamin }}</td>
                                <td>{{ $row->email }}</td>
                                @foreach ($row->roles->pluck('name') as $r)
                                    <td>
                                        {{ $r }}
                                    </td>
                                @endforeach
                                <td> <img src="storage/{{ $row->foto }}" width="200px" alt="profile"> </td>
                                <td width="15%" align="center">
                                    @role('Admin')
                                        {{-- <a href="{{ route('user.edit', [$row->id]) }}" data-toggle="tooltip" title="Edit"
                                            class="d-none  d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                            <i class="fas fa-edit fa-sm text-white-50"></i>
                                        </a> --}}
                                        <a href="/user/hapus/{{ $row->id }}"
                                            onclick="return confirm('Yakin Ingin menghapus data?')"
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
            <form name="frm_add" id="frm_add" class="form-horizontal" action="{{ route('user.store') }}" method="POST"
                enctype="multipart/form-data">
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
                            <label>NIK :</label>
                            <input type="text" name="nik" required class="form-control">
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
                                <option value="Manager">Manager</option>
                                <option value="User">User</option>
                                <option value="Staff">Staff</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Posisi :</label>
                            <select name="posisi_id" class="form-control" required>
                                <option value="">--Pilih Posisi--</option>
                                @foreach ($posisi as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_posisi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Seksi :</label>
                            <select name="seksi_id" class="form-control" required>
                                <option value="">--Pilih Seksi--</option>
                                @foreach ($seksi as $s)
                                    <option value="{{ $s->id }}">{{ $s->nama_seksi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>PGR :</label>
                            <select name="pgr_id" class="form-control" required>
                                <option value="">--Pilih PGR--</option>
                                @foreach ($pgr as $pgr)
                                    <option value="{{ $pgr->id }}">{{ $pgr->kode_pgr }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Password :</label>
                            <input type="password" name="password" required class="form-control">
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
@endsection
