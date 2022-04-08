<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="theme-color" content="#212121"/>
    <meta name="msapplication-navbutton-color" content="#212121"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="#212121"/>

	<!-- Web Fonts
	================================================== -->
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600,600i,700,700i" rel="stylesheet"/>

	<!-- CSS
	================================================== -->
	<link rel="stylesheet" href="{{URL::asset('frontend')}}/css/bootstrap.min.css"/>
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
	<link rel="stylesheet" href="{{URL::asset('frontend')}}/fontawesome/css/brands.css"/>
	<link rel="stylesheet" href="{{URL::asset('frontend')}}/fontawesome/css/fontawesome.css"/>
	<link rel="stylesheet" href="{{URL::asset('frontend')}}/fontawesome/css/solid.css"/>
	<link rel="stylesheet" href="{{URL::asset('frontend')}}/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="{{URL::asset('frontend')}}/css/mind-icons-line.css"/>
	<link rel="stylesheet" href="{{URL::asset('frontend')}}/css/funky-style.css"/>
	<link rel="stylesheet" href="{{URL::asset('frontend')}}/css/owl.carousel.css"/>
	<link rel="stylesheet" href="{{URL::asset('frontend')}}/css/owl.transitions.css"/>
	<link rel="stylesheet" href="{{URL::asset('frontend')}}/css/colors/color-green.css"/>

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" type="image/png" href="{{URL::asset('frontend')}}/img/pal.jpg"/>
	<link rel="icon" type="image/png" href="{{URL::asset('frontend')}}/img/pal.jpg">
	<link rel="apple-touch-icon" href="{{URL::asset('frontend')}}/img/pal.jpg">
	<link rel="apple-touch-icon" sizes="72x72" href="{{URL::asset('frontend')}}/img/pal.jpg">
	<link rel="apple-touch-icon" sizes="114x114" href="{{URL::asset('frontend')}}/img/pal.jpg">
<!-- Custom fonts for this template-->
<link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
{{-- Fonts Poppins --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<style>
	.dropdown-submenu{
position: relative;
}
.dropdown-submenu a::after{
transform: rotate(-90deg);
position: absolute;
right: 3px;
top: 40%;
}
.dropdown-submenu:hover .dropdown-menu, .dropdown-submenu:focus .dropdown-menu{
display: flex;
flex-direction: column;
position: absolute !important;
margin-top: -30px;
left: 100%;
}
@media (max-width: 992px) {
.dropdown-menu{
	width: 50%;
}
.dropdown-menu .dropdown-submenu{
	width: auto;
}
}

</style>
</head>
<body class="royal_preloader">

	<div id="royal_preloader"></div>


	<!-- Nav and Logo
	================================================== -->

	<div style="background-color: #000B31;" id="menu-wrap" class="cbp-af-header black-menu-background-1st-trans menu-fixed-padding-small menu-shadow">
		<div class="container nav-top-bar">
			<div class="d-flex flex-row justify-content-between" style="align-items:center">		
				<img style="width:20%" src="{{URL::asset('frontend')}}/img/BUMN-PAL-R1.png">
				<p>
					<i class="fa fa-phone ml-2 mr-1"></i> +62 31-3292275 (Hunting) ext. 2243
				</p>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse bg-faded nav-line-top">
						<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavMenuMain" aria-controls="navbarNavMenuMain" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse justify-content-center" id="navbarNavMenuMain">
							<ul class="navbar-nav">
								<li class="nav-item dropdown mega-menu {{ Request::is('/')? "active":"" }}">
									<a class="nav-link" href="{{('/')}}">
										Home
									</a>
								</li>
								<li class="nav-item dropdown {{ Request::is('profile')? "active":"" }}">
									<a class="nav-link" href="{{('profile')}}">
										Profile
									</a>
								</li>
								<li class="nav-item dropdown mega-menu {{ Request::is('news')? "active":"" }}">
									<a class="nav-link" href="{{('news')}}">
										News
									</a>
								</li>
								<li class="nav-item dropdown mega-menu {{ Request::is('gallery')? "active":"" }}">
									<a class="nav-link" href="{{('gallery')}}">
										Gallery
									</a>
								</li>
								<li class="nav-item dropdown {{ Request::is('services')? "active":"" }}">
									<a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Services
									</a>
									<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
										<li><a class="dropdown-item" href="#">Human Capital Services</a></li>
										<li><a class="dropdown-item" href="#">Organization Development</a></li>
										<li><a class="dropdown-item" href="#">Organization LSP</a></li>
										<li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" data-toggle="dropdown" href="#">Human Capital Development</a>
										  <ul class="dropdown-menu">
											<a class="dropdown-item" href="{{('info_beasiswa')}}">Info Beasiswa</a>
											<a class="dropdown-item" href="{{('training')}}">Training</a>
											<a class="dropdown-item" href="{{('peminjaman_ruangan')}}">Peminjaman Ruangan</a>
											<a class="dropdown-item" href="{{('mekanisme_layanan')}}">Mekanisme Layanan</a>
											<a class="dropdown-item" href="{{('unit_kerja')}}">Informasi Unit Kerja</a>
											<a class="dropdown-item" href="{{('informasi_lsp')}}">Informasi LSP PAL</a>
										  </ul>
										</li>
									  </ul>
								</li>
								<li class="nav-item dropdown {{ Request::is('contact')? "active":"" }}">
									<a class="nav-link" href="{{URL('contact')}}">
										Contact Us
									</a>
								</li>
								<li class="nav-item dropdown {{ Request::is('internship')? "active":"" }}">
									<a class="nav-link" href="{{('internship')}}">
										Info Internship
									</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link colored-prim" href="{{URL('login')}}">
										Internship
									</a>
								</li>
								<li class="nav-item icons-item-menu modal-search">
									<a class="nav-link" href="#" data-toggle="modal" data-target="#Modal-search"><i class="fa fa-search"></i></a>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>


	<!-- Search -->
	<div class="modal fade default search-modal" id="Modal-search" tabindex="-1" role="dialog" aria-hidden="true">
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
								<div class="col-md-6">
									<input type="search" value="" placeholder="Search" class="form-control" />
									<button class="btn btn-primary btn-icon btn-round" type="submit" value="search">
										<i class="fa fa-search"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@yield('body')


	<!-- Footer Light Block
	================================================== -->

	<div class="section padding-top background-image-cover-top over-hide footer-1" style="padding-bottom:0px !important;background-image: url('{{URL::asset('frontend')}}/img/footer-7.png')">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h6>Product & Solution</h6>
					<ul style="color: black" class="list-style">
						<li><a style="color: black" href="ship-building">Ship Building</a></li>
						<li><a style="color: black" href="rekayasa-umum">Rekayasa Umum</a></li>
						<li><a style="color: black" href="maintenance-repair-overhaul">Perbaikan & Pemeliharaan</a></li>
						<li><a style="color: black" href="fasilitas">Fasilitas</a></li>
						<li><a style="color: black" href="penyedia-solusi">Penyedia Solusi</a></li>
					</ul>
				</div>
				<div class="col-md-3 mt-4 mt-md-0">
					<h6>About Us</h6>
					<ul style="color: black" class="list-style">
						<li><a style="color: black" href="profile">Divisi HCM</a></li>
						<li><a style="color: black" href="human-capital-services">Departemen HCS</a></li>
						<li><a style="color: black" href="human-capital-development">Departemen HCD</a></li>
						<li><a style="color: black" href="organization-development-and-command-media">Departemen ODCM</a></li>
						<li><a style="color: black" href="lembaga-sertifikasi-profesi">Departemen LSP</a></li>
					</ul>
				</div>
				<div class="col-md-3 mt-4 mt-md-0">
					<h6>Others</h6>
					<ul style="color: black" class="list-style">
						<li><a style="color: black" href="news">News</a></li>
						<li><a style="color: black" href="services">Services</a></li>
						<li><a style="color: black" href="contact">Contact Us</a></li>
						<li><a style="color: black" href="internship">Internship</a></li>
						<li><a style="color: black" href="auth">Create Account</a></li>
					</ul>
				</div>
				<div style="color: black" class="col-md-3 mt-4 mt-md-0 logo-footer-100">
					<img style="width: 250px" src="{{URL::asset('frontend')}}/img/BUMN-PAL-R1.png" alt="" class="mb-5">
					<div  class="separator-wrap">
						<span class="separator"><span class="separator-line dashed"></span></span>
					</div>
					<ul class="list-style mt-3 mb-3">
						<li><i class="fa fa-envelope-o"></i><a href="mailto:hcm@pal.co.id"></a>hcm@pal.co.id</li>
						<li><i class="fa fa-phone"></i>+62 31-3292275 (Hunting) ext. 2243</li>
						{{-- <li><i class="fa fa-skype"></i><a href="#">FunkyOnSkype</a></li> --}}
					</ul>
					<div class="separator-wrap">
						<span class="separator"><span class="separator-line dashed"></span></span>
					</div>
				</div>
			</div>
		</div>
		<div class="container scd-foot padding-top-small padding-bottom-smaller">
			<div class="row">
				<div style="color: black" class="col-md-6">
					<?php
						$tgl = date('Y');
						echo "<p>Copyright  &copy; PT PAL " . $tgl . " Powered By ANAK IT PENS 19</p>";
					?>
					{{-- <p>© 2021 . Powerd with <i class="fa fa-heart"></i> by <a href="https://themeforest.net/user/ig_design/portfolio?ref=IG_design" target="_blank">Anak PENS</a>!</p> --}}
				</div>
				<div class="col-md-6">
					<ul  class="footer-social">
						<li style="color: black" class="twitter">
							<a href="https://twitter.com/PTPAL_INDONESIA">Tw</a>
						</li>
						<li style="color: black" class="facebook">
							<a href="https://web.facebook.com/PenataranAngkatanLaut">Fb</a>
						</li>
						<li style="color: black" class="instagram">
							<a href="https://www.instagram.com/ptpal_indonesia/">Ig</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>


	<div class="scroll-to-top"><i class="fa fa-angle-up"></i></div>

	<!-- JAVASCRIPT
    ================================================== -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{URL::asset('frontend')}}/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="{{URL::asset('frontend')}}/js/royal_preloader.min.js"></script>
	<script type="text/javascript" src="{{URL::asset('frontend')}}/js/tether.min.js"></script>
	<script type="text/javascript" src="{{URL::asset('frontend')}}/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{URL::asset('frontend')}}/js/plugins.js"></script>
	<script type="text/javascript" src="{{URL::asset('frontend')}}/js/custom/custom-company.js"></script>

</html>
