@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <h1 class="h3 mb-4 text-gray-800"><b>{{ $ti }}</b></h1>

            <!-- Card -->
            <a href="/idcard-mhs-pdf" class="btn btn-danger mb-3"><i class="fas fa-download"></i> Cetak</a>

            <div class="row mb-4">

                @foreach ($datas as $data)
                <div class="col-sm-6">
                    <div class="card" style="width: 19rem;">
                        <div class="headerIdCard bg-gradient-primary mb-5">
                            <div class="mt-4">
                                <div class="d-flex justify-content-center">

                                    <img src="{{ asset('/file/' . $data->fotoID) }}" alt="image" style="width: 150px; height:180px; border-radius: 5px; border: 3px white solid;">

                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between pl-4 pr-4 pt-3 pb-3 mt-3">
                            <img src="{{ asset('img/bumn.png') }}" alt="image" style="width: 80px;">
                            <img src="{{ asset('img/logo_pal.png') }}" alt="Card image cap" style="width: 80px;">
                        </div>

                        <div class="card-body">

                            <h5 class="card-title text-dark mb-3"><b>{{ $data->nama }}</b></h5>
                            <h6 class="card-title text-dark mb-3"><b>Nim : </b>{{ $data->nim }}</h6>

                            <table>
                                <tr>
                                    <td><b>ID</b></td>
                                    <td class="pl-4">{{ $data->id }}</td>
                                </tr>
                                <tr>
                                    <td><b>Universitas</b></td>
                                    <td class="pl-4">{{ $data->univ }}</td>
                                </tr>
                                <tr>
                                    <td><b>Divisi</b></td>
                                    <td class="pl-4">{{ $data->divisi }}</td>
                                </tr>
                                <tr>
                                    <td><b>Departemen</b></td>
                                    <td class="pl-4">{{ $data->departemen }}</td>
                                </tr>
                                <tr>
                                    <td><b>Status</b></td>
                                    <td class="pl-4">{{ $data->role_id }}</td>
                                </tr>
                            </table>


                            @foreach ($dates as $date)
                            <h6 class="text-dark text-center mt-3 mb-0" style="font-size: 13px;">
                                <b>{{ $date->mulai }}</b>
                                <b class="text-danger ml-3">{{ $date->selesai }}</b>
                            </h6>
                            @endforeach
                        </div>
                        <div class="footerIdCard bg-gradient-primary d-flex justify-content-center">
                            <small class="text-white"><b>PT.PAL INDONESIA</b></small>
                        </div>
                    </div>
                    <div class="card" style="width: 19rem;">
                        <div class="mt-4">
                            <div class="d-flex justify-content-between pl-4 pr-4 pt-3">
                                <img src="{{ asset('img/bumn.png') }}" alt="image" style="width: 80px;">
                                <img src="{{ asset('img/logo_pal.png') }}" alt="Card image cap" style="width: 80px;">
                            </div>
                        </div>
                        <div class="card-body">

                            <p style="font-size: 10px">1.Kartu ini adalah milik PT.PAL INDONESIA dan berfungsi untuk
                                sebagai IDCard pemegangnya</p>
                            <p style="font-size: 10px">2.Pemegang kartu wajib memakai selama bertugas/berada di
                                lingkungan keamanan dilingkungan/kawasan PT.PAL INDONESIA</p>
                            <p style="font-size: 10px">3.Apabila hilang/rusak habis masa berlaku s/d segera
                                melaporkan Divisi KEAMANAN & K3LH PT.PAL INDONESIA(Persero)Jl.Ujung Surabaya</p>
                        </div>
                        <div class="text-center">
                            <div>
                                <p style="font-size: 15px" class="text-center">Surabaya,
                                    {{ date('d-F-Y', strtotime($data->created_at)) }}
                                </p>
                            </div>
                            <div>
                                <p style="font-size: 15px"> PT PAL INDONESIA (PERSERO)</p>
                            </div>
                            <div>
                                <p style="font-size: 15px">Kepala Human Capital Management</p>
                            </div>
                            <div>
                                <hr style="width:250px;weight:150px;margin-top: 100px;margin-bottom: 5px;border:1px solid;">
                            </div>
                        </div>
                        <div class="footerIdCard bg-gradient-primary d-flex justify-content-center">
                            <small class="text-white"><b>PT.PAL INDONESIA</b></small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection