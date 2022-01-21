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
                                        <div class="col-sm-3 mb-3">
                                            <img src="{{ asset('file/foto-smk/' . $user->foto_individu . '/' . $user->fotoID) }}"
                                                alt="Foto" class="img-thumbnail" width="135">
                                        </div>
                                        <div class="card-body">
                                            <h3 class="card-title"><b>Nama :</b> {{ $user->nama }}</h3>
                                            <h5 class="card-title"> {{ $user->nis }}</h5>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><i class="far fa-fw fa-building mr-3"></i>
                                                {{ $user->sekolah }}
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
                                        <div class="col-sm-3 mb-3">
                                            <img src="{{ asset('file/foto-smk-kel/' . $user->foto_individu . '/' . $user->fotoID) }}"
                                                alt="Foto" class="img-thumbnail" width="135">
                                        </div>
                                        <div class="card-body">
                                            <h3 class="card-title"><b>Nama :</b> {{ $user->nama }}</h3>
                                            <h5 class="card-title"> {{ $user->nis }}</h5>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><i class="far fa-fw fa-building mr-3"></i>
                                                {{ $user->sekolah }}
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
                                                <a href="{{ url('pdf-smk/' . $file->id) }}"
                                                    class="badge badge-success float-right p-2">Open <i
                                                        class="fas fa-eye ml-1"></i></a>
                                            </li>

                                        @else

                                            <li class="list-group-item"><i class="fas fa-fw fa-file-pdf mr-3"></i>
                                                {{ $file->path }}
                                                <a href="{{ url('pdf-smk-kel/' . $file->id) }}"
                                                    class="badge badge-success float-right p-2">Open <i
                                                        class="fas fa-eye ml-1"></i></a>
                                            </li>

                                        @endif

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

                                <ul class="list-group list-group-flush">

                                    @foreach ($users as $img)

                                        @if ($users[0]->status_user == 'SMK')
                                            @if ($img->fileinterview != null)
                                                <li class="list-group-item"><i class="fas fa-fw fa-file-pdf mr-3"></i>
                                                    {{ $img->fileinterview }}
                                                    <a target="_blank"
                                                        href="{{ asset('file/interview-smk/' . $img->interview_individu . '/' . $img->fileinterview) }}"
                                                        class="badge badge-primary float-right p-2">Download <i
                                                            class="fa fa-download ml-1"></i></a>
                                                </li>
                                            @endif
                                        @else
                                            @if ($img->fileinterview != null)
                                                <li class="list-group-item"><i class="fas fa-fw fa-file-pdf mr-3"></i>
                                                    {{ $img->fileinterview }}
                                                    <a target="_blank"
                                                        href="{{ asset('file/interview-smk-kel/' . $img->interview_individu . '/' . $img->fileinterview) }}"
                                                        class="badge badge-primary float-right p-2">Download <i
                                                            class="fa fa-download ml-1"></i></a>
                                                </li>
                                            @endif
                                        @endif

                                    @endforeach

                                </ul>
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

                                        @if ($users[0]->status_user == 'SMK')

                                            <div class="col-sm-3">
                                                <div class="card">
                                                    @if ($img->foto != null)

                                                        <img src="{{ asset('file/dokumen-smk/' . $img->id_individu . '/' . $img->foto) }}"
                                                            alt="Foto" class="img-thumbnail" width="135">
                                                        <a class="btn btn-primary" target="_blank"
                                                            href="{{ asset('file/dokumen-smk/' . $img->id_individu . '/' . $img->foto) }}">Download</a>
                                                        <a class="btn btn-danger p-0 mt-2 float-right"
                                                            onclick="return confirm('yakin Hapus?');"
                                                            href="/final-penerimaan-smk/{{ $img->id }}/{{ $img->foto }}"><i
                                                                class="far fa-trash-alt p-1"></i></a>

                                                    @endif
                                                </div>
                                            </div>

                                        @else

                                            <div class="col-sm-3">
                                                <div class="card">
                                                    @if ($img->foto != null)

                                                        <img src="{{ asset('file/dokumen-smk-kel/' . $img->id_individu . '/' . $img->foto) }}"
                                                            alt="Foto" class="img-thumbnail" width="135">
                                                        <a class="btn btn-primary"
                                                            href="{{ asset('file/dokumen-smk-kel/' . $img->id_individu . '/' . $img->foto) }}">Download</a>
                                                        <a class="btn btn-danger p-0 mt-2 float-right"
                                                            onclick="return confirm('yakin Hapus?');"
                                                            href="/final-penerimaan-smk-kel/{{ $img->id }}/{{ $img->foto }}"><i
                                                                class="far fa-trash-alt p-1"></i></a>

                                                    @endif
                                                </div>
                                            </div>

                                        @endif

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
                                    <form method="POST" action="/update-selesai-smk/{{ $userid->id }}">
                                        @method('put')
                                        @csrf
                                        <label class="ml-2"><b>Pilih Tindakan Final</b></label>
                                        <div class="input-group">

                                            <select class="custom-select" id="inputGroupSelect04" name="role_id" required>
                                                <option value="20">Magang Selesai</option>
                                                <option value="4">Magang Aktif</option>

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
