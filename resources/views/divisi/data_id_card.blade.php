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
                    <h6 class="m-0 font-weight-bold text-primary">Pendaftar Magang</h6>
                </div>



                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>

                                <tr>
                                    <th>Nama</th>
                                    <th>Universitas</th>
                                    <th>Divisi</th>
                                    <th>Departemen</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $idcard)
                                @if ($idcard->role_id != 1)
                                <tr>
                                    <td>{{ $idcard->nama }}</td>
                                    <td>{{ $idcard->univ }}</td>
                                    <td>{{ $idcard->divisi }}</td>
                                    <td>{{ $idcard->departemen }}</td>
                                    <td>{{ $idcard->created_at }}</td>
                                    @if ($idcard->status_idcard == 'diterima')
                                    <td><span class="badge badge-success p-1">Proses</span></td>

                                    @else
                                    <td> <span class="badge badge-danger p-1">Belum Proses</span></td>

                                    @endif
                                    <td>
                                        @if ($idcard->role_id == 3)
                                        <a onclick="return confirm('Apakah anda ingin proses idcardnya?')" class="btn btn-primary p-1" href="{{ url('data_id_card/update/' . $idcard->id) }}" role="button">Process</a>
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
<!-- End of Main Content -->

@endsection