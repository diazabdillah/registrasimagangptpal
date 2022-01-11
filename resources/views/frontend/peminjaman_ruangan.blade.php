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
                    <h3>Peminjaman Ruangan</h3>
                </div>
                <h5 style="color: rgb(208, 208, 208)">
                    <a style="text-decoration:none; color:white" href="{{URL('/')}}">Home</a> /
                    <a style="text-decoration:none; color:white" href="{{URL('services')}}">Services</a> / 
                    Peminjaman Ruangan
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
<div class="section padding-top-bottom-1 background-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary" align="center">{{ $ti }}</h6>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card shadow mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('uploadPeminjamanRuangan') }}" enctype="multipart/form-data">
                                        @csrf
                                        <!-- Input Pilih Ruangan -->
                                        <div class="form-group">
                                            <small class="ml-2">Pilih Ruangan</small>
                                            <input type="text" class="form-control" id="pilih_ruangan" name="pilih_ruangan">
                                        </div>
                                        <!-- Input Nama Peminjaman -->
                                        <div class="form-group">
                                            <small class="ml-2">Nama Peminjam</small>
                                            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam">
                                        </div>       
                                        <!-- Input Nama Divisi -->
                                        <div class="form-group">
                                            <small class="ml-2">Divisi</small>
                                            <input type="text" class="form-control" id="divisi" name="divisi">
                                        </div>
                                        <!-- Input Nama Departemen -->
                                        <div class="form-group">
                                            <small class="ml-2">Departemen</small>
                                            <input type="text" class="form-control" id="departemen" name="departemen">
                                        </div>     
                                        <!-- Input Nomor Telpon -->
                                        <div class="form-group">
                                            <small class="ml-2">No. Telp</small>
                                            <input type="text" class="form-control" id="no_telp" name="no_telp">
                                        </div>
                                        <!-- Input Tanggal Mulai -->
                                        <div class="form-group">
                                            <small class="ml-2">Tanggal Mulai</small>
                                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                                        </div>  
                                        <!-- Input Tanggal Selesai -->
                                        <div class="form-group">
                                            <small class="ml-2">Tanggal Selesai</small>
                                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                                        </div>   
                                        <!-- Input Jam Mulai -->
                                        <div class="form-group">
                                            <small class="ml-2">Jam Mulai</small>
                                            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai">
                                        </div>
                                        <!-- Input Jam Selesai -->
                                        <div class="form-group">
                                            <small class="ml-2">Jam Selesai</small>
                                            <input type="time" class="form-control" id="jam_selesai" name="jam_selesai">
                                        </div>
                                        <!-- Input Keperluan -->
                                        <div class="form-group">
                                            <small class="ml-2">Keperluan</small>
                                            <input type="text" class="form-control" id="keperluan" name="keperluan">
                                        </div>                                    
                                        <button type="submit" class="btn btn-primary btn-lg btn-block mt-5 p-1">Kirim <i
                                                class="fas fa-paper-plane"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid">
    <div class="card-1 Menu mb-4">
        <div class="card-1 shadow">
            <div class="card-header-1 py-3">
                <h6 class="m-0 font-weight-bold text-primary-1">Daftar Ruangan</h6>
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
                                        Nama Ruangan
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex justify-content-center">
                                        Fasilitas
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex justify-content-center">
                                        Kapasitas
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex justify-content-center">
                                        Foto Ruangan
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex justify-content-center">
                                        Status
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataRuangan as $dr)
                            <tr class="text-center">
                                <td>{{ $dataRuangan->firstItem() + ++$i - 1 }}.</td>
                                <td>{{ $dr->nama_ruangan }}</td>
                                <td>{{ $dr->fasilitas }}</td>
                                <td>{{ $dr->kapasitas }}</td>
                                <td>
                                    <a style="color: white" class="btn btn-outline-info" data-toggle="modal" data-target="#staticBackdrop{{$dr->id}}">
                                        Detail
                                    </a>
                                </td>
                                <td>
                                    @if ( $dr->status == 'Available')
                                        <div class="btn btn-success">Available</div>
                                    @elseif ( $dr->status == 'Unavailable')
                                        <div class="btn btn-danger">Unavailable</div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">
                        {{ $dataRuangan->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($dataRuangan as $dr)
<div class="modal fade default search-modal" id="staticBackdrop{{$dr->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <img class="center" src="{{ asset('/Foto Ruangan/' . $dr->foto_ruangan) }}" alt="" />
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