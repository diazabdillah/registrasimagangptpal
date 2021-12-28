{{-- Mengambil layout dari webBack.blade.php --}}
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
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Magang <span
                                            class="badge badge-primary ml-2 p-1">Mahasiswa</span></h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Judul</th>
                                                    <th>File</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 0; @endphp
                                                @foreach ($user as $u)
                                                    @if ($u->revisi == null)
                                                        <tr>
                                                            <td class="text-center">{{ ++$i }}.</td>
                                                            <td class="text-center">{{ $u->nama }}</td>
                                                            <td class="text-center">{{ $u->judul }}</td>
                                                            <td class="text-center">{{ $u->path }}</td>
                                                            <td>
                                                                @if ($u->path != null)
                                                                    <a class="btn btn-primary"
                                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                                    <a class="btn btn-warning"
                                                                        href="{{ asset('editlaporan/' . $u->id) }}">Edit</a>
                                                                    <a class="btn btn-danger"
                                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif
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
                                    <h6 class="m-0 font-weight-bold text-primary">Magang <span
                                            class="badge badge-warning ml-2 p-1">SMK</span></h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>Judul</th>
                                                    <th>File</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 0; @endphp

                                                @foreach ($userSmk as $us)
                                                    @if ($us->revisi == null)
                                                        <tr>

                                                            <td class="text-center">{{ ++$no }}.</td>
                                                            <td class="text-center">{{ $us->nama }}</td>
                                                            <td class="text-center">{{ $us->judul }}</td>
                                                            <td class="text-center">{{ $us->path }}</td>
                                                            <td>
                                                                @if ($us->path != null)
                                                                    <a class="btn btn-primary"
                                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                                    <a class="btn btn-warning"
                                                                        href="{{ asset('file/laporan-smk/' . $us->id) }}">Edit</a>
                                                                    <a class="btn btn-danger"
                                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif
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
