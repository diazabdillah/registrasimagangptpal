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
                    <h3>Internship</h3>
                </div>
                <h5 style="color: rgb(208, 208, 208)">
                    <a style="text-decoration:none; color:white" href="{{URL('/')}}">Home</a> / Internship
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

{{-- body --}}

<div class="container">
    <div class="row">
        <div class="col">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#prosedure" role="tab" aria-controls="home" aria-selected="true">Prosedure</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#laporan" role="tab" aria-controls="profile" aria-selected="false">Format Laporan</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#kuota" role="tab" aria-controls="contact" aria-selected="false">Kuota</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#materi" role="tab" aria-controls="contact" aria-selected="false">Materi</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="prosedure" role="tabpanel" aria-labelledby="home-tab">
            <img src="{{URL::asset('frontend')}}/img/Alur-Magang.jpg" class="rounded float-left mb-2" alt="..." style="width: 100%; display:inline-block">
        </div>
        <div class="tab-pane fade" id="laporan" role="tabpanel" aria-labelledby="profile-tab">
            <h4>Format Laporan Hasil Pemagangan</h4>
            <ol>
                <li>Lembar Pengesahan
                    <ul>
                        <li>Kadep HC Development</li>
                        <li>Pembimbing OJT (Kadep)</li>
                        <li>Kaprodi/Dosen Pembimbing</li>
                    </ul>
                </li>
                <li>Kata Pengantar</li>
                <li>Daftar Isi</li>
                <li>Daftar Gambar</li>
                <li>BAB I - Pedahuluan</li>
                <li>BAB II - Profile Perusahaan</li>
                <li>BAB III - Landasan Teori (Teori sesuai dengan bidang)</li>
                <li>BAB IV - Pembahasan (Hasil Pemagang)</li>
                <li>Daftar Pustaka</li>
                <li>Lampiran
                    <ul>
                        <li>Daftar Hadir</li>
                        <li>Laporan Kerja Mingguan dan Foto Dokumentasi</li>
                    </ul>
                </li>
            </ol>
        </div>
        <div class="tab-pane fade" id="kuota" role="tabpanel" aria-labelledby="contact-tab">
            <div class="container">
                <div class="card-1 Menu mb-4">
                    <div class="card-1 shadow">
                        <div class="card-header-1 py-3">
                            <h6 class="m-0 font-weight-bold text-primary-1">Daftar Skema BNSP</h6>
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
                                                    Divisi
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex justify-content-center">
                                                    Kuota Magang
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex justify-content-center">
                                                    Status Kuota
                                                </div>
                                            </th>
                                            <th>
                                                <div class="d-flex justify-content-center">
                                                    Tanggal Buka
                                                </div>
                                            </th>
                                                <div class="d-flex justify-content-center">
                                                    Tanggal Tutup
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kuota as $k)
                                        <tr class="text-center">
                                            <td>{{ $kuota->firstItem() + ++$i - 1 }}.</td>
                                            <td>{{ $k->divisi }}</td>
                                            <td>{{ $k->kuota }}</td>
                                            <td>{{ $k->status_kuota }}</td>
                                            <td>{{ $k->tanggal_buka }}</td>
                                            <td>{{ $k->tanggal_tutup }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pull-right">
                                    {{ $skema->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row justify-content-around">
                    <a href="#" class="btn-link btn-primary" data-toggle="modal" data-target="#modalKuotaMahasiswa">
                        <div class="services-box-1 border-on-light text-center">
                            <div class="icon-in-box rounded-circle mg-auto"><i class="funky-ui-icon icon-Monitor-phone"></i></div>
                            <h5 class="mt-4">Kuota Peserta Mahasiswa</h5>
                            {{-- <p class="mt-3 mb-4">Above all good design must primarily serve people.</p>	 --}}
                        </div>
                    </a>
                </div>
                <p>
                    **Untuk info lebih lanjut, silahkan menghubungi Departemen HC Development Divisi HCM & CM, PT PAL
                    Indonesia (Persero) dengan Pak Iwan Miharja (Telp: +62 31-3292275 (Hunting) ext. 2243)
                </p> -->
                <!-- The Modal -->
                <!-- <div class="modal fade" id="modalKuotaMahasiswa">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="card-1 Menu mb-4">
                                        <div class="card-1 shadow">
                                            <div class="card-header-1 py-3">
                                                <h6 class="m-0 font-weight-bold text-primary-1">Kuota Peserta Mahasiswa</h6>
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
                                                                        Divisi
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="d-flex justify-content-center">
                                                                        Kuota Magang
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="d-flex justify-content-center">
                                                                        Status Kuota
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="d-flex justify-content-center">
                                                                        Tanggal Buka
                                                                    </div>
                                                                </th>
                                                                    <div class="d-flex justify-content-center">
                                                                        Tanggal Tutup
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="tab-pane fade" id="materi" role="tabpanel" aria-labelledby="contact-tab">
            <div class="card mb-3">
                <div class="card border">
                    <div class="card-header bg-transparent border">1. Formulir Penilaian Magang</div>
                    <div class="card-body text container">
                        <p class="text">Bagi para peserta magang baik mahasiswa/siswa wajib mendownload formulir
                            tersebut setelah mendekati tanggal selesai magang dan di isi oleh pembimbing lapangan untuk
                            di kirim ke Dep.HC Development dan akan segera di terbitkan sertifikat.</p>
                    </div>
                    <div class="card-footer bg-transparent border">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="https://hcm.pal.co.id/upload/filemagang/Form_Penilaian_Magang.pdf" class="btn btn-primary pull-right" style="padding: 2px 10px;"><i class="fa fa-download"></i></a>
                            </li>
                            <li style="font-size: 12px" class="list-inline-item">Sunday, 29 August 2021</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card border">
                    <div class="card-header bg-transparent border">2. Lampiran Form Penilaian</div>
                    <div class="card-body text container">
                        <p class="text">Bagi para peserta magang baik mahasiswa/siswa wajib mendownload Lampiran formulir penilaian tersebut setelah mendekati tanggal selesai magang dan di isi oleh pembimbing lapangan untuk di kirim ke Dep.HC Development dan akan segera di terbitkan sertifikat.</p>
                    </div>
                    <div class="card-footer bg-transparent border">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="https://hcm.pal.co.id/upload/filemagang/Form_Penilaian_Magang.pdf" class="btn btn-primary pull-right" style="padding: 2px 10px;"><i class="fa fa-download"></i></a>
                            </li>
                            <li style="font-size: 12px" class="list-inline-item">Sunday, 29 August 2021</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card border">
                    <div class="card-header bg-transparent border">3. Contoh Laporan Magang Mahasiwa</div>
                    <div class="card-body text container">
                        <p class="text">Berikut kami lampirkan contoh bentuk laporan mahasiswa. bagi para mahasiswa yang telah menyelesaikan laporanya wajib menyerahkan bentuk laporanya ke Dep. HC Development dan akan direvisi terlebih dahulu sebelum di kumpulkan.</p>
                    </div>
                    <div class="card-footer bg-transparent border">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="https://hcm.pal.co.id/upload/filemagang/Form_Penilaian_Magang.pdf" class="btn btn-primary pull-right" style="padding: 2px 10px;"><i class="fa fa-download"></i></a>
                            </li>
                            <li style="font-size: 12px" class="list-inline-item">Sunday, 29 August 2021</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card border">
                    <div class="card-header bg-transparent border">4. Form Daftar Hadir Magang / OJT Untuk Siswa SMK</div>
                    <div class="card-body text container">
                        <p class="text">Form bisa langsung di download dan bisa di perbanyak sesuai dengan durasi magang yang telah di ajukan.</p>
                    </div>
                    <div class="card-footer bg-transparent border">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="https://hcm.pal.co.id/upload/filemagang/Form_Penilaian_Magang.pdf" class="btn btn-primary pull-right" style="padding: 2px 10px;"><i class="fa fa-download"></i></a>
                            </li>
                            <li style="font-size: 12px" class="list-inline-item">Sunday, 29 August 2021</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card border">
                    <div class="card-header bg-transparent border">5. Form Daftar Hadir Magang / OJT Untuk Mahasiswa</div>
                    <div class="card-body text container">
                        <p class="text">Form bisa langsung di download dan bisa di perbanyak sesuai dengan durasi magang yang telah di ajukan.</p>
                    </div>
                    <div class="card-footer bg-transparent border">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="https://hcm.pal.co.id/upload/filemagang/Form_Penilaian_Magang.pdf" class="btn btn-primary pull-right" style="padding: 2px 10px;"><i class="fa fa-download"></i></a>
                            </li>
                            <li style="font-size: 12px" class="list-inline-item">Sunday, 29 August 2021</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card border">
                    <div class="card-header bg-transparent border">6. Contoh Laporan Magang Mahasiwa 2021</div>
                    <div class="card-body text container">
                        <p class="text">Berikut Contoh laporang magang terbaru.</p>
                    </div>
                    <div class="card-footer bg-transparent border">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="https://hcm.pal.co.id/upload/filemagang/Form_Penilaian_Magang.pdf" class="btn btn-primary pull-right" style="padding: 2px 10px;"><i class="fa fa-download"></i></a>
                            </li>
                            <li style="font-size: 12px" class="list-inline-item">Sunday, 29 August 2021</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card border">
                    <div class="card-header bg-transparent border">7. Struktur Organisasi PT PAL 2021</div>
                    <div class="card-body text container">
                        <p class="text">Bisa langsung di download.</p>
                    </div>
                    <div class="card-footer bg-transparent border">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="https://hcm.pal.co.id/upload/filemagang/Form_Penilaian_Magang.pdf" class="btn btn-primary pull-right" style="padding: 2px 10px;"><i class="fa fa-download"></i></a>
                            </li>
                            <li style="font-size: 12px" class="list-inline-item">Sunday, 29 August 2021</li>
                        </ul>
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
<script>
    $('#myTab a').on('click', function(event) {
        event.preventDefault()
        $(this).tab('show')
    })
</script>
@endsection