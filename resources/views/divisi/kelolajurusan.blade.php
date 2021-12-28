{{-- Mengambil layout dari webBack.blade.php --}}
@extends('layouts.webBack')

@section('kontenWebBack')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

                @if (session()->has('succes'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('succes') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card shadow mb-4">
                            <div class="card">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Pendaftar Praktikan <span
                                            class="badge badge-primary ml-2 p-1">Mahasiswa</span></h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $u)
                                                    <tr>
                                                        <td>{{ ++$i }}.</td>
                                                        <td>{{ $u->name }}</td>
                                                        <td class="text-center"><span
                                                                class="badge badge-primary p-2">{{ $u->status_user }}</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <a class="badge badge-success p-2"
                                                                href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                                <i class="fas fa-info-circle ml-1"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="card shadow mb-4">
                            <div class="card">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Pendaftar Praktikan <span
                                            class="badge badge-warning ml-2 p-1">SMK</span></h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($usersSmk as $dsmk)
                                                    <tr>
                                                        <td>{{ ++$i }}.</td>
                                                        <td>{{ $dsmk->name }}</td>
                                                        <td class="text-center"><span
                                                                class="badge badge-warning p-2">{{ $dsmk->status_user }}</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <a class="badge badge-success p-2"
                                                                href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                                <i class="fas fa-info-circle ml-1"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="card shadow mb-4">
                            <div class="card">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Pendaftar Praktikan<span
                                            class="badge badge-danger ml-2 p-1">Penelitian</span></h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($userspenelitian as $dpenelitian)
                                                    <tr>
                                                        <td>{{ ++$i }}.</td>
                                                        <td>{{ $dpenelitian->name }}</td>
                                                        <td class="text-center"><span
                                                                class="badge badge-danger p-2">{{ $dpenelitian->status_user }}</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <a class="badge badge-success p-2"
                                                                href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                                <i class="fas fa-info-circle ml-1"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->
        </div>



    </div>
    <!-- End of Main Content -->

@endsection
