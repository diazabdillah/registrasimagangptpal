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


                                    <form method="POST" action="/edit-daftar-ruangan/{{ $data->id }}" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <!-- Input Nama Ruangan -->
                                        <div class="form-group">
                                            <small class="ml-2">Nama Ruangan</small>
                                            <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan"
                                                value="{{ $data->nama_ruangan }}">
                                        </div>
                                        <!-- Input Fasilitas -->
                                        <div class="form-group">
                                            <small class="ml-2">Fasilitas</small>
                                            <input type="text" class="form-control" id="fasilitas" name="fasilitas"
                                                value="{{ $data->fasilitas }}">
                                        </div>                                        
                                        <!-- Input Kapasitas -->
                                        <div class="form-group">
                                            <small class="ml-2">Kapasitas</small>
                                            <input type="number" class="form-control" id="kapasitas" name="kapasitas"
                                                value="{{ $data->kapasitas }}">
                                        </div>
                                        <!-- Input Foto Ruangan -->
                                        <div class="form-group">
                                            <small class="ml-2">Foto Ruangan</small>
                                            <input type="file" class="form-control" id="foto_ruangan" name="foto_ruangan"
                                                value="{{ $data->foto_ruangan }}">
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
