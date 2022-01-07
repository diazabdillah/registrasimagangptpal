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
                    <h3>Mekanisme Layanan</h3>
                </div>
                <h5 style="color: rgb(208, 208, 208)">
                    <a style="text-decoration:none; color:white" href="{{URL('/')}}">Home</a> /
                    <a style="text-decoration:none; color:white" href="{{URL('services')}}">Services</a> / 
                    Mekanisme Layanan
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

    <div class="section padding-top-bottom-small background-white over-hide">
    <div class="container">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        1. Bantuan Duka (Sinoman)
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul>
                            <dl>
                                <dt><li><b>Diberikan kepada PKWTT atau Ex-PKWTT</b></li></dt>
                                <dt><li><b>Besaran : </b></li></dt>
                                    <dd>- Rp. 4.000.000,00 : Karyawan, Istri, Suami, Anak</dd>
                                    <dd>- Rp. 2.000.000,00 : Orang tua, Mertua</dd>
                                <dt><li><b>Syarat</b></li></dt>
                                    <dd>- Memo dari Kadep ke Kadep HC Services</dd>
                                    <dd>- Surat keterangan kematian asli/legalisir</dd>
                                    <dd>- FC KK Pegawai</dd>
                                    <dd>- FC Surat Nikah Pegawai</dd>
                            </dl>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        2. Penambahan Anggota Keluarga BPJS Kesehatan
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul>
                            <dl>
                                <dt><li><b>Penambahan Suami/Istri</b></li></dt>
                                    <dd>- Tidak terdaftar di perusahaan lain</dd>
                                    <dd>- Tidak memiliki tunggakan mandiri</dd>
                                    <dd>- Formulir penambahan anggota keluarga</dd>
                                    <dd>- FC KK</dd>
                                    <dd>- FC Surat Nikah</dd>
                                    <dd>- FC KTP Suami & istri</dd>
                                    <dd>- FC Kartu BPJS Suami & Istri (Jika Ada)</dd>
                                    <dd>- Apabila Belum 1 KK, maka melampirkan KK lama suami & Istri</dd>
                                    <dd>- Mengisi Fasilitas Kesehatan yang dituju pada formulir</dd>
                                <dt><li><b>Penambahan Anak</b></li></dt>
                                    <dd>- Dapat menambahkan anak kandung, anak tiri, anak angkat (bukti legal pengadilan)</dd>
                                    <dd>- Anak yang ditanggung maksimal 3 orang</dd>
                                    <dd>- Usia maksimal anak < 21 tahun</dd>
                                    <dd>- Apabila anak masih kuliah dapat ditanggung s/d usia 25 tahun dengan melampirkan surat keterangan kuliah asli setiap tahunnya</dd>
                                    <dd>- Formulir penambahan anggota keluarga</dd>
                                    <dd>- FC KK</dd>
                                    <dd>- FC KTP Pegawai</dd>
                                    <dd>- FC Kartu BPJS Pegawai</dd>
                                    <dd>- FC Akta lahir anak</dd>
                                    <dd>- Pastikan anak sudah terdaftar pada KK dan aktif pada sistem online Dukcapil</dd>
                                    <dd>- Mengisi Fasilitas Kesehatan yang dituju pada formulir</dd>
                                <dt><li><b>Proses dilakukan oleh BPJS Kesehatan paling cepat 5 hari kerja</b></li></dt>
                                <dt><li><b>Download App Mobile JKN pada playstore untuk memastikan data telah aktif dan untuk melihat kartu BPJS Kesehatan</b></li></dt>
                            </dl>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        3. Penggantian Makan Siang
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul>
                            <dl>
                                <dt><li><b>Penggantian makan siang berupa</b></li></dt>
                                    <dd>- Roti</dd>
                                    <dd>- Mie & Telur</dd>
                                <dt><li><b>Mengirimkan memo dari Kadep ke Kadep HCS paling lambat 2 hari sebelum hari H</b></li></dt>
                                <dt><li><b>Menyertakan tanggal dan jumlah permintaan</b></li></dt>
                            </dl>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        4. Kecelakaan Kerja
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul>
                            <dl>
                                <dt><li><b>Kecelakaan yang terjadi saat di tempat kerja pada jam kerja atau pada saat berangkat atau pulang kerja dengan melewati rute seharusnya.</b></li></dt>
                                <dt><li><b>Syarat</b></li></dt>
                                    <dd>- Perwakilan/ saksi melapor ke HCS kronologi kecelakaan (Min 2 orang)</dd>
                                    <dd>- Korban di bawa ke RS yang bekerja sama dengan BPJS TK</d>
                                    <dd>- FC KTP, Kartu Peserta korban</dd>
                                    <dd>- Data Absensi</dd>
                                    <dd>- HCS membuat surat trauma center, Form KK1, Form KK2, kronologi kejadian (TTD 2 saksi)</dd>
                                    <dd>- HCS memberikan salinan Form KK1 & KK2 diberikan ke Depnaker</dd>
                                    <dd>- Apabila RS tidak berkerja sama dengan BPJS TK maka dilakukan sistem reimbus dengan mengisi form KK4 dan menunjukkan bukti kwitansi pembayaran</dd>
                            </dl>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                        5. Surat Keterangan Kerja
                    </button>
                </h2>
                <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul>
                            <dl>
                                <dt><li><b>Memo dari Kadep ke Kadep HCS</b></li></dt>
                                <dt><li><b>Keperluan surat</b></li></dt>
                            </dl>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                        6. Penambahan Anggota Keluarga (Perusahaan)
                    </button>
                </h2>
                <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <ul>
                            <dl>
                                <dt><li><b>Memo dari Kadep ke Kadep HCS</b></li></dt>
                                <dt><li><b>Tembusan YK3</b></li></dt>
                                <dt><li><b>Formulir penambahan keluarga (form ada di masing2 set divisi)</b></li></dt>
                                <dt><li><b>FC KK</b></li></dt>
                                <dt><li><b>FC KTP</b></li></dt>
                                <dt><li><b>FC Surat Nikah</b></li></dt>
                                <dt><li><b>FC Akta lahir Anak</b></li></dt>
                            </dl>
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

<!-- Pricing Block
	================================================== -->

@endsection