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
                <b> <u> MEMORANDUM
                    </u></b>
            </h5>

        </div>

        <div>
            <p style="font-size:14px;" class="ml-4"> <b> Nomor :</b>
                PKL/{{ $datas[0]->id }}/44200/{{ date('F', strtotime($datas[0]->selesai)) }}/{{ date('Y',
                strtotime($datas[0]->selesai)) }}
            </p>
            <p style="margin-top: -20px;font-size:14px;" class="ml-4"> <b> Perihal :</b>
                Permohonan Praktek Kerja Lapangan </p>

            <p style="font-size:14px;" class="ml-4"><b>Kepada Yth: </b>
                Kadep. {{$datas[0]->departemen}}
            </p>
            <p style="margin-top:-20px;font-size:14px;" class="ml-4"><b>Dari: </b>
                Kadep. HC. Development
            </p>
        </div>
        <div style="font-size: 14px;" class="justify-content-center ml-4">
            <p>Dengan Hormat,</p>
            <p style="text-align:justify;">1. Sesuai koordinasi dengan Divisi di PT. PAL Indonesia (Persero) tentang kesediaan menerima Praktik Kerja Lapangan, bersama ini disampaikan data mahasiswa/mahasiswi dari {{ $datas[0]->sekolah }} Jurusan {{ $datas[0]->jurusan }} yang akan melaksanakan On the Job Training.
                Berikut ini data dari Mahasiswa/mahasiswi yang akan melakukan On the Job Training&nbsp; :</p>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Unit Kerja</th>
                        <th>Departemen</th>
                        <th>Pelaksanaan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswas as $surat1)
                    <tr>
                        <td>{{ $surat1->nama }}</td>
                        <td>{{ $surat1->nis }}</td>
                        <td>{{ $surat1->divisi }}</td>
                        <td>{{ $surat1->departemen }}</td>
                        <td>{{ date('d F Y', strtotime($surat1->mulai)) }}
                            s.d <br> {{ date('d F Y', strtotime($surat1->selesai)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p style="font-size: 14px;">2.Demikian disampaikan, mohon para mahasiswa/mahasiswi tersebut diberikan arahan dan bimbingan selama melaksanakan proses On the Job Training, atas bantuan dan kerja samanya diucapkan terima kasih.</p>
        </div>


        <div style="font-size: 14px;">
            <p style="margin-left:500px;">Surabaya,
                {{ date('d-F-Y', strtotime(now())) }} </p>
            <p style="margin-top: -20px;margin-left:500px;"> PT PAL Indonesia (Persero)</p>

            <img style="margin-left:500px; width:20%;"  src="{{ public_path('frontend/img/TTD-KADEP-HCD.png')}}">
                                        
        </div>

    </div>

    
</body>

</html>
