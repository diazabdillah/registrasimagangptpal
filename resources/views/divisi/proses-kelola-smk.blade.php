@extends('layouts.webBack')

@section('kontenWebBack')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card shadow mb-4">

                            <div class="card">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Detail Calon Magang</h6>
                                </div>

                                @if ($users[0]->status_user == 'SMK')

                                    @foreach ($users as $user)

                                        <div class="card-body">
                                            <h3 class="card-title"><b>Nama :</b> {{ $user->nama }}</h3>
                                            <h5 class="card-title"> {{ $user->nim }}</h5>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><i class="far fa-fw fa-building mr-3"></i>
                                                {{ $user->univ }}
                                            </li>
                                            <li class="list-group-item"><i class="fas fa-fw fa-graduation-cap mr-3"></i>
                                                {{ $user->strata }} {{ $user->jurusan }}
                                            </li>
                                            <li class="list-group-item"><i class="fas fa-fw fa-home mr-3"></i>
                                                {{ $user->alamat_rumah }}
                                            </li>
                                            <li class="list-group-item"><i class="fas fa-fw fa-phone-alt mr-3"></i>
                                                {{ $user->no_hp }}
                                            </li>
                                            <li class="list-group-item"><i class="fas fa-fw fa-briefcase mr-3"></i>
                                                {{ $user->divisi }}
                                            </li>
                                            <li class="list-group-item"><i class="fas fa-fw fa-briefcase mr-3"></i>
                                                {{ $user->departemen }}
                                            </li>
                                        </ul>
                                    @endforeach

                                @else

                                    @foreach ($users as $user)

                                        <div class="card-body">
                                            <h3 class="card-title"><b>Nama :</b> {{ $user->nama }}</h3>
                                            <h5 class="card-title"> {{ $user->nis }}</h5>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><i class="far fa-fw fa-building mr-3"></i>
                                                {{ $user->sekolah }}
                                            </li>
                                            <li class="list-group-item"><i class="fas fa-fw fa-graduation-cap mr-3"></i>
                                                {{ $user->jurusan }}
                                            </li>
                                            <li class="list-group-item"><i class="fas fa-fw fa-home mr-3"></i>
                                                {{ $user->alamat_rumah }}
                                            </li>
                                            <li class="list-group-item"><i class="fas fa-fw fa-phone-alt mr-3"></i>
                                                {{ $user->no_hp }}
                                            </li>
                                            <li class="list-group-item"><i class="fas fa-fw fa-briefcase mr-3"></i>
                                                {{ $user->divisi }}
                                            </li>
                                            <li class="list-group-item"><i class="fas fa-fw fa-briefcase mr-3"></i>
                                                {{ $user->departemen }}
                                            </li>
                                        </ul>
                                    @endforeach

                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">

                        <div class="card shadow mb-4">

                            <div class="card">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">File Calon Magang</h6>
                                </div>

                                <ul class="list-group list-group-flush">

                                    @foreach ($filepdf as $file)

                                        @if ($users[0]->status_user == 'SMK')

                                            <li class="list-group-item"><i class="fas fa-fw fa-file-pdf mr-3"></i>
                                                {{ $file->path }}
                                                <a href="{{ url('pdf-mhs/' . $file->id) }}"
                                                    class="badge badge-success float-right p-2">Open <i
                                                        class="fas fa-eye ml-1"></i></a>
                                            </li>

                                        @else

                                            <li class="list-group-item"><i class="fas fa-fw fa-file-pdf mr-3"></i>
                                                {{ $file->path }}
                                                <a href="{{ url('pdf-mhs-kel/' . $file->id) }}"
                                                    class="badge badge-success float-right p-2">Open <i
                                                        class="fas fa-eye ml-1"></i></a>
                                            </li>

                                        @endif
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>

                    @if ($users[0]->divisi == null)
                        <div class="col-sm-12">
                            <div class="card shadow mb-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="m-0 font-weight-bold text-primary">Pilih Departemen Magang
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-group">
                                                <small class="ml-2">Pilih Departement</small>
                                                <div class="input-group mb-3">
                                                    <select disabled class="custom-select"></select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <small class="ml-2">Pilih Status</small>
                                                <div class="input-group mb-3">
                                                    <select disabled class="custom-select"></select>
                                                </div>
                                            </div>
                                            <button disabled class="btn btn-primary mt-4" type="submit">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-sm-12">
                            <div class="card shadow mb-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="m-0 font-weight-bold text-primary">Pilih Departemen Magang
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST"
                                            action="/update-magang-departemen-penelitian/{{ $user->id }}">
                                            @method('put')
                                            @csrf
                                            <div class="form-group">
                                                <small class="ml-2">Pilih Departement</small>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" name="departemen">
                                                        @foreach ($departemen as $dep)
                                                            <option value="{{ $dep->nama_departemen }}">
                                                                {{ $dep->nama_departemen }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <small class="ml-2">Pilih Status</small>
                                                <div class="input-group mb-3">
                                                    <select class="custom-select" name="status_penerimaan">
                                                        <option selected>Pilih status</option>
                                                        <option value="Diterima">Diterima</option>
                                                        <option value="Ditolak">Ditolak</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary mt-4" type="submit">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->


@endsection
