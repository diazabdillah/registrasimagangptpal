@extends('layouts.webBack')

@section('kontenWebBack')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>
                <a class="btn btn-primary p-1" href="/rekap-absenpenelitian">Rekap
                    Absen Penelitian</a>

                <br>
                <br>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Form Absensi <span
                                            class="badge badge-danger ml-2 p-1">Penelitian</span></h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Action</th>
                                                </tr>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($penelitian as $absen)
                                                    @if ($absen->role_id != 1)
                                                        <tr>
                                                            <td>{{ $absen->nama }}</td>
                                                            <td>
                                                                <a class="btn btn-primary p-1"
                                                                    href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                                    role="button">Lihat Absen</a>

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
