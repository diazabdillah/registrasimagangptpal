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
                            <h6 class="m-0 font-weight-bold text-primary">Surat Perizinan Barang</h6>
                            <div class="dropdown no-arrow">

                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" target="_blank" href="/surat-perizinan-barang-mhs-pdf">Cetak Surat
                                        Perizinan</a>

                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <div class="d-flex justify-content-between pl-4 pr-4 pt-3 pb-4 mt-3"
                                    style="margin-bottom:50px ">
                                    <img src="{{ asset('img/bumn.png') }}" alt="image" style="width: 130px;">
                                    <img src="{{ asset('img/logo_pal.png') }}" alt="Card image cap" style="width: 130px;">
                                </div>
                                <div class="text-center">
                                   
                                            <h4 style="font-family:Lucida Sans;"><b><u>SURAT PERIZINAN BARANG  </u></b></h4>
                            
                                        <h6 style="font-family:Lucida Sans;">Nomor :
                                            PKL/{{ Auth::user()->id }}/44200/{{ date('F', strtotime(now())) }}/{{ date('Y', strtotime(now())) }}
                                        </h6>
                                    </b>

                                </div>
                                <div class="justify-content-center ml-4" style="margin-top: 30px">

                                    <h6>Yang mengetahui dibawah ini:</h6>
                                </div>
                                <div class="justify-content-center ml-4">

                                    <p style="margin-top: 30px">Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : I Dewa Gede Adi</p>
                                    <p style="margin-top: -10px">Jabatan &nbsp;&nbsp; : Kepala Departemen Human Capital
                                        Development</p>
                                </div>
                            </div>
                            <div class="justify-content-center ml-4">

                                <p style="margin-top: 30px">Menerangkan bahwa Mahasiswa/Mahasiswi dari
                                    Universitas/Politeknik/Institut {{$mahasiswa[0]->univ}} melaksanakan Praktik Kerja
                                    Lapangan (PKL) di Divisi {{$mahasiswa[0]->divisi}}, atas nama :</p>

                            </div>
                            <div class="justify-content-center ml-4" style="margin-top: 30px">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Asal Kampus</th>
                                            <th>Nama Barang</th>
<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mahasiswa as $surat)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $surat->nama }}</td>
                                                <td>{{ $surat->univ }}</td>
                                                <td>
                                                    {{$surat->nama_barang}}
                                                </td>
                                                <td>  
                                                    @if($surat->nama_barang ==null)
                                                    <a href="tambah-barang-mhs/{{$surat->id}}" class="btn btn-primary">Tambah Barang</a>
                                                    @else
                                                <a href="delete-barang-mhs/{{$surat->id}}" class="btn btn-danger">Hapus Barang</a>
                                                @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <p class="ml-2">Bahwa nama tersebut di atas membawa barang pribadi masuk ke
                                    lingkungan PT. PAL Indonesia (Persero) untuk dipergunakan sebagai persyaratan selama
                                    Praktik Kerja Lapangan (PKL) pada tanggal  {{ date('d F Y', strtotime($mahasiswa[0]->mulai)) }} s/d {{ date('d F Y', strtotime($mahasiswa[0]->selesai)) }} di Divisi {{$mahasiswa[0]->divisi}}.</p>
                            </div>
                            <div class="justify-content-center ml-4">

                                <p style="margin-top: 30px">Demikian surat keterangan dibuat dengan sesungguhnya, untuk
                                    dipergunakan sebagaimana mestinya.
                            </div>
                            <div class="d-flex justify-content-end mr-4" style="margin-top:40px;">
                                <div>
                                    <p>Surabaya,
                                        {{ date('d-F-Y', strtotime(now())) }} </p>
                                    <p style="margin-top: -20px"> PT PAL Indonesia (Persero)</p>
                                    <img src="{{ asset('frontend/img/TTD-KADEP-HCD.png') }}">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    @endsection
