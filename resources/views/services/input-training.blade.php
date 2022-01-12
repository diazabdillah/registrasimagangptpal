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
                                    <h5 class="card-title mt-2">Data</h5>
                                    <form method="POST" action="{{ route('uploadTraining') }}" enctype="multipart/form-data">
                                        @csrf
                                        <!-- Input Nama Training -->
                                        <div class="form-group">
                                            <small class="ml-2">Nama Training</small>
                                            <input type="text" class="form-control" id="nama_training" name="nama_training">
                                        </div>
                                        <!-- Input Penyelenggara -->
                                        <div class="form-group">
                                            <small class="ml-2">Penyelenggara</small>
                                            <input type="text" class="form-control" id="penyelenggara" name="penyelenggara">
                                        </div>                                        
                                        <!-- Input Tanggal Mulai -->
                                        <div class="form-group">
                                            <small class="ml-2">Tanggal Mulai</small>
                                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                                        </div>
                                        <!-- Input Tanggal Selesai -->
                                        <div class="form-group">
                                            <small class="ml-2">Tanggal Selesai</small>
                                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                                        </div>  
                                         <!-- Input Tempat Training -->
                                         <div class="form-group">
                                            <small class="ml-2">Tempat</small>
                                            <input type="text" class="form-control" id="tempat" name="tempat">
                                        </div> 
                                         <!-- Input Peserta Sprint -->
                                         <div class="form-group">
                                            <small class="ml-2">Peserta Sprint</small>
                                            <input type="number" class="form-control" id="peserta_sprint" name="peserta_sprint">
                                        </div> 
                                         <!-- Input Peserta Hadir -->
                                         <div class="form-group">
                                            <small class="ml-2">Peserta Hadir</small>
                                            <input type="number" class="form-control" id="peserta_hadir" name="peserta_hadir">
                                        </div> 
                                        <!-- Input Dokumen Training -->
                                        <div class="form-group">
                                            <small class="ml-2">Dokumen</small>
                                            <input type="file" id="fileTraining" name="fileTraining" class="form-control">
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-5 p-1">Kirim <i
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
