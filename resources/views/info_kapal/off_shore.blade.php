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
            <img class="d-block w-100" src="{{URL::asset('frontend')}}/img/off-shore.png" alt="First slide">
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
                    <a href="off-shore" class="list-group-item list-group-item-action active">&ensp;- Off Shore</a>
                    <a href="maintenance-repair-overhaul" class="list-group-item list-group-item-action"><b>Perbaikan & Pemeliharaan</b></a>
                    <a href="kri" class="list-group-item list-group-item-action">&ensp; - KRI</a>
                    <a href="non-kri" class="list-group-item list-group-item-action">&ensp; - NON KRI</a>
                    <a href="fasilitas" class="list-group-item list-group-item-action"><b>Fasilitas</b></a>
                    <a href="penyedia-solusi" class="list-group-item list-group-item-action"><b>Penyedia Solusi</b></a>
                </div>
            </div>
            <div class="col-sm-8">
                <h1>Off Shore</h1>
                <p>
                    PT PAL Indonesia (Persero) mempunyai keahlian untuk memproduksi component pendukung industri 
                    pembangkit tenaga listrik seperti misalnya Boiler dan Balance of plant. <br><br>

                    PT PAL Indonesia (Persero) terus mengembangkan kapasitas untuk memenuhi level modular dan EPC 
                    baik level kecil dan menengah dengan kapasitas sampai dengan 50 Megawat. PT PAL Indonesia (Persero) 
                    terus meningkatkan kemampuan Engineering, Procurement, Construction, the capability of Engineering, 
                    Procurement, Installation & Commissioning (EPCIC), dan pengembangan EPC infrastruktur energi meliputi 
                    LNG Carrier, Floating Storage Regasication Unit (FSRU) serta pembangkit listrik energi baru terbarukan, 
                    energi ombak laut, dan energi nuklir generasi terbaru. <br><br>
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