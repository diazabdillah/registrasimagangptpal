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

    <h5 class="text-center h5 mb-2 text-gray-800"><b>{{ $ti }}</b></h5>
    <div class="row">
        <table class="table table-bordered table-striped responsive" style="table-layout: fixed;width:100%;">
            <thead class="text-center">
                <tr>
                    <th style="font-size: 14px">No</th>
                    <th style="font-size: 14px">Nama</th>
                    <th style="font-size: 14px">Waktu Absen</th>
                    <th style="font-size: 14px">Jenis Absen</th>
                    <th style="font-size: 14px">Keterangan</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($users as $rekap)

                    <tr class="text-center">
                        <td style="font-size: 14px">{{ $i++ }}</td>
                        <td style="font-size: 14px">{{ $rekap->nama }}</td>
                        <td style="font-size: 14px">{{ date('H:i, d F Y', strtotime($rekap->waktu_absen)) }}</td>
                        <td style="font-size: 14px">{{ $rekap->jenis_absen }}</td>
                        <td style="font-size: 14px">{{ $rekap->keterangan }}</td>


                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
