@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><b>{{ $ti }}</b></h1>

            <!-- Card -->
            <div class="row mb-4">
                <div class="col-sm-6">
                    <div class="card shadow mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Absen</h5>
                                <!-- Form Lengkapi Data -->
                                <div class="form-group">
                                    <small class="ml-2">Nama</small>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>

                                <div class="form-group">
                                    <small class="ml-2">Nomer Kartu Pelajar</small>
                                    <input type="text" class="form-control" id="nim" name="nim">
                                </div>

                                <div class="form-group">
                                    <small class="ml-2">Divisi</small>
                                    <input type="text" class="form-control" id="divisi" name="divisi">
                                </div>

                                <div class="form-group">
                                    <small class="ml-2">Your Location
                                        <i class="fas fa-map-marker-alt"></i></small>
                                    <input type="text" class="form-control" id="map" name="map">
                                </div>

                                <a href="#" class="btn btn-primary float-right">Absen</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->



        </div>
    </div>
</div>

@endsection