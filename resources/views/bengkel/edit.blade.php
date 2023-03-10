@extends('layouts.layout')
@section('title', 'Edit Data Bengkel')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Bengkel </h1>
        <!-- Button trigger modal -->


    </div>


    <!-- Modal -->
    <div class="card p-4">
        <form action="{{ route('bengkel.update', [$bengkel->id]) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_bengkel">Nama Bengkel :</label>
                            <input type="text" name="nama_bengkel" value="{{ $bengkel->nama_bengkel }}"
                                class="form-control" id="nama_bengkel" required>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_hp">No HP :</label>
                            <input type="number" min="1" name="no_hp" value="{{ $bengkel->no_hp }}"
                                class="form-control" id="no_hp" required>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" name="email" value="{{ $bengkel->email }}" class="form-control"
                                id="email" required>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="foto_bengkel">Picture :</label>
                            <input type="file" name="foto_bengkel" class="form-control" id="foto_bengkel">
                            <img src="/storage/{{ $bengkel->foto_bengkel }}" width="100px" alt="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jam_buka">Jam Buka :</label>
                            <input type="time" name="jam_buka" value="{{ $bengkel->jam_buka }}" class="form-control "
                                id="jam_buka" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jam_tutup">Jam Tutup :</label>
                            <input type="time" name="jam_tutup" value="{{ $bengkel->jam_tutup }}" class="form-control"
                                id="jam_tutup" required>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="longitude">Longitude :</label>
                            <input type="text" name="longitude" value="{{ $bengkel->longitude }}" class="form-control  "
                                id="longitude" required>
                            @error('longitude')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="latitude">Latitude :</label>
                            <input type="text" name="latitude" value="{{ $bengkel->latitude }}" class="form-control  "
                                id="latitude" required>
                            @error('latitude')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="angka_ulasan">Angka Ulasan :</label>
                            <input type="number" min="1" max="5" value="{{ $bengkel->angka_ulasan }}"
                                name="angka_ulasan" class="form-control " id="angka_ulasan" required
                                placeholder="Masukan angka 1 sampai 5">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ulasan">Ulasan :</label>
                            <input type="text" name="ulasan" value="{{ $bengkel->ulasan }}" class="form-control "
                                id="ulasan" required>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" id="provinsi_id">
                        <div class="form-group">
                            <label for="">Provinsi :</label>
                            <select class="form-control provinsi input--custom" name="provinsi_id" style="width:100%"
                                id="provinsi">
                                <option selected value="">--- Pilih Provinsi ---</option>
                                @foreach ($provinsi as $provinsi)
                                    <option value="{{ $provinsi->id }}"
                                        {{ $bengkel->provinsi_id == $provinsi->id ? 'selected' : '' }}>
                                        {{ $provinsi->name }}</option>
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
                                <option selected value="{{ $kota->id ?? '' }}">{{ $kota->name ?? '' }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" id="kecamatan_id">
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan :</label>
                            <select class="form-control kecamatan input--custom" name="kecamatan_id" style="width:100%"
                                id="kecamatan">
                                <option selected value="{{ $kecamatan->id ?? '' }}">{{ $kecamatan->name ?? '' }}</option>
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
                                <option selected value="{{ $desa->id ?? '' }}">{{ $desa->name ?? '' }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" id="alamat">
                        <div class="form-group">
                            <label for="alamat">Alamat Lengkap :</label>
                            <textarea class="form-control" name="alamat_lengkap" id="alamat" cols="5" rows="5">{{ $bengkel->alamat_lengkap }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="history.back()" class="btn btn-secondary" data-dismiss="modal">
                    Batal</button>
                <input type="submit" class="btn btn-primary btn-send" value="Simpan" id="simpan">
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
