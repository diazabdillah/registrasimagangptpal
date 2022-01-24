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
                                    <form method="POST" action="/edit-jumlah-asesor/{{ $data->id }}" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <!-- Input Kode Skema -->
                                        <div class="form-group">
                                            <small class="ml-2">Nomor Registrasi</small>
                                            <input type="text" class="form-control" id="nomor_registrasi" name="nomor_registrasi"
                                                value="{{ $data->nomor_registrasi }}">
                                        </div>
                                        <!-- Input Nama Skema -->
                                        <div class="form-group">
                                            <small class="ml-2">Nama Asesor</small>
                                            <input type="text" class="form-control" id="nama_assessor" name="nama_assessor"
                                                value="{{ $data->nama_assessor }}">
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
