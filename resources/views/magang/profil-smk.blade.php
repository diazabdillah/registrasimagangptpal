@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

            <div class="row">
                @foreach ($data as $profile)
                <div class="col-sm-6">
                    <div class="card shadow mb-4">

                        <div class="card">
                            <div class="card-body">

                                @if ($data[0]->status_user == "Individu SMK")

                                <div class="mb-3">

                                    <img class="gambar1" style="width: 150px; height:180px; border-radius: 5px;" src="{{ asset('file/foto-smk/' .  $profile->fotoID) }}">

                                </div>

                                @else

                                <div class="mb-3">

                                    <img class="gambar1" style="width: 150px; height:180px; border-radius: 5px;" src="{{ asset('file/foto-smk-kel/' .  $profile->fotoID) }}">

                                </div>

                                @endif

                                <div class="form-group">
                                    <small class="ml-2">Nama</small>
                                    <input type="text" class="form-control" id="nama" name="nama" value=" {{$profile->nama}}" disabled>
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Nis</small>
                                    <input type="text" class="form-control" id="nama" name="nama" value=" {{$profile->nis}}" disabled>
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Univ</small>
                                    <input type="text" class="form-control" id="email" name="univ" value="{{$profile->sekolah}}" disabled>
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Strata dan Jurusan</small>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{$profile->jurusan}}" disabled>
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Alamat Rumah</small>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{$profile->alamat_rumah}}" disabled>
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">No.HP</small>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{$profile->no_hp}}" disabled>
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Divisi</small>
                                    <input type="text" class="form-control" id="divisi" name="divisi" value="{{$profile->divisi}}" disabled>
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Departemen</small>
                                    <input type="text" class="form-control" id="status" name="status" value="{{$profile->departemen}}" disabled>
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