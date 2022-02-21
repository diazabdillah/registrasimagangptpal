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


                <!-- Area Chart -->
               
                    <div style="width: 100%" class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Surat Penerimaan Praktek Kerja Lapangan Di PT PAL</h6>
                            <div class="dropdown no-arrow">

                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" target="_blank" href="/balasan-mhs-cetak">Cetak Surat
                                        Balasan</a>

                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                      
                                <div class="d-flex justify-content-between pl-4 pr-4 pt-3 pb-4 mt-3"
                                    style="margin-bottom:50px ">
                                    <img src="{{ asset('img/bumn.png') }}" alt="image" style="width: 115px;">
                                    <img src="{{ asset('img/logo_pal.png') }}" alt="Card image cap" style="width: 115px;">
                                </div>

                                <div>
                                    <h5 style="margin-bottom:50px;" class="text-center" style="font-family:Lucida Sans;">
                                        <b><u> SURAT BALASAN
                                            </u></b>
                                    </h5>

                                    <div class=" d-flex justify-content-between ml-4 mt-4">


                                        <div>
                                            <p class="justify-content-center"> <b> Nomor :</b>
                                                PKL/{{ $datas[0]->id }}/44200/{{ date('F', strtotime($datas[0]->selesai)) }}/{{ date('Y', strtotime($datas[0]->selesai)) }}
                                            </p>
                                            <p> <b> Perihal :</b>
                                                Praktek Kerja Lapangan </p>
                                        </div>
                                        <div class="mr-4">
                                            <p><b>Kepada Yth: </b> <br>
                                                {{ $datas[0]->jabatan }} <br>
                                                {{ $datas[0]->univ }} <br>
                                                di Tempat
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                <div class="justify-content-center ml-4" style="margin-top: 70px">
                                    <p>Dengan Hormat,</p>
                                    <p>1. Memperhatikan Surat Nomor
                                        {{ $datas[0]->nomorsurat }}
                                        Tanggal {{ date('d F Y', strtotime($datas[0]->mulai)) }}
                                        s.d {{ date('d F Y', strtotime($datas[0]->selesai)) }} pada dasarnya PT PAL
                                        Indonesia (Persero) dapat
                                        menerima
                                        Praktikan OJT/PKL dari {{ $datas[0]->univ }} untuk melaksanakan praktek kerja
                                        lapangan, berikut data Praktikan
                                        di bawah ini &nbsp; : </p>
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>

                                                <th>Nama</th>
                                                <th>Nim</th>
                                                <th>Jurusan</th>
                                                <th>Unit Kerja</th>
                                                <th>Departemen</th>
                                                <th>Pelaksanaan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mahasiswas as $surat1)
                                                <tr>


                                                    <td>{{ $surat1->nama }}</td>
                                                    <td>{{ $surat1->nim }}</td>
                                                    <td>{{ $surat1->jurusan }}</td>
                                                    <td>{{ $surat1->divisi }}</td>
                                                    <td>{{ $surat1->departemen }}</td>
                                                    <td>{{ date('d F Y', strtotime($surat1->mulai)) }}
                                                        s.d <br> {{ date('d F Y', strtotime($surat1->selesai)) }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <p class="ml-2">2. Surat balasan ini sebagai dasar bahwa para
                                        Praktikan
                                        telah resmi <b><u>Diterima</u></b> Praktikan PKL/OJT di PT PAL Indonesia (Persero).
                                        Demikian disampaikan dan atas perhatiannya diucapkan terima kasih.</p>
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
