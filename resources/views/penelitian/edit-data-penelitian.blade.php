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
                                    <p class="card-text"><small>Setelah membuat akun mohon lengkapi data berikut dengan
                                            benar untuk pemrosesan seleksi berkas</small></p>

                                    <form method="POST"
                                        action="/update-data-penelitian/{{ $data->id }}/{{ $data->id_rekap }}">
                                        @method('put')
                                        @csrf

                                        <div class="form-group">
                                            <small class="ml-2">Nama Anda</small>
                                            <input type="text" class="form-control" id="nama"
                                                name="nama" value="{{ $data->nama }}">
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">Univ / Instansi</small>
                                            <input type="text" class="form-control" id="asal_instansi"
                                                name="asal_instansi" value="{{ $data->asal_instansi }}">
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">Strata (D3 - S3)</small>
                                            <input type="text" class="form-control" id="univ" name="strata"
                                                value="{{ $data->strata }}">
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">Jurusan</small>
                                            <input type="text" class="form-control" id="univ" name="jurusan"
                                                value="{{ $data->jurusan }}">
                                        </div>

                                        <div class="form-group">
                                            <small class="ml-2">Judul Penelitian</small>
                                            <input type="text" class="form-control" id="strata" name="judul_penelitian"
                                                value="{{ $data->judul_penelitian }}">
                                        </div>

                                        <div class="form-group">
                                            <small class="ml-2">Alamat Rumah</small>
                                            <input type="text" class="form-control" id="alamat_rumah" name="alamat_rumah"
                                                value="{{ $data->alamat_rumah }}">
                                        </div>

                                        <div class="form-group">
                                            <small class="ml-2">Nomer Hp</small>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp"
                                                value="{{ $data->no_hp }}">
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
