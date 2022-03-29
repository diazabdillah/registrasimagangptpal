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
    <h6 class="text-center h6 mb-2 text-gray-800">MAHASISWA PRAKTEK KERJA LAPANGAN / OJT</h6><br>

    <div>
        <h6>Nama : {{ Auth::user()->name }}</h6>
    </div>
    <div>
        <h6>Jurusan : {{ $mahasiswarekap[0]->jurusan }}</h6>
    </div>
    <div>
        <h6>Universitas : {{ $mahasiswarekap[0]->univ }}</h6>
    </div>
    <div>
        <h6>Waktu Pelaksanaan :{{ date('d-m-Y', strtotime($mahasiswarekap[0]->mulai)) }} s/d
            {{ date('d-m-Y', strtotime($mahasiswarekap[0]->selesai)) }}</h6>
    </div>
    <div>
        <h6>Unit Kerja : {{ $mahasiswarekap[0]->divisi }}</h6>
    </div>

    <div class="row">
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered mt-4" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Pelakasanaan</th>
                            <th>Tanggal Pelakasanaan</th>
                            <th>Judul Kegiatan</th>
                            <th>Deskripsi kegiatan</th>
                            <th>Dokumentasi Kegiatan</th>
                     
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa as $ams)
                            <tr>
                                <th> {{ $ams->nama_anggota }} </th>

                                <th>{{ date('H:i, d F Y', strtotime($ams->tanggal_kumpul)) }}</th>
                                <th>{{ $ams->nama_kegiatan }}</th>
                                <th>{{ $ams->deskripsi_kegiatan }}</th>
                                <th>
                                    @if($ams->foto_kegiatan != null)
                                    <img width="100px" src="{{ public_path('file/foto-kegiatan-mhs/' . $ams->foto_kegiatan) }}">
                                    @endif
                                </th>
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>



            </div>
            <br>

        </div>
    </div>
    <div style="font-size: 17px;">
        <p style="margin-left:580px;">Surabaya,
            {{ date('d-F-Y', strtotime($mahasiswarekap[0]->selesai)) }} </p>
        <p class="text-center" style="margin-top: -20px;margin-left:580px;"> PEMBIMBING <br> PRAKTEK KERJA LAPANGAN /
            OJT </p>

        <hr style="margin-left:580px;width:260px;weight:200px;margin-top: 150px;border:1px solid;">

    </div>
    </div>
   
</body>

</html>
