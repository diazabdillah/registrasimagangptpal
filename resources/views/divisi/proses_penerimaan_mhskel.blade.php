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
                            <div class="card-body">
                                @foreach ($users as $user)
                                <h5 class="card-title"><b>Nama :</b> {{ $user->nama }}
                                </h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="far fa-fw fa-envelope mr-3"></i>
                                    {{ $user->email }}
                                </li>
                                <li class="list-group-item"><i class="fas fa-fw fa-phone-alt mr-3"></i>
                                    {{ $user->no_hp }}
                                </li>
                                <li class="list-group-item"><i class="far fa-fw fa-building mr-3"></i>
                                    {{ $user->univ }}
                                </li>
                                <li class="list-group-item"><i class="fas fa-fw fa-graduation-cap mr-3"></i>
                                    {{ $user->strata }}
                                </li>
                                <li class="list-group-item"><i class="fas fa-fw fa-briefcase mr-3"></i>
                                    {{ $user->divisi }}
                                </li>

                                @endforeach

                                @foreach ($filepdf as $file)
                                <li class="list-group-item"><i class="fas fa-fw fa-file-pdf mr-3"></i>
                                    {{ $file->path }}
                                    <a href="{{ url('pdf-mhs/' . $file->user_id) }}" class="badge badge-success float-right p-2">Open <i class="fas fa-eye ml-1"></i></a>
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
                                <form method="POST" action="/proses_penerimaan_mhskel/{{ $userid->id }}">
                                    @method('put')
                                    @csrf
                                    <label class="ml-2"><b>Pilih Tindakan Penerimaan</b></label>
                                    <div class="input-group">
                                        @foreach ($users as $data)
                                        <select class="custom-select" id="inputGroupSelect04" name="role_id">
                                            <option value="6">{{ $data->role }}</option>
                                            <option value="11">Menu Dokumen MHS (Diterima)</option>
                                            <option value="3">Magang Aktif (Resmi Diterima)</option>
                                            <option value="0">Kuota Penuh</option>
                                        </select>
                                        @endforeach
                                        <div class="input-group-append">
                                            <button class="btn btn-danger" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
                                    <strong>Pilih Tindakan Penerimaan</strong> berungsi untuk meneruskan proses apakah
                                    pendaftar tersebut diterima atau tidak
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