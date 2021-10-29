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
    <div class="container-fluid">
        <div class="row">


    @foreach ($datas as $sertif)
    
    <div class="card-body">
        <div class="chart-area">
            <div class="d-flex justify-content-between pl-4 pr-4 pt-3 pb-4 mt-3" style="margin-bottom:50px ">
                <img src="{{ asset('img/bumn.png') }}" alt="image" style="width: 130px;">
                <img src="{{ asset('img/logo_pal.png') }}" alt="Card image cap" style="width: 130px;">
            </div>
            <div class="text-center">
           <h4 style="font-family:Lucida Sans;">SURAT - KETERANGAN </h4>
           <hr style="width:260px;weight:200px;margin-top: 5px;margin-bottom: 5px;border:1px solid;">
           <p>Nomor :</p>
        </div>
        <div class="text-center" style="margin-top: 50px">
           <span> Dengan ini menerangkan bahwa:</span>
          <b><h1 style="margin-top:5px;margin-bottom:30px;font-family:Comic Sans MS;font-weight: bold;font-size: 50px;">{{strtoupper($sertif->nama)}} <hr style="border:1px solid;width:350px;margin-top: 5px;"></h1></b>
          <p style="margin-top: -25px">Nim : <b>{{$sertif->nim}}</b> </p>
          <div class="text-center" style="margin-top: 20px">
            <h5 style="font-family:Comic Sans MS;font-weight: bold;">{{strtoupper($sertif->strata)}}</h5>
            <h5 style="font-family:Georgia;font-weight: bold;">{{strtoupper($sertif->univ)}}</h5>
        </div>
        <div class="text-center" style="margin-top: 20px">
            <p>Telah Melaksanakan Kerja Praktek di <b>PT PAL INDONESIA (PERSERO)</b> <br> Pada Tanggal <b>{{date('d-m-Y', strtotime($sertif->mulai))}}</b> s/d <b>{{date('d-m-Y', strtotime($sertif->selesai))}}</b> dengan hasil predikat <b>{{$sertif->nilai_huruf}}</b> <b>(Baik)</b></p>
        </div>
                <div  style="float: right;margin-right:60px;margin-top:40px;">
                    <div>
                        <p class="text-center">Surabaya, {{date('d-F-Y', strtotime($sertif->created_at))}} </p>
                    </div>
                    <div style="margin-top: -20px">
                        <p> PT PAL INDONESIA (PERSERO)</p>
                    </div>
                    <div style="margin-top: -20px">
                        <p> Kadep Human Capital Management</p>
                    </div>
                    <div>
                        <hr style="width:280px;weight:200px;margin-top: 140px;margin-bottom: 5px;border:1px solid;">
                    </div>
                </div>
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
