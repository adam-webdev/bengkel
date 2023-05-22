@extends('layouts.layout')
@section('content')
    <div class="card p-2">
        <h4 class="mb-4">Profile</h4>
        <div class="row">
            <div class="col-md-3" style="display: flex; justify-content:space-between; flex-direction:column;">
                @if ($user->foto)
                    <img class="flex-1 mr-4 border-1"
                        style="border-radius: 8px;border:4px solid grey;height:400px;object-fit:cover"
                        src="{{ $user->foto }}" width="100%" alt="foto profile">
                @else
                    <img class="flex-1 ml-4" src="{{ asset('asset/img/profile.png') }}" width="200px" alt="foto profile">
                @endif
                <a style="margin-top:10px; display:block;" class=" btn btn-secondary"
                    href="{{ route('user.edit', [$user->id]) }}"><i class="far fa-edit mr-2"></i>Edit
                    Profile</a>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tr>
                        <td>Nama</td>
                        <td> <b>{{ $user->name }}</b></td>
                    </tr>
                    <tr>
                        <td>No HP</td>
                        <td> <b>{{ $user->no_hp }}</b></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> <b>{{ $user->email }}</b></td>
                    </tr>

                    <tr>
                        <td>Jenis Kelamin</td>
                        <td> <b>{{ $user->jenis_kelamin }}</b></td>
                    </tr>
                    <tr>
                        <td>Provinsi</td>
                        <td> <b>{{ $provinsi->name ?? '-' }}</b></td>
                    </tr>
                    <tr>
                        <td>Kota / Kabupaten</td>
                        <td> <b>{{ $kota->name ?? '-' }}</b></td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td> <b>{{ $kecamatan->name ?? '-' }}</b></td>
                    </tr>
                    <tr>
                        <td>Desa</td>
                        <td> <b>{{ $desa->name ?? '-' }}</b></td>
                    </tr>


                </table>

            </div>
        </div>
    </div>
@endsection
