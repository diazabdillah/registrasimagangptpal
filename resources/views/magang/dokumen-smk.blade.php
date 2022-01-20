@extends('layouts.webBack')

@section('kontenWebBack')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg">
                <!-- Page Heading -->

                <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

                @if (session()->has('succes'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('succes') }}
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

                                    <div class="alert alert-info" role="alert">
                                        <p><b>Langkah 1:</b></p>
                                        <p class="card-text"><b>Klik Button "Foto 3x4"</b>
                                            <br>Silahkan upload foto 3x4 di button "Foto 3x4" dengan ketentuan yang sudah
                                            diberikan.
                                        </p>
                                        <p><b>Langkah 2:</b></p>
                                        <p class="card-text"><b>Klik Button "Berkas Lainnya"</b>
                                            <br>Silahkan upload file magang (KTP, Kartu Pelajar, dan BPJS Ketenagakerjaan) di button "Berkas Lainnya" dengan ketentuan yang
                                            sudah diberikan.
                                        </p>
                                        <b>Kirim data tersebut dengan ketentuan :</b>
                                        <ol>
                                            <li>Ukuran file KTP, Kartu Pelajar, dan BPJS Ketenagakerjaan dan foto 3x4 max 2 MB</li>
                                            <li>Format file KTP, Kartu Pelajar, dan BPJS Ketenagakerjaan berupa JPG / JPEG / PNG</li>
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
                                            <th>Nis</th>
                                            <th>Sekolah</th>
                                            <th>Action</th>
                                        </tr>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $absen)

                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>{{ $absen->nis }}</td>
                                                <td>{{ $absen->sekolah }}</td>

                                                @if ($users[0]->status_user == 'SMK')

                                                    <td>
                                                        <a class="btn btn-warning p-1"
                                                            href="/dokumen-smk-upload-foto/{{ $absen->id }}"
                                                            role="button">Foto 3x4</a>

                                                        <a class="btn btn-primary p-1"
                                                            href="/dokumen-smk-upload/{{ $absen->id }}"
                                                            role="button">Berkas Lainnya</a>
                                                    </td>

                                                @else

                                                    <td>
                                                        <a class="btn btn-warning p-1"
                                                            href="/dokumen-smk-kel-upload-foto/{{ $absen->id }}"
                                                            role="button">Foto 3x4</a>

                                                        <a class="btn btn-primary p-1"
                                                            href="/dokumen-smk-kel-upload/{{ $absen->id }}"
                                                            role="button">Berkas Lainnya</a>
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

                                            @if ($users[0]->status_user == 'SMK')

                                                @if ($img->fotoID != null)
                                                    <tr>
                                                        <td>{{ $img->nama }}</td>
                                                        <td>
                                                            <img src="{{ asset('file/foto-smk/' . $img->id_individu . '/' . $img->fotoID) }}"
                                                                alt="Foto" class="img-thumbnail" width="135">
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-danger"
                                                                onclick="return confirm('yakin Hapus?');"
                                                                href="/dokumen-smk-foto/{{ $img->id }}/{{ $img->fotoID }}">Hapus</a>
                                                        </td>

                                                    </tr>
                                                @endif

                                            @else

                                                @if ($img->fotoID != null)
                                                    <tr>
                                                        <td>{{ $img->nama }}</td>
                                                        <td>
                                                            <img src="{{ asset('file/foto-smk-kel/' . $img->id_individu . '/' . $img->fotoID) }}"
                                                                alt="Foto" class="img-thumbnail" width="135">
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-danger"
                                                                onclick="return confirm('yakin Hapus?');"
                                                                href="/dokumen-smk-kel-foto/{{ $img->id }}/{{ $img->fotoID }}">Hapus</a>
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

                                            @if ($users[0]->status_user == 'SMK')

                                                @if ($img1->foto != null)

                                                    <tr>
                                                        <td>{{ $img1->nama }}</td>
                                                        <td>
                                                            <img src="{{ asset('file/dokumen-smk/' . $img1->id_individu . '/' . $img1->foto) }}"
                                                                alt="Foto" class="img-thumbnail" width="135">
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-danger"
                                                                onclick="return confirm('yakin Hapus?');"
                                                                href="/dokumen-smk/{{ $img1->id }}/{{ $img1->foto }}">Hapus</a>
                                                        </td>
                                                    </tr>

                                                @endif

                                            @else

                                                @if ($img1->foto != null)

                                                    <tr>
                                                        <td>{{ $img1->nama }}</td>
                                                        <td>
                                                            <img src="{{ asset('file/dokumen-smk-kel/' . $img1->id_individu . '/' . $img1->foto) }}"
                                                                alt="Foto" class="img-thumbnail" width="135">
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-danger"
                                                                onclick="return confirm('yakin Hapus?');"
                                                                href="/dokumen-smk-kel/{{ $img1->id }}/{{ $img1->foto }}">Hapus</a>
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
