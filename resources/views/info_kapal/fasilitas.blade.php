@extends('core-front.head-2')
@section('title','HCM PT. PAL Indonesia (Persero)')
@section('body')
<link rel="stylesheet" href="{{URL::asset('frontend')}}/diagram.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<!-- Services Block
	================================================== -->

<div class="section over-hide">
    <div class="container">
    </div>
</div>

<!-- Work Title Block
	================================================== -->

<div class="section padding-top over-hide">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{URL::asset('frontend')}}/img/fasilitas.png" alt="First slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
</div>

<!-- Logos Block
	================================================== -->

<div class="section padding-top-bottom-small background-white over-hide">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="list-group">
                    <a href="ship-building" class="list-group-item list-group-item-action"><b>Ship Building</b></a>
                    <a href="naval-shipbuilding" class="list-group-item list-group-item-action">&ensp;- Naval Shipbuilding</a>
                    <a href="submarine" class="list-group-item list-group-item-action">&ensp;- Submarine</a>
                    <a href="merchant-shipbuilding" class="list-group-item list-group-item-action">&ensp;- Merchant Shipbuilding</a>
                    <a href="rekayasa-umum" class="list-group-item list-group-item-action"><b>Rekayasa Umum</b></a>
                    <a href="energy" class="list-group-item list-group-item-action">&ensp;- Power Plant</a>
                    <a href="off-shore" class="list-group-item list-group-item-action">&ensp;- Off Shore</a>
                    <a href="maintenance-repair-overhaul" class="list-group-item list-group-item-action"><b>Perbaikan & Pemeliharaan</b></a>
                    <a href="kri" class="list-group-item list-group-item-action">&ensp; - KRI</a>
                    <a href="non-kri" class="list-group-item list-group-item-action">&ensp; - NON KRI</a>
                    <a href="fasilitas" class="list-group-item list-group-item-action active"><b>Fasilitas</b></a>
                    <a href="penyedia-solusi" class="list-group-item list-group-item-action"><b>Penyedia Solusi</b></a>
                </div>
            </div>
            <div class="col-sm-8">
                <h1>Fasilitas</h1>
                <p>
                    PT PAL Indonesia (Persero) memiliki luas area 120 Ha secara divisional dikelompokkan 
                    sebagai fasiltas produksi Kapal Niaga, Kapal Perang, Rekayasa Umum, Pemeliharaan dan 
                    Perbaikan Kapal maupun Non Kapal, serta Kapal Selam. <br><br>

                    <ol>
                        <li><b>Divisi Kapal Perang</b></li>
                        <b>Bengkel Konstruksi Lambung</b> <br>
                        <ul>
                            <li>Bengkel Fabrikasi</li>
                            <li>Bengkel Asembly</li>
                        </ul>
                        <b>Bengkel Pertukangan</b> <br>
                        <ul>
                            <li>Bengkel Listrik</li>
                            <li>Bengkel Plat Tipis</li>
                            <li>Bengkel Pipa</li>
                            <li>Bengkel Plat Tipis</li>
                            <li>Bengkel Galvanis</li>
                            <li>Bengkel Blok Blasting</li>
                            <li>Bengkel Mesin</li>
                            <li>Bengkel Out Fitting</li>
                        </ul> 
                        <b>Fasilitas Dok</b>
                        <ul>
                            <li>Dok Gali 20.000 DWT</li>
                            <li>Ship Lift 1.500 TLC</li>
                        </ul> <br>

                        <li><b>Divisi Kapal Niaga</b></li>
                        <b>Bengkel Konstruksi Lambung</b> <br>
                        <ul>
                            <li>Bengkel Fabrikasi</li>
                            <li>Bengkel Asembly</li>
                        </ul> 
                        <b>Bengkel Pertukangan</b> <br>
                        <ul>
                            <li>Bengkel Listrik</li>
                            <li>Bengkel Plat Tipis</li>
                            <li>Bengkel Pipa</li>
                            <li>Bengkel Plat Tipis</li>
                            <li>Bengkel Galvanis</li>
                            <li>Bengkel Blok Blasting</li>
                            <li>Bengkel Mesin</li>
                            <li>Bengkel Out Fitting</li>
                        </ul> 
                        <b>Fasilitas Dok</b>
                        <ul>
                            <li>Dok Gali 50.000 DWT</li>
                            <li>Dok Gali 20.000 DWT</li>
                            <li>Ship Lift 1.500 TLC</li>
                            <li> Side & End Launching, up to 40.000 DWT (Fasilitas peluncuran memanjang dan melintang)</li>
                        </ul> <br>

                        <li><b>Divisi General Engineering</b></li>
                        <ul>
                            <li>CNC Lathe</li>
                            <li>Vertical Lathe</li>
                            <li>CNC Vertical Turning Centre</li>
                            <li>CNC Centre Lathe</li>
                            <li>CNC Plano Miller</li>
                            <li>Machining Centre</li>
                            <li>CNC Milling Machine</li>
                            <li>Water Brake</li>
                        </ul> <br>
                        
                        <li><b>Divisi Kapal Perbaikan & Pemeliharaan</b></li>
                        <b>Bengkel Outfitting</b> <br>
                        <ul>
                            <li>Pekerjaan Kayu</li>
                            <li>Kelistrikan</li>
                            <li>Plat Tipis</li>
                            <li>Pipa</li>
                            <li>Palletizing</li>
                            <li>Galvanizing</li>
                            <li>Block Blasting</li>
                            <li>Machinery</li>
                            <li>Outfitting</li>
                        </ul>
                        <b>Electronic and Weapon Workshops</b> <br>
                        <ul>
                            <li>Radio Detection and Ranging</li>
                            <li>Radio Communication</li>
                            <li>Sound Navigation and Ranging</li>
                            <li>Calibration, Weaponry / Gunnery</li>
                        </ul> 
                        <b>Dock Facilities</b>
                        <ul>
                            <li>50.000 DWT Dry Dock</li>
                            <li>20.000 DWT Dry Dock</li>
                            <li>TLC Floating Dock (2)</li>
                            <li>TLC Caisson Dock (2)</li>
                            <li>1.500 TLC Ship Lift</li>
                        </ul> 
                    </ol>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Separator Line
	================================================== -->

<div class="section padding-top-bottom-1 background-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="separator-wrap">
                    <span class="separator">
                        <span class="separator-line dashed"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pricing Block
	================================================== -->

@endsection