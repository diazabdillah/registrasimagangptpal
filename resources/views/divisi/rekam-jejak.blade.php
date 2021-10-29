@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Pemagang</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--- Tampilan Progres --->
                        <label>Tahap <i class="fas fa-caret-right"></i>
                            <b class="text-danger">Pendaftar Magang</b>
                        </label>
                        <div class="progress mb-2" style="height: 1px;">
                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="progress" style="height: 20px;">
                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <table class="table table-bordered mt-4" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Universitas</th>
                                    <th>Sekolah</th>
                                    <th>Divisi</th>
                                    <th>Departemen</th>
                                    <th>Tanggal Daftar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sakura Yamamoto</td>
                                    <td>ITS</td>
                                    <td></td>
                                    <td>HCM</td>
                                    <td>HCM</td>
                                    <td>2021/08/11</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>


</div>
<!-- End of Main Content -->


@endsection