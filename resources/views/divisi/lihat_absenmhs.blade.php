@extends('layouts.webBack')

@section('kontenWebBack')

<h1 class="h3 mb-2 text-gray-800 mb-3"><b>{{ $ti }}</b></h1> <br>
<div class="card shadow mb-3">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Rekap Absensi <span
                    class="badge badge-primary ml-2 p-1">Mahasiswa</span></h6>
                    <a class="btn btn-primary" href="/lihat-absenmhs/{{$user[0]->id_individu}}/cetak-absen-pdf/{{$user[0]->id}}" target="_blank">Cetak Rekap Absen
                        PDF</a>

        </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Waktu Absen</th>
                    <th>Jenis Absen</th>
                    <th>Keterangan</th>
                    <th>Bukti Absen</th>
                    <th>Lokasi</th>
                    <th>Action</th>
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
                    <td>
                        @if($rekapabsen->file_absen != null)
                        <img src="{{ asset('file/absen/'. $rekapabsen->file_absen) }}" alt="Foto" class="img-thumbnail"
                            width="135">
                            @endif
                        </td>
                        <td>
                            {{ $rekapabsen->latitude }},{{$rekapabsen->longitude}}
                        </td>
                    <td>
                        <a class="btn btn-danger"
                            href="/lihat-absenmhs/{{$rekapabsen->id_individu}}/delete-lihatabsen-mhs/{{$rekapabsen->id}}">Delete</a>
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
