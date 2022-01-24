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
                                    <form method="POST" action="/edit-skema-bnsp/{{ $data->id }}" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <!-- Input Kode Skema -->
                                        <div class="form-group">
                                            <small class="ml-2">Kode Skema</small>
                                            <input type="text" class="form-control" id="kode_skema" name="kode_skema"
                                                value="{{ $data->kode_skema }}">
                                        </div>
                                        <!-- Input Nama Skema -->
                                        <div class="form-group">
                                            <small class="ml-2">Nama Skema</small>
                                            <input type="text" class="form-control" id="nama_skema" name="nama_skema"
                                                value="{{ $data->nama_skema }}">
                                        </div>                                        
                                        <!-- Input Level -->
                                        <div class="form-group">
                                            <small class="ml-2">Level</small>
                                            <input type="number" class="form-control" id="level" name="level"
                                                value="{{ $data->level }}">
                                        </div>
                                        <!-- Input Bidang -->
                                        <div class="form-group">
                                            <small class="ml-2">Bidang</small>
                                            <input type="text" class="form-control" id="bidang" name="bidang"
                                                value="{{ $data->bidang }}">
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
