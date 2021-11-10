{{-- Mengambil layout dari webBack.blade.php --}}
@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Akhir</h6>
                </div>
                <div class="card-body">


                    <a class="btn btn-primary btn-sm mb-3" href="/upload-laporan-smk" role="button"><i class="fas fa-plus"></i> upload laporan</a>

                    <div class="row mt-4">
                        @foreach ($users as $laporans)

                        <div class="col-md-4">
                            <div class="card" style="border-weight:10px;border:1px solid;">
                                <div class="row no-gutters">
                                    <div class="col-md-4 mb-3 mt-3 ">
                                        <img width="115px" height="240px" style="margin-left:5px;border-radius: 15px;border:1px solid;margin-top:10px;" src="{{ asset('file/laporan-mhs/cover/' . $laporans->cover) }}" class="gambar1" alt="pt pal">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $laporans->judul }}</h5>
                                            <p class="card-text">{{ $laporans->sinopsis }}</p>
                                            <p class="card-text">{{ $laporans->divisi }}</p>
                                            <p class="card-text">Revisi : {{ $laporans->revisi }}</p>
                                            <p class="card-text"><small class="text-muted">Diposting
                                                    {{ date('d-m-Y', strtotime($laporans->tanggal_kumpul)) }}</small>
                                            </p>
                                            @if ($laporans->path != null)
                                            <a class="btn btn-primary" href="/lihat-laporan-mhs/{{$laporans->id}}">lihat</a>
                                            @if ($laporans->revisi != null)
                                            <a class="btn btn-warning" href="/edit-laporan-mhs/{{$laporans->id}}">Edit</a>

                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach


                    </div>
                    <h3 class="text-center">Perpustakaan Laporan Akhir</h3>
                    <div class="row mt-4">
                        @foreach ($userMhs as $laporan)

                        <div class="col-md-4">
                            <div class="card">
                                <div class="row no-gutters">
                                    <div class="col-md-4 mb-3 mt-3 ">
                                        <img width="115px" height="220px" style="margin-left:5px;border-radius: 15px;border:1px solid;" src="{{ asset('file/laporan-mhs/cover/' . $laporan->cover) }}" class="gambar1" alt="pt pal">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $laporan->judul }}</h5>
                                            <p class="card-text">{{ $laporan->sinopsis }}</p>
                                            <p class="card-text">{{ $laporan->divisi }}</p>
                                            <p class="card-text"><small class="text-muted">Diposting
                                                    {{ date('d-m-Y', strtotime($laporan->tanggal_kumpul)) }}</small>
                                            </p>
                                            @if ($laporan->path != null)
                                            {{-- <a class="btn btn-primary"
                                                            href="{{ asset('file/laporan-mhs/isi/' . $laporan->path) }}">Download</a> --}}
                                            <a class="btn btn-primary" href="/lihat-laporan-mhs/{{$laporan->id}}">lihat</a>

                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        @foreach ($userSmk as $laporan)

                        <div class="col-md-4">
                            <div class="card">
                                <div class="row no-gutters">
                                    <div class="col-md-4 mb-3 mt-3 ">
                                        <img width="115px" height="220px" style="margin-left:5px;border-radius: 15px;border:1px solid;" src="{{ asset('file/laporan-mhs/cover/' . $laporan->cover) }}" class="gambar1" alt="pt pal">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $laporan->judul }}</h5>
                                            <p class="card-text">{{ $laporan->sinopsis }}</p>
                                            <p class="card-text">{{ $laporan->divisi }}</p>
                                            <p class="card-text"><small class="text-muted">Diposting
                                                    {{ date('d-m-Y', strtotime($laporan->tanggal_kumpul)) }}</small>
                                            </p>
                                            @if ($laporan->path != null)
                                            {{-- <a class="btn btn-primary"
                                                            href="{{ asset('file/laporan-mhs/isi/' . $laporan->path) }}">Download</a> --}}
                                            <a class="btn btn-primary" href="/lihat-laporan-mhs/{{$laporan->id}}">lihat</a>

                                            @endif
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
        <!-- /.container-fluid -->


    </div>
</div>
<!-- End of Main Content -->
@endsection