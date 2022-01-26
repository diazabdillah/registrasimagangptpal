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
                                @foreach ($users as $user)
                                    <div class="card-body">

                                        <div class="col-sm-3 mb-3">

                                            @if ($users[0]->status_user == 'SMK')

                                                <img src="{{ asset('file/foto-smk/' . $user->id_individu . '/' . $user->fotoID) }}"
                                                    alt="Foto" class="img-thumbnail" width="135">

                                            @else

                                                <img src="{{ asset('file/foto-smk-kel/' . $user->id_individu . '/' . $user->fotoID) }}"
                                                    alt="Foto" class="img-thumbnail" width="135">

                                            @endif
                                        </div>

                                    </div>
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
                                @foreach ($tgl as $data)
                                    <li class="list-group-item"><i class="fas fa-fw fa-calendar-alt mr-3"></i></i>
                                        Tgl Mulai <span class="badge badge-success p-2">
                                            {{ date('d-m-Y', strtotime($data->mulai)) }}</span>
                                        Tgl Selesai <span class="badge badge-danger p-2">
                                            {{ date('d-m-Y', strtotime($data->selesai)) }}</span>
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
                                    @if (Auth::user()->status_user == 'Admin Pusat')
                                    <form method="POST" action="/final-penerimaan-smk/{{ $userid->id }}">
                                        @method('put')
                                        @csrf
                                        <label class="ml-2"><b>Pilih Tindakan Final</b></label>
                                        <div class="input-group">

                                            <select class="custom-select" id="inputGroupSelect04" name="role_id">
                                                <option value="15">Sertifikat SMK</option>
                                                <option value="12">Dokumen Magang Aktif</option>

                                            </select>

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
                                    @else
                                    <form method="POST" action="/final-penerimaan-smk-divisi/{{ $userid->id }}">
                                        @method('put')
                                        @csrf
                                        <label class="ml-2"><b>Pilih Tindakan Final</b></label>
                                        <div class="input-group">

                                            <select class="custom-select" id="inputGroupSelect04" name="role_id">
                                                <option value="15">Sertifikat SMK</option>
                                               
                                            </select>

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

                                    @endif

                                    <form method="POST" action="/proses-magang-aktsmk/{{ $userid->id }}">
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
                                    <h6 class="m-0 font-weight-bold text-primary">Dokumen Calon Magang</h6>
                                </div>
                                <div class="card-body d-flex flex-wrap">
                                    @foreach ($fileFoto as $img)

                                        @if ($users[0]->status_user == 'SMK')

                                            <div class="col-sm-3">
                                                <div class="card">
                                                    <img src="{{ asset('file/dokumen-smk/' . $img->id_individu . '/' . $img->foto) }}"
                                                        alt="Foto" class="img-thumbnail" width="135">

                                                </div>
                                            </div>

                                        @else

                                            <div class="col-sm-3">
                                                <div class="card">
                                                    <img src="{{ asset('file/dokumen-smk-kel/' . $img->id_individu . '/' . $img->foto) }}"
                                                        alt="Foto" class="img-thumbnail" width="135">

                                                </div>
                                            </div>

                                        @endif

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
