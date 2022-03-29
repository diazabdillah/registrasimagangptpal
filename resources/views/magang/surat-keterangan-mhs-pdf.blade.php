<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PT.PAL</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>

    @foreach ($datas as $sertif)
    <div class="row">
        <div class="card-body">
            <div style="margin-bottom:20px;margin-top:-20px;">
                <img class="ml-4" src="{{ public_path('img/bumn.png') }}" alt="image" style="width: 130px;">
                <img src="{{ public_path('img/logo_pal.png') }}" alt="Card image cap" style="width: 160px;margin-left:500px;">

                <hr style="width:750px;weight:200px;margin-top: 40px;border:1px solid;">
            </div>

            <div class="text-center">
                <h5 style="font-family:Lucida Sans;">SURAT KETERANGAN </h5>

                <hr style="width:240px;weight:200px;margin-top: 5px;margin-bottom: 5px;border:1px solid;">
                <p>Nomor :
                    PKL/{{$sertif->id}}/44200/{{ date('F', strtotime($sertif->selesai)) }}/{{ date('Y', strtotime($sertif->selesai)) }}
                </p>

            </div>
            <div class="justify-content-center" style="margin-left:130px;margin-top:20px;">
                <span>Surat keterangan ini diberikan kepada para praktikan yang telah
                    menyelesaikan
                    Magang, berikut data Praktikan Magang:</span>
            </div>
            <div style="margin-left:300px;margin-top:20px">

                <h6>Nama: <b>{{ $sertif->nama }}</b></h6>
                <h6>Sekolah: {{ $sertif->sekolah }}</h6>
                <h6>Jurusan: {{ $sertif->jurusan }}</h6>
                <h6>Nilai: {{ $sertif->nilai_huruf }} ({{$sertif->keterangan}})</h6>
            </div>

            <div class="justify-content-center" style="margin-left:130px;margin-top: 20px">
                <p>Yang bersangkutan ini telah melaksanakan Magang di <b>PT PAL INDONESIA
                        (PERSERO)</b>. Pada Tanggal
                    <b>{{ date('d-m-Y', strtotime($sertif->mulai)) }}</b> s/d
                    <b>{{ date('d-m-Y', strtotime($sertif->selesai)) }}</b>
                </p>
                <p>Surat Keterangan ini diberikan agar dapat dipergunakan semestinya.</p>
            </div>
            <div style="font-size: 20px;">
                <p style="margin-left:500px;">Surabaya,
                    {{ date('d-F-Y', strtotime($datas[0]->selesai)) }}
                </p>
                <p style="margin-top: -20px;margin-left:500px;"> PT PAL Indonesia (Persero)</p>

                <img  src="{{public_path('frontend/img/TTD-KADEP-HCD.png')}}" style="margin-left:490px;width:280px;margin-top:15px;">

            </div>

        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    @endforeach
</body>