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


                                <form method="POST" action="/edit-data-smkInd/{{ $data->id }}">
                                    @method('put')
                                    @csrf
                                    <!-- Input Nama -->
                                    <div class="form-group">
                                        <small class="ml-2">Nama</small>
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}">
                                    </div>
                                    <!-- Input Sekolah -->
                                    <div class="form-group">
                                        <small class="ml-2">Sekolah</small>
                                        <input type="text" class="form-control" id="sekolah" name="sekolah" value="{{ $data->sekolah }}">
                                    </div>
                                    <!-- Input Strata (S1/d3) -->
                                    <div class="form-group">
                                        <small class="ml-2">Jurusan</small>
                                        <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $data->jurusan }}">
                                    </div>
                                    <!-- Input Alamat Rumah -->
                                    <div class="form-group">
                                        <small class="ml-2">Alamat Rumah</small>
                                        <input type="text" class="form-control" id="alamat_rumah" name="alamat_rumah" value="{{ $data->alamat_rumah }}">
                                    </div>

                                    <!-- Input No HP -->
                                    <div class="form-group">
                                        <small class="ml-2">Nomer Hp</small>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $data->no_hp }}">
                                    </div>

                                    <!-- Divisi -->
                                    <div class="form-group">
                                        <small class="ml-2">Pilih Divisi</small>
                                        <div class="input-group mb-3">
                                            <select class="custom-select" name="divisi">
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
                                                <option value="Departemen 1">Departemen 1</option>
                                                <option value="Departemen 2">Departemen 2</option>
                                                <option value="Departemen 3">Departemen 3</option>
                                            </select>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-lg btn-block mt-5 p-1">Update <i class="fas fa-paper-plane"></i></button>
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