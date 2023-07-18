@extends('layouts.layout')
@section('title', 'Detail Pertanyaan')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Order </h1>

    </div>

    <div class="card p-4">
        <h5>Lokasi user</h5>
        <div id="map"></div>
        <div class="row">
            <div class="col-md-6">
                <div class="left">
                    <table class="table table-borderless">
                        <tbody>
                            {{-- <tr>
                                <td>Kode Pertanyaan</td>
                                <td>:</td>
                                <td>{{ $pertanyaan->kode_pertanyaan }}</td>
                            </tr>
                            <tr>
                                <td>Nama Pertanyaan </td>
                                <td>:</td>
                                <td>{{ $pertanyaan->nama_pertanyaan }}</td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="left">

                </div>
            </div>
        </div>
    </div>



    {{-- <div class="row m-3 ">
        @hasanyrole('Admin|User')
            <div class="col-md-6 flex-grow-1">
                <a href="{{ route('pertanyaan.tambah', [$pertanyaan->id]) }}" class="btn btn-primary">Tambah pertanyaan</a>
            </div>
        @endhasanyrole
    </div> --}}

@endsection
@section('scripts')
    <script type="text/javascript">
        const latitude = {{ $order->lat }}
        const longitude = {{ $order->lng }}
        console.log("Kordinat: ", longitude, latitude)
        var mymap = L.map('map').setView([latitude, longitude], 13);
        const marker = L.marker([latitude, longitude]).addTo(mymap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
            maxZoom: 18,
        }).addTo(mymap);

        // "latitude": -6.2382683, "longitude": 106.9755717,
        // // const marker = L.marker([51.49709527744871, -0.13574047552899815]).addTo(mymap)
        // const marker = L.marker([-6.2088, 106.8456]).addTo(mymap)

        // function onMapClick(e) {
        //     // alert("You clicked the map at " + e.latlng);
        //     // console.log(e)
        //     var bengkelIcon = L.icon({
        //         iconUrl: 'mechanic.png',
        //         // shadowUrl: '../../../public/asset/img/mechanic.png',


        //     });
        //     marker.setLatLng([e.latlng.lat, e.latlng.lng])
        //     $(document).ready(function() {
        //         $('#longitude').val(e.latlng.lng)
        //         $('#latitude').val(e.latlng.lat)
        //     })
        // }

        // mymap.on('click', onMapClick);
    </script>
    // provider: new GeoSearch.OpenStreetMapProvider(),
@endsection
