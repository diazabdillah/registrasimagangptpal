@extends('core-front.head')
@section('title','HCM PT. PAL Indonesia (Persero)')
@section('body')
<!-- Hero Block
	================================================== -->

<div class="section full-height-2 over-hide">
	<div class="parallax" style="background-image: url('frontend/img/bg-1.jpeg')"></div>
	<div class="grey-fade-over"></div>
	<div class="hero-center-wrap move-top-on-mob z-bigger">
		<div class="container parallax-fade-top">
			<div class="d-flex justify-content-center">
				<h1 class="color-white" style="text-align: center;">Welcome To <br> Divisi Human Capital Management</h1>
			</div>
			<br><br>
			<div class="d-flex justify-content-center">
				<img width="40%" src="{{asset('frontend/img/industri-maritim.png')}}">
			</div>
				<br>
			<div class="d-flex justify-content-center">
				<img width="20%" src="{{asset('frontend/img/logo.png')}}">
			</div>
			<br>
			<div class="d-flex justify-content-center">
				<p style="color: white;text-align:center;">PT .	PAL	INDONESIA<br>
The   Best   Maritime   Industry</p>
			</div>
		</div>
	</div>
</div>

<!-- Modal With Video
	================================================== -->

<div class="modal fade default search-modal" id="Modal-video" tabindex="-1" role="dialog" aria-hidden="true">
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
										<iframe class="rounded-2 over-hide" src="https://www.youtube.com/embed/ttut2i4Ivcg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen width="560" height="315"></iframe>
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

<!-- Half Blocks Grid
	================================================== -->

<div id="profile" class="section background-white z-bigger-2 mb-6">
	<div class="container">
		<div class="row">
			<div class="col-md-12 transform-y-120 transform-on-mob">
				<div class="grid-wraper background-dark rounded-2 drop-shadow over-hide">
					<div class=" float-inline height-50-block background-image-cover" style="background-image: url('frontend/img/BLOCK-BERJALAN.MP4_snapshot_02.26_2021.08.24_10.06.27.jpg')">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Services Block
	================================================== -->

<div class="section background-white over-hide">
	<div class="container">
		<div class="main-title on-light text-center">
			<h3>Internship</h3>
			<div class="row">
				<div class="col-md-4 mt-4 mt-md-0" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
					<a href="prosedur" class="btn-link btn-primary">
						<div class="services-box-1 border-on-light text-center">
							<div class="icon-in-box rounded-circle mg-auto"><i class="funky-ui-icon icon-Support"></i></div>
							<h5 class="mt-4">Prosedur</h5>
						</div>
					</a>
				</div>
				<div class="col-md-4 mt-4 mt-md-0" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
					<a href="formatLaporan" class="btn-link btn-primary">
						<div class="services-box-1 border-on-light text-center">
							<div class="icon-in-box rounded-circle mg-auto"><i class="funky-ui-icon icon-Split-FourSquareWindow"></i></div>
							<h5 class="mt-4">Format Laporan</h5>
						</div>
					</a>
				</div>
				<div class="col-md-4" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
					<a href="kuotas" class="btn-link btn-primary">
						<div class="services-box-1 border-on-light text-center">
							<div class="icon-in-box rounded-circle mg-auto"><i class="funky-ui-icon icon-Monitor-phone"></i></div>
							<h5 class="mt-4">Kuota</h5>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Work Title Block
	================================================== -->

<div class="section padding-top-bottom over-hide">
	<div class="parallax-1" style="background-image: url('frontend/img/FASILITAS-KAPAL-SELAM-3.jpg')"></div>
	<div class="grey-fade-over"></div>
	<div class="container z-bigger">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="main-title on-dark text-center">
					<div class="main-subtitle-top mb-4">Gallery</div>
					<h3>We Take Pride In Delivering Only The Best.</h3>
					<div class="main-subtitle-bottom mt-3"><a style="color: rgb(30, 206, 50)" href="gallery">Read More</a></div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Work Block
	================================================== -->

<div class="section background-white z-bigger">
	<div class="container-fluid">
		<div class="row transform-y-120 transform-on-mob">
			<div class="work-slider-wrap mb-4">
				<div id="owl-work" class="owl-carousel owl-theme">
					@foreach($gallery as $g)
						@if ($g->url == '0')
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
						@elseif ($g->foto == '0')
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
						@endif
					@endforeach
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

<!-- Separator Line
	================================================== -->

<div class="section padding-top-bottom-1 background-white">
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

<!-- Text Chart & Progress Bars
	================================================== -->

<div class="section padding-top-bottom background-dark-2 over-hide">
	<div class="container">
		<div class="row">
			<div class="col-md-1 mt-md-0">
			</div>
			<div class="col-md-2 mt-md-0">
				<a href="naval-shipbuilding">
					<img src="{{URL::asset('frontend')}}/img/KCR-220x146.png" class="img-120 mx-auto" alt="" />
				</a>
				<h5 style="color: white">Naval Shipbuilding</h5>
			</div>
			<div class="col-md-2 mt-4 mt-md-0">
				<a href="submarine">
					<img src="{{URL::asset('frontend')}}/img/KASEL-FIX-220x146.png" class="img-120 mx-auto" alt="" />
				</a>
				<h5 style="color: white">Submarine</h5>
			</div>
			<div class="col-md-2 mt-4 mt-md-0">
				<a href="merchant-shipbuilding">
					<img src="{{URL::asset('frontend')}}/img/Niaga-220x146.png" class="img-120 mx-auto" alt="" />
				</a>
				<h5 style="color: white">Merchant Shipbuilding</h5>
			</div>
			<div class="col-md-2 mt-4 mt-md-0">
				<a href="energy">
					<img src="{{URL::asset('frontend')}}/img/BMPP-220x146.png" class="img-120 mx-auto" alt="" />
				</a>
				<h5 style="color: white">Energy</h5>
			</div>
			<div class="col-md-2 mt-4 mt-md-0">
				<a href="maintenance-repair-overhaul">
					<img src="{{URL::asset('frontend')}}/img/MLM-FIX-220x146.png" class="img-120 mx-auto" alt="" />
				</a>
				<h5 style="color: white">Maintenance, Repair, & Overhaul</h5>
			</div>
		</div>
	</div>
</div>

<!-- Team Block
	================================================== -->

<div class="section padding-top-bottom background-grey over-hide">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="main-title text-center">
					{{-- <div class="main-subtitle-top mb-4">our team</div> --}}
					<h3>News</h3>
					{{-- <div class="main-subtitle-bottom mt-3">only the best</div>	 --}}
				</div>
			</div>
			<div class="clear"></div>
			<div class="team-slider-wrap">
				<div id="owl-team-1" class="owl-carousel owl-theme">
					@foreach ($news as $n)
					<div class="item">
						<div class="team-box-1 all-padding background-white drop-shadow text-center mt-5">
							<a style="text-decoration:none; color: black" href="{{ url('detail-news/' . $n->id) }}">
								<img class="mb-4" src="{{ asset('/berita/' . $n->foto) }}" alt="" />
								<h6 class="mb-4">{{ $n->judul }}</h6>
								{{ $n->headline}}
							</a>
							<p>{{ date('D, d F Y', strtotime($n->updated_at)) }}</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<p style="padding-top: 10px"><a href="news">News More</a></p>
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

<!-- Quote Block
	================================================== -->

<div class="section padding-top-bottom background-white">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="quote-box-1 text-center">
					<i class="funky-ui-icon icon-Anchor-2"></i>
					<h5 class="mt-5 mb-5">"The philosophy of continuous improvement is that today must be better than yesterday and tomorrow must be better than today."</h5>
					<h4>HCM PT. PAL Indonesia (Persero)</h4>
					{{-- <p class="mt-2">some magazine</p> --}}
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Separator Line
	================================================== -->

{{-- <div class="section padding-top-bottom-1 background-white">
		<div class="container">	
			<div class="row">
				<div class="col-md-12">	
					<div class="separator-wrap">	
						<span class="separator"><span class="separator-line dashed"></span></span>
					</div>
				</div>
			</div>
		</div>		
	</div> --}}

<!-- Blog Block
	================================================== -->

{{-- <div class="section padding-top-bottom background-white over-hide">
		<div class="container">
			<div class="row">
				<div class="col-xl-4">	
					<div class="main-title text-left">
						<div class="main-subtitle-top mb-4">latest news</div>
						<h4>Add your creation to<br>our collections.</h4>
						<div class="main-subtitle-bottom smaller mt-3">you inspired me</div>	
					</div>
				</div>
				<div class="col-xl-8">
					<div class="blog-box-2">
						<div class="post-link-box mb-2" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
							<p>May 4, 2017</p>
							<a href="post.html" class="tipped" data-title="by <em>Marco Kulis</em>" data-tipper-options='{"direction":"top","follow":"true","margin":30}'><h5>We want to share with you our mood after selection.</h5></a>
						</div>
						<div class="post-link-box mb-2" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
							<p>May 1, 2017</p>
							<a href="post.html" class="tipped" data-title="by <em>Marco Kulis</em>" data-tipper-options='{"direction":"top","follow":"true","margin":30}'><h5>Sleep, code, eat, travel. Repeat.</h5></a>
						</div>
						<div class="post-link-box mb-2" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
							<p>April 28, 2017</p>
							<a href="post.html" class="tipped" data-title="by <em>Marco Kulis</em>" data-tipper-options='{"direction":"top","follow":"true","margin":30}'><h5>Don’t get lost quoting your next projects.</h5></a>
						</div>
						<div class="post-link-box mb-2" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
							<p>April 23, 2017</p>
							<a href="post.html" class="tipped" data-title="by <em>Marco Kulis</em>" data-tipper-options='{"direction":"top","follow":"true","margin":30}'><h5>Don´t give up, keep on focus.</h5></a>
						</div>
						<div class="post-link-box mb-2" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
							<p>April 15, 2017</p>
							<a href="post.html" class="tipped" data-title="by <em>Marco Kulis</em>" data-tipper-options='{"direction":"top","follow":"true","margin":30}'><h5>Moments from a life. Day of photography.</h5></a>
						</div>
						<div class="post-link-box mb-2" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
							<p>March 26, 2017</p>
							<a href="post.html" class="tipped" data-title="by <em>Marco Kulis</em>" data-tipper-options='{"direction":"top","follow":"true","margin":30}'><h5>The golden rule of modern webdesign. Moments from a life.</h5></a>
						</div>
						<div class="post-link-box mb-2" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
							<p>March 17, 2017</p>
							<a href="post.html" class="tipped" data-title="by <em>Marco Kulis</em>" data-tipper-options='{"direction":"top","follow":"true","margin":30}'><h5>Design is the method of putting form and content together.</h5></a>
						</div>
						<div class="post-link-box mb-2" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
							<p>March 13, 2017</p>
							<a href="post.html" class="tipped" data-title="by <em>Marco Kulis</em>" data-tipper-options='{"direction":"top","follow":"true","margin":30}'><h5>Design is so simple, that's why it is so complicated.</h5></a>
						</div>
						<div class="post-link-box mb-2" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
							<p>March 05, 2017</p>
							<a href="post.html" class="tipped" data-title="by <em>Marco Kulis</em>" data-tipper-options='{"direction":"top","follow":"true","margin":30}'><h5>How you look at it is pretty much how you'll see it.</h5></a>
						</div>
						<div class="post-link-box mb-2" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
							<p>March 04, 2017</p>
							<a href="post.html" class="tipped" data-title="by <em>Marco Kulis</em>" data-tipper-options='{"direction":"top","follow":"true","margin":30}'><h5>Don’t get lost quoting your next projects.</h5></a>
						</div>
						<div class="post-link-box" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
							<p>March 03, 2017</p>
							<a href="post.html" class="tipped" data-title="by <em>Marco Kulis</em>" data-tipper-options='{"direction":"top","follow":"true","margin":30}'><h5>The golden rule of modern webdesign. Moments from a life.</h5></a>
						</div>
					</div>
				</div>
			</div>	
		</div>		
	</div> --}}

<!-- Subscribe Block
	================================================== -->

{{-- <div id="contact" class="section padding-top-bottom background-dark">
		<div  class="container">	
			<div class="row justify-content-center">
				<div class="col-md-12 text-center">
					<h4 class="mb-5 color-white">Contacts</h4>
					<div class="subscribe-box-1 dark">
                        <div class="row justify-content-center">
				<div class="col-md-4">	
					<div class="subscribe-box-1">
						<input type="text" value="" placeholder="Your Name *" class="form-control" />
					</div>		
				</div>
				<div class="col-md-4 mt-4 mt-md-0">	
					<div class="subscribe-box-1">
						<input type="text" value="" placeholder="Company" class="form-control" />
					</div>		
				</div>
				<div class="clear"></div>
				<div class="col-md-4 mt-4">	
					<div class="subscribe-box-1">
						<input type="text" value="" placeholder="Phone" class="form-control" />
					</div>		
				</div>
				<div class="col-md-4 mt-4">	
					<div class="subscribe-box-1">
						<input type="text" value="" placeholder="Email *" class="form-control" />
					</div>		
				</div>
				<div class="clear"></div>
				<div class="col-md-8 mt-4">	
					<div class="subscribe-box-1">
						<textarea style="color: white" name="message"  placeholder="Tell Us Everything *" class="for-textarea form-control" ></textarea>
					</div>		
				</div>
				<div class="clear"></div>
				<div class="col-md-12 text-center pt-5">	
					<div class="checkbox primary line-icon on-light">
						<input id="checkboxForm" type="checkbox">
						<label for="checkboxForm">
							I'm not a robot
						</label>
					</div>
				</div>
				<div class="col-md-12 mt-5 text-center">
					<button class="btn btn-primary btn-round btn-long" type="button">submit</button>		
				</div>
			</div>		
					</div>	
				</div>
			</div>
		</div>		
	</div> --}}

<script>
	$(function() {
		$('.modal').on('hidden.bs.modal', function(e) {
			$iframe = $(this).find("iframe");
			$iframe.attr("src", $iframe.attr("src"));
		});
	});
</script>
@endsection