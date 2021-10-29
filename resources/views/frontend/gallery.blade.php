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
                    <h3>Gallery</h3>
                </div>
                <h5 style="color: rgb(208, 208, 208)">
                    <a style="text-decoration:none; color:white" href="{{URL('/')}}">Home</a> / Gallery
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

{{-- list news --}}
<div class="section padding-top-bottom-small background-white over-hide">
    <div class="container">
            <div class="row">
                <div class="col-sm-4 mb-5" data-toggle="modal" data-target="#staticBackdrop">
                    <div class="item">
                        <div class="team-box-1 background-white drop-shadow text-center">
                            <a style="text-decoration:none; color: black">
                                <img class="mb-4" src="{{URL::asset('frontend')}}/img/kunjungan.jpeg" alt="" />
                                Design must reflect the practical in business but above all... good design must
                                primarily serve people.
                            </a>
                        </div>
                    </div>
                </div >
                <div class="col-sm-4 mb-5" data-toggle="modal" data-target="#staticBackdrop">
                    <div class="item">
                        <div class="team-box-1 background-white drop-shadow text-center">
                            <a style="text-decoration:none; color: black">
                                <img class="mb-4" src="{{URL::asset('frontend')}}/img/kunjungan.jpeg" alt="" />
                                Design must reflect the practical in business but above all... good design must
                                primarily serve people.
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-5" data-toggle="modal" data-target="#staticBackdrop">
                    <div class="item">
                        <div class="team-box-1 background-white drop-shadow text-center">
                            <a style="text-decoration:none; color: black">
                                <img class="mb-4" src="{{URL::asset('frontend')}}/img/kunjungan.jpeg" alt="" />
                                Design must reflect the practical in business but above all... good design must
                                primarily serve people.
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-5" data-toggle="modal" data-target="#staticBackdrop">
                    <div class="item">
                        <div class="team-box-1 background-white drop-shadow text-center">
                            <a style="text-decoration:none; color: black">
                                <img class="mb-4" src="{{URL::asset('frontend')}}/img/kunjungan.jpeg" alt="" />
                                Design must reflect the practical in business but above all... good design must
                                primarily serve people.
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-5" data-toggle="modal" data-target="#staticBackdrop">
                    <div class="item">
                        <div class="team-box-1 background-white drop-shadow text-center">
                            <a style="text-decoration:none; color: black">
                                <img class="mb-4" src="{{URL::asset('frontend')}}/img/kunjungan.jpeg" alt="" />
                                Design must reflect the practical in business but above all... good design must
                                primarily serve people.
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-5" data-toggle="modal" data-target="#staticBackdrop">
                    <div class="item">
                        <div class="team-box-1 background-white drop-shadow text-center">
                            <a style="text-decoration:none; color: black">
                                <img class="mb-4" src="{{URL::asset('frontend')}}/img/kunjungan.jpeg" alt="" />
                                Design must reflect the practical in business but above all... good design must
                                primarily serve people.
                            </a>
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


<!-- Modal -->
<div class="modal" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div  class="modal-xl">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        <button type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="false">x</span>
        </button>
      </div>
      <div class="modal-body">
        <img style="width: 100%" class="mb-4" src="{{URL::asset('frontend')}}/img/kunjungan.jpeg" alt="" />
      </div>
    </div>
  </div>
</div>

<!-- Pricing Block
	================================================== -->
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>
@endsection
