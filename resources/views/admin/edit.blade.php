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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama User :</label>
                                <input type="text" value="{{ $user->name }}" name="name" required
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No HP :</label>
                                <input type="text" value="{{ $user->no_hp }}" name="no_hp" required
                                    class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email User :</label>
                                <input type="email" value="{{ $user->email }}" name="email" required
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto :</label>
                                <input type="file" name="foto" class="form-control">
                                <img class="mt-2" style="object-fit:contain" src="{{ $user->foto }}" width="100px"
                                    height="100px" alt="foto profile">
                            </div>
                        </div>
                    </div>



                    {{-- <input type="hidden" value="{{ $user->roles->pluck('name') }}" name="roles" required
                        class="form-control"> --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kelamin :</label>
                                <select id="roles" name="jenis_kelamin" class="form-control" required>
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="Laki laki" {{ $user->jenis_kelamin == 'Laki laki' ? 'selected' : '' }}>
                                        Laki laki
                                    </option>
                                    <option value="Perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password :</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    @php
                        $string = $user->roles->pluck('name');
                        $role = substr($string, 2, -2);
                    @endphp
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Roles</label>
                                <select id="roles" name="roles" class="form-control" required>
                                    <option value="">--Pilih Roles--</option>
                                    <option value="Admin" {{ $role == 'Admin' ? 'selected' : '' }}>
                                        Admin
                                    </option>
                                    <option value="Admin Bengkeui bl" {{ $role == 'Admin Bengkel' ? 'selected' : '' }}>
                                        Admin Bengkel
                                    </option>
                                    <option value="User" {{ $role == 'User' ? 'selected' : '' }}>
                                        User
                                    </option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" id="provinsi_id">
                            <div class="form-group">
                                <label for="">Provinsi :</label>
                                <select class="form-control provinsi input--custom" name="provinsi_id" style="width:100%"
                                    id="provinsi">
                                    <option selected value="">--- Pilih Provinsi ---</option>
                                    @foreach ($provinsi as $provinsi)
                                        <option value="{{ $provinsi->id }}"
                                            {{ $user->provinsi_id == $provinsi->id ? 'selected' : '' }}>
                                            {{ $provinsi->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" id="kota_id">
                            <div class="form-group">
                                <label for="kota">Kota / Kabupaten :</label>
                                <select class="form-control kota input--custom" name="kota_id" id="kota"
                                    style="width:100%">
                                    <option selected value="{{ $kota->id ?? '' }}">{{ $kota->name ?? '' }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" id="kecamatan_id">
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan :</label>
                                <select class="form-control kecamatan input--custom" name="kecamatan_id" style="width:100%"
                                    id="kecamatan">
                                    <option selected value="{{ $kecamatan->id ?? '' }}">{{ $kecamatan->name ?? '' }}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" id="desa_id">
                            <div class="form-group">
                                <label for="Desa">Desa :</label>
                                <select class="form-control desa input--custom" name="desa_id" id="desa"
                                    style="width:100%">
                                    <option selected value="{{ $desa->id ?? '' }}">{{ $desa->name ?? '' }}</option>
                                </select>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
        </form>
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
