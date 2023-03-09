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
                {{-- <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                </div> --}}
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama User :</label>
                        <input type="text" value="{{ $user->name }}" name="name" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No HP :</label>
                        <input type="text" value="{{ $user->no_hp }}" name="no_hp" required class="form-control">
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
