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
            <img class="d-block w-100" src="{{URL::asset('frontend')}}/img/rekayasa-umum-1.png" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{URL::asset('frontend')}}/img/rekayasa-umum-2.png" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{URL::asset('frontend')}}/img/rekayasa-umum-3.png" alt="Third slide">
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
                    <a href="rekayasa-umum" class="list-group-item list-group-item-action active"><b>Rekayasa Umum</b></a>
                    <a href="energy" class="list-group-item list-group-item-action">&ensp;- Power Plant</a>
                    <a href="off-shore" class="list-group-item list-group-item-action">&ensp;- Off Shore</a>
                    <a href="maintenance-repair-overhaul" class="list-group-item list-group-item-action"><b>Perbaikan & Pemeliharaan</b></a>
                    <a href="kri" class="list-group-item list-group-item-action">&ensp; - KRI</a>
                    <a href="non-kri" class="list-group-item list-group-item-action">&ensp; - NON KRI</a>
                    <a href="fasilitas" class="list-group-item list-group-item-action"><b>Fasilitas</b></a>
                    <a href="penyedia-solusi" class="list-group-item list-group-item-action"><b>Penyedia Solusi</b></a>
                </div>
            </div>
            <div class="col-sm-8">
                <h1>Rekayasa Umum</h1>
                <p>
                    PT PAL Indonesia (Persero) telah menguasai teknologi produksi komponen pendukung industri pembangkit 
                    tenaga listrik dan konstruksi lepas pantai. Kemampuan ini akan terus ditingkatkan sampai pada taraf 
                    kemampuan modular dan EPCIC. <br><br>

                    Produk-produk yang pernah dikerjakan, antara lain : Steam Turbine Assembly sampai dengan 600 MW, 
                    Komponen Balance of Plant dan Boiler sampai dengan 600 MW, Compressor Module 40 MW, Barge Mounted 
                    Power Plant 30 MW, Pressure Vessels dan Heat Exchangers, Generator Stator Frame s/d 600 MW, dan Wellhead 
                    Platform sampai dengan 3000 ton. <br><br>

                    <b>Kemampuan Dalam Bidang Balance of Plant</b> <br><br>

                    Reverse engineering, Engineer PT PAL Indonesia (Persero) telah membuktikan dengan menyelesaikan proyek-
                    proyek Power Plant antara lain pada Heat Exchanger, Boiler, Oil Cooler, Piping system serta berbagai 
                    komponen pressure part lainnya. <br><br>
                
                    Adapun pengalaman dan kemampuan Maintenance rekondisi BOP serta equipment pendukungnya, di antaranya pada 
                    proyek PLTU Tanjung Priok, PLTU Suralaya, PLTU Paiton, PLTU Pangkalan Susu, PLTU Pelabuhan Ratu dan Kegiatan 
                    Re-tubing & New Fabrication, antara lain ; HP/LP Heater, Fabrication Condenser, Cooler system, Boiler, Piping 
                    system, Accessories. <br><br>

                    <b>Kemampuan dalam Bidang Balance of Plant</b> <br>

                    <ol>
                        <li>Main Condenser up to 600MW, with 8000 mm Length, 5000 mm Width, 6000 Height, and tonnage 300 Tons.</li>
                        <li>High Pressure FW Heater up to Design Pressure 406 Kg/cm2, Dimension 10620 mm Length, 2500 mm Width, 2200 Height, and tonnage 50 Tons.</li>
                        <li>Stator Frame up to 700MW, with 10300 Length, 4000mm Width, 4300 mm Height, and tonnage 176 Tons.</li>
                        <li>Deaerator, Dimension 9790 mm Length, 26800 mm Width, 3150 mm Height, and tonnage 25 Tons.</li>
                        <li>Storage Tank, Dimension 17840 mm Length, 4550 mm Width, 5250 mm Height, and tonnage 80Tons</li>
                        <li>Steel Structure up to 2.400 ton/year</li>
                        <li>Machining Production up to 30.000 Machine Hours</li>
                    </ol>
                    <br><br>
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