@extends('layouts.webBack')

@section('kontenWebBack')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>
            <div class="alert alert-info" role="alert">
                <p class="card-text">
                    <b>Peraturan Absensi:</b><br>
                    - Absen Datang dibuka pukul 06.00 - 08.00<br>
                    - Absen Pulang dibuka pukul 16:30 - 19.00
                </p>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Absen Pemagang</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered mt-4" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Absen</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absenpenelitian as $ap)
                                <tr>
                                    <th>{{ $ap->nama }}</th>
                                    <th>Datang</th>
                                    @if (date('H:i', strtotime(now())) >= '06:00' && date('H:i', strtotime(now())) <= '08:00' ) <th>
                                        <a class="btn btn-primary p-1" href="/proses-absen-masuk-penelitian/{{ $ap->id }}" role="button">Presensi</a>
                                        </th>
                                        @else
                                        <th>
                                            <button class="btn btn-secondary" disabled>Presensi</button>
                                        </th>
                                        @endif
                                </tr>
                                <tr>
                                    <th>{{ $ap->nama }}</th>
                                    <th>Pulang</th>
                                    @if (date('H:i', strtotime(now())) >= '16:30' && date('H:i', strtotime(now())) <= '19:00' ) <th>
                                        <a class="btn btn-primary p-1" href="/proses-absen-pulang-penelitian/{{ $ap->id }}" role="button">Presensi</a>
                                        </th>
                                        @else
                                        <th>
                                            <button class="btn btn-secondary" disabled>Presensi</button>
                                        </th>
                                        @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Rekap Absen</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered mt-4" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Waktu Absen</th>
                                    <th>Absen</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absenpenelitians as $aps)
                                <tr>
                                    <th> {{ $aps->nama }} </th>
                                    <th>{{ date('H:i, d F Y', strtotime($aps->waktu_absen)) }}</th>
                                    <th>{{ $aps->jenis_absen }}</th>
                                    <th>{{ $aps->keterangan }}</th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $absenpenelitians->links() }}

                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>


</div>
<!-- End of Main Content -->
@endsection