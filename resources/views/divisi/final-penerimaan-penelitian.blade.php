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
                                    <h6 class="m-0 font-weight-bold text-primary">Detail Calon Penelitian</h6>
                                </div>

                                @foreach ($users as $user)
                                    <div class="col-sm-3 mb-3">
                                        <img src="{{ asset('file/foto-penelitian/' . $user->user_id . '/' . $user->fotoID) }}"
                                            alt="Foto" class="img-thumbnail" width="135">

                                    </div>
                                    <div class="card-body">
                                        <h3 class="card-title"><b>Nama :</b> {{ $user->nama }}</h3>
                                        <h5 class="card-title"> {{ $user->asal_instansi }}</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><i class="fas fa-fw fa-graduation-cap mr-3"></i>
                                            {{ $user->strata }} {{ $user->jurusan }}
                                        </li>
                                        <li class="list-group-item"><i class="fas fa-fw fa-graduation-cap mr-3"></i>
                                            {{ $user->strata }} {{ $user->judul_penelitian }}
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
                                        @foreach ($tgl as $data)

                                        <li class="list-group-item"><i class="fas fa-fw fa-calendar-alt mr-3"></i></i>
                                            Tgl Mulai <span class="badge badge-success p-2">
                                                {{ date('d-F-Y', strtotime($data->mulai)) }}</span>
                                            Tgl Selesai <span class="badge badge-danger p-2">
                                                {{ date('d-F-Y', strtotime($data->selesai)) }}</span>
                                        </li>
                                    @endforeach
                                    </ul>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">

                        <div class="card shadow mb-4">

                            <div class="card">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">File Calon Penelitian</h6>
                                </div>

                                <ul class="list-group list-group-flush">

                                    @foreach ($filepdf as $file)

                                        <li class="list-group-item"><i class="fas fa-fw fa-file-pdf mr-3"></i>
                                            {{ $file->path }}
                                            <a href="{{ url('pdf-penelitian/' . $file->id) }}"
                                                class="badge badge-success float-right p-2">Open <i
                                                    class="fas fa-eye ml-1"></i></a>
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
                                    <h6 class="m-0 font-weight-bold text-primary">File KTP, KTM dan BPJS Peserta Penelitian
                                    </h6>
                                </div>
                                <div class="card-body d-flex flex-wrap">
                                    @foreach ($fileFoto as $img)
                                        <div class="col-sm-3">
                                            <div class="card">
                                                @if ($img->foto != null)

                                                    <img src="{{ asset('file/dokumen-penelitian/' . $img->user_id . '/' . $img->foto) }}"
                                                        alt="Foto" class="img-thumbnail" width="135">
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/dokumen-penelitian/' . $img->user_id . '/' . $img->foto) }}">Download</a>
                                                    <a class="btn btn-danger p-0 mt-2 float-right"
                                                        onclick="return confirm('yakin Hapus?');"
                                                        href="/hapus-final-penerimaan-penelitian/{{ $img->id }}/{{ $img->foto }}"><i
                                                            class="far fa-trash-alt p-1"></i></a>

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
                                    <h6 class="m-0 font-weight-bold text-primary">Proses Penerimaan</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="/update-final-penerimaan-penelitian/{{ $userid->id }}">
                                        @method('put')
                                        @csrf
                                        <label class="ml-2"><b>Pilih Tindakan Final</b></label>
                                        <div class="input-group">

                                            <select class="custom-select" id="inputGroupSelect04" name="role_id" required>
                                                <option value="23">Penelitian Aktif</option>
                                                <option value="21">Pendaftar Penelitian</option>
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
