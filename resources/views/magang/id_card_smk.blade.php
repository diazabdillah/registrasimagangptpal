@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <h1 class="h3 mb-4 text-gray-800"><b>{{ $ti }}</b></h1>

            <!-- Card -->
            <a href="#" class="btn btn-primary mb-3"><i class="fas fa-download"></i> Download</a>
            <div class="row mb-4">
                <div class="col-sm-6">
                    <div class="card" style="width: 19rem;">
                        <div class="headerIdCard bg-gradient-primary mb-5">
                            <div class="mt-4">
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('img/fotoProfil.jpg') }}" alt="image" style="width: 130px; border-radius: 5px; border: 3px white solid;">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pl-4 pr-4 pt-3 pb-3 mt-3">
                            <img src="{{ asset('img/bumn.png') }}" alt="image" style="width: 80px;">
                            <img src="{{ asset('img/logo_pal.png') }}" alt="Card image cap" style="width: 80px;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-dark "><b>Jhon Doe</b></h5>
                            <p class="card-text"><b>Divisi</b><br>HCM</p>
                            <img src="{{ asset('img/qr_code.png') }}" style="width: 60px; float: right;">
                            <p class="card-text"><b>Status</b><br>Magang</p>
                        </div>
                        <div class="footerIdCard bg-gradient-primary d-flex justify-content-center">
                            <small class="text-white"><b>PT.PAL INDONESIA</b></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection