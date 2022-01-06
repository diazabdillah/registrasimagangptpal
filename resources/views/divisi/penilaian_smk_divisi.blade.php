@extends('layouts.webBack')

@section('kontenWebBack')
    @if (session()->has('succes'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('succes') }}
        </div>
    @endif
    <h1 class="h3 mb-2 text-gray-800 mb-3"><b>{{ $ti }}</b></h1> <br>
    <div class="container">
        <div class="row">
            <!-- Page Heading -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mt-2">Form Penilaian</h5>
                        <p class="card-text"><small>Mohon diisi penilaian sesuai pengamatan anda terhadap calon
                                magang</small>
                        </p>


                        <form method="POST" action="{{ route('tambahnilaismkdivisi', [$user->id]) }}">
                            @csrf
                            <!-- Input Univ -->
                            <div class="form-group">
                                <small class="ml-2">Kerjasama</small>
                                <input type="text" class="form-control" id="" name="Kerjasama" placeholder="nilai angka">
                            </div>
                            <!-- Input Strata (S1/d3) -->
                            <div class="form-group">
                                <small>Motivasi & Percaya Diri</small>
                                <input type="text" name="MotivasiPercayaDiri" class="form-control">
                            </div>
                            <div class="form-group">
                                <small class="ml-2">Inisiatif & Tanggung Jawab Kerja</small>
                                <input type="text" class="form-control" id="nilai" name="InisiatifTanggungJawabKerja">
                            </div>
                            <div class="form-group">
                                <small class="ml-2">Loyalitas</small>
                                <input type="text" class="form-control" id="nilai" name="Loyalitas">
                            </div>
                            <div class="form-group">
                                <small class="ml-2">Etika & Sopan Santun</small>
                                <input type="text" class="form-control" id="nilai" name="EtikaSopanSantun">
                            </div>
                            <div class="form-group">
                                <small class="ml-2">Disiplin</small>
                                <input type="text" class="form-control" id="nilai" name="Disiplin">
                            </div>
                            <div class="form-group">
                                <small class="ml-2">Pemahaman dan Kemampuan</small>
                                <input type="text" class="form-control" id="nilai" name="PemahamanKemampuan">
                            </div>
                            <div class="form-group">
                                <small class="ml-2">Kesehatan dan Keselamatan Kerja</small>
                                <input type="text" class="form-control" id="nilai" name="KesehatanKeselamatanKerja">
                            </div>
                            <div class="form-group">
                                <small class="ml-2">Laporan Kerja</small>
                                <input type="text" class="form-control" id="nilai" name="laporankerja">
                            </div>
                            <div class="form-group">
                                <small class="ml-2">Kehadiran</small>
                                <input type="text" class="form-control" id="nilai" name="kehadiran">
                            </div>


                            <button type="submit" class="btn btn-primary btn-lg btn-block mt-5 p-1">Kirim <i
                                    class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mt-2">Kriteria Penilaian</h5>
                        <p class="card-text"><small>Mohon diisi penilaian yang di samping dengan mengikuti kriteria
                                penilaian berikut ini</small>
                        </p>
                    </div>
                    <div class="card-body">
                        <span class="card-text">81 – 100 : (A) Istimewa</span>
                    </div>
                    <div class="card-body">
                        <span class="card-text">71 – 80 : (AB) Sangat Baik</span>
                    </div>
                    <div class="card-body">
                        <span class="card-text">67 - 70 : (B) Baik</span>
                    </div>
                    <div class="card-body">
                        <span class="card-text">61 - 66 : (BC) Cukup Baik</span>
                    </div>
                    <div class="card-body">
                        <span class="card-text">56 - 60 : (C) Cukup</span>
                    </div>
                    <div class="card-body">
                        <span class="card-text">41 - 55 : (D) kurang</span>
                    </div>
                    <div class="card-body">
                        <span class="card-text">0 - 40 : (E) gagal</span>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
