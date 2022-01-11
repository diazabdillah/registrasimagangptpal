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

{{-- list gallery --}}
<div class="section padding-top background-white over-hide">
    <div class="container-fluid">
		<div class="row transform-y-120 transform-on-mob">
            @foreach ($gallery as $g)
                @if ($g->url == '0')
                    <div class="col-sm-4 mb-5">
                        <div class="item">
							<a data-toggle="modal" data-target="#staticBackdrop{{$g->id}}">
								<div class="portfolio-box-1 dark rounded">
									<div class="embed-responsive embed-responsive-16by9" width="30">
                                    	<img class="mb-4 embed-responsive-item" src="{{ asset('/galeri/' . $g->foto) }}" alt=""/>
                                    </div> 
									<div class="portfolio-mask-2 rounded"></div>
									<h5 class="on-center text-center">{{ $g->judul }}</h5>
								</div>
							</a>
						</div>
                    </div>
                @elseif ($g->foto == '0')
                    <div class="col-sm-4 mb-5">
                        <div class="item">
							<a data-toggle="modal" data-target="#Modal-video{{$g->id}}">
								<div class="portfolio-box-1 dark rounded">
									<div class="embed-responsive embed-responsive-16by9" width="30">
                                        <iframe class="mb-4 embed-responsive-item" src="{{ $g->url }}" frameborder="0" allowfullscreen></iframe>
                                    </div> 
									<div class="portfolio-mask-2 rounded"></div>
									<h5 class="on-center text-center">{{ $g->judul }}</h5>
								</div>
							</a>
						</div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="btn-toolbar padding-top-small justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
            <nav aria-label="Page navigation example">
                {{ $gallery->links() }}
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


<!-- Modal Foto -->
@foreach ($gallery as $g)
<div class="modal fade default search-modal" id="staticBackdrop{{$g->id}}" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header justify-content-end">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"></span>
				</button>
			</div>
			<div class="modal-body">
				<div class="hero-center-wrap move-top">
					<div class="container-fluid">
                        <div class="row justify-content-center">
							<div class="col-md-8">
                                <div class="video-section">
                                    <figure class="vimeo rounded-2 over-hide">
                                            <img class="center" src="{{ asset('/galeri/' . $g->foto) }}" alt="" />
                                    </figure>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach

<!-- Modal Video -->
@foreach ($gallery as $g)
<div class="modal fade default search-modal" id="Modal-video{{$g->id}}" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header justify-content-end">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"></span>
				</button>
			</div>
			<div class="modal-body">
				<div class="hero-center-wrap move-top">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-md-8">
								<div class="video-section">
									<figure class="vimeo rounded-2 over-hide">
										<iframe class="rounded-2 over-hide" src="{{ $g->url }}" title="{{ $g->judul }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen width="560" height="315"></iframe>
									</figure>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach

<!-- Pricing Block
	================================================== -->
<script>
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
    $(function() {
		$('.modal').on('hidden.bs.modal', function(e) {
			$iframe = $(this).find("iframe");
			$iframe.attr("src", $iframe.attr("src"));
		});
	});
</script>
@endsection