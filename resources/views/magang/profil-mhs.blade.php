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
                    @foreach ($data as $profile)
                        <div class="col-sm-6">
                            <div class="card shadow mb-4">

                                <div class="card">
                                    <div class="card-body">

                                        @if ($data[0]->status_user == 'Mahasiswa')

                                            <div class="mb-3">

                                                <img class="gambar1"
                                                    style="width: 150px; height:180px; border-radius: 5px;"
                                                    src="{{ asset('file/foto-mhs/' . $profile->id_individu . '/' . $profile->fotoID) }}">

                                            </div>

                                        @else

                                            <div class="mb-3">

                                                <img class="gambar1"
                                                    style="width: 150px; height:180px; border-radius: 5px;"
                                                    src="{{ asset('file/foto-mhs-kel/' . $profile->id_individu . '/' . $profile->fotoID) }}">

                                            </div>

                                        @endif

                                        <div class="form-group">
                                            <small class="ml-2">Nama</small>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                value=" {{ $profile->nama }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">Nim</small>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                value=" {{ $profile->nim }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">Univ</small>
                                            <input type="text" class="form-control" id="email" name="univ"
                                                value="{{ $profile->univ }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">Strata dan Jurusan</small>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                value="{{ $profile->strata }} {{ $profile->jurusan }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">Alamat Rumah</small>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                value="{{ $profile->alamat_rumah }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">No.HP</small>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp"
                                                value="{{ $profile->no_hp }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">Divisi</small>
                                            <input type="text" class="form-control" id="divisi" name="divisi"
                                                value="{{ $profile->divisi }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">Departemen</small>
                                            <input type="text" class="form-control" id="status" name="status"
                                                value="{{ $profile->departemen }}" disabled>
                                        </div>
                                        <div class="form-group">
                                            <small class="ml-2">Waktu Magang</small><br>
                                            <li class="list-group-item">
                                                Tgl Mulai <span class="badge badge-success p-2">
                                                    {{ date('d-F-Y', strtotime($profile->mulai)) }}</span>
                                                Tgl Selesai <span class="badge badge-danger p-2">
                                                    {{ date('d-F-Y', strtotime($profile->selesai)) }}</span>
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
