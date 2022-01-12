<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PT.PAL</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>

    <!-- Card Body -->
    <div class="card-body">

        <div style="margin-bottom:20px;margin-top:-20px;">
            <img class="ml-4" src="{{ public_path('img/bumn.png') }}" alt="image" style="width: 130px;">
            <img src="{{ public_path('img/logo_pal.png') }}" alt="Card image cap"
                style="width: 130px;margin-left:500px;">
        </div>

        <div>
            <h5 style="margin-bottom:30px;" class="text-center" style="font-family:Lucida Sans;">
                <b> <u> SURAT BALASAN
                    </u></b>
            </h5>

        </div>

        <div>
            <p style="font-size:18px;" class="ml-4"> <b> Nomor :</b>
                PKL/{{ $datas[0]->id }}/51200/{{ date('F', strtotime($datas[0]->selesai)) }}/{{ date('Y', strtotime($datas[0]->selesai)) }}
            </p>
            <p style="margin-top: -20px;font-size:18px;" class="ml-4"> <b> Perihal :</b>
                Praktek Kerja Lapangan </p>

            <p style="margin-bottom:50px;font-size:18px;" class="ml-4"><b>Kepada Yth: </b> <br>
                {{ $datas[0]->jabatan }} <br>
                {{ $datas[0]->asal_instansi }} <br>
                di Tempat
            </p>
        </div>

        <div style="font-size: 17px;" class="justify-content-center ml-4">
            <p>Dengan Hormat,</p>
            <p>1. Memperhatikan Surat Nomor
                {{ $datas[0]->nomorsurat }}
                Tanggal {{ date('d F Y', strtotime($datas[0]->mulai)) }}
                s.d {{ date('d F Y', strtotime($datas[0]->selesai)) }} pada dasarnya PT PAL
                Indonesia (Persero) dapat
                menerima
                Praktikan OJT/PKL dari {{ $datas[0]->asal_instansi }} untuk melaksanakan praktek kerja lapangan,
                berikut data
                Praktikan
                dibawah ini : </p>
            <table class="table">
                <thead>
                    <tr>

                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Jurusan</th>
                        <th>Unit Kerja</th>
                        <th>Departemen</th>
                        <th>Pelaksanaan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswas as $surat1)
                        <tr>


                            <td>{{ $surat1->nama }}</td>
                            <td>{{ $surat1->judul_penelitian }}</td>
                            <td>{{ $surat1->jurusan }}</td>
                            <td>{{ $surat1->divisi }}</td>
                            <td>{{ $surat1->departemen }}</td>
                            <td>{{ date('d F Y', strtotime($surat1->mulai)) }}
                                s.d <br> {{ date('d F Y', strtotime($surat1->selesai)) }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p style="font-size: 17px;">2. Surat balasan ini sebagai dasar bahwa para
                Praktikan
                telah resmi <b><u>Diterima</u></b> PKL/OJT di PT PAL Indonesia (Persero) dan surat ini mohon
                agar
                dibawa oleh para Praktikan OJT/PKL untuk ditandatangani.</p>
        </div>


        <div style="font-size: 17px;">
            <p style="margin-left:500px;">Surabaya,
                {{ date('d-F-Y', strtotime($datas[0]->selesai)) }} </p>
            <p style="margin-top: -20px;margin-left:500px;"> PT PAL Indonesia (Persero)</p>

            <img style="margin-left:500px;" src="{{ public_path('frontend/img/TTD-KADEP-HCD.png')}}">
                   
        </div>

    </div>


    {{-- <script>
            window.print();
        </script> --}}
</body>

</html>
