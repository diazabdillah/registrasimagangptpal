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
                    <h6 class="m-0 font-weight-bold text-primary">Data Rekap Magang</h6>
                </div>

                <div class="card-body">

                    <a class="btn btn-primary btn-sm mb-3" href="/cetakRekapPenelitianPDFdivisi" target="_blank"
                        role="button"><i class="fas fa-file-export"></i> Export PDF</a>
                    <a class="btn btn-success btn-sm mb-3" href="/cetakRekapPenelitianEXCELdivisi" target="_blank"
                        role="button"><i class="fas fa-file-export"></i> Export EXCEL</a>

                    <div class="table-responsive">
                        <div class="scroll">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Judul Penelitian</th>
                                        <th>Asal Instansi</th>
                                        <th>Strata</th>
                                        <th>Jurusan</th>
                                        <th>No_Hp</th>
                                        <th>Divisi</th>
                                        <th>Departemen</th>
                                        <th>Alamat Rumah</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $rekap)
                                    @if ($rekap->status_user == 'Penelitian')
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $rekap->nama }}</td>
                                        <td>{{ $rekap->judul_penelitian }}</td>
                                        <td>{{ $rekap->asal_instansi }}</td>
                                        <td>{{ $rekap->strata }}</td>
                                        <td>{{ $rekap->jurusan }}</td>
                                        <td>{{ $rekap->no_hp }}</td>
                                        <td>{{ $rekap->divisi }}</td>
                                        <td>{{ $rekap->departemen }}</td>
                                        <td>
                                            {{ $rekap->alamat_rumah }}
                                        </td>
                                        <td>{{ $rekap->created_at }}</td>
                                        <td>{{ $rekap->mulai }}</td>
                                        <td>{{ $rekap->selesai }}</td>
                                        <td><a class="btn btn-danger"
                                                href="delete-rekap-penelitian/{{$rekap->id}}">Delete</a>
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

        </div>
        <!-- /.container-fluid -->
    </div>


</div>
<!-- End of Main Content -->

@endsection
