@extends('layouts.webBack')

@section('kontenWebBack')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg">

                @if (session()->has('succes'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('succes') }}
                    </div>
                @endif
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800 mb-3"><b>{{ $ti }}</b></h1>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="card shadow mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mt-2">Edit Data</h5>


                                    <form method="POST" action="/edit-jadwal_sertifikat/{{ $data->id }}" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <!-- Input Nama Training -->
                                        <div class="form-group">
                                            <small class="ml-2">Nama Training</small>
                                            <input type="text" class="form-control" id="nama_training" name="nama_training"
                                                value="{{ $data->nama_training }}">
                                        </div>
                                        <!-- Input Penyelenggara -->
                                        <div class="form-group">
                                            <small class="ml-2">Penyelenggara</small>
                                            <input type="text" class="form-control" id="penyelenggara" name="penyelenggara"
                                                value="{{ $data->penyelenggara }}">
                                        </div>                                        
                                        <!-- Input Tanggal Mulai -->
                                        <div class="form-group">
                                            <small class="ml-2">Tanggal Mulai</small>
                                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai"
                                                value="{{ $data->tanggal_mulai }}">
                                        </div>
                                        <!-- Input Tanggal Selesai -->
                                        <div class="form-group">
                                            <small class="ml-2">Tanggal Selesai</small>
                                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai"
                                                value="{{ $data->tanggal_selesai }}">
                                        </div>
                                        <!-- Input Tempat -->
                                        <div class="form-group">
                                            <small class="ml-2">Tempat</small>
                                            <input type="text" class="form-control" id="tempat" name="tempat"
                                                value="{{ $data->tempat }}">
                                        </div>   
                                        <!-- Input Peserta Sprint -->
                                        <div class="form-group">
                                            <small class="ml-2">Peserta Sprint</small>
                                            <input type="number" class="form-control" id="peserta_sprint" name="peserta_sprint"
                                                value="{{ $data->peserta_sprint }}">
                                        </div>   
                                        <!-- Input Peserta Hadir -->
                                        <div class="form-group">
                                            <small class="ml-2">Peserta Hadir</small>
                                            <input type="number" class="form-control" id="peserta_hadir" name="peserta_hadir"
                                                value="{{ $data->peserta_hadir }}">
                                        </div>   
                                        <!-- Input Dokumen -->
                                        <div class="form-group">
                                            <small class="ml-2">Dokumen</small>
                                            <input type="file" class="form-control" id="fileSertifikat" name="fileSertifikat"
                                                value="{{ $data->fileSertifikat }}">
                                        </div>  
                                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-5 p-1">Update <i
                                                class="fas fa-paper-plane"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
