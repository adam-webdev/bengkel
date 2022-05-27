<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .header {
            display: flex;
            position: relative;
            justify-content: space-between;
            width: 100%;
            align-items: center;
            margin-left: 100px;
        }

        .text {
            margin-left: 180px;
            margin-top: -100px;
        }

        hr {
            margin-bottom: 30px;
        }

    </style>
</head>

<body>
    <div class="header">
        <img src="asset/img/foto.jpg" alt="logo_kampus" width="150px" height="100px">
        <div class="text">
            <h2>Sistem Inventory Kampus</h2>
            <p>Jl. Kenangan</p>
            <p>Email : sisteminventory@gmail.com Fax :202020</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <h5 class="text-center">
            {{ $periode == 'all' ? 'Laporan Kondisi barang ' : 'Laporan Kondisi Barang Periode ' . $tgl_awal . ' sampai dengan ' . $tgl_akhir }}
        </h5>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <table class="table table-striped table-bordered align-items-center" width="100%" cellspacing="0">
            <thead>
                <tr align="center">
                    <th width="2%">No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kondis Baik </th>
                    <th>Rusak Ringan</th>
                    <th>Rusak Berat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $r)
                    <tr>
                        <td width="2%">{{ $loop->iteration }}</td>
                        <td>{{ $r->barang->kode_barang }}</td>
                        <td>{{ $r->barang->nama_barang }}</td>
                        <td>{{ $r->baik }}</td>
                        <td>{{ $r->rusak_ringan }}</td>
                        <td>{{ $r->rusak_berat }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>
{{-- @endsection --}}
