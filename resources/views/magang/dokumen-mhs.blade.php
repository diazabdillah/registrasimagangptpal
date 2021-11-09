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
                                    <p><b>Langkah 1:</b></p>
                                    <p class="card-text"><b>Klik "Foto 3x4"</b>
                                        <br>Silahkan upload foto 3x4 di button foto3x4 dengan ketentuan yang sudah diberikan.
                                    </p>
                                    <p><b>Langkah 2:</b></p>
                                    <p class="card-text"><b>Klik "Berkas Lainnya"</b>
                                        <br>Silahkan upload file magang di button berkas lainnya dengan ketentuan yang sudah diberikan.
                                    </p>
                                    <b>Kirim data tersebut dengan ketentuan :</b>
                                    <ol>
                                        <li>Ukuran file dan foto max 1 MB</li>
                                        <li>Format file bisa berupa PDF</li>
                                        <li>Format foto 3x4 bisa berupa JPG / JPEG / PNG</li>
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

                                        @if ($users[0]->status_user == "Individu")

                                        <td>
                                            <a class="btn btn-warning p-1" href="/dokumen-mhs-upload-foto/{{$absen->id}}" role="button">Foto 3x4</a>

                                            <a class="btn btn-primary p-1" href="/dokumen-mhs-upload/{{$absen->id}}" role="button">Berkas Lainnya</a>
                                        </td>

                                        @else

                                        <td>
                                            <a class="btn btn-warning p-1" href="/dokumen-mhs-kel-upload-foto/{{$absen->id}}" role="button">Foto 3x4</a>

                                            <a class="btn btn-primary p-1" href="/dokumen-mhs-kel-upload/{{$absen->id}}" role="button">Berkas Lainnya</a>
                                        </td>

                                        @endif

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

                                    @if ($users[0]->status_user == "Individu")

                                    @if ($img->fotoID != null)
                                    <tr>
                                        <td>{{ $img->nama }}</td>
                                        <td>
                                            <img src="{{ asset('file/foto-mhs/' . $img->fotoID) }}" alt="Foto" class="img-thumbnail" width="135">
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" href="/dokumen-mhs-foto/{{$img->id}}/{{$img->fotoID}}">Hapus</a>
                                        </td>

                                    </tr>
                                    @endif

                                    @else

                                    @if ($img->fotoID != null)
                                    <tr>
                                        <td>{{ $img->nama }}</td>
                                        <td>
                                            <img src="{{ asset('file/foto-mhs-kel/' . $img->fotoID) }}" alt="Foto" class="img-thumbnail" width="135">
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" href="/dokumen-mhs-kel-foto/{{$img->id}}/{{$img->fotoID}}">Hapus</a>
                                        </td>

                                    </tr>
                                    @endif

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

                                    @if ($users[0]->status_user == "Individu")

                                    @if ($img1->foto != null)

                                    <tr>
                                        <td>{{ $img1->nama }}</td>
                                        <td>
                                            <img src="{{ asset('file/dokumen-mhs/' . $img1->foto) }}" alt="Foto" class="img-thumbnail" width="135">
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" href="/dokumen-mhs/{{$img1->id}}/{{$img1->foto}}">Hapus</a>
                                        </td>
                                    </tr>

                                    @endif

                                    @else

                                    @if ($img1->foto != null)

                                    <tr>
                                        <td>{{ $img1->nama }}</td>
                                        <td>
                                            <img src="{{ asset('file/dokumen-mhs-kel/' . $img1->foto) }}" alt="Foto" class="img-thumbnail" width="135">
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" href="/dokumen-mhs-kel/{{$img1->id}}/{{$img1->foto}}">Hapus</a>
                                        </td>
                                    </tr>

                                    @endif

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