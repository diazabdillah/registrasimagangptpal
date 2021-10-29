@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

            <!-- Card -->
            <div class="row mb-4">
                <div class="col-sm-6">
                    <div class="card shadow mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data</h5>
                                <p class="card-text"><small>Setelah membuat akun mohon lengkapi data berikut untuk
                                        pemerosesan seleksi berkas dengan benar</small></p>
                                <form>
                                    <!-- Input Alamat Rumah -->
                                    <div class="form-group">
                                        <small class="ml-2">Alamat Rumah</small>
                                        <input type="text" class="form-control" id="alamat_rumah" name="alamat_rumah">
                                    </div>
                                    <!-- Input Univ -->
                                    <div class="form-group">
                                        <small class="ml-2">Universitas</small>
                                        <input type="text" class="form-control" id="univ" name="univ">
                                    </div>

                                    <!-- Input No HP -->
                                    <div class="form-group">
                                        <small class="ml-2">Nomer Hp</small>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp">
                                    </div>
                                    <!-- Input Strata (S1/d3) -->
                                    <div class="form-group">
                                        <small class="ml-2">Strata (D1 - S2)</small>
                                        <input type="text" class="form-control" id="strata" name="strata">
                                    </div>

                                    <!-- Upload Proposal dan surat pengajuan -->
                                    <div class="form-group">
                                        <small class="ml-2">Proposal Max 1MB</small>
                                        <input type="file" class="form-control" id="berkas" name="berkas" required>
                                    </div>
                                    <div class="form-group">
                                        <small class="ml-2">Surat Pengajuan Magang Max 1MB</small>
                                        <input type="file" class="form-control" id="berkas" name="berkas" required>
                                    </div>
                                    <!-- End upload Proposal dan surat pengajuan -->

                                    <!-- Divisi -->
                                    <div class="form-group">
                                        <small class="ml-2">Pilih Divisi</small>
                                        <div class="input-group mb-3">
                                            <select class="custom-select" name="divisi">
                                                <option selected>Pilih Divisi</option>
                                                <option value="Divisi 1">Divisi 1</option>
                                                <option value="Divisi 2">Divisi 2</option>
                                                <option value="Divisi 3">Divisi 3</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Departemen -->
                                    <div class="form-group">
                                        <small class="ml-2">Pilih Departemen</small>
                                        <div class="input-group mb-3">
                                            <select class="custom-select" name="departemen">
                                                <option selected>Pilih Departmen</option>
                                                <option value="Departemen 1">Departemen 1</option>
                                                <option value="Departemen 2">Departemen 2</option>
                                                <option value="Departemen 3">Departemen 3</option>
                                            </select>
                                        </div>
                                    </div>

                                    <a href="#" class="btn btn-primary float-right">Kirim</a>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->

        </div>
    </div>
</div>

@endsection