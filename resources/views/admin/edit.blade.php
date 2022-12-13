@extends('layouts.layout')
@section('title', 'Edit Profile')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Profile </h1>
    </div>

    <div class="card p-4">
        <form action="{{ route('user.update', [$user->id]) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama User :</label>
                        <input type="text" value="{{ $user->name }}" name="name" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>NIK :</label>
                        <input type="text" value="{{ $user->nik }}" name="nik" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email User :</label>
                        <input type="email" value="{{ $user->email }}" name="email" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Foto :</label>
                        <input type="file" name="foto" class="form-control">
                        <img class="mt-2" style="object-fit:contain" src="/storage/{{ $user->foto }}" width="100px"
                            height="100px" alt="foto profile">
                    </div>

                    <input type="hidden" value="{{ $user->roles->pluck('name') }}" name="roles" required
                        class="form-control">

                    <div class="form-group">
                        <label>Jenis Kelamin :</label>
                        <select id="roles" name="jenis_kelamin" class="form-control" required>
                            <option value="">--Pilih Jenis Kelamin--</option>
                            <option value="Laki laki" {{ $user->jenis_kelamin == 'Laki laki' ? 'selected' : '' }}>Laki laki
                            </option>
                            <option value="Perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Posisi :</label>
                        <select name="posisi_id" class="form-control" required>
                            <option value="">--Pilih Posisi--</option>
                            @foreach ($posisi as $p)
                                <option value="{{ $p->id }}" {{ $p->id == $user->posisi->id ? 'selected' : '' }}>
                                    {{ $p->nama_posisi == $user->posisi->nama_posisi ? $user->posisi->nama_posisi : $p->nama_posisi }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Seksi :</label>
                        <select name="seksi_id" class="form-control" required>
                            <option value="">--Pilih Seksi--</option>
                            @foreach ($seksi as $s)
                                <option value="{{ $s->id }}" {{ $s->id == $user->seksi->id ? 'selected' : '' }}>
                                    {{ $s->nama_seksi == $user->seksi->nama_seksi ? $user->seksi->nama_seksi : $s->nama_seksi }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pgr :</label>
                        <select name="pgr_id" class="form-control" required>
                            <option value="">--Pilih Pgr--</option>
                            @foreach ($pgr as $pgr)
                                <option value="{{ $pgr->id }}" {{ $pgr->id == $user->pgr->id ? 'selected' : '' }}>
                                    {{ $pgr->kode_pgr == $user->pgr->kode_pgr ? $user->pgr->kode_pgr : $pgr->kode_pgr }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password :</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
        </form>
    </div>
@endsection
