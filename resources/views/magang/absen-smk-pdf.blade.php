<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>PT.PAL | {{ $ti }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>


    <img src="{{ public_path('img/bumn.png') }}" alt="image" style="width: 130px;">

    <img src="{{ public_path('img/logo_pal.png') }}" alt="Card image cap" style="width: 130px;margin-left:600px">


    <h6 class="text-center h6 mb-2 text-gray-800"><b>{{ $ti }}</b></h6>
    <h6 class="text-center h6 mb-2 text-gray-800">SMK PRAKTEK KERJA LAPANGAN / OJT</h6><br>


    <div>
        <h6>Jurusan : {{ $absensmk[0]->jurusan }}</h6>
    </div>
    <div>
        <h6>Sekolah : {{ $absensmk[0]->sekolah }}</h6>
    </div>
    <div>
        <h6>Waktu Pelaksanaan :{{ date('d-m-Y', strtotime($absensmk[0]->mulai)) }} s/d
            {{ date('d-m-Y', strtotime($absensmk[0]->selesai)) }}</h6>
    </div>
    <div>
        <h6>Unit Kerja : {{ $absensmk[0]->divisi }}</h6>
    </div>

    <div class="row">

        <table class="table table-bordered table-striped responsive" style="table-layout: fixed;width:100%;">
            <thead class="text-center">
                <tr>
                    <th style="font-size: 14px">No</th>
                    <th style="font-size: 14px">Nama</th>
                    <th style="font-size: 14px">Nis</th>
                    <th style="font-size: 14px">Waktu Absen</th>
                    <th style="font-size: 14px">Jenis Absen</th>
                    <th style="font-size: 14px">Keterangan</th>
                    <th style="font-size: 14px">Bukti Izin</th>
                    <th style="font-size: 14px">Lokasi Anda</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absensmk as $rekap)

                <tr class="text-center">
                    <td style="font-size: 14px">{{ $i++ }}</td>
                    <td style="font-size: 14px">{{ $rekap->nama }}</td>
                    <td style="font-size: 14px">{{ $rekap->nis }}</td>
                    <td style="font-size: 14px">{{ date('H:i, d F Y', strtotime($rekap->waktu_absen)) }}</td>
                    <td style="font-size: 14px">{{ $rekap->jenis_absen }}</td>
                    <td style="font-size: 14px">{{ $rekap->keterangan }}</td>
                    <td> 
                        @if($rekap->file_absen != null)
                        <img src="{{ public_path("file/absen/". $rekap->file_absen) }}" alt="image" style="width: 100px;">
                         @endif
                    </td>
                    <td style="font-size: 10px">{{$rekap->latitude}},{{$rekap->longitude}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    <div style="font-size: 17px;">
        <p style="margin-left:580px;">Surabaya,
            {{ date('d-F-Y', strtotime($absensmk[0]->selesai)) }} </p>
        <p class="text-center" style="margin-top: -20px;margin-left:580px;"> PEMBIMBING <br> PRAKTEK KERJA LAPANGAN /
            OJT </p>

        <hr style="margin-left:580px;width:260px;weight:200px;margin-top: 150px;border:1px solid;">

    </div>
</body>

</html>
