@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Main Content -->
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><b>{{ $ti }}</b></h1>
            <!-- Card -->

        </div>

        <!-- Content Row -->
        <div class="row">


            <!-- Area Chart -->
            <div class="col col-lg">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Sertifikat</h6>
                        <div class="dropdown no-arrow">

                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="/sertif-mhs-pdf">Convert PDF</a>

                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    @foreach ($datas as $sertif)
                    <div class="card-body">
                        <div class="chart-area">
                            <div class="d-flex justify-content-between pl-4 pr-4 pt-3 pb-4 mt-3" style="margin-bottom:50px ">
                                <img src="{{ asset('img/bumn.png') }}" alt="image" style="width: 130px;">
                                <img src="{{ asset('img/logo_pal.png') }}" alt="Card image cap" style="width: 130px;">
                            </div>
                            <div class="text-center">
                                <h4 style="font-family:Lucida Sans;">SURAT - KETERANGAN </h4>
                                <hr style="width:260px;weight:200px;margin-top: 5px;margin-bottom: 5px;border:1px solid;">
                                <p>Nomor :</p>
                            </div>
                            <div class="text-center" style="margin-top: 50px">
                                <span> Dengan ini menerangkan bahwa:</span>
                                <b>
                                    <h1 style="margin-top:5px;margin-bottom:30px;font-family:Comic Sans MS;font-weight: bold;font-size: 50px;">{{strtoupper($sertif->nama)}}
                                        <hr style="border:1px solid;width:350px;margin-top: 5px;">
                                    </h1>
                                </b>
                                <p style="margin-top: -25px">Nim : <b>{{$sertif->nim}}</b> </p>
                                <div class="text-center" style="margin-top: 20px">
                                    <h5 style="font-family:Comic Sans MS;font-weight: bold;">{{strtoupper($sertif->strata)}}</h5>
                                    <h5 style="font-family:Georgia;font-weight: bold;">{{strtoupper($sertif->univ)}}</h5>
                                </div>
                                <div class="text-center" style="margin-top: 20px">
                                    <p>Telah Melaksanakan Kerja Praktek di <b>PT PAL INDONESIA (PERSERO)</b> <br> Pada Tanggal <b>{{date('d-m-Y', strtotime($sertif->mulai))}}</b> s/d <b>{{date('d-m-Y', strtotime($sertif->selesai))}}</b> dengan hasil predikat <b>{{$sertif->nilai_huruf}}</b> <b>(Baik)</b></p>
                                </div>
                                <div style="float: right;margin-right:60px;margin-top:40px;">
                                    <div>
                                        <p class="text-center">Surabaya, {{date('d-F-Y', strtotime($sertif->created_at))}} </p>
                                    </div>
                                    <div style="margin-top: -20px">
                                        <p> PT PAL INDONESIA (PERSERO)</p>
                                    </div>
                                    <div style="margin-top: -20px">
                                        <p> Kadep Human Capital Management</p>
                                    </div>
                                    <div>
                                        <hr style="width:280px;weight:200px;margin-top: 140px;margin-bottom: 5px;border:1px solid;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @endsection