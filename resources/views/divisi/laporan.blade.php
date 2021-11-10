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
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Akhir</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Judul</th>
                                    <th>Sinopsis</th>
                                    <th>Tanggal Terbit</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $laporan)

                                <tr>
                                    <td>{{ $id++ }}</td>
                                    <td>{{ $laporan->nama }}</td>
                                    <td>{{ $laporan->judul }}</td>
                                    <td>{{ $laporan->sinopsis }}</td>
                                    <td>{{ $laporan->tanggal_kumpul }}</td>
                                    <td>{{ $laporan->path }}</td>

                                    <td>
                                        @if ($laporan->path != null)
                                        <a class="btn btn-warning" href="{{ asset('/file/' . $laporan->path) }}">Download</a>
                                        @endif
                                        @if ($laporan->path != null)
                                        <a class="btn btn-warning" href="{{ asset('/editlaporan/' . $laporan->id) }}">Edit</a>
                                        @endif
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