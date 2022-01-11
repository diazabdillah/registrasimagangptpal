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
    <div class="parallax-1" style="background-image: url('frontend/img/FASILITAS-KAPAL-SELAM-3.jpg')">
    </div>
    <div class="grey-fade-over"></div>
    <div class="container z-bigger">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="main-title on-dark text-center">
                    <div style="padding-top: 10px" class="main-subtitle-top mb-4"></div>
                    <h3>Informasi Unit Kerja</h3>
                </div>
                <h5 style="color: rgb(208, 208, 208)">
                    <a style="text-decoration:none; color:white" href="{{URL('/')}}">Home</a> /
                    <a style="text-decoration:none; color:white" href="{{URL('services')}}">Services</a> / 
                    Unit Kerja
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

<!-- Logos Block
	================================================== -->
    <div class="container-fluid">
    <div class="card-1 Menu mb-4">
        <div class="card-1 shadow">
            <div class="card-header-1 py-3">
                <h6 class="m-0 font-weight-bold text-primary-1">Daftar Unit Kerja</h6>
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
                                        Kode Divisi
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex justify-content-center">
                                        Divisi
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex justify-content-center">
                                        Lihat Detail
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unitKerja as $u)
                            <tr class="text-center">
                                <td>{{ $unitKerja->firstItem() + ++$i - 1 }}.</td>
                                <td>{{ $u->kode_divisi }}</td>
                                <td>{{ $u->divisi }}</td>
                                <td>{{ $u->file }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">
                        {{ $unitKerja->links() }}
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

<!-- Pricing Block
	================================================== -->

@endsection