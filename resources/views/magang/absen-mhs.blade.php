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
                                    <th>Absen Masuk</th>
                                    <th>Absen Pulang</th>
                                    <th>Action</th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absenmhs as $am)
                                @if (now() <= $am->waktu_akhir)
                                    <tr>
                                        <td>{{ $am->nama }}
                                        <td>{{ date('D, d F Y H:i', strtotime($am->waktu_awal)) }}</td>
                                        <td>{{ date('D, d F Y H:i', strtotime($am->waktu_akhir)) }}</td>
                                        @if ($am->status_absen == 'Sudah Absen')
                                        <td>
                                            <input class="btn btn-secondary" type="button" value="presensi" disabled>
                                        </td>
                                        @elseif ($am->status_absen == "Belum Absen")
                                        <td>
                                            <a class="btn btn-primary p-1" href="/proses-absen-mhs/{{$am->id_absen}}/{{$am->id}}" role="button">Presensi</a>
                                        </td>
                                        @endif
                                    </tr>
                                    @else
                                    <tr>
                                        <td>{{ $am->nama }}
                                        <td>{{ date('D, d F Y H:i', strtotime($am->waktu_awal)) }}</td>
                                        <td>{{ date('D, d F Y H:i', strtotime($am->waktu_akhir)) }}</td>
                                        <td>
                                            <input class="btn btn-secondary" type="button" value="presensi" disabled>
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
        <!-- /.container-fluid -->
    </div>


</div>
<!-- End of Main Content -->
@endsection