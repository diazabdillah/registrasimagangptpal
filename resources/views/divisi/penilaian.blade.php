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
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nim</th>
                                    <th>Universitas</th>
                                    <th>Divisi</th>
                                    <th>Departemen</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $penilaian)
                                @if ($penilaian->role_id == 3)
                                <tr>
                                    <td>{{ $id++ }}</td>
                                    <td>{{ $penilaian->nama }}</td>
                                    <td>{{ $penilaian->nim }}</td>
                                    <td>{{ $penilaian->univ }}</td>
                                    <td>{{ $penilaian->divisi }}</td>
                                    <td>{{ $penilaian->departemen }}</td>
                                    @if ($penilaian->status_penilaian ==null)
                                    <td>Belum Dinilai</td>
                                    @else
                                    <td>{{$penilaian->status_penilaian}}</td>
                                    @endif
                                    <td>
                                        @if ($penilaian->status_penilaian ==null)
                                        <a class="btn btn-warning p-1" href="{{ url('/isi_penilaian/' . $penilaian->id) }}" role="button">Isi
                                            Form Penilaian</a>
                                        @endif

                                    </td>
                                </tr>
                                @endif
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

@endsection