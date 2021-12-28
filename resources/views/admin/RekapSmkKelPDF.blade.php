<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<html>

<body>
    <!-- Begin Page Content -->


    <div class="row">

        <table class="table table-bordered table-striped responsive"
            style="table-layout: fixed;width:100%;font-size:16px;">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Nis</th>
                    <th>Sekolah</th>
                    <th>No Hp</th>
                    <th>Divisi</th>
                    <th>Departemen</th>
                    <th>Tanggal Daftar</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Selesai</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                ?>

                @foreach ($users as $rekap)
                    @if ($rekap->status_user == 'SMK Kelompok')
                        <tr class="text-center">
                            <td>{{ ++$i }}</td>
                            <td>{{ $rekap->nama }}</td>
                            <td>{{ $rekap->nis }}</td>
                            <td>{{ $rekap->sekolah }}</td>
                            <td>{{ $rekap->no_hp }}</td>
                            <td>{{ $rekap->divisi }}</td>
                            <td>{{ $rekap->departemen }}</td>
                            <td>{{ $rekap->created_at }}</td>
                            <td>{{ $rekap->mulai }}</td>
                            <td>{{ $rekap->selesai }}</td>

                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>


    </div>

</body>

</html>
