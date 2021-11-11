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
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mt-2">Data</h5>
                            <p class="card-text"><small>Setelah membuat akun mohon lengkapi data berikut dengan
                                    benar untuk pemerosesan seleksi berkas</small></p>

                            <form method="POST" action="/input-smk-kelompok">
                                @csrf
                                <div class="form-group">
                                    <small class="ml-2">Nama Anggota</small>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Sekolah</small>
                                    <input type="text" class="form-control" id="sekolah" name="sekolah">
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Jurusan</small>
                                    <input type="text" class="form-control" id="jurusan" name="jurusan">
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Nis</small>
                                    <input type="text" class="form-control" id="nis" name="nis">
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Alamat Rumah</small>
                                    <input type="text" class="form-control" id="alamat_rumah" name="alamat_rumah">
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Nomer Hp</small>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block mt-5 p-1">Kirim <i class="fas fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection