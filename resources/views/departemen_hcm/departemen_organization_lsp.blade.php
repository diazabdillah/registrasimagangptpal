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

<div class="section padding-top-bottom over-hide">
<div class="parallax-1" style="background-image: url('{{URL::asset('frontend')}}/img/FASILITAS-KAPAL-SELAM-3.jpg')">
    </div>
    <div class="grey-fade-over"></div>
    <div class="container z-bigger">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="main-title on-dark text-center">
                    <div style="padding-top: 10px" class="main-subtitle-top mb-4"></div>
                    <h3>Departemen Lembaga Sertifikasi Profesi</h3>
                </div>
                <h5 style="color: rgb(208, 208, 208)">
                    <a style="text-decoration:none; color:white" href="{{URL('/')}}">Home</a> / 
                    <a style="text-decoration:none; color:white" href="{{URL('/profile')}}">Profile</a> / 
                    Departemen Lembaga Sertifikasi Profesi
                </h5>
            </div>
        </div>
    </div>
</div>

<!-- Half Blocks Grid
	================================================== -->

<div class="section padding-top-bottom-small background-white over-hide">
    <div class="container-fluid">
        <div class="row enter bottom move 40px over 0.8s after 0.2s" style="padding-right: 1%">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h3 align="center"><b>PROFIL LSP</b></h3> <br>
                <div class="col-md-10 text-left">
                    <p style="font-size:1vw"> &ensp; &ensp; &ensp;
                        LSP PAL merupakan LSP Pihak Kedua yang memperoleh Surat Keputusan lisensi BNSP Nomor : 
                        Kep. 0086/BNSP/I/2016 Tanggal 19 Januari 2016 dan Nomor Sertifikat Lisensi BNSP-LSP-332-ID 
                        memiliki kewenangan menyelenggaran sertifikasi kompetensi kerja bagi karyawan PT. PAL, Mitra 
                        kerja maupun melalui kerja sama dengan stake holder terkait.
                    </p>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div><br>
        <div class="row enter bottom move 40px over 0.8s after 0.2s" style="padding-right: 1%">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <h3 align="center"><b>LATAR BELAKANG</b></h3> <br><br>
                <p style="font-size:1vw"> &ensp; &ensp;
                    Dalam rangka menghadapi Masyarakat Ekonomi Asean (MEA) 2016 dan pasar global, Indonesia harus mulai berbenah diri mempersiapkan pengembangan sumberdaya manusia khususnya terkait pembuatan alat transportasi laut baik untuk kebutuhan komersiil maupun kebutuhan Alat Utama Sistem Persenjataan (ALUTSISTA) sehingga dibutuhkan tenaga terampil/ahli dengan kompetensi yang beragam seperti desainer, fabrikator, perakit, perencana, procurement dan quality assurance.
                </p>
                <p style="font-size:1vw"> &ensp; &ensp;
                    Sesuai amanah Undang-Undang Nomor 13 Tahun 2003 tentang Ketenagakerjaan bahwa setiap tenaga kerja harus memiliki kompetensi dengan mengacu kepada Standar Kompetensi Kerja Nasional Indonesia (SKKNI).
                </p>
                <p style="font-size:1vw"> &ensp; &ensp;
                    Standar Kompetensi Kerja Nasional Indonesia (SKKNI) adalah rumusan kemampuan kerja yang mencakup aspek pengetahuan, keterampilan serta sikap kerja yang relevan dengan pelaksanaan tugas dan syarat jabatan yang ditetapkan sesuai ketentuan peraturan perundang-undangan yang berlaku.
                </p>
                <p style="font-size:1vw"> &ensp; &ensp;
                    Berkaitan dengan hal tersebut, Lembaga Sertifikasi Profesi PAL berwenang menyelenggarakan sertifikasi kompetensi kerja dengan tujuan agar :
                </p>
                <ul style="font-size:1vw">
                    <li>Meyakinkan klien bahwa produknya dikerjakan oleh tenaga yang kompeten</li>
                    <li>Memberi pengakuan bahwa tenaga kerja industri kompeten dalam bekerja atau menghasilkan produk</li>
                    <li>Membantu tenaga profesi dalam memenuhi persyaratan regulasi</li>
                    <li>Membantu industri dalam sistem pengembangan karir</li>
                    <li>Membantu tercapainya pengembangan program diklat</li>
                </ul>
                <div class="row">
                    <div class="col-md-6"><img src="{{URL::asset('frontend')}}/img/profile/LSP-Latar_Belakang-1.jpg" class="rounded float-center animate__animated animate__bounce"></div>
                    <div class="col-md-6"><img src="{{URL::asset('frontend')}}/img/profile/LSP-Latar_Belakang-2.jpg" class="rounded float-center animate__animated animate__bounce"></div>
                </div>
            </div>
            <div class="col-md-5">
                <h3 align="center"><b>PROSES SERTIFIKASI</b></h3> <br><br>
                <p style="font-size:1vw">Adapun proses sertifikasi di LSP adalah sebagai berikut :</p>
                <ul style="font-size:1vw">
                    <li>Pendaftaran</li>
                    <li>Konsultasi Pra Asesmen</li>
                    <li>Asesmen</li>
                    <li>Keputusan LSP</li>
                    <li>Pemberian Sertifikat</li>
                </ul>
                <img style="width: 90%;" src="{{URL::asset('frontend')}}/img/profile/LSP-Proses_Sertifikasi.jpg" class="rounded float-center animate__animated animate__bounce">
            </div>
            <div class="col-md-1"></div>
        </div><br>
        <div class="row enter bottom move 40px over 0.8s after 0.2s" style="padding-right: 1%">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3 align="center"><b>PERSYARATAN PENDAFTARAN</b></h3> <br>
                <ul style="font-size:1vw">
                    <li>Karyawan PKWTT, PKWT, Mitra Kerja maupun melalui kerja sama dengan stake holder terkaityang telah memenuhi persyaratan</li>
                    <li>Curriculum Vitae</li>
                    <li>Ijazah</li>
                    <li>Sertifikat Pelatihan</li>
                    <li>Surat Pengalaman Kerja/Skep</li>
                    <li>KTP</li>
                </ul>
            </div>
            <div class="col-md-3"></div>
        </div><br>
    </div>
</div> 
<!-- Separator Line
	================================================== -->

<div class="section padding-top-bottom-1 background-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="separator-wrap">
                    <span class="separator">
                        <span class="separator-line dashed">
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Logos Block
	================================================== -->

<div class="section padding-top-bottom-small background-white over-hide">
    <div class="container">
        <div class="row enter bottom move 40px over 0.8s after 0.2s" style="padding-right: 1%">
            <div class="col text-center">
                <h3>Struktur Organisasi</h3>
                <img style="width: 30%;" src="{{URL::asset('frontend')}}/img/profile/lsp.jfif" class="rounded float-center animate__animated animate__bounce" alt="...">
            </div>
        </div><br>
    </div>
</div>
<!--  -->
<!-- Separator Line
        ================================================== -->

<div class="section padding-top-bottom-1 background-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="separator-wrap">
                    <span class="separator">
                        <span class="separator-line dashed">
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section padding-top-bottom-small background-white over-hide">
    <div class="container-fluid">
        <div class="row enter bottom move 40px over 0.8s after 0.2s">
            <div class="col text-center"><br>
                <h3>Informasi Jabatan</h3>
                <img style="width: 70%;" src="{{URL::asset('frontend')}}/img/profile/Bagan-Dep. LSP.png" class="rounded float-center animate__animated animate__bounce" alt="...">
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
                    <span class="separator"><span class="separator-line dashed"></span></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pricing Block
	================================================== -->

<div class="section padding-top-bottom background-black over-hide">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="main-title text-center">
                    <h3 class="mb-5 color-white">Departemen Kami</h3>
                </div>
            </div>
            <div class="clear"></div>
            <div class="col-md-3" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
                <a href="/human-capital-services" style="text-decoration:none">
                    <div class="pricing p-xl-5 background-image-cover text-center" style="background-image: url('{{URL::asset('frontend')}}/img/pricing.jpg')">
                        <h5 class="color-white">Departemen Human Capital Services</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mt-3 mt-md-0" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
                <a href="/human-capital-development" style="text-decoration:none">
                    <div class="pricing p-xl-5 text-center background-image-cover" style="background-image: url('{{URL::asset('frontend')}}/img/pricing.jpg')">
                        <h5 class="color-white">Departemen Human Capital Development</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mt-3 mt-md-0" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
                <a href="/organization-development-and-command-media" style="text-decoration:none">
                    <div class="pricing p-xl-5 background-image-cover text-center" style="background-image: url('{{URL::asset('frontend')}}/img/pricing.jpg')">
                        <h5 class="color-white">Departemen Organization Development</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mt-3 mt-md-0" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
                <a href="/lembaga-sertifikasi-profesi" style="text-decoration:none">
                    <div class="pricing p-xl-5 background-image-cover text-center" style="background-image: url('{{URL::asset('frontend')}}/img/pricing.jpg')">
                        <h5 class="color-white">Departemen Organization LSP</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection