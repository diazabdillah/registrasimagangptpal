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
                                @if ($users[0]->status_user == 'Mahasiswa')
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
                                        <li class="list-group-item"><i class="fas fa-fw fa-briefcase mr-3"></i>
                                            {{ $user->status_penerimaan }}
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
                                @else
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
                                    <li class="list-group-item"><i class="fas fa-fw fa-briefcase mr-3"></i>
                                        {{ $user->status_penerimaan }}
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
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Berkas Calon Magang</h6>
                                </div>
                                <ul class="list-group list-group-flush">

                                    @if ($users[0]->status_user == 'Mahasiswa')

                                        @foreach ($filepengajuan as $file)
                                            <li class="list-group-item"><i class="fas fa-fw fa-file-pdf mr-3"></i>
                                                {{ $file->path }}
                                                <a href="{{ url('pdf-mhs/' . $file->id) }}"
                                                    class="badge badge-success float-right p-2">Open <i
                                                        class="fas fa-eye ml-1"></i></a>
                                            </li>
                                        @endforeach

                                    @else

                                        @foreach ($filepengajuan as $file)
                                            <li class="list-group-item"><i class="fas fa-fw fa-file-pdf mr-3"></i>
                                                {{ $file->path }}
                                                <a href="{{ url('pdf-mhs-kel/' . $file->id) }}"
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
                                    <h6 class="m-0 font-weight-bold text-primary">File Tes Kepribadian Peserta Magang</h6>
                                </div>
                                <ul class="list-group list-group-flush">

                                    @if ($users[0]->status_user == 'Mahasiswa')

                                        @foreach ($users as $img)
                                            @if ($img->fileinterview != null)
                                                <li class="list-group-item"><i class="fas fa-fw fa-file-pdf mr-3"></i>
                                                    {{ $img->fileinterview }}
                                                    <a class="btn btn-danger p-1 float-right"
                                                        onclick="return confirm('yakin Hapus?');"
                                                        href="{{ url('hapus-interview-mhs/' . $img->id, $img->fileinterview) }}"><i
                                                            class="far fa-trash-alt p-1"></i></a>
                                                    <a class="btn btn-primary p-1 float-right" target="_blank"
                                                        href="{{ asset('file/interview-mhs/' . $img->id_individu . '/' . $img->fileinterview) }}"><i
                                                            class="fa fa-download p-1"></i></a>
                                                </li>
                                            @endif
                                        @endforeach

                                    @else

                                        @foreach ($users as $img)
                                            @if ($img->fileinterview != null)
                                                <li class="list-group-item"><i class="fas fa-fw fa-file-pdf mr-3"></i>
                                                    {{ $img->fileinterview }}
                                                    <a class="btn btn-danger p-1 float-right"
                                                        onclick="return confirm('yakin Hapus?');"
                                                        href="{{ url('hapus-interview-mhs-kel/' . $img->id, $img->fileinterview) }}"><i
                                                            class="far fa-trash-alt p-1"></i></a>
                                                    <a class="btn btn-primary p-1 float-right"
                                                        href="{{ asset('file/interview-mhs-kel/' . $img->id_individu . '/' . $img->fileinterview) }}"><i
                                                            class="fa fa-download p-1"></i></a>
                                                </li>
                                            @endif
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
                                    <h6 class="m-0 font-weight-bold text-primary">Proses Penerimaan</h6>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="/update-terima-interview/{{ $userid->id }}">
                                        @method('put')
                                        @csrf
                                        <label class="ml-2"><b>Pilih Tindakan Final</b></label>
                                        <div class="input-group">

                                            <select class="custom-select" id="inputGroupSelect04" name="role_id" required>
                                                <option value="11">Dokumen Magang Aktif</option>
                                                <option value="8">Pendaftar Magang Mahasiswa (Individu)</option>
                                                <option value="6">Pendaftar Magang Mahasiswa (Kelompok)</option>

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
