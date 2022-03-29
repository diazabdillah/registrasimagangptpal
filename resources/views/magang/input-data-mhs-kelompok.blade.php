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

                <div class="row">
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <h5 class="card-title mt-2">Data</h5>
                            <p class="card-text"><small>Setelah membuat akun mohon lengkapi data berikut dengan
                                    benar untuk pemerosesan seleksi berkas</small></p>

                            <form id="formregis" method="POST" action="/input-mhs-kelompok">
                                @csrf
                                <div class="form-group">
                                    <small class="ml-2">Nama Anggota</small>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Universitas</small>
                                    <input type="text" class="form-control" id="univ" name="univ">
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Strata (D1 - S2)</small>
                                    <input type="text" class="form-control" id="strata" name="strata">
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Jurusan</small>
                                    <input type="text" class="form-control" id="strata" name="jurusan">
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Nim</small>
                                    <input type="text" class="form-control" id="nim" name="nim">
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Alamat Rumah</small>
                                    <input type="text" class="form-control" id="alamat_rumah" name="alamat_rumah">
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Nomer Hp</small>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block buttonregis">
                            
                                    <div class="spinner"><i role="status" class="spinner-border spinner-border-sm"></i> Loading </div>
                                    <div class="text">Kirim <i
                                        class="fas fa-paper-plane"></i></div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
