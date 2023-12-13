@extends('layouts.layout')
@section('title', 'Data Ulasan')
@section('content')
    @include('sweetalert::alert')
    <div class="card p-4">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Ulasan / Rating </h1>
            <!-- Button trigger modal -->
        </div>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Bengkel </th>
                                <th>User</th>
                                <th>Rating</th>
                                <th>Ulasan </th>
                                <th>Tanggal Ulasan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            {{-- <td>1</td>
                            <td>Bengkel Kita A5</td>
                            <td>user2</td>
                            <td>
                                <span>
                                    <i class="fas fa-star" style="font-size:18px;color: gold;"></i>
                                    <i class="fas fa-star" style="font-size:18px;color: gold;"></i>
                                    <i class="fas fa-star" style="font-size:18px;color: gold;"></i>
                                    <i class="fas fa-star" style="font-size:18px;color: gold;"></i>
                                    <i class="fas fa-star" style="font-size:18px;color: gold;"></i>
                                </span>
                            </td>

                            <td>Montirnya ramah dan cepat</td>
                            <td>3 Desember 2023</td>
                            <td align="center" width="15%">
                                <a href="#" data-toggle="tooltip" title="Hapus"
                                    onclick="return confirm('Yakin Ingin menghapus data?')"
                                    class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-trash-alt fa-sm text-white-50"></i>
                                </a>
                            </td> --}}
                            @foreach ($ulasan as $ulasan)
                                <tr align="center">

                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ulasan->bengkel->nama_bengkel }}</td>
                                    <td>{{ $ulasan->user->name }}</td>
                                    <td>
                                        <span>
                                            @php
                                                for ($i = 0; $i < $ulasan->angka_ulasan; $i++) {
                                                    echo '<i class="fas fa-star" style="font-size:18px;color: gold;"></i>';
                                                }
                                            @endphp
                                        </span>
                                        {{-- {{ $ulasan->angka_ulasan }} --}}
                                    </td>

                                    <td>{{ $ulasan->ulasan }}</td>
                                    <td>{{ $ulasan->created_at->format('d-m-Y') }}</td>
                                    <td align="center" width="15%">
                                        <a href="/ulasan/hapus/{{ $ulasan->id }}" data-toggle="tooltip" title="Hapus"
                                            onclick="return confirm('Yakin Ingin menghapus data?')"
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
