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
                    <h3>News</h3>
                </div>
                <h5 style="color: rgb(208, 208, 208)">
                    <a style="text-decoration:none; color:white" href="{{URL('/')}}">Home</a> / News
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

{{-- details news --}}
<div class="section padding-top-bottom-small background-white over-hide">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"> </div>
            <div class="col-md-8">
                @foreach ($detail as $d)
                <h1 style="font-size: 40px" align="center">{{ $d->judul }}</h1>
                <img src="{{ asset('/berita/' . $d->foto) }}" class="img-fluid center" alt="Responsive image">
                <p>{!! $d->konten !!}</p>
            </div>
            <div class="col-md-2">
                <h3 class="justify-content-center" sytle="color: blue" align="center">Berita Terkini</h3>
                <ul>
                    @foreach ($news as $n)
                    @if ($n->judul != $d->judul)
                    <li><a style="color: blue" href="{{ url('detail-news/' . $n->id) }}">{{ $n->judul }}</a></li>
                    @endif
                    @endforeach
                    @endforeach
                </ul>
                <a style="color: white" class="btn btn-outline-info justify-content-center center"
                    href="{{ url('news') }}">Lihat Selengkapnya</a>
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
