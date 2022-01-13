{{-- Mengambil layout dari webBack.blade.php --}}
@extends('layouts.webBack')

@section('kontenWebBack')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $ti }}</h1> <!-- Title Untuk body -->

        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Praktikan
                                    Mahasiswa
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $datamhs }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{ $datamhs }}%" aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Praktikan Smk
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $datasmk }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: {{ $datasmk }}%" aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Praktikan
                                    Penelitian
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $datapenelitian }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: {{ $datapenelitian }}%" aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Chat Admin
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $forum }}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: {{ $forum }}%" aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Area Chart -->

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="chart-area" id="myAreaChart">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Area Chart -->

                <div class="card shadow mb-4">
                    <div class="card-body">


                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Divisi</th>
                                    <th scope="col">Mahasiswa</th>
                                    <th scope="col">SMK</th>
                                    <th scope="col">Penelitian</th>
                                    <th scope="col"><b>Total</b></th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Sekretaris Perusahaan</td>
                                    <td>{{ $sekpermhs }}</td>
                                    <td>{{ $sekpersmk }}</td>
                                    <td>{{ $sekperpenelitian }}</td>
                                    <td class="text-center"><b>{{ $sekpertotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Satuan Pengawasan Intern</td>
                                    <td>{{ $spimhs }}</td>
                                    <td>{{ $spismk }}</td>
                                    <td>{{ $spipenelitian }}</td>
                                    <td class="text-center"><b>{{ $spitotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Naval Technology</td>
                                    <td>{{ $ntmhs }}</td>
                                    <td>{{ $ntsmk }}</td>
                                    <td>{{ $ntpenelitian }}</td>
                                    <td class="text-center"><b>{{ $nttotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Pemasaran dan Penjualan Kapal</td>
                                    <td>{{ $ppkmhs }}</td>
                                    <td>{{ $ppksmk }}</td>
                                    <td>{{ $ppkpenelitian }}</td>
                                    <td class="text-center"><b>{{ $ppktotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Penjualan REKUMHAR</td>
                                    <td>{{ $prekumharmhs }}</td>
                                    <td>{{ $prekumharsmk }}</td>
                                    <td>{{ $prekumharpenelitian }}</td>
                                    <td class="text-center"><b>{{ $prekumhartotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Desain</td>
                                    <td>{{ $desainmhs }}</td>
                                    <td>{{ $desainsmk }}</td>
                                    <td>{{ $desainpenelitian }}</td>
                                    <td class="text-center"><b>{{ $desaintotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Jaminan Kualitas</td>
                                    <td>{{ $jkmhs }}</td>
                                    <td>{{ $jksmk }}</td>
                                    <td>{{ $jkpenelitian }}</td>
                                    <td class="text-center"><b>{{ $jktotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Supply Chain</td>
                                    <td>{{ $scmhs }}</td>
                                    <td>{{ $scsmk }}</td>
                                    <td>{{ $scpenelitian }}</td>
                                    <td class="text-center"><b>{{ $sctotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Kapal Perang</td>
                                    <td>{{ $kpmhs }}</td>
                                    <td>{{ $kpsmk }}</td>
                                    <td>{{ $kppenelitian }}</td>
                                    <td class="text-center"><b>{{ $kptotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Kapal Selam</td>
                                    <td>{{ $ksmhs }}</td>
                                    <td>{{ $kssmk }}</td>
                                    <td>{{ $kspenelitian }}</td>
                                    <td class="text-center"><b>{{ $kstotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Kapal Niaga</td>
                                    <td>{{ $knmhs }}</td>
                                    <td>{{ $knsmk }}</td>
                                    <td>{{ $knpenelitian }}</td>
                                    <td class="text-center"><b>{{ $kntotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Rekayasa Umum</td>
                                    <td>{{ $rumhs }}</td>
                                    <td>{{ $rusmk }}</td>
                                    <td>{{ $rupenelitian }}</td>
                                    <td class="text-center"><b>{{ $rutotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Pemeliharaan dan Perbaikan</td>
                                    <td>{{ $pnpmhs }}</td>
                                    <td>{{ $pnpsmk }}</td>
                                    <td>{{ $pnppenelitian }}</td>
                                    <td class="text-center"><b>{{ $pnptotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Akuntansi</td>
                                    <td>{{ $amhs }}</td>
                                    <td>{{ $asmk }}</td>
                                    <td>{{ $apenelitian }}</td>
                                    <td class="text-center"><b>{{ $atotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Perencanaan Strategis Perusahaan & Manajemen Risiko</td>
                                    <td>{{ $pspmhs }}</td>
                                    <td>{{ $pspsmk }}</td>
                                    <td>{{ $psppenelitian }}</td>
                                    <td class="text-center"><b>{{ $psptotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Perbendaharaan</td>
                                    <td>{{ $pbmhs }}</td>
                                    <td>{{ $pbsmk }}</td>
                                    <td>{{ $pbpenelitian }}</td>
                                    <td class="text-center"><b>{{ $pbtotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Teknologi Informasi</td>
                                    <td>{{ $timhs }}</td>
                                    <td>{{ $tismk }}</td>
                                    <td>{{ $tipenelitian }}</td>
                                    <td class="text-center"><b>{{ $titotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Human Capital Management</td>
                                    <td>{{ $hcmmhs }}</td>
                                    <td>{{ $hcmsmk }}</td>
                                    <td>{{ $hcmpenelitian }}</td>
                                    <td class="text-center"><b>{{ $hcmtotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Kawasan</td>
                                    <td>{{ $kmhs }}</td>
                                    <td>{{ $ksmk }}</td>
                                    <td>{{ $kpenelitian }}</td>
                                    <td class="text-center"><b>{{ $kptotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Keamanan & K3LH</td>
                                    <td>{{ $kkmhs }}</td>
                                    <td>{{ $kksmk }}</td>
                                    <td>{{ $kkpenelitian }}</td>
                                    <td class="text-center"><b>{{ $kktotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Unit Tanggung Jawab Sosial & Lingkungan</td>
                                    <td>{{ $tjlmhs }}</td>
                                    <td>{{ $tjlsmk }}</td>
                                    <td>{{ $tjlpenelitian }}</td>
                                    <td class="text-center"><b>{{ $tjltotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Legal</td>
                                    <td>{{ $tjlmhs }}</td>
                                    <td>{{ $tjlsmk }}</td>
                                    <td>{{ $tjlpenelitian }}</td>
                                    <td class="text-center"><b>{{ $tjltotal }}</b></td>
                                </tr>
                                <tr style="width: 10px;font-size:15px;">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>Office of The Board</td>
                                    <td>{{ $tjlmhs }}</td>
                                    <td>{{ $tjlsmk }}</td>
                                    <td>{{ $tjlpenelitian }}</td>
                                    <td class="text-center"><b>{{ $tjltotal }}</b></td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- End of Main Content -->

    @endsection
    @section('footer')
        <script src="https://code.highcharts.com/highcharts.src.js"></script>
        <script>
            Highcharts.chart('myAreaChart', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Praktikan Aktif di PT PAL Indonesia'
                },

                xAxis: {
                    categories: [
                        'Mahasiswa',
                        'SMK',
                        'Penelitian',

                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah Mahasiswa'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b> {point.y} Orang</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Praktikan',
                    data: [{!! json_encode($data[0]) !!}, {!! json_encode($data[1]) !!}, {!! json_encode($data[2]) !!}]


                }]
            });
        </script>

    @endsection
