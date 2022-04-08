{{-- Mengambil layout dari webBack.blade.php --}}
@extends('layouts.webBack')

@section('kontenWebBack')
    <!-- Begin Page Content -->
    <div class="container-fluid">




        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $mahasiswa[0]->judul }}</h1> <!-- Title Untuk body -->
        </div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5>{{ $mahasiswa[0]->deskripsi_tugas }}</h5>
        </div>

        <div class="row">

            <div style="width:100%;" class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Kegiatan</h6>

                </div>

                <div>
                    <table class="table">

                        <tbody>
                            @foreach ($mahasiswa as $tugas)
                                <tr>
                                    <td> <b> Nama Pembimbing:</b>
                                        <p>{{ $tugas->nama_pembimbing }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <b> Jenis Kegiatan:</b>
                                        <p>{{ $tugas->jenis_tugas }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <b> Tanggal Kumpul:</b>
                                        <p>{{ date('d-m-Y', strtotime($tugas->tanggal_selesai)) }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <b> Status Kegiatan:</b>
                                        <p>{{ $tugas->status_kegiatan }}</p>
                                    </td>

                                </tr>
                                <tr>
                                    <td> <b> File Kegiatan:</b> <br>
                                        @if ($tugas->file_tugas != null)
                                            <iframe src="{{ asset('file/kegiatan-smk/' . $tugas->file_tugas) }}"
                                                align="top" height="620" width="100%" frameborder="0"
                                                scrolling="auto"></iframe>
                                        @else
                                            <span>Maaf File Tidak Ada</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <button class="btn btn-primary mb-2" id="btn-komentar-utama">Upload Laporan Kegiatan</button>
                <div class="mt-4" style="display: none" id="komentar-utama">
                    <h5 class="text-center">Form Laporan Kegiatan</h5>
                    <form method="POST"  enctype="multipart/form-data" action="/proses-kegiatan-smk/{{ $user->id }}/{{ $mahasiswa[0]->user_id }}">
                        @csrf

                        <div class="form-group">
                            <small class="ml-2">Anggota Pelakasanaan Kegiatan</small>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="nama_anggota" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <small class="ml-2">Judul Kegiatan</small>
                            <input type="text" value="{{ $tugas->judul }}" class="form-control" name="nama_kegiatan">
                        </div>
                        <div class="form-group">
                            <small class="ml-2">Deskripsi Kegiatan</small>
                            <input type="text" value="{{ $tugas->deskripsi_tugas }}" class="form-control" name="deskripsi_kegiatan">
                        </div>
                    
                        <div class="form-group">
                            <small class="ml-2">Upload Dokumentasi Kegiatan Anda</small>
                            <input type="file" class="form-control" name="foto_kegiatan">
                        </div>
                    
                        <input type="submit" class="btn btn-primary mt-2" value="Kirim">
                    </form>
                </div>

            </div>
        </div>


    </div>
@endsection
