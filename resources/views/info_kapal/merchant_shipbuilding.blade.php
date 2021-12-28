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
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{URL::asset('frontend')}}/img/merchant-shipbuilding-1.png" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{URL::asset('frontend')}}/img/merchant-shipbuilding-2.png" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{URL::asset('frontend')}}/img/merchant-shipbuilding-3.png" alt="Third slide">
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
                    <a href="merchant-shipbuilding" class="list-group-item list-group-item-action active">&ensp;- Merchant Shipbuilding</a>
                    <a href="rekayasa-umum" class="list-group-item list-group-item-action"><b>Rekayasa Umum</b></a>
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
                <h1>Merchant Shipbuilding</h1>
                <p>
                    Pengembangan produk kapal niaga yang diarahkan pada pasar di dalam negeri maupun luar negeri. Saat ini, 
                    fokus pengembangan adalah untuk mendukung model-model industri pelayaran nasional dan pelayaran perintis 
                    bagi penumpang dan barang (cargo), serta mengembangkan kemampuan untuk pembangunan kapal LPG/ LNG Carrier. 
                    Kapasitas produksi saat ini mencapai 1.600 ton/bulan atau setara 3 unit kapal/tahun, 2 kapal Tanker 30.000 
                    DWT dan 1 kapal Tanker 17.500 DWT. <br><br>

                    Saat ini PT PAL Indonesia (Persero) telah menguasai teknologi produksi yang canggih, hingga mampu dan berpengalaman 
                    memproduksi kapal Bulk Carrier (Bulker) sampai dengan bobot 50.000 DWT, kapal kontainer sampai dengan 1.600 TEUS, 
                    kapal tanker sampai dengan 30,000 DWT, kapal AHTS sampai dengan 5.400 BHP, Kapal Ikan Tuna Long Line 60 GT, kapal 
                    penumpang sampai dengan 500 PAX. Sementara itu produk yang telah dikembangkan antara lain kapal kontainer sampai 
                    dengan 2.600 TEUS, serta kapal Chemical Tanker sampai dengan 24,000 LTDW. <br><br>

                    <b>Produk unggulan meliputi :</b>
                </p>
                <ul>
                    <li>Bulk Carrier (Bulker) sampai 50.000 DWT</li>
                    <li>Kapal kontainer sampai 1.600 TEUS,</li>
                    <li>Tanker sampai 30.000 DWT,</li>
                    <li>Kapal AHTS sampai 5.400 BHP,</li>
                    <li>Kapal penangkap ikan 150 GT,</li>
                    <li>Kapal penumpang sampai 500 PAX.</li>
                </ul>
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