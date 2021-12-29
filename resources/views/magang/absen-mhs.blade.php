@extends('layouts.webBack')

@section('kontenWebBack')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

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
                                @foreach($absenmhs as $am)
                                <tr>
                                    <th>{{ $am->nama }}</th>
                                    <th>Datang</th>
                                    @if (date('H:i', strtotime(now())) >= '06:00' && date('H:i', strtotime(now())) <= '08:00')
                                        <th>
                                            <a class="btn btn-primary p-1" href="/proses-absen-masuk-mhs/{{ $am->id }}" role="button">Presensi</a>
                                        </th>
                                    @else
                                        <th>
                                            <button class="btn btn-secondary" disabled>Presensi</button>
                                        </th>
                                    @endif
                                </tr>
                                <tr>
                                    <th>{{ $am->nama }}</th>
                                    <th>Pulang</th>
                                    @if (date('H:i', strtotime(now())) >= '16:30' && date('H:i', strtotime(now())) <= '19:00')
                                        <th>
                                            <a class="btn btn-primary p-1" href="/proses-absen-pulang-mhs/{{ $am->id }}" role="button">Presensi</a>
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
                                @foreach($absenmhss as $ams)
                                <tr>
                                    <th> {{ $ams->nama }} </th>
                                    <th>{{ date('H:i, d F Y', strtotime($ams->waktu_absen)) }}</th>
                                    <th>{{ $ams->jenis_absen }}</th>
                                    <th>{{ $ams->keterangan }}</th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        {{$absenmhss->links()}}

                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>


</div>
<!-- End of Main Content -->
@endsection