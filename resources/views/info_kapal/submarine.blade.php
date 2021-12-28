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
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{URL::asset('frontend')}}/img/ship-building-1.png" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{URL::asset('frontend')}}/img/ship-building-2.png" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{URL::asset('frontend')}}/img/ship-building-3.png" alt="Third slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{URL::asset('frontend')}}/img/ship-building-4.png" alt="Fourth slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{URL::asset('frontend')}}/img/ship-building-5.png" alt="Fifth slide">
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
                    <a href="submarine" class="list-group-item list-group-item-action active">&ensp;- Submarine</a>
                    <a href="merchant-shipbuilding" class="list-group-item list-group-item-action">&ensp;- Merchant Shipbuilding</a>
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
                <h1>Submarine</h1>
                <p>
                    Saat ini PT PAL Indonesia (Persero) terus mengembangkan produk-produk yang akan dipasarkan 
                    di dalam negeri maupun luar negeri, terutama untuk memenuhi kebutuhan kapal perang dan kapal 
                    negara sesuai pesanan disamping teknologi rancang-bangun yang telah dikuasai. Termasuk diantaranya 
                    dari Kementerian Pertahanan, Kepolisian Rl, Kementerian Kelautan & Perikanan, Kementerian ESDM, Kementerian 
                    Riset/BPPT, Kementerian Keuangan/Direktorat Jenderal Bea & Cukai serta Otonomi Daerah maupun swasta, serta 
                    pesanan luar negeri. <br><br>

                    Perusahaan secara berkelanjutan membangun dan mengembangkan produk-produk alat utama sistem persenjataan 
                    (alutsista) yang dipasarkan di dalam negeri maupun luar negeri. PT PAL Indonesia (Persero) merupakan Lead 
                    Integrator Alutsista Matra Laut (Kapal Kombatan) sesuai dengan amanah UU No. 16 tahun 2012 (Pasal 11) dan 
                    Keputusan Komite Kebijakan Industri Pertahanan (KKIP) No.13/2013. Produk yang telah dikuasai antara lain: <br>
                </p>
                <ul>
                    <li>Kapal FPB 28 M</li>
                    <li>Kapal FPB 38 M Aluminium</li>
                    <li>Kapal FPB 57 M</li>
                    <li>Kapal Kapal Cepat Rudal 60 M</li>
                    <li>Kapal Landing Platform Dock 125 M</li>
                    <li>Kapal Strategic Sealift Vessel 123 M</li>
                    <li>Kapal Landing Platform Dock 124 M</li>
                    <li>Kapal Bantu Rumah Sakit</li>
                    <li>Kapal Perusak Kawal Rudal (PKR) 105 M</li>
                    <li>Kapal Selam Nagapasa Class 1500 Ton</li>
                </ul>
                <p>
                    <br>PT PAL Indonesia (Persero) berkomitmen untuk terus berinovasi mengembangkan berbagai tipe kapal perang, termasuk 
                    pengembangan lanjutan dari Kapal Kapal Cepat Rudal 60 M, Kapal Perusak Kawal Rudal, Kapal Landing Platform Dock, dan 
                    Kapal Selam Nagapasa Class.
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