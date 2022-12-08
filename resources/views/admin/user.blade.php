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
                            <th width="5%">User Id</th>
                            <th width="25%">Nama</th>
                            <th width="20%">Email</th>
                            <th width="15%">Roles/Akses</th>
                            <th width="25%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                @foreach ($row->roles as $r)
                                    <td>
                                        {{ $r->id }}
                                    </td>
                                @endforeach
                                @role('Admin')
                                    <td align="center">
                                        <a href="/user/hapus/{{ $row->id }}"
                                            onclick="return confirm('Yakin Ingin menghapus data?')"
                                            class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            @endrole
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
                            <label control-label">Nama User :</label>
                            <input type="text" name="name" required class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label control-label">Email User :</label>
                            <input type="email" name="email" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label control-label">Roles/Akses :</label>
                            <select id="roles" name="roles" class="form-control" required>
                                <option value="">--Pilih Roles--</option>
                                <option value="Admin">Admin</option>
                                <option value="Manager">Manager</option>
                                <option value="User">User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label control-label">Password :</label>
                            <input type="password" name="password" required class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
