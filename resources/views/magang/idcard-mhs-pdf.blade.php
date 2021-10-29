<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PT.PAL</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    {{-- Fonts Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    {{-- <button class="btn btn-danger mb-3 mt-3" onclick="window.print()"><i class="fas fa-download"></i> Cetak dan
        Simpan</button> --}}

    <!-- Card -->
    <div class="row mb-4">
        @foreach ($datas as $data)
        <div class="col-md-4">

            <div class="card" style="width: 19rem;">
                <div class="headerIdCard bg-gradient-primary mb-5">
                    <div class="mt-4">
                        <div class="d-flex justify-content-center">
                            @foreach ($fotos as $img)
                                <img src="{{ asset('/file/' . $img->fotoID) }}" alt="image"
                                    style="width: 150px; height:180px; border-radius: 5px; border: 3px white solid;">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between pl-4 pr-4 pt-3 pb-3 mt-3">
                    <img src="{{ asset('img/bumn.png') }}" alt="image" style="width: 80px;">
                    <img src="{{ asset('img/logo_pal.png') }}" alt="Card image cap" style="width: 80px;">
                </div>
                <div class="card-body">

                    <h5 class="card-title text-dark mb-3"><b>{{ $data->nama }}</b></h5>
                    <table>
                        <tr>
                            <td><b>ID</b></td>
                            <td class="pl-4">{{ $data->id }}</td>
                        </tr>
                        <tr>
                            <td><b>Universitas</b></td>
                            <td class="pl-4">{{ $data->univ }}</td>
                        </tr>
                        <tr>
                            <td><b>Divisi</b></td>
                            <td class="pl-4">{{ $data->divisi }}</td>
                        </tr>
                        <tr>
                            <td><b>Status</b></td>
                            <td class="pl-4">{{ $data->role_id}}</td>
                        </tr>
                    </table>



                    @foreach ($dates as $date)
                        <h6 class="text-dark text-center mt-3 mb-0" style="font-size: 13px;">
                            <b>{{ $date->mulai }}</b>
                            <b class="text-danger ml-3">{{ $date->selesai }}</b>
                        </h6>
                    @endforeach
                </div>
                <div class="footerIdCard bg-gradient-primary d-flex justify-content-center">
                    <small class="text-white"><b>PT.PAL INDONESIA</b></small>
                </div>
                <div class="card" style="width: 19rem;">
                    <div class="mt-4">
                        <div class="d-flex justify-content-between pl-4 pr-4 pt-3">
                            <img src="{{ asset('img/bumn.png') }}" alt="image" style="width: 80px;">
                            <img src="{{ asset('img/logo_pal.png') }}" alt="Card image cap" style="width: 80px;">
                        </div>
                    </div>
                <div class="card-body">

                        <p style="font-size: 10px">1.Kartu ini adalah milik PT.PAL INDONESIA dan berfungsi untuk sebagai IDCard pemegangnya</p>
                        <p style="font-size: 10px">2.Pemegang kartu wajib memakai selama bertugas/berada di lingkungan keamanan dilingkungan/kawasan PT.PAL INDONESIA</p>
                        <p style="font-size: 10px">3.Apabila hilang/rusak habis masa berlaku  s/d  segera melaporkan Divisi KEAMANAN & K3LH PT.PAL INDONESIA(Persero)Jl.Ujung Surabaya</p>
                </div>
                <div class="text-center">
                    <div>
                        <p style="font-size: 15px" class="text-center">Surabaya, {{date('d-F-Y', strtotime($data->created_at))}} </p>
                    </div>
                    <div>
                        <p  style="font-size: 15px"> PT PAL INDONESIA (PERSERO)</p>
                    </div>
                    <div>
                        <p  style="font-size: 15px">Kepala Dept.Keamanan</p>
                    </div>
                    <div>
                        <hr style="width:250px;weight:150px;margin-top: 100px;margin-bottom: 10px;border:1px solid;">
                    </div>
                </div>
                <div class="footerIdCard bg-gradient-primary d-flex justify-content-center">
                    <small class="text-white"><b>PT.PAL INDONESIA</b></small>
                </div>
            </div>
            </div>
            @endforeach
        </div>
    </div>
    {{-- end card --}}

    <script>
        window.print();
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
