@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card shadow mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <img class="gambar1" style="width: 100px; border-radius: 5px;" src="./assets/img/fotoProfil.jpg">
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Nama</small>
                                    <input type="text" class="form-control" id="nama" name="nama" value="Jhon Doe" disabled>
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Email</small>
                                    <input type="text" class="form-control" id="email" name="email" value="jhondoe@gmail.com" disabled>
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">No.HP</small>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="0825xxxxxxxx" disabled>
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Divisi</small>
                                    <input type="text" class="form-control" id="divisi" name="divisi" value="HCM" disabled>
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Status</small>
                                    <input type="text" class="form-control" id="status" name="status" value="Pendaftar Magang" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection