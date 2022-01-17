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

    <div>
        @foreach ($datas as $data)

            <div style="width: 19rem;border:1px solid; border-radius:10px;">

                <div>

                    <img src="{{ public_path('file/foto-penelitian/' . $data->id . '/' . $data->fotoID) }}" alt="image"
                        style="width: 150px; height:180px;border:1px solid; border-radius: 5px;margin-top:30px;margin-left:105px;margin-bottom:20px; border: 1px black solid;">



                </div>

                <div>
                    <img src="{{ public_path('img/logo_pal.png') }}" alt="image"
                        style="width: 80px;margin-left:30px;">

                    <img src="{{ public_path('img/ojt.png') }}" alt="Card image cap"
                        style="width: 55px;margin-left:150px;">
                </div>

                <div class="card-body">

                    <h5 style="font-size:20px;"><b>{{ $data->nama }}</b></h5>

                    <table>
                        <tr>
                            <td><b>
                                    <h6 style="font-size:15px;"> ID</h6>
                                </b></td>
                            <td class="pl-4" style="font-size:15px;">: <span>
                                    {{ $data->id }}</span>
                            </td>
                        </tr>


                        <tr>
                            <td><b>
                                    <h6 style="font-size:15px;">Universitas</h6>
                                </b></td>
                            <td class="pl-4" style="font-size:15px;">:
                                <span>{{ $data->asal_instansi }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td><b>
                                    <h6 style="font-size:15px;">Divisi</h6>
                                </b></td>
                            <td class="pl-4" style="font-size:15px;">: {{ $data->divisi }}</td>
                        </tr>
                        <tr>
                            <td><b>
                                    <h6 style="font-size:15px;">Departemen</h6>
                                </b></td>
                            <td class="pl-4" style="font-size:15px;">: {{ $data->departemen }}</td>
                        </tr>

                    </table>


                    @foreach ($dates as $date)
                        <h6 class="text-center" style="font-size: 15px;">
                            <b> {{ date('d-m-Y', strtotime($date->mulai)) }}</b> &nbsp;&nbsp;
                            <b style="color: red"> {{ date('d-m-Y', strtotime($date->selesai)) }}</b>
                        </h6>
                    @endforeach
                </div>
                <div class="footerIdCard bg-gradient-primary d-flex justify-content-center">
                    <small class="text-white"><b>PT.PAL INDONESIA</b></small>
                </div>
            </div>

            <div style="width: 19rem;border:1px solid;border-radius:10px;">
                <div class="mt-4">
                    <div>
                        <img src="{{ public_path('img/bumn.png') }}" alt="image"
                            style="width: 80px;margin-left:30px;">
                        <img src="{{ public_path('img/logo_pal.png') }}" alt="Card image cap"
                            style="width: 80px;margin-left:150px;">
                    </div>
                </div>
                <div class="card-body">

                    <p style="font-size: 10px">1.Kartu ini adalah milik PT.PAL INDONESIA dan berfungsi
                        untuk
                        sebagai IDCard pemegangnya</p>
                    <p style="font-size: 10px">2.Pemegang kartu wajib memakai selama bertugas/berada di
                        lingkungan keamanan dilingkungan/kawasan PT.PAL INDONESIA</p>
                    <p style="font-size: 10px">3.Apabila hilang/rusak habis masa berlaku s/d segera
                        melaporkan Divisi Human Capital Management PT.PAL INDONESIA(Persero)Jl.Ujung
                        Surabaya</p>
                </div>
                <div class="text-center">

                    <p style="font-size: 15px" class="text-center">Surabaya,
                        {{ date('d-F-Y', strtotime($data->created_at)) }}
                    </p>

                    <p style="font-size: 15px"> PT PAL INDONESIA (PERSERO)</p>

                    <img width="35%"  src="{{public_path('frontend/img/TTD-KADEP-HCD.png')}}">
                                        
                </div>
                <div class="footerIdCard bg-gradient-primary d-flex justify-content-center">
                    <small class="text-white"><b>PT.PAL INDONESIA</b></small>
                </div>

            </div>
            <br><br><br><br><br><br><br><br>
        @endforeach
    </div>

</body>

</html>
