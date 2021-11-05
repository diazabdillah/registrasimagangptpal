@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">
            <!-- Page Heading -->

            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

            @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
            @endif

            <div class="row mt-3">
                <div class="col-sm-4">
                    <div class="card shadow mb-3">
                        <div class="card">
                            <div class="card-header">
                                Petunjuk Isi Dokumen
                            </div>
                            <div class="card-body">
                                {{-- <a href="magang.Dokumen_mhs_upload" class="btn btn-primary mb-3 mr-3">Buka Form Upload
                                    <i class="fas fa-upload ml-2"></i></a> --}}

                                <div class="alert alert-info" role="alert">
                                    <p class="card-text"><b>Klik Buka Form Upload</b>
                                        <br>untuk mengrimkan data - data anda dan setelah data di verifikasi oleh
                                        admin
                                        maka
                                        pendaftar tinggal menunggu informasi selanjutnya apakah sudah resmi Diterima
                                        atau Belum
                                    </p>
                                    <b>Kirim data berikut dengan ketentuan :</b>
                                    <ol>
                                        <li>Ukuran file max 1MB</li>
                                        <li>Format file bisa berupa JPG / JPEG / PNG / PDF</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="card shadow mb-3">
                        <div class="card">
                            <div class="card-header">
                                Upload Dokumen
                            </div>
                            <table class="table table-bordered" id="dataTable" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Nim</th>
                                        <th>Universitas</th>
                                        <th>Divisi</th>
                                        <th>Departemen</th>
                                        <th>Action</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $absen)

                                    <tr>
                                        <td>{{ $absen->nama }}</td>
                                        <td>{{ $absen->nim }}</td>
                                        <td>{{ $absen->univ }}</td>
                                        <td>{{ $absen->divisi }}</td>
                                        <td>{{ $absen->departemen }}</td>
                                        <td>
                                            <a class="btn btn-warning " href="{{ url('/magang.Dokumen_mhs_uploadfoto3x4/' . $absen->id) }}" role="button">Foto 3x4</a>
                                            <a class="btn btn-primary p-1" href="{{ url('/magang.Dokumen_mhs_upload/' . $absen->id) }}" role="button">Berkas Lainnya</a>


                                        </td>

                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow mb-3">
                        <div class="card">
                            <div class="card-header">
                                Hasil Foto 3X4
                            </div>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Foto 3x4:</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($showImage as $img)
                                    @if ($img->fotoID != null)
                                    <tr>
                                        <td>{{ $img->nama }}</td>
                                        <td>
                                            <img src="{{ asset('/file/' . $img->fotoID) }}" alt="Foto" class="img-thumbnail" width="135">
                                        </td>
                                        <td>
                                            {{-- <a class="btn btn-primary"
                                                        href="{{ url('edit-data-foto3x4/' . $img->id) }}">Edit</a> --}}
                                            <a class="btn btn-danger" href="{{ url('/Dokumen_mhs_upload/' . $img->id, $img->fotoID) }}">Hapus</a>
                                        </td>

                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card shadow mb-3">
                        <div class="card">
                            <div class="card-header">
                                Hasil Dokumen Lainnya
                            </div>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Dokumen Lainnya</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($showImage1 as $img1)
                                    @if ($img1->foto != null)


                                    <tr>
                                        <td>{{ $img1->nama }}</td>
                                        <td>
                                            <img src="{{ asset('/file/' . $img1->foto) }}" alt="Foto" class="img-thumbnail" width="135">
                                        </td>
                                        <td>
                                            {{-- <a class="btn btn-primary"
                                                        href="{{ url('edit-data-foto3x4/' . $img->id) }}">Edit</a> --}}
                                            <a class="btn btn-danger" href="{{ url('/Dokumen_mhs_upload/' . $img1->id, $img1->foto) }}">Hapus</a>
                                        </td>

                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>




    @endsection