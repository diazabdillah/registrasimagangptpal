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
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Detail Calon Magang</h6>
                                </div>
                                <div class="card-body">
                                    @foreach ($users as $user)
                                        <div class="col-sm-3 mb-3">
                                            <div class="card">
                                                <img src="{{ asset('/storage/public/fotoIDSmk/' . $user->fotoID) }}"
                                                    alt="Foto" class="img-thumbnail" width="135">
                                            </div>
                                        </div>
                                        <h5 class="card-title"><b>Nama :</b> {{ $user->name }}</h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><i class="far fa-fw fa-envelope mr-3"></i>
                                        {{ $user->email }}
                                    </li>
                                    <li class="list-group-item"><i class="fas fa-fw fa-phone-alt mr-3"></i>
                                        {{ $user->no_hp }}
                                    </li>
                                    <li class="list-group-item"><i class="far fa-fw fa-building mr-3"></i>
                                        {{ $user->sekolah }}
                                    </li>
                                    <li class="list-group-item"><i class="fas fa-fw fa-graduation-cap mr-3"></i>
                                        {{ $user->jurusan }}
                                    </li>
                                    <li class="list-group-item"><i class="fas fa-fw fa-briefcase mr-3"></i>
                                        {{ $user->divisi }}
                                    </li>
                                    <li class="list-group-item"><i class="fas fa-fw fa-briefcase mr-3"></i>
                                        {{ $user->departemen }}
                                    </li>
                                    @endforeach

                                    @foreach ($tgl as $data)
                                        <li class="list-group-item"><i class="fas fa-fw fa-calendar-alt mr-3"></i></i>
                                            Tgl Mulai <span class="badge badge-success p-2"> {{ $data->mulai }}</span>
                                            Tgl Selesai <span class="badge badge-danger p-2"> {{ $data->selesai }}</span>
                                        </li>
                                    @endforeach

                                    @foreach ($filepdf as $file)
                                        <li class="list-group-item"><i class="fas fa-fw fa-file-pdf mr-3"></i>
                                            {{ $file->path }}
                                            <a href="{{ url('pdf-smk/' . $file->user_id) }}"
                                                class="badge badge-success float-right p-2">Open <i
                                                    class="fas fa-eye ml-1"></i></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
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
                                            @foreach ($users as $data)
                                                <select class="custom-select" id="inputGroupSelect04" name="role_id">
                                                    <option>{{ $data->role }}</option>
                                                    <option value="9">Pendaftar Magang SMK</option>
                                                    <option value="15">Sertifikat SMK</option>
                                                    <option value="0">Magang Selesai</option>
                                                </select>
                                            @endforeach
                                            <div class="input-group-append">
                                                <button class="btn btn-danger" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
                                        <strong>Pilih Tindakan Final</strong> berungsi untuk meneruskan proses apakah
                                        pendaftar tersebut resmi diterima atau tidak
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="/proses-magang-aktmhs/{{ $userid->id }}">
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

                    <div class="col-sm-6">
                        <div class="card shadow mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">File Lainnya</h6>
                                </div>
                                <div class="card-body d-flex flex-wrap">
                                    @foreach ($fileFoto as $img)
                                        <div class="col-sm-3">
                                            <div class="card">
                                                <img src="{{ asset('/storage/public/fotosmk/' . $img->foto) }}"
                                                    alt="Foto" class="img-thumbnail" width="135">
                                                <a class="btn btn-danger p-0 mt-2 float-right"
                                                    href="{{ url('final-penerimaan-smk/' . $img->id, $img->foto) }}"><i
                                                        class="far fa-trash-alt p-1"></i></a>
                                            </div>
                                        </div>
                                    @endforeach
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
