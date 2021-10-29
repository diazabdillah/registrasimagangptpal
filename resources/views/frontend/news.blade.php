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

<div class="section padding-top background-white over-hide">
    <div class="container">
        <div class="row enter bottom move 40px over 0.8s after 0.2s" style="padding-right: 1%">
            <div class="col text-center">
                <h3>Latest News</h3>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <img style="display: block; margin-left: auto; margin-right: auto; width:100%;" src="{{URL::asset('frontend')}}/img/kunjungan.jpeg" class="card-img-top " alt="...">
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p style="font-size: 20px;">$news[0]</p>
                            <a>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat excepturi voluptas eos harum incidunt, voluptates quis nam dignissimos quos voluptatum vel dolor non. Suscipit omnis ullam soluta aut deserunt laboriosam.</a>
                            <footer class="blockquote-footer">Sunday, 29 August 2021</footer>
                        </blockquote>
                        <a href="#" class="btn btn-primary">Read News</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- list news --}}
<div class="section padding-top-bottom-small background-white over-hide">
    <div class="container">
        <div class="row">
            @foreach ($news as $n)
            <div class="col-sm-4">
                <div class="item">
                    <div class="team-box-1 all-padding background-white drop-shadow text-center mt-5">
                        <a style="text-decoration:none; color: black" href="">
                            <img class="mb-4" src="{{ asset('/berita/' . $n->foto) }}" alt="" />
                            <h6 class="mb-4">{{ $n->judul }}</h6>
                            {{ $n->konten }}
                        </a>
                        <p>{{ date('D, d F Y', strtotime($n->updated_at)) }}</p>
                        <button style="color: white" style="color: white" type="button" class="btn btn-outline-info">Read</button>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-sm-4">
                <div class="item">
                    <div class="team-box-1 all-padding background-white drop-shadow text-center mt-5">
                        <a style="text-decoration:none; color: black" href="">
                            <img class="mb-4" src="{{URL::asset('frontend')}}/img/kunjungan.jpeg" alt="" />
                            <h6 class="mb-4">Marco Kulis</h6>
                            Design must reflect the practical in business but above all... good design must
                            primarily serve people.
                        </a>
                        <p>Sunday, 29 August 2021</p>
                        <button style="color: white" type="button" class="btn btn-outline-info">Read</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="item">
                    <div class="team-box-1 all-padding background-white drop-shadow text-center mt-5">
                        <a style="text-decoration:none; color: black" href="">
                            <img class="mb-4" src="{{URL::asset('frontend')}}/img/kunjungan.jpeg" alt="" />
                            <h6 class="mb-4">Marco Kulis</h6>
                            Design must reflect the practical in business but above all... good design must
                            primarily serve people.
                        </a>
                        <p>Sunday, 29 August 2021</p>
                        <button style="color: white" type="button" class="btn btn-outline-warning">Read</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="item">
                    <div class="team-box-1 all-padding background-white drop-shadow text-center mt-5">
                        <a style="text-decoration:none; color: black" href="">
                            <img class="mb-4" src="{{URL::asset('frontend')}}/img/kunjungan.jpeg" alt="" />
                            <h6 class="mb-4">Marco Kulis</h6>
                            Design must reflect the practical in business but above all... good design must
                            primarily serve people.
                        </a>
                        <p>Sunday, 29 August 2021</p>
                        <button style="color: white" type="button" class="btn btn-outline-info">Read</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="item">
                    <div class="team-box-1 all-padding background-white drop-shadow text-center mt-5">
                        <a style="text-decoration:none; color: black" href="">
                            <img class="mb-4" src="{{URL::asset('frontend')}}/img/kunjungan.jpeg" alt="" />
                            <h6 class="mb-4">Marco Kulis</h6>
                            Design must reflect the practical in business but above all... good design must
                            primarily serve people.
                        </a>
                        <p>Sunday, 29 August 2021</p>
                        <button style="color: white" type="button" class="btn btn-outline-info">Read</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="item">
                    <div class="team-box-1 all-padding background-white drop-shadow text-center mt-5">
                        <a style="text-decoration:none; color: black" href="">
                            <img class="mb-4" src="{{URL::asset('frontend')}}/img/kunjungan.jpeg" alt="" />
                            <h6 class="mb-4">Marco Kulis</h6>
                            Design must reflect the practical in business but above all... good design must
                            primarily serve people.
                        </a>
                        <p>Sunday, 29 August 2021</p>
                        <button style="color: white" type="button" class="btn btn-outline-info">Read</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-toolbar padding-top-small justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
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