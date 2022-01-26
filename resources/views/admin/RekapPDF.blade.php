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

    <h5 class="text-center h5 mb-2 text-gray-800"><b>Rekap Data Mahasiswa PT PAL</b></h5>
   
    <div class="row">
        <table class="table table-bordered table-striped responsive" style="table-layout: fixed;width:100%;">
            <thead class="text-center">
                <tr>
                    <th style="font-size: 14px">Nama</th>
                    <th style="font-size: 14px">Nim</th>
                    <th style="font-size: 14px">Universitas</th>
                    <th style="font-size: 14px">Strata</th>
                    <th style="font-size: 14px">Jurusan</th>
                    <th style="font-size: 14px">No_Hp</th>
                    <th style="font-size: 14px">Divisi</th>
                    <th style="font-size: 14px">Departemen</th>
                    <th style="font-size: 14px">Tanggal Daftar</th>
                    <th style="font-size: 14px">Tanggal Masuk</th>
                    <th style="font-size: 14px">Tanggal Selesai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $rekap)
                    @if ($rekap->status_user == 'Mahasiswa')
                        <tr class="text-center">

                            <td style="font-size: 14px">{{ $rekap->nama }}</td>
                            <td style="font-size: 14px">{{ $rekap->nim }}</td>
                            <td style="font-size: 14px">{{ $rekap->univ }}</td>
                            <td style="font-size: 14px">{{ $rekap->strata }}</td>
                            <td style="font-size: 14px">{{ $rekap->jurusan }}</td>
                            <td style="font-size: 14px">{{ $rekap->no_hp }}</td>
                            <td style="font-size: 14px">{{ $rekap->divisi }}</td>
                            <td style="font-size: 14px">{{ $rekap->departemen }}</td>
                            <td style="font-size: 14px">{{ $rekap->created_at }}</td>
                            <td style="font-size: 14px">{{ $rekap->mulai }}</td>
                            <td style="font-size: 14px">{{ $rekap->selesai }}</td>

                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
