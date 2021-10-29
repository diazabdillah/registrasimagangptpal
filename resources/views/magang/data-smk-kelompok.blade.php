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
                <div class="col-sm-6">
                    <div class="card shadow mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mt-2">Data</h5>
                                <p class="card-text"><small>Setelah membuat akun mohon lengkapi data berikut dengan
                                        benar untuk pemerosesan seleksi berkas</small></p>

                                <form>
                                    <!-- Input Alamat Rumah -->
                                    <div class="form-group">
                                        <small class="ml-2">Alamat Sekolah</small>
                                        <input type="text" class="form-control" id="alamat_rumah" name="alamat_rumah">
                                    </div>
                                    <!-- Input Univ -->
                                    <div class="form-group">
                                        <small class="ml-2">Nama Sekolah</small>
                                        <input type="text" class="form-control" id="univ" name="univ">
                                    </div>

                                    <!-- Input No HP -->
                                    <div class="form-group">
                                        <small class="ml-2">Nomer Hp</small>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp">
                                    </div>
                                    <!-- Input Jurusan -->
                                    <div class="form-group">
                                        <small class="ml-2">Jurusan</small>
                                        <input type="text" class="form-control" id="strata" name="jurusan">
                                    </div>


                                    <button type="submit" class="btn btn-primary btn-lg btn-block mt-5 p-1">Kirim <i class="fas fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card shadow mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mt-2">File</h5>
                                <p class="card-text"><small>Kirim file dalam bentuk PDF dengan maksimalukuran
                                        2MB</small></p>

                                <form>
                                    <!-- Upload Proposal dan surat pengajuan -->
                                    <div class="form-group">
                                        <small class="ml-2">Proposal</small>
                                        <input type="file" class="form-control" name="berkas[]" required>
                                    </div>
                                    <div class="form-group">
                                        <small class="ml-2">Surat Pengajuan Magang</small>
                                        <input type="file" class="form-control" name="berkas[]" required>
                                    </div>
                                    <!-- End upload Proposal dan surat pengajuan -->
                                </form>

                                <button type="submit" class="btn btn-primary btn-lg btn-block mt-5 p-1">Kirim <i class="fas fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


@endsection