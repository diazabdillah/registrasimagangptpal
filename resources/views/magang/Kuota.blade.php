{{-- Mengambil layout dari webBack.blade.php --}}
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
                    <h6 class="m-0 font-weight-bold text-primary">Kuota Magang</h6>
                </div>
                <div class="card-body">


                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Lowongan Magang</th>
                                    <th>Tanggal</th>
                                    <th>Kuota</th>
                                    <th>Divisi</th>
                                    <th>Departemen</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $kuota)

                                <tr>
                                    <td>1</td>
                                    <td>{{$kuota->bagian}}</td>
                                    <td>{{$kuota->tanggal}}</td>
                                    <td>{{$kuota->kuota}}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <span class="badge badge-success p-1">{{$kuota->status_kuota}}</span>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning p-1" href="/edit_kuota" role="button">Edit</a>
                                        <a class="btn btn-secondary p-1" href="#" role="button">Hapus</a>
                                    </td>
                                </tr>

                                @endforeach
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