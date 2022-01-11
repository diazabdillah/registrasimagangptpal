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
                    <h3>Info Beasiswa</h3>
                </div>
                <h5 style="color: rgb(208, 208, 208)">
                    <a style="text-decoration:none; color:white" href="{{URL('/')}}">Home</a> /
                    <a style="text-decoration:none; color:white" href="{{URL('services')}}">Services</a> / 
                    Info Beasiswa
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

{{-- list info beasiswa --}}
<div class="section padding-top-bottom-small background-white over-hide">
    <div class="container-fluid">
        <div class="section_our_solution">
            <div class="row">
                @foreach ($beasiswa as $b)
                    <div class="col-sm-4">
                        <div class="our_solution_category">
                            <div class="solution_cards_box">
                                <div class="solution_card">
                                    <div class="hover_color_bubble"></div>
                                    <div class="solu_title" align="center"><h1>{{ $b->nama_beasiswa }}</h1></div>
                                    <div class="solu_description" align="center" style="font-size: 18px;"> 
                                        <p style="font-size: 24px;">
                                            Institusi : {{ $b->institusi }} <br>
                                        </p>
                                        <a class="button-scholarship" type="button" href="{{ $b->url }}">More Information</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 @endforeach
            </div>
        </div>
        <div class="btn-toolbar padding-top-small justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
            <nav aria-label="Page navigation example">
                {{ $beasiswa->links() }}
            </nav>
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