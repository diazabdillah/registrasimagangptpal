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


                                    <form method="POST" action="/edit-galeri/{{ $data->id }}">
                                        @method('put')
                                        @csrf
                                        <!-- Input Judul Galeri -->
                                        <div class="form-group">
                                            <small class="ml-2">Judul</small>
                                            <input type="text" class="form-control" id="judul" name="judul"
                                                value="{{ $data->judul }}">
                                        </div>
                                        <!-- Input Foto Galer -->
                                        <div class="form-group">
                                            <small class="ml-2">Foto</small>
                                            <input type="file" class="form-control" id="foto" name="foto"
                                                value="{{ $data->foto }}">
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
