@extends('layouts.layout')
@section('title', 'Data Order')
@section('content')
    @include('sweetalert::alert')
    <div class="card p-4">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>No Order </th>
                                <th>Pemesan</th>
                                <th>Foto </th>
                                <th>Tanggal </th>
                                <th>Longitude</th>
                                <th>Latitude </th>
                                <th>Status </th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $o)
                                <tr align="center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>ORDERB3N600{{ $o->id }}</td>
                                    <td>{{ $o->user->name }}</td>
                                    <td> <img src="{{ $o->user->foto }}" width="120px" height="90" alt="Foto User"
                                            style="object-fit: cover">
                                    <td>{{ $o->tanggal }}</td>
                                    <td>{{ $o->lng }}</td>
                                    <td>{{ $o->lat }}</td>
                                    @if ($o->status == 'Diproses')
                                        <td>
                                            <p
                                                style="background-color:orange; color:white;padding:4px 8px; border-radius:4px;font-weigh:bold">
                                                {{ $o->status }}
                                            </p>
                                        </td>
                                    @elseif($o->status === 'Ditolak')
                                        <td>
                                            <p
                                                style="background-color:red; color:white;padding:4px 8px; border-radius:4px;font-weigh:bold">
                                                {{ $o->status }}
                                            </p>
                                        </td>
                                    @else
                                        <td>
                                            <p
                                                style="background-color:green; color:white;padding:4px 8px; border-radius:4px;font-weigh:bold">
                                                {{ $o->status }}
                                            </p>
                                        </td>
                                        </td>
                                    @endif
                                    <td align="center" width="15%">
                                        <a href="{{ route('order.show', [$o->id]) }}" data-toggle="tooltip" title="Detail"
                                            class="d-none  d-sm-inline-block btn btn-sm btn-secondary  shadow-sm">
                                            <i class="fas fa-eye fa-sm text-white-50"></i>
                                        </a>

                                        <a href="{{ route('order.edit', [$o->id]) }}" data-toggle="tooltip" title="Edit"
                                            class="d-none  d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                            <i class="fas fa-edit fa-sm text-white-50"></i>
                                        </a>
                                        @role('Admin')
                                            <a href="/order/hapus/{{ $o->id }}" data-toggle="tooltip" title="Hapus"
                                                onclick="return confirm('Yakin Ingin menghapus data?')"
                                                class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
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
    </div>
@endsection
{{-- @section('scripts')
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
@endsection --}}
