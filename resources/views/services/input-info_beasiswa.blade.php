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
                                    <form method="POST" action="{{ route('uploadInfoBeasiswa') }}" enctype="multipart/form-data">
                                        @csrf
                                        <!-- Input Nama Beasiswa -->
                                        <div class="form-group">
                                            <small class="ml-2">Nama Beasiswa</small>
                                            <input type="text" class="form-control" id="nama_beasiswa" name="nama_beasiswa">
                                        </div>
                                        <!-- Input Institusi -->
                                        <div class="form-group">
                                            <small class="ml-2">Institusi</small>
                                            <input type="text" class="form-control" id="institusi" name="institusi">
                                        </div>                                        
                                        <!-- Input URL Beasiswa -->
                                        <div class="form-group">
                                            <small class="ml-2">URL</small>
                                            <input type="text" class="form-control" id="url" name="url">
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
