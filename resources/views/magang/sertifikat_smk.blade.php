@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Main Content -->
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><b>{{ $ti }}</b></h1> <br>
            @if (session()->has('succes'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('succes') }}
            </div>
            @endif
            <div class="alert alert-success">
                <span>Silahkan sertifikat untuk di download filenya yang terdapat di button titik tiga dan untuk hardcopynya di serahkan ke Human Capital Management (Dept. HCD) agar di tandatangani oleh
                    kepala departemen. Segera di download file pdf Sertifikat anda sebelum akun Anda di Nonakktifkan.</span>
                <!-- Card -->
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">


            <!-- Area Chart -->
            <div class="col col-lg">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Sertifikat</h6>

                        <div class="dropdown no-arrow">

                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="/sertif-smk-pdf" target="_blank">Convert PDF</a>

                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->

                    @foreach ($datas as $sertif)
                    <div class="card">
                        <div class="d-flex justify-content-between pl-4 pr-4 pt-3 pb-4 mt-3"
                            style="margin-bottom:50px ">
                            <img src="{{ asset('img/bumn.png') }}" alt="image" style="width: 130px;">
                            <img src="{{ asset('img/logo_pal.png') }}" alt="Card image cap" style="width: 130px;">
                        </div>
                        <div class="text-center">
                            <u>
                                <h1 style="font-family:Lucida Sans;">SERTIFIKAT</h1>
                            </u>
                            <p>Nomor :
                                <b> PKL/{{ $datas[0]->id }}/44200/{{ date('F', strtotime(now())) }}/{{ date('Y', strtotime(now())) }}
                                </b>
                            </p>
                        </div>
                        <div class="text-center" style="margin-top: 50px">
                            <span> Dengan ini menerangkan bahwa:</span>
                            <b>
                                <u>
                                    <h1
                                        style="margin-top:5px;margin-bottom:30px;font-family:Comic Sans MS;font-weight: bold;font-size: 50px;">
                                        {{ strtoupper($sertif->nama) }}
                                    </h1>
                                </u>
                            </b>
                            <p style="margin-top: -25px">Nis : <b>{{ $sertif->nis }}</b> </p>
                            <div class="text-center">
                                <h5 style="font-family:Comic Sans MS;font-weight: bold;">
                                    {{ strtoupper($sertif->sekolah) }}
                                </h5>


                            </div>
                            <div class="text-center" style="margin-top: 20px">
                                <p>Telah Melaksanakan Kerja Praktek di <b>PT PAL Indonesia (Persero)</b>
                                    <br>
                                    Pada Tanggal <b>{{ date('d-m-Y', strtotime($sertif->mulai)) }}</b>
                                    s/d
                                    <b>{{ date('d-m-Y', strtotime($sertif->selesai)) }}</b> dengan hasil
                                    predikat <b>{{ $sertif->nilai_huruf }}</b>
                                    <b>({{ $sertif->keterangan }})</b>
                                </p>
                            </div>
                            <div style="float: right;margin-right:60px;margin-top:40px;">
                                <div>
                                    <p class="text-center">Surabaya,
                                        {{ date('d-F-Y', strtotime($sertif->selesai)) }} </p>
                                </div>
                                <div style="margin-top: -20px">
                                    <p> PT PAL Indonesia (Persero)</p>
                                </div>
                                <div>
                                    <hr
                                        style="width:280px;weight:200px;margin-top: 140px;margin-bottom: 5px;border:1px solid;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h6>Nama : {{ $sertif->nama }}</h6>
                            </div>
                            <div>
                                <h6>Nis : {{ $sertif->nis }}</h6>
                            </div>
                            <div>
                                <h6>Waktu Pelaksanaan :{{ date('d-m-Y', strtotime($sertif->mulai)) }}
                                    s/d
                                    {{ date('d-m-Y', strtotime($sertif->selesai)) }}</h6>
                            </div>
                            <div>
                                <h6>Nama Pembimbing : {{ $sertif->pembimbing }}</h6>
                            </div> <br>


                            <div class="table-responsive">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">AKTIVITAS YANG DINILAI</th>
                                            <th scope="col">NILAI</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr style="width: 10px;font-size:15px;">
                                            <th scope="row">1</th>
                                            <td>Kerjasama</td>
                                            <td>{{ $sertif->kerjasama }}</td>

                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <th scope="row">2</th>
                                            <td>Motivasi & Percaya Diri</td>
                                            <td>{{ $sertif->MotivasiPercayaDiri }}</td>
                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <th scope="row">3</th>
                                            <td>Inisiatif & Tanggung Jawab Kerja</td>
                                            <td>{{ $sertif->InisiatifTanggungJawabKerja }}</td>
                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <th scope="row">4</th>
                                            <td>Loyalitas</td>
                                            <td>{{ $sertif->Loyalitas }}</td>
                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <th scope="row">5</th>
                                            <td>Etika & Sopan Santun</td>
                                            <td>{{ $sertif->EtikaSopanSantun }}</td>
                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <th scope="row">6</th>
                                            <td>Disiplin</td>
                                            <td>{{ $sertif->disiplin }}</td>
                                        </tr>

                                        <tr style="width: 10px;font-size:15px;">
                                            <th scope="row">7</th>
                                            <td>Kemampuan dan Pemahaman Kerja</td>
                                            <td>{{ $sertif->PemahamanKemampuan }}</td>
                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <th scope="row">8</th>
                                            <td>Kesehatan dan Keselamatan Kerja</td>
                                            <td>{{ $sertif->KesehatanKeselamatanKerja }}</td>
                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <th scope="row">9</th>
                                            <td>Laporan Kerja</td>
                                            <td>{{ $sertif->laporankerja }}</td>
                                        </tr>

                                        <tr style="width: 10px;font-size:15px;">
                                            <th scope="row">10</th>
                                            <td>Kehadiran</td>
                                            <td>{{ $sertif->kehadiran }}</td>
                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <td colspan="2" class="text-center">RATA-RATA</td>
                                            <td>{{ $sertif->average }}</td>
                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <td colspan="2" class="text-center">KETERANGAN NILAI</td>
                                            <td>{{ $sertif->keterangan }}</td>
                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <td colspan="2" class="text-center">NILAI HURUF</td>
                                            <td>{{ $sertif->nilai_huruf }}</td>
                                        </tr>

                                    </tbody>
                                </table>

                                <h5 class="ml-4 mt-4 card-title">Kriteria Penilaian</h5>
                                <hr>
                                <div style="font-size: 15px" class="card-body">
                                    <span class="card-text">81 – 100 : (A) Istimewa,</span>

                                    <span class="card-text">71 – 80 : (AB) Sangat Baik,</span>

                                    <span class="card-text">67 - 70 : (B) Baik,</span>

                                    <span class="card-text">61 - 66 : (BC) Cukup Baik,</span>

                                    <span class="card-text">56 - 60 : (C) Cukup,</span>

                                    <span class="card-text">41 - 55 : (D) kurang,</span>

                                    <span class="card-text">0 - 40 : (E) gagal</span>
                                </div>
                            </div>
                        </div>


                    </div>


                    @endforeach
                </div>

            </div>

        </div>
    </div>
</div>



@endsection
