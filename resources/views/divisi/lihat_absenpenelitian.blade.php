@extends('layouts.webBack')

@section('kontenWebBack')

    <h1 class="h3 mb-2 text-gray-800 mb-3"><b>{{ $ti }}</b></h1> <br>
    <div class="card shadow mb-3">
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Rekap Absensi <span
                        class="badge badge-danger ml-2 p-1">Penelitian</span></h6>
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
