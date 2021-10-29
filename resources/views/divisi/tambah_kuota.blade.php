{{-- Mengambil layout dari webBack.blade.php --}}
@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-7">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

            <div class="card shadow">
                <div class="card">
                    <div class="card-header">
                        Kuota
                    </div>
                    <div class="card-body">
                        <form action="{{ route('proseskuota') }}" method="POST">
                            @csrf
                         <div class="form-group">
                            <small class="ml-2">Bagian</small>
                            <input type="text" class="form-control" id="bagian" name="bagian">
                        </div>
                        <div class="form-group">
                            <small class="ml-2">Tanggal Buka</small>
                            <input type="date" class="form-control" id="tanggal" name="tanggal_buka">
                        </div>
                        <div class="form-group">
                            <small class="ml-2">Tanggal Tutup</small>
                            <input type="date" class="form-control" id="tanggal" name="tanggal_tutup">
                        </div>
                        <div class="form-group">
                            <small class="ml-2">Jumlah Kuota</small>
                            <input type="text" class="form-control" id="kuota" name="kuota">
                        </div>
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
                                    <option selected>Pilih Departemen</option>
                                    <option value="Departemen 1">Departemen 1</option>
                                    <option value="Departemen 2">Departemen 2</option>
                                    <option value="Departemen 3">Departemen 3</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Tambah Kuota</button>
                    </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->


    </div>
</div>
<!-- End of Main Content -->

@endsection
