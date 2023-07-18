@extends('layouts.layout')
@section('title', 'Edit Data Order')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Data Order </h1>
        <!-- Button trigger modal -->


    </div>


    <!-- Modal -->
    <div class="card p-4">
        <form action="{{ route('order.update', [$order->id]) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status :</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Diproses" {{ $order->status === 'Diproses' ? 'selected' : '' }}>Diproses
                                </option>
                                <option value="Ditolak" {{ $order->status === 'Ditolak' ? 'selected' : '' }}>Ditolak
                                </option>
                                <option value="Selesai" {{ $order->status === 'Selesai' ? 'selected' : '' }}>Selesai
                                </option>
                            </select>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="keterangan"> Keterangan :</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="history.back(-1)"> Batal</button>
                        {{-- @hasanyrole('Admin|User') --}}
                        <input type="submit" class="btn btn-primary btn-send" value="Simpan">
                        {{-- @endhasanyrole --}}
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
