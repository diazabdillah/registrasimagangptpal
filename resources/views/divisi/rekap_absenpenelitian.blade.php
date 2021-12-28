@extends('layouts.webBack')

@section('kontenWebBack')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg">
                <!-- Page Heading -->

                <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif


                <div class="card shadow mb-3">
                    <div class="card">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Rekap Absensi <span
                                    class="badge badge-warning ml-2 p-1">Penelitian</span></h6>
                            <div class="dropdown no-arrow">

                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="/cetak-absen-penelitian-pdf" target="_blank">Cetak Rekap
                                        Absen
                                        PDF</a>

                                </div>
                            </div>
                        </div>



                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Waktu Absen</th>
                                    <th>Jenis Absen</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($user as $rekapabsen)



                                    <tr>
                                        <td>{{ $rekapabsen->nama }}</td>
                                        <td>
                                            {{ date('H:i, d F Y', strtotime($rekapabsen->waktu_absen)) }}
                                        </td>
                                        <td>
                                            {{ $rekapabsen->jenis_absen }}
                                        </td>
                                        <td>
                                            {{ $rekapabsen->keterangan }}
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




@endsection
