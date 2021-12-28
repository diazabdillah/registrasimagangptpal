<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PT.PAL</title>



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>

    @foreach ($datas as $sertif)
        <div style="border:1px solid;">
            <div class="d-flex justify-content-between pl-4 pr-4 pt-3 pb-4 mt-4">
                <img src="{{ public_path('img/bumn.png') }}" alt="image" style="width: 130px;margin-top:30px;">
                <img src="{{ public_path('img/logo_pal.png') }}" alt="Card image cap"
                    style="width: 130px;margin-left:1080px;margin-top:30px;">
            </div>
            <div class="text-center" style="margin-top:-50px;">
                <u>
                    <h1 style="font-family:Lucida Sans;">SERTIFIKAT</h1>
                </u>
                <p>Nomor :
                    <b> PKL/{{ $datas[0]->id }}/51200/{{ date('F', strtotime($datas[0]->selesai)) }}/{{ date('Y', strtotime($datas[0]->selesai)) }}
                    </b>
                </p>

                <span> Dengan ini menerangkan bahwa:</span>
                <b>
                    <u>
                        <h1 style="font-family:Comic Sans MS;font-weight: bold;font-size: 50px;">
                            {{ strtoupper($sertif->nama) }}
                        </h1>
                    </u>
                </b>
                <p>Nim : <b>{{ $sertif->nis }}</b> </p>

                <h5 style="font-family:Comic Sans MS;font-weight: bold;">
                    {{ strtoupper($sertif->sekolah) }}
                </h5>



                <p>Telah Melaksanakan Kerja Praktek di <b>PT PAL Indonesia (Persero)</b>
                    <br>
                    Pada Tanggal <b>{{ date('d-m-Y', strtotime($sertif->mulai)) }}</b>
                    s/d
                    <b>{{ date('d-m-Y', strtotime($sertif->selesai)) }}</b> dengan hasil
                    predikat <b>{{ $sertif->nilai_huruf }}</b>
                    <b>({{ $sertif->keterangan }})</b>
                </p>
                <div>
                    <p style="margin-left:900px;">Surabaya,
                        {{ date('d-F-Y', strtotime($datas[0]->selesai)) }} </p>
                    <p style="margin-top: -20px;margin-left:900px;"> PT PAL Indonesia (Persero)</p>

                    <hr style="margin-left:950px;width:280px;weight:200px;margin-top: 225px;border:1px solid;">

                </div>
            </div>
        </div>

    @endforeach



    @foreach ($users as $penilaian)
        <div style="border:1px solid;">
            <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr style="width: 10px;font-size:15px;">
                            <th style="height:5px;" scope="col">No</th>
                            <th style="height:5px;" scope="col">AKTIVITAS YANG DINILAI</th>
                            <th style="height:5px;" scope="col">NILAI</th>

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
            {{-- <div style="font-size: 15px;margin-top:-100px;" class="card-body">
                <h6 style="font-size:20px;" class="card-title">Kriteria Penilaian</h6>
                <hr>

                <span class="card-text">81 – 100 : (A) Istimewa,</span>

                <span class="card-text">71 – 80 : (AB) Sangat Baik,</span>

                <span class="card-text">67 - 70 : (B) Baik,</span>

                <span class="card-text">61 - 66 : (BC) Cukup Baik,</span>

                <span class="card-text">56 - 60 : (C) Cukup,</span>

                <span class="card-text">41 - 55 : (D) kurang,</span>

                <span class="card-text">0 - 40 : (E) gagal</span>
            </div> --}}
        </div>


    @endforeach


</body>

</html>
