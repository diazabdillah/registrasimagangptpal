{{-- Mengambil layout dari webBack.blade.php --}}
@extends('layouts.webBack')

@section('kontenWebBack')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $ti }}</h1> <!-- Title Untuk body -->

        </div>
        <div class="alert alert-info" role="alert">
            <p class="card-text">
                <b>Peraturan Kegiatan Mahasiswa:</b><br>
                - <b>List Kegiatan Magang</b> menampilkan tugas-tugas dari pembimbing anda yang di berikan kepada para praktikan selama magang dilaksanakan, Mohon tekan button "lihat tugas" jika ingin mengetahui detail tugasnya dan pengumpulan tugas di bagian button "Upload Laporan Kegiatan". <br>
                - <b>Laporan Kegiatan</b> menampilkan hasil kegiatan anda yang sudah di kerjakan dari pembimbing atau dari anda sendiri sudah mengerjakan selama magang dilaksanakan. <br>
                - <b>Tambah Kegiatan Lain </b> digunakan ketika para praktikan mencatat kegiatan lainnya, tidak boleh tambah list kegiatan yang diberikan oleh pembimbing anda di form "Tambah Kegiatan Lainnya".
            </p>
        </div>
        <!-- Content Row -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">List Kegiatan Magang</h6>
            

            </div>
            <div class="row">
                @foreach ($mahasiswa as $tugas)
                    <div class="col-xl-3 col-md-6 mb-4 ml-4 mt-4">

                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-uppercase mb-1">
                                            <h6>{{ $tugas->judul }}</h6>
                                        </div>
                                        <div class="text-xs  text-uppercase mb-1">
                                            <p>Pembimbing: {{ $tugas->nama_pembimbing }}</p>
                                        </div>
                                        @if ($tugas->status_kegiatan == 'Selesai Mengerjakan')
                                            <small
                                                style="background-color: rgb(13, 202, 6);border-radius:10px;color:white;font-size:12px;">{{ $tugas->status_kegiatan }}</small>
                                        
                                        @else
                                            <small
                                                style="background-color:rgb(221, 54, 54);border-radius:10px;color:white;font-size:12px;">{{ $tugas->status_kegiatan }}</small>
                                        @endif
                                    </div>
                                    <div class="col-auto">
                                        <a class="btn btn-success mt-2" href="/lihat-kegiatan-mhs/{{ $tugas->id }}">Lihat
                                            Tugas</a>
                                        <small>{{ date('d-m-Y', strtotime($tugas->tanggal_selesai)) }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                @endforeach

            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Laporan Kegiatan Magang</h6>
                <div class="dropdown no-arrow">
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Kegiatan
                        Lainnya</a>
                    <a class="btn btn-primary" href="/cetak-kegiatan-mhs-pdf" target="_blank">Cetak Laporan Kegiatan</a>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-bordered mt-4" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Pelaksanaan</th>
                                <th>Tanggal Pelakasanaan</th>
                                <th>Judul Kegiatan</th>
                                <th>Deskripsi kegiatan</th>
                                <th>Dokumentasi Kegiatan</th>
                                <th>Action</th>
                        
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswarekap as $ams)
                                <tr>
                                    <th> {{ $ams->nama_anggota }} </th>

                                    <th>{{ date('H:i, d F Y', strtotime($ams->tanggal_kumpul)) }}</th>
                                    <th>{{ $ams->nama_kegiatan }}</th>
                                    <th>{{ $ams->deskripsi_kegiatan }}</th>
                                    <th>
                                        @if ($ams->foto_kegiatan != null)
                                            <img width="100px"
                                                src="{{ asset('file/foto-kegiatan-mhs/' . $ams->foto_kegiatan) }}">
                                        @endif
                                    </th>
                                    <th><a class="btn btn-danger" href="{{ url('delete-tugas-mhs/' . $ams->id, $ams->foto_kegiatan) }}">Delete</a></th>
                                    {{-- <a class="btn btn-danger p-1 float-right"
                                    onclick="return confirm('yakin Hapus?');"
                                    href="{{ url('hapus-interview-mhs/' . $img->id, $img->fileinterview) }}"><i
                                        class="far fa-trash-alt p-1"></i></a> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>
                <br>

            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan Lainnya</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="myForm" action="tambah-kegiatan-mhs" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="recipient-name" class="col-form-label">Nama Kegiatan:</label>
                                <input type="text" class="form-control" id="recipient-name" name="nama_kegiatan" autofocus
                                    required>
                            </div>
                       
                            <div>
                                <label for="message-text" class="col-form-label">Deskripsi Tugas:</label>
                                <textarea class="form-control" id="message-text" name="deskripsi_kegiatan" required></textarea>
                            </div>
                            <div>
                                <label for="recipient-name" class="col-form-label">Nama Anggota Pelaksanaan:</label>
                                <input type="text" class="form-control" id="recipient-name" name="nama_anggota" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Foto Kegiatan:</label>
                                <input type="file" class="form-control  @error('foto_kegiatan') is-invalid @enderror" id="recipient-name"   name="foto_kegiatan" required>
                                @error('foto_kegiatan')
                                <div class="invalid-feedback mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                         


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Kegiatan Lainnya</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
