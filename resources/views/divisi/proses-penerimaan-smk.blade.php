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
                                        <li class="list-group-item"><i class="fas fa-fw fa-briefcase mr-3"></i>
                                            {{ $user->status_penerimaan }}
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="shadow mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Berkas Calon Magang</h6>
                                </div>

                                <ul class="list-group list-group-flush">
                                    @if ($users[0]->status_user == 'SMK')

                                        @foreach ($filepdf as $file)
                                            <li class="list-group-item"><i class="fas fa-fw fa-file-pdf mr-3"></i>
                                                {{ $file->path }}
                                                <a href="{{ url('pdf-smk/' . $file->id) }}"
                                                    class="badge badge-success float-right p-2">Open <i
                                                        class="fas fa-eye ml-1"></i></a>
                                            </li>
                                        @endforeach

                                    @else

                                        @foreach ($filepdf as $file)
                                            <li class="list-group-item"><i class="fas fa-fw fa-file-pdf mr-3"></i>
                                                {{ $file->path }}
                                                <a href="{{ url('pdf-smk-kel/' . $file->id) }}"
                                                    class="badge badge-success float-right p-2">Open <i
                                                        class="fas fa-eye ml-1"></i></a>
                                            </li>
                                        @endforeach

                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Pilih Jurusan Magang
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="/update-magang-divisi-smk/{{ $user->id }}">
                                        @method('put')
                                        @csrf
                                        <div class="form-group">
                                            <small class="ml-2">Pilih Divisi</small>
                                            <div class="input-group mb-3">
                                                <select class="custom-select" name="divisi">
                                                    {{-- <option selected>Pilih Divisi</option> --}}
                                                    @foreach ($divisi as $div)
                                                        <option value="{{ $div->nama_divisi }}">
                                                            {{ $div->nama_divisi }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary mt-4" type="submit">Simpan</button>
                                    </form>
                                </div>
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
                                        <form method="POST" action="/update-magang-departemen-smk/{{ $user->id }}">
                                            @method('put')
                                            @csrf
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
                                        <form method="POST" action="/update-magang-departemen-smk/{{ $user->id }}">
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

                    <div class="col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Tanggal Mulai dan Selesai</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="/proses-magang-aktmhs/{{ $user->id }}">
                                        @method('put')
                                        @csrf
                                        <label class="ml-2"><b>Tanggal Mulai</b></label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" id="mulai" name="mulai">
                                        </div>
                                        <label class="ml-2 mt-3"><b>Tanggal Selesai</b></label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" id="selesai" name="selesai">
                                        </div>
                                        <button class="btn btn-primary mt-4" type="submit">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Proses Penerimaan</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="/proses_penerimaan/{{ $user->id }}">
                                        @method('put')
                                        @csrf
                                        <label class="ml-2"><b>Pilih Tindakan Penerimaan</b></label>
                                        <div class="input-group">
                                            <select class="custom-select" id="inputGroupSelect04" name="role_id" required>
                                                <option value="17">Tes Kepribadian</option>
                                                <option value="0">Kuota Penuh</option>
                                            </select>
                                            <div class="input-group-append">
                                                <button class="btn btn-danger" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
                                        <strong>Pilih Tindakan Penerimaan</strong> berungsi untuk meneruskan proses apakah
                                        pendaftar tersebut diterima atau tidak
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
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
