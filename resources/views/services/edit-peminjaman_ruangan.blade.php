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


                                    <form method="POST" action="/edit-peminjaman-ruangan/{{ $data->id }}" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <!-- Input Pilih Ruangan -->
                                        <div class="form-group">
                                            <small class="ml-2">Pilih Ruangan</small>
                                            <input type="text" class="form-control" id="pilih_ruangan" name="pilih_ruangan" value="{{ $data->pilih_ruangan }}">>
                                        </div>
                                        <!-- Input Nama Peminjaman -->
                                        <div class="form-group">
                                            <small class="ml-2">Nama Peminjam</small>
                                            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="{{ $data->nama_peminjam }}">
                                        </div>       
                                        <!-- Input Nama Divisi -->
                                        <div class="form-group">
                                            <small class="ml-2">Divisi</small>
                                            <input type="text" class="form-control" id="divisi" name="divisi" value="{{ $data->divisi }}">
                                        </div>
                                        <!-- Input Nama Departemen -->
                                        <div class="form-group">
                                            <small class="ml-2">Departemen</small>
                                            <input type="text" class="form-control" id="departemen" name="departemen" value="{{ $data->departemen }}">
                                        </div>     
                                        <!-- Input Nomor Telpon -->
                                        <div class="form-group">
                                            <small class="ml-2">No. Telp</small>
                                            <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $data->no_telp }}">
                                        </div>
                                        <!-- Input Tanggal Mulai -->
                                        <div class="form-group">
                                            <small class="ml-2">Tanggal Mulai</small>
                                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $data->tanggal_mulai }}">
                                        </div>  
                                        <!-- Input Tanggal Selesai -->
                                        <div class="form-group">
                                            <small class="ml-2">Tanggal Selesai</small>
                                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ $data->tanggal_selesai }}">
                                        </div>   
                                        <!-- Input Jam Mulai -->
                                        <div class="form-group">
                                            <small class="ml-2">Jam Mulai</small>
                                            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="{{ $data->jam_mulai }}">
                                        </div>
                                        <!-- Input Jam Selesai -->
                                        <div class="form-group">
                                            <small class="ml-2">Jam Selesai</small>
                                            <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" value="{{ $data->jam_selesai }}">
                                        </div>
                                        <!-- Input Keperluan -->
                                        <div class="form-group">
                                            <small class="ml-2">Keperluan</small>
                                            <input type="text" class="form-control" id="keperluan" name="keperluan" value="{{ $data->keperluan }}">
                                        </div> 
                                        <!-- Input Status -->
                                        <div class="form-group">
                                            <small class="ml-2">Status</small>
                                            <select class="form-control custom-select" id="status" name="status" value="{{ $data->status }}">
                                                <option value="Proses">Proses</option>
                                                <option value="Selesai">Selesai</option>
                                            </select>
                                        </div> 

                                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-5 p-1">Update <i
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
