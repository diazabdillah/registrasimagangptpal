@extends('layouts.webBack')

@section('kontenWebBack')

<div class="main">    
    <div class="main-content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><b>{{ $ti }}</b></h1>
                <!-- Card -->

            </div>

            <!-- Content Row -->
            <div class="row">

                    <div style="width:100%;" class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Surat Memorandum ke Divisi</h6>
                            <div class="dropdown no-arrow">

                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" target="_blank" href="cetak-surat-memo-divisi-smk">Cetak Surat Memorandum</a>

                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                    
                                <div class="d-flex justify-content-between pl-4 pr-4 pt-3 pb-4 mt-3"
                                    style="margin-bottom:50px ">
                                    <img src="{{ asset('img/bumn.png') }}" alt="image" style="width: 15%;">
                                    <img src="{{ asset('img/logo_pal.png') }}" alt="Card image cap" style="width: 15%;">
                                </div>

                                <div>
                                    <h5 style="margin-bottom:50px;" class="text-center" style="font-family:Lucida Sans;">
                                        <b><u> MEMORANDUM
                                            </u></b>
                                    </h5>

                                    <div class=" d-flex justify-content-between ml-4 mt-4">


                                        <div>
                                            <p><b>kepada &nbsp;:</b>
                                                Kadep. {{$datas[0]->departemen}}
                                            </p>
                                            <p> <b>Dari &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  :</b>
                                                Kadep. HC. Development
                                            </p>
                                            <p><b>Perihal &nbsp;&nbsp; :</b>
                                                Permohonan Praktek Kerja Lapangan </p>
                                        </div>
                                        <div>
                                            <p><b>Nomor :</b> 
                                                PKL/{{ $datas[0]->id }}/44200/{{ date('F', strtotime($datas[0]->selesai)) }}/{{ date('Y', strtotime($datas[0]->selesai)) }}
                                            </p>
                                            <p> <b>Tanggal :</b> 
                                                {{ date('d-F-Y', strtotime(now())) }}
                                            </p>
                                            <p> <b>Klasfikasi :</b>
                                                Biasa
                                            </p>
                                        </div>

                                    </div>
                   
                                <div class="justify-content-center ml-4" style="margin-top: 70px">
                                    <p>Dengan Hormat,</p>
                                    <p>1. Sesuai koordinasi dengan Divisi di PT. PAL Indonesia (Persero) tentang kesediaan menerima Praktik Kerja Lapangan, bersama ini disampaikan data mahasiswa/mahasiswi dari {{ $datas[0]->sekolah }} Jurusan {{ $datas[0]->jurusan }} yang akan melaksanakan On the Job Training.
                                        Berikut ini data dari Mahasiswa/mahasiswi yang akan melakukan On the Job Training&nbsp; : </p>
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>

                                                <th>Nama</th>
                                                <th>Nis</th>
                                                <th>Unit Kerja</th>
                                                <th>Departemen</th>
                                                <th>Pelaksanaan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mahasiswas as $surat1)
                                                <tr>


                                                    <td>{{ $surat1->nama }}</td>
                                                    <td>{{ $surat1->nis }}</td>
                                                    <td>{{ $surat1->divisi }}</td>
                                                    <td>{{ $surat1->departemen }}</td>
                                                    <td>{{ date('d F Y', strtotime($surat1->mulai)) }}
                                                        s.d <br> {{ date('d F Y', strtotime($surat1->selesai)) }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <p class="ml-2">2. Demikian disampaikan, mohon para mahasiswa/mahasiswi tersebut diberikan arahan dan bimbingan selama melaksanakan proses On the Job Training, atas bantuan dan kerja samanya diucapkan terima kasih.</p>
                                </div>

                                <div class="d-flex justify-content-end mr-4" style="margin-top:40px;">
                                    <div>
                                        <p>Surabaya,
                                            {{ date('d-F-Y', strtotime(now())) }} </p>
                                        <p style="margin-top: -20px"> PT PAL Indonesia (Persero)</p>
                                        <img  src="{{asset('frontend/img/TTD-KADEP-HCD.png')}}">
                                        
                                    </div>
                                </div>

                       
                    </div>
            

            </div>
        </div>
    </div>
    @endsection
