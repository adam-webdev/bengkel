@extends('layouts.layout')
@section('content')
    @include('sweetalert::alert')

<h3>Edit Data Pindah Barang</h3>

                <form action="{{ route('pindah-barang.update',[$pindahBarang[0]->barangpindah_id]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="modal-body ">
                        @foreach($pindahBarang as $pindahBarang)
                        <div class="form-group d-flex  data row">
                            <div class="col-md-4">
                                <label  for="barang">Nama Barang :</label>
                                <select style="width:100%" name="barang_id[]" id="barang" class="form-control select" required>
                                    @foreach ($barang as $b)
                                        <option value="{{ $b->id }}" {{$pindahBarang->barang->id === $b->id ? 'selected' : ''}}>{{$pindahBarang->barang->nama_barang === $b->nama_barang ? $pindahBarang->barang->nama_barang : $b->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="ruangan">Nama Ruangan :</label>
                                <select style="width:100%" name="ruangan_id[]" id="ruangan" class="form-control select" required>
                                    @foreach ($ruangan as $r)
                                        <option value="{{ $r->id }}" {{$pindahBarang->ruangan->id === $r->id ? 'selected':''}}>{{$pindahBarang->ruangan->nama_ruangan === $r->nama_ruangan ? $pindahBarang->ruangan->nama_ruangan: $r->nama_ruangan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 ">
                                <label " for="jumlah">Jumlah :</label>
                                <input type="number" name="jumlah[]" value="{{$pindahBarang->jumlah}}" class="form-control" id="baik">
                            </div>
                            <div class="col-md-1">
                                <button  type="button" class="btn btn-sm btn-danger delete-one btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </div>

                            @endforeach
                            <div class="form-group add-data row">
                                <div class="col-md-4">
                                    <label  for="barang">Nama Barang :</label>
                                    <select style="width:100%" name="barang_id[]" id="barang" class="form-control select" required>
                                        <option value="">-- Pilih Barang --</option>
                                        @foreach ($barang as $b)
                                            <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="ruangan">Nama Ruangan :</label>
                                    <select style="width:100%" name="ruangan_id[]" id="ruangan" class="form-control select" required>
                                        <option value="">-- Pilih Ruangan --</option>
                                        @foreach ($ruangan as $r)
                                            <option value="{{ $r->id }}">{{ $r->nama_ruangan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 ">
                                    <label " for="jumlah">Jumlah :</label>
                                    <input type="number" name="jumlah[]" class="form-control" id="baik">
                                </div>
                                <div class="col-md-1 add">
                                    <label># </label>
                                    <button id="add" name="add" type="button" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button>

                                </div>
                            </div>
                            {{-- <div class="col-md-1 add">
                                <label>#</label>
                                <button id="add" name="add" type="button" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button>
                            </div> --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
                            <input type="submit" class="btn btn-primary btn-send" value="Simpan">
                        </div>
                    </div>
                </form>




@endsection
{{-- @section('scripts')
    <script>
        $(document).ready(function() {
            $('.select').select2({
                tags: true,
                width: 'resolve'
            });
        });
    </script>
@endsection --}}
@section('scripts')

    <script>
        $(document).ready(function() {
            $(add).on('click', function() {
                $('.add-data').append(` <div class="form-group row child  mt-3">
                    <div class="col-md-4">
                        <label for="finishgood">Nama Barang :</label>
                        <select type="text" name="barang_id[]" class="form-control" id="finishgood" required>
                            <option value="">-- Pilih Nama Barang --</option>
                                    @foreach ($barang as $b)
                                        <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                                    @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="finishgood">Nama Ruangan :</label>
                        <select type="text" name="ruangan_id[]" class="form-control" id="finishgood" required>
                            <option value="">-- Pilih Nama Ruangan --</option>
                                    @foreach ($ruangan as $r)
                                        <option value="{{ $r->id }}">{{ $r->nama_ruangan }}</option>
                                    @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="jumlah">Jumlah :</label>
                        <input type="number" name="jumlah[]" class="form-control" id="jumlah" required>
                    </div>
                    <div class="col-md-1 add">
                        <label>#</label>
                        <button id="add" name="add" type="button" class="btn btn-sm btn-danger delete-child btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </div>
                    </div>`)
            })

            $(document).on('click', '.delete-child', function() {
                $(this).parents('.child').remove()
            })
        })
        $(document).on('click', '.delete-one', function() {
            $(this).parents('.data').remove()
        })
        </script>
@endsection

