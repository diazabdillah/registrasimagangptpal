@extends('layouts.webBack')

@section('kontenWebBack')

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Penilaian</h6>
                    </div>
                    @foreach ($users as $penilaian)

                        <div class="card-body">
                            <div>
                                <h6>Nama : {{ $penilaian->nama }}</h6>
                            </div>
                            <div>
                                <h6>Nim : {{ $penilaian->nim }}</h6>
                            </div>
                            <div>
                                <h6>Waktu Pelaksanaan :{{ date('d-m-Y', strtotime($penilaian->mulai)) }} s/d
                                    {{ date('d-m-Y', strtotime($penilaian->selesai)) }}</h6>
                            </div>
                            <div>
                                <h6>Nama Pembimbing : {{ $penilaian->pembimbing }}</h6>
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
                                            <td>{{ $penilaian->kerjasama }}</td>

                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <th scope="row">2</th>
                                            <td>Motivasi & Percaya Diri</td>
                                            <td>{{ $penilaian->MotivasiPercayaDiri }}</td>
                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <th scope="row">3</th>
                                            <td>Inisiatif & Tanggung Jawab Kerja</td>
                                            <td>{{ $penilaian->InisiatifTanggungJawabKerja }}</td>
                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <th scope="row">4</th>
                                            <td>Loyalitas</td>
                                            <td>{{ $penilaian->Loyalitas }}</td>
                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <th scope="row">5</th>
                                            <td>Etika & Sopan Santun</td>
                                            <td>{{ $penilaian->EtikaSopanSantun }}</td>
                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <th scope="row">6</th>
                                            <td>Disiplin</td>
                                            <td>{{ $penilaian->disiplin }}</td>
                                        </tr>

                                        <tr style="width: 10px;font-size:15px;">
                                            <th scope="row">7</th>
                                            <td>Kemampuan dan Pemahaman Kerja</td>
                                            <td>{{ $penilaian->PemahamanKemampuan }}</td>
                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <th scope="row">8</th>
                                            <td>Kesehatan dan Keselamatan Kerja</td>
                                            <td>{{ $penilaian->KesehatanKeselamatanKerja }}</td>
                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <th scope="row">9</th>
                                            <td>Laporan Kerja</td>
                                            <td>{{ $penilaian->laporankerja }}</td>
                                        </tr>

                                        <tr style="width: 10px;font-size:15px;">
                                            <th scope="row">10</th>
                                            <td>Kehadiran</td>
                                            <td>{{ $penilaian->kehadiran }}</td>
                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <td colspan="2" class="text-center">RATA-RATA</td>
                                            <td>{{ $penilaian->average }}</td>
                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <td colspan="2" class="text-center">KETERANGAN NILAI</td>
                                            <td>{{ $penilaian->keterangan }}</td>
                                        </tr>
                                        <tr style="width: 10px;font-size:15px;">
                                            <td colspan="2" class="text-center">NILAI HURUF</td>
                                            <td>{{ $penilaian->nilai_huruf }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="card">

                                <h5 class="ml-4 mt-4 card-title mt-2">Kriteria Penilaian</h5>
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


                    @endforeach
                </div>

            </div>
            <!-- /.container-fluid -->


        </div>
    </div>

@endsection
