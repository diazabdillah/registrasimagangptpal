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
                                @foreach ($foto as $img)
                                <div class="mb-3">
                                    <img class="gambar1" style="width: 100px; border-radius: 5px;" src="{{ asset('file/' . $img->foto) }}">
                                </div>
                                @endforeach
                                <div class="form-group">
                                    <small class="ml-2">Nama</small>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}" disabled>
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Email</small>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $data2->email }}" disabled>
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">No.HP</small>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $data->no_hp }}" disabled>
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Divisi</small>
                                    <input type="text" class="form-control" id="divisi" name="divisi" value="{{ $data->divisi }}" disabled>
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Status</small>
                                    <input type="text" class="form-control" id="status" name="status" value="{{ $data2->role_id }}" disabled>
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