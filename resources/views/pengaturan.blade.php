@extends('layouts.layout')
@section('content')
@include('sweetalert::alert')
    <form action="{{route('perusahaan.update', [$perusahaan->id])}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <fieldset>
            <legend>Edit Profil perusahaan</legend>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="usaha">Nama Perusahaan :</label>
                    <input id="usaha" type="text" name="nama_usaha" class="form-control" required value="{{$perusahaan->nama_usaha}}">
                </div>
                <div class="col-md-5">
                    <label for="alamat">alamat</label>
                    <input id="alamat" type="text" name="jumlah" class="form-control" required value="{{$perusahaan->alamat}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="email">Email :</label>
                    <input id="email" type="email" name="email." class="form-control" required value="{{$perusahaan->email}}">
                </div>
                <div class="col-md-5">
                    <label for="telepon">telepon</label>
                    <input id="telepon" type="number" name="telepon" class="form-control" required value="{{$perusahaan->telepon}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-5">
                    <label for="title">title</label>
                    <input id="title" type="number" name="title" class="form-control" required value="{{$perusahaan->title}}">
                </div>
            </div>
        
            <input type="submit" class="btn btn-success btn-send" value="Update">
            <input type="Button" class="btn btn-primary btn-send" value="Kembali" onclick="history.go(-1)">
        </fieldset>
    </form>
@endsection
