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
                            <h6 class="m-0 font-weight-bold text-primary">Surat Keterangan</h6>
                            <div class="dropdown no-arrow">

                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" target="_blank" href="/surat-keterangan-mhs-pdf">Cetak Surat
                                        Keterangan</a>

                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        @foreach ($datas as $sertif)
                            <div class="card-body">
                                <div class="chart-area">
                                    <div class="d-flex justify-content-between pl-4 pr-4 pt-3 pb-4 mt-3"
                                        style="margin-bottom:50px ">
                                        <img src="{{ asset('img/bumn.png') }}" alt="image" style="width: 130px;">
                                        <img src="{{ asset('img/logo_pal.png') }}" alt="Card image cap"
                                            style="width: 130px;">
                                    </div>
                                    <div class="text-center">
                                        <h5 style="font-family:Lucida Sans;"><u> SURAT KETERANGAN</u></h5>

                                        <p>Nomor :
                                            PKL/01/51200/{{ date('F', strtotime($sertif->selesai)) }}/{{ date('Y', strtotime($sertif->selesai)) }}
                                        </p>

                                    </div>
                                    <div class="justify-content-center" style="margin-left:130px;margin-top:20px;">
                                        <span>Surat keterangan ini diberikan kepada para Praktikan / OJT yang telah menyelesaikan
                                            magang,<br> Berikut data Praktikan / OJT :</span>
                                    </div>
                                    <div style="margin-left:300px;margin-top:20px">

                                        <h6>Nama&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: <b>{{ $sertif->name }}</b></h6>
                                        <h6>Universitas&emsp;&emsp;&emsp;&emsp;&emsp;: {{ $sertif->asal_instansi }}
                                        </h6>
                                        <h6>Jurusan&emsp;&emsp;&emsp;&emsp;&emsp;: {{ $sertif->jurusan }}</h6>
                                        <h6>Nilai&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: {{ $sertif->nilai_huruf }} ({{$sertif->keterangan}})</h6>
                                    </div>

                                    <div class="justify-content-center" style="margin-left:130px;margin-top: 20px">
                                        <p>Yang bersangkutan ini telah melaksanakan magang di <b>PT PAL INDONESIA
                                                (PERSERO)</b> <br>
                                        <p style="margin-left:150px;" class="justify-content-center"> Pada Tanggal
                                            <b>{{ date('d-m-Y', strtotime($sertif->mulai)) }}</b> s/d
                                            <b>{{ date('d-m-Y', strtotime($sertif->selesai)) }}</b>
                                        </p>
                                        </p>
                                        <p>Surat Keterangan ini diberikan agar dapat dipergunakan semestinya.</p>
                                    </div>
                                    <div style="float: right;margin-right:60px;margin-top:40px;">
                                        <div>
                                            <p class="justify-content-center">Surabaya,
                                                {{ date('d-F-Y', strtotime($sertif->selesai)) }} </p>
                                        </div>
                                        <div style="margin-top: -20px">
                                            <p> PT PAL INDONESIA (PERSERO)</p>
                                        </div>
                                        <div style="margin-top: -20px">
                                            <p> Kadep Human Capital Development</p>
                                        </div>
                                        <div>
                                            <hr
                                                style="width:280px;weight:200px;margin-top: 140px;margin-bottom: 5px;border:1px solid;">
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
