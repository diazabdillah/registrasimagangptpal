@extends('core-front.head-2')
@section('title','HCM PT. PAL Indonesia (Persero)')
@section('body')
@php 
    $i=0;
    $j=0;
@endphp
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
                    <a style="text-decoration:none; color:white" href="{{URL('/')}}">Home</a> /
                    <a style="text-decoration:none; color:white" href="{{URL('services')}}">Services</a> / 
                    Informasi LSP
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
                    <a class="nav-link active" id="jadwal-sertifikasi-tab" data-toggle="tab" href="#jadwalSertifikasi" role="tab" aria-controls="jadwal-sertifikasi" aria-selected="true">Jadwal Sertifikasi</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="skema-bnsp-tab" data-toggle="tab" href="#skemaBNSP" role="tab" aria-controls="skema-bnsp" aria-selected="false">Skema BNSP</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="jumlah-asesor-tab" data-toggle="tab" href="#jumlahAsesor" role="tab" aria-controls="jumlah-asesor" aria-selected="false">Jumlah Asesor</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="jadwalSertifikasi" role="tabpanel" aria-labelledby="jadwal-sertifikasi-tab">
            <div class="section padding-top-bottom-small background-white over-hide">
                <div class="container">
                    <div class="col-md-8 box-isi">
                        <h3>Jadwal Sertifikasi Berlangsung</h3> <br>
                        <ul class="simple-news-list" style="border-bottom: 1px solid dashed;">
                            @foreach ($training as $t)
                            <li class="col-md-6" style="padding: 20px; width: 100%;border-bottom: 1px dashed #848383;">
                                <div class="news-info col-md-7">
                                    <!-- <h4 style="padding-top: 12px;"><a data-toggle="modal" data-target="#det26" style="cursor: pointer;"> {{ $t->nama_training }}</a></h4>
                                    <div class="news-meta" style="font-size: 13px;"> Penyelenggara : {{ $t->penyelenggara }} </div>
                                        <div class="news-meta" style="font-size: 13px;">
                                            <i class="fa fa-calendar"></i> 
                                            $t->tanggal_mulai - $t->tanggal_selesai						
                                        </div>
                                    </div>
                                    <div class="news-image col-md-4 pull-right">
                                        <div class="img-thumbnail pull-right" style="border: transparent;">
                                            <p style="background: red; padding: 8px; color: #fff; border-radius: 30px;">Selesai</p>								
                                        </div>
                                        <div class="news-meta col-md-12 pull-right" style="font-size: 13px;text-align: right;"> 
                                            Peserta Hadir : {{ $t->peserta_hadir }}							
                                        </div>
                                    </div> -->
                                </div>
                            </li>
                            <div class="modal fade" id="det26" style="display: none;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title text-center">Detail Informasi Training</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row" style="padding: 10px 30px;">
                                                <table style="color: #4e4e4e; font-size: 15px; line-height: 1.5;">
                                                    <tbody>
                                                        <tr>
                                                            <td>Nama Training</td>
                                                            <td width="25" align="center">:</td>
                                                            <td style="font-weight: bold;">{{ $t->nama_training }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Penyelenggara</td>
                                                            <td width="25" align="center">:</td>
                                                            <td style="font-weight: bold;">{{ $t->penyelenggara }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Waktu</td>
                                                            <td width="25" align="center">:</td>
                                                            <td style="font-weight: bold;">{{ date('D, d F Y', strtotime($t->tanggal_mulai)) }} - {{ date('D, d F Y', strtotime($t->tanggal_selesai)) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tempat</td>
                                                            <td width="25" align="center">:</td>
                                                            <td style="font-weight: bold;">{{ $t->tempat }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Peserta sesuai Sprint</td>
                                                            <td width="25" align="center">:</td>
                                                            <td style="font-weight: bold;">{{ $t->peserta_sprint }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Peserta Hadir</td>
                                                            <td width="25" align="center">:</td>
                                                            <td style="font-weight: bold;">{{ $t->peserta_hadir }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dokumen</td>
                                                            <td width="25" align="center">:</td>
                                                            <td style="font-weight: bold;">
                                                                <a href="{{ asset('/Dokumen Training/' . $t->fileSertifikat) }}">Download File</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <embed src="{{ asset('/Dokumen Training/' . $t->dokumen) }}" width="100%" height="700"> 												
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </ul>
                    </div>
                    <div class="btn-toolbar padding-top-small justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
                        <nav aria-label="Page navigation example">
                            {{ $training->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="skemaBNSP" role="tabpanel" aria-labelledby="skema-bnsp-tab">
            <div class="container-fluid">
                <div class="card-1 Menu mb-4">
                    <div class="card-1 shadow">
                        <div class="card-header-1 py-3">
                            <h6 class="m-0 font-weight-bold text-primary-1">Daftar Skema BNSP</h6>
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
                                                    Kode Skema
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex justify-content-center">
                                                    Nama Skema
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex justify-content-center">
                                                    Level
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex justify-content-center">
                                                    Bidang
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($skema as $s)
                                        <tr class="text-center">
                                            <td>{{ $skema->firstItem() + ++$i - 1 }}.</td>
                                            <td>{{ $s->kode_skema }}</td>
                                            <td>{{ $s->nama_skema }}</td>
                                            <td>{{ $s->level }}</td>
                                            <td>{{ $s->bidang }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pull-right">
                                    {{ $skema->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="jumlahAsesor" role="tabpanel" aria-labelledby="jumlah-asesor-tab">
            <div class="container-fluid">
                <div class="card-1 Menu mb-4">
                    <div class="card-1 shadow">
                        <div class="card-header-1 py-3">
                            <h6 class="m-0 font-weight-bold text-primary-1">Daftar Jumlah Asesor</h6>
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
                                                    Nomor Registrasi
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex justify-content-center">
                                                    Nama Assesor
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($asesor as $a)
                                        <tr class="text-center">
                                            <td>{{ $asesor->firstItem() + ++$j - 1 }}.</td>
                                            <td>{{ $a->nomor_registrasi }}</td>
                                            <td>{{ $a->nama_assessor }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pull-right">
                                    {{ $asesor->links() }}
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