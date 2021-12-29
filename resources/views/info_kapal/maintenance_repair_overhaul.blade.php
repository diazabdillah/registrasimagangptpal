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
            <img class="d-block w-100" src="{{URL::asset('frontend')}}/img/maintenance-repair-overhaul.png" alt="First slide">
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
                    <a href="maintenance-repair-overhaul" class="list-group-item list-group-item-action active"><b>Perbaikan & Pemeliharaan</b></a>
                    <a href="kri" class="list-group-item list-group-item-action">&ensp; - KRI</a>
                    <a href="non-kri" class="list-group-item list-group-item-action">&ensp; - NON KRI</a>
                    <a href="fasilitas" class="list-group-item list-group-item-action"><b>Fasilitas</b></a>
                    <a href="penyedia-solusi" class="list-group-item list-group-item-action"><b>Penyedia Solusi</b></a>
                </div>
            </div>
            <div class="col-sm-8">
                <h1>Perbaikan & Pemeliharaan</h1>
                <p>
                    Produk Jasa harkan kapal maupun non kapal meliputi jasa pemeliharaan dan 
                    perbaikan kapal sampai tingkat depo dengan kapasitas docking 894.000 DWT per tahun. <br><br>

                    Selain itu jasa yang disediakan adalah annual/special survey dan overhaul bagi kapal 
                    perang dan kapal niaga , pemeliharaan dan perbaikan elektronika dan senjata, serta overhaul 
                    kapal selam. Peluang pasar jasa perbaikan dan pemeliharaan antara lain berasal dari TNI AL, 
                    swasta, pemerintah, serta kapal-kapal lainnya yang singgah dan berlabuh di Surabaya, dengan 
                    jumlah yang mencapai 894.000 DWT per tahun, yang terdiri dari Produk Harkan KRI, Harkan NON KRI 
                    dan Non Kapal. <br><br>

                    PT PAL Indonesia (Persero) selalu berusaha untuk menjaga efisiensi dan secara terus menerus 
                    meningkatkan kemampuan perbaikan. Kami berharap untuk menambah daftar panjang pelanggan kami, 
                    dan untuk mencapai sasaran tersebut, saat ini kita menjalin kerja sama dengan galangan lokal 
                    dan internasional. <br><br>

                    PT PAL Indonesia (Persero) adalah industri perkapalan terbesar dan paling modern di Indonesia, 
                    sangat baik dalam pengerjaan, fasilitas dan layanan. Ditambah dengan manajemen PT PAL Indonesia 
                    (Persero) yang profesional dan dinamis, menawarkan berbagai kemampuan yang mencakup desain dan 
                    konstruksi kapal Angkatan Laut dan merchant, struktur baja sisi pantai, rig off-shore, mesin diesel, 
                    pembangkit listrik tenaga besar dan pabrik kimia.<br><br>

                    Untuk meningkatkan bidang perawatan khusus kami, PT PAL Indonesia (Persero) telah membentuk Divisi 
                    Perbaikan dan Pemeliharaan sebagai unit usaha mandiri perusahaan, dengan struktur manajemen dan tujuan 
                    bisnisnya sendiri. <br><br>

                    Melalui pengalaman panjang kami dalam perbaikan kapal domestik dan angkatan laut, Divisi Perbaikan 
                    dan Pemeliharaan menawarkan kemampuan pada servis sebagai berikut: <br><br>
                </p>
                <ul>
                    <li>Annual Survey</li>
                    <li>Special Survey</li>
                    <li>Floating Repair</li>
                    <li>Docking Repair</li>
                    <li>Intermediate Level Maintenance</li>
                    <li>Depo Level Maintenance</li>
                    <li>Ship Conversion and Medernization</li>
                    <li>Modification/Alternation (propulsion system, electronics, weapon and structure)</li>
                    <li>Material Test</li>
                    <li>Gas Feeing</li>
                    <li>Engineering Service</li>
                    <li>Diving and Miscellaneous service for general industries.</li>
                </ul>
                <p>
                    <b>Elektronik dan Senjata</b> <br>
                    Seiring dengan perkembangan teknologi elektronika dan senjata baru-baru ini telah terjadi perubahan 
                    timbal balik dan modernisasi armada Angkatan Laut untuk meningkatkan reabilitas operasinya. PT PAL Indonesia 
                    (Persero) melalui Divisi Pemeliharaan dan Perbaikan telah menjawab tantangan ini dengan tugas yang berhasil terkait 
                    dengan perancangan sistem dan pemasangan peralatan baru di kapal untuk memenuhi kebutuhan pemilik kapal. Hal ini 
                    berakibat pada peningkatan kemampuan dalam desain dan pembuatan berbagai modul, unit dan peralatan elektronik lainnya 
                    untuk memenuhi permintaan yang dihadapi. Sistem elektronika dan senjata untuk kapal angkatan laut pada dasarnya memiliki
                    kebutuhan sendiri dan lebih spesifik dari pada jenis yang sama lainnya untuk di darat atau di udara, karena tugas, misi dan lapangan. <br><br>

                    Sebagian besar pengaruh adalah tuntutan "readiness", "operasi jangka panjang" dan "keterbatasan ruang". Oleh karena itu untuk 
                    memenuhi permintaan tersebut, diperlukan teknologi khusus untuk memperoleh peralatan realibility lebih banyak terutama peralatan 
                    kapal selam. Bengkel overhaul mesin kami khusus melakukan perbaikan menyeluruh, rekondisi dan pemasangan semua jenis mesin diesel 
                    kecepatan tinggi atau rendah. <br><br>
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