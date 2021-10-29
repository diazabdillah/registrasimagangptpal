@extends('core-front.head-2')
@section('title','HCM PT. PAL Indonesia (Persero)')
@section('body')
<link rel="stylesheet" href="{{URL::asset('frontend')}}/diagram.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

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
                    <h3>Profile</h3>
                </div>
                <h5 style="color: rgb(208, 208, 208)">
                    <a style="text-decoration:none; color:white" href="{{URL('/')}}">Home</a> / Profile
                </h5>
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
						<div class="grid-box float-inline half height-50-block background-image-cover" style="background-image: url('{{URL::asset('frontend')}}/img/BLOCK-BERJALAN.MP4_snapshot_02.26_2021.08.24_10.06.27.jpg')">		
						</div>	
                        <div class="grid-box float-inline half height-50-block">
							<div class="section-center-wrap">	
								<div class="in-grid-wrap w-80 mg-auto">
									<div class="main-title mb-0 on-dark text-justify">
										{{-- <div class="main-subtitle-top mb-4">Tugas Pokok Divisi HCM & CM</div> --}}
										<h4>Tugas Pokok Divisi HCM</h4>
										<div class="main-subtitle-bottom smaller mt-3">
                                            <ul>
                                                <li>
                                                    Menjabarkan, menyusun strategi pelaksanaan kebijakan perusahaan beserta program kerja dalam bidang Human Capital Services, Diklat & pengembangan SDM dan Organisasi serta LSP sesuai dengan strategi bisnis perusahaan.
                                                </li><br>
                                                <li>
                                                    Merencanakan, mengkoordinasikan dan melaksanakan pengawasan sumber daya untuk pelaksanaan pekerjaan Human Capital Services, Diklat & pengembangan SDM dan Organisasi serta LSP.
                                                </li>
                                            </ul>
                                        </div>	
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

<div class="section padding-top-bottom-small background-white over-hide">
    <div class="container">
        <div class="row enter bottom move 40px over 0.8s after 0.2s" style="padding-right: 1%">
            <div class="col text-center">
                <h3>Struktur Organisasi</h3>
                <img style="width: 80%;" src="https://hcm.pal.co.id/assets_si/images/SO_HCM.png" class="rounded float-center animate__animated animate__bounce" alt="...">
            </div>
        </div><br>
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

        <div class="row enter bottom move 40px over 0.8s after 0.2s">
            <div class="col text-center"><br>
                <h3>Struktur Organisasi</h3>
                <img style="width: 90%;" src="https://hcm.pal.co.id/assets_si/images/hcm.JPG" class="rounded float-center animate__animated animate__bounce" alt="...">
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
                    <span class="separator"><span class="separator-line dashed"></span></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pricing Block
	================================================== -->

<div class="section padding-top-bottom background-black over-hide">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="main-title text-center">
                    <h3 class="mb-5 color-white">Departemen Kami</h3>
                </div>
            </div>
            <div class="clear"></div>
            <div class="col-md-3" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
                <a href="#" style="text-decoration:none">
                    <div class="pricing p-xl-5 background-image-cover text-center"
                        style="background-image: url('{{URL::asset('frontend')}}/img/pricing.jpg')">
                        <h5 class="color-white">Departemen Human Capital Services</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mt-3 mt-md-0" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
                <a href="#" style="text-decoration:none">
                    <div class="pricing p-xl-5 text-center background-image-cover"
                        style="background-image: url('{{URL::asset('frontend')}}/img/pricing.jpg')">
                        <h5 class="color-white">Departemen Human Capital Development</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mt-3 mt-md-0" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
                <a href="#" style="text-decoration:none">
                    <div class="pricing p-xl-5 background-image-cover text-center"
                        style="background-image: url('{{URL::asset('frontend')}}/img/pricing.jpg')">
                        <h5 class="color-white">Departemen Organization Development</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mt-3 mt-md-0" data-scroll-reveal="enter bottom move 40px over 0.8s after 0.2s">
                <a href="#" style="text-decoration:none">
                    <div class="pricing p-xl-5 background-image-cover text-center"
                        style="background-image: url('{{URL::asset('frontend')}}/img/pricing.jpg')">
                        <h5 class="color-white">Departemen Organization LSP</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
