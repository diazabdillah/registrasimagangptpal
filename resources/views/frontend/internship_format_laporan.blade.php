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
                    <h3>Internship</h3>
                </div>
                <h5 style="color: rgb(208, 208, 208)">
                    <a style="text-decoration:none; color:white" href="{{URL('/')}}">Home</a> / Internship
                </h5>
            </div>
        </div>
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

{{-- body --}}

<div class="container">
    <div class="row">
        <div class="col">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#prosedure" role="tab" aria-controls="home" aria-selected="true">Prosedure</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#laporan" role="tab" aria-controls="profile" aria-selected="false">Materi Pendukung Internship</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#kuota" role="tab" aria-controls="contact" aria-selected="false">Kuota</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="prosedure" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
            <img src="{{URL::asset('frontend')}}/img/Alur-Magang.jpg" class="rounded float-left mb-2" alt="..." style="width: 100%; display:inline-block ">
     
            <iframe width="500px" height="300px"  src="https://www.youtube.com/embed/4Ez8reOlatw">
            </iframe>
        </div>
    </div>
        <div class="tab-pane fade show active" id="laporan" role="tabpanel" aria-labelledby="profile-tab">
            <h4>Materi Pendukung Internship</h4>
            <p>Hai sobat Praktikan PT PAL...</p>
            <br>
            <p style="text-align:justify;">Sebagai informasi, bagi para Praktikan yang telah berstatus <b>magang aktif</b> dapat men-download materi - materi pendukung untuk kelengkapan selama melakukan internship. Sebelum men-download para Praktikan agar berkoordinasi terlebih dahulu dengan kordinator internship PT PAL. Link materi dapat diakses melalui tombol di bawah ini.</p>
            <a class="btn btn-danger p-1" target="_blank" href="https://drive.google.com/drive/folders/1XaPe2jTLaQzy0UasLZ0pWFHA3SSChYan?usp=sharing">Materi</a>
            <br>
            <br>
            <p style="text-align:justify;"> <a style="color: red;">Note :</a> Materi yang telah di download hanya untuk praktikan yang berstatus <b>magang aktif</b> dan materi ini diharapkan tidak disalahgunakan di luar kepentingan internship. Dan apabila terdapat pelanggaran yang dilakukan oleh para praktikan yang sengaja menyalahgunakan materi - materi tersebut. Koordinator internship nantinya akan menindaklanjuti sesuai dengan pelanggaran yang dilakukan. Terima kasih.</p>
        </div>
        <div class="tab-pane fade" id="kuota" role="tabpanel" aria-labelledby="contact-tab">
            <div class="container-fluid">
                <div class="card-1 Menu mb-4">
                    <div class="card-1 shadow">
                        <div class="card-header-1 py-3">
                            <h6 class="m-0 font-weight-bold text-primary-1">Daftar Kuota</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered-1 table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="bg-primary-1 text-light">
                                        <tr>
                                            <th>
                                                <div class="d-flex justify-content-center">
                                                    No.
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex justify-content-center">
                                                    Divisi
                                                </div>
                                            </th>
                                           
                                            <th>
                                                <div class="d-flex justify-content-center">
                                                    Jenis Kuota
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex justify-content-center">
                                                    Status Kuota
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex justify-content-center">
                                                    Tanggal Buka
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex justify-content-center">
                                                    Tanggal Tutup
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex justify-content-center">
                                                    Kuota TW 1
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex justify-content-center">
                                                    Kuota TW 2
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex justify-content-center">
                                                    Kuota TW 3
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex justify-content-center">
                                                    Kuota TW 4
                                                </div>
                                            </th>
                                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kuota as $k)
                                        <tr class="text-center">
                                            <td>{{ $kuota->firstItem() + ++$i - 1 }}.</td>
                                            <td>{{ $k->divisi }}</td>
                                            <td>{{ $k->jenis_kuota }}</td>
                                            <td>{{ $k->status_kuota }}</td>
                                            <td>{{ $k->tanggal_buka }}</td>
                                            <td>{{ $k->tanggal_tutup }}</td>
                                            <td>{{ $k->tw1 }}</td>
                                            <td>{{ $k->tw2 }}</td>
                                            <td>{{ $k->tw3 }}</td>
                                            <td>{{ $k->tw4 }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pull-right">
                                    {{ $kuota->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
<script>
    $('#myTab a').on('click', function(event) {
        event.preventDefault()
        $(this).tab('show')
    })
</script>
@endsection