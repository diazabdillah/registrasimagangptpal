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
                            <div class="col-sm-3 mb-3">
                                <div class="card">
                                    <img src="{{ asset('file/foto-mhs/' . $user->fotoID) }}" alt="Foto" class="img-thumbnail" width="135">
                                </div>
                            </div>
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
                                <li class="list-group-item"><i class="fas fa-fw fa-file-pdf mr-3"></i>
                                    {{ $file->path }}
                                    <a href="{{ url('pdf-mhs/' . $file->id) }}" class="badge badge-success float-right p-2">Open <i class="fas fa-eye ml-1"></i></a>
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card shadow mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">File Interview Peserta Magang</h6>
                            </div>
                            <div class="card-body d-flex flex-wrap">
                                @foreach ($users as $img)
                                <div class="col-sm-3">
                                    <div class="card">
                                        @if ($img->fileinterview != null)
                                        <a class="btn btn-primary" href="{{ asset('file/interview-mhs/' . $img->fileinterview) }}">Download</a>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card shadow mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">File KTP, KTM dan BPJS Peserta Magang</h6>
                            </div>
                            <div class="card-body d-flex flex-wrap">
                                @foreach ($fileFoto as $img)
                                <div class="col-sm-3">
                                    <div class="card">
                                        @if ($img->foto != null)

                                        <img src="{{ asset('file/dokumen-mhs/' . $img->foto) }}" alt="Foto" class="img-thumbnail" width="135">
                                        <a class="btn btn-primary" href="{{ asset('file/dokumen-mhs/' . $img->foto) }}">Download</a>
                                        <a class="btn btn-danger p-0 mt-2 float-right" href="{{ url('final-penerimaan-mhs/' . $img->id, $img->foto) }}"><i class="far fa-trash-alt p-1"></i></a>

                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card shadow mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="m-0 font-weight-bold text-primary">Pilih Jurusan & Departemen Magang</h6>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="/update-magang-divisi/{{ $userid->id }}">
                                    @method('put')
                                    @csrf

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
                                    <div class="form-group">
                                        <small class="ml-2">Pilih Departement</small>
                                        <div class="input-group mb-3">
                                            <select class="custom-select" name="departemen">
                                                <option selected>Pilih Departement</option>
                                                <option value="Departement 1">Departement 1</option>
                                                <option value="Departement 2">Departement 2</option>
                                                <option value="Departement 3">Departement 3</option>
                                            </select>
                                        </div>
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
                                <form method="POST" action="/final-penerimaan-mhs/{{ $userid->id }}">
                                    @method('put')
                                    @csrf
                                    <label class="ml-2"><b>Pilih Tindakan Final</b></label>
                                    <div class="input-group">

                                        <select class="custom-select" id="inputGroupSelect04" name="role_id" required>
                                            <option value="3">Magang Aktif</option>
                                            <option value="16">Magang Interview</option>
                                            <option value="0">Kuota Penuh</option>
                                        </select>

                                        <div class="input-group-append">
                                            <button class="btn btn-danger" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>

                                <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
                                    <strong>Pilih Tindakan Final</strong> berungsi untuk meneruskan proses apakah
                                    pendaftar tersebut resmi diterima atau tidak
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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