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
                <div class="col-sm-6">
                    <div class="card shadow mb-3">
                        <div class="card">
                            <div class="card-header">
                                Dokumen Pemagang
                            </div>
                            <div class="card-body">
                                {{-- <a href="magang.Dokumen_mhs_upload" class="btn btn-primary mb-3 mr-3">Buka Form Upload
                                        <i class="fas fa-upload ml-2"></i></a> --}}

                                <div class="alert alert-info" role="alert">
                                    <p class="card-text"><b>Klik Buka Form Upload</b>
                                        <br>untuk mengrimkan data - data anda dan setelah data di verifikasi oleh admin
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

                <div class="col-sm-6">
                    <div class="card shadow mb-3">
                        <div class="card">
                            <div class="card-header">
                                Dokumen
                            </div>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    {{-- @foreach ($users as $absen)
                                            @if ($absen->role_id != 1) --}}
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a class="btn btn-primary p-1" href="" role="button">Buka Form Upload</a>
                                        </td>
                                    </tr>
                                    {{-- @endif
                                        @endforeach --}}
                                </tbody>
                            </table>
                            {{-- <div class="card-body d-flex flex-wrap">
                                    @foreach ($showImage as $img)
                                        <div class="col-sm-3">
                                            <div class="card">
                                                <img src="{{ asset('/file/' . $img->foto) }}" alt="Foto"
                            class="img-thumbnail" width="135">
                            <a class="btn btn-danger p-0 mt-2 float-right" href="{{ url('Dokumen_mhs/' . $img->id, $img->foto) }}"><i class="far fa-trash-alt p-1"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div> --}}
            </div>
        </div>
    </div>
</div>


</div>
</div>
</div>




@endsection