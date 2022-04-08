{{-- Mengambil layout dari webBack.blade.php --}}
@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

            @if (session()->has('succes'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('succes') }}
            </div>
            @endif
            <div class="d-flex justify-content-start">
                <form action="/cari-penerimaan" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="cari"
                            placeholder="Cari Nama Magang ..">

                        <button class="btn btn-primary" type="submit">cari</button>

                    </div>
                </form>
            </div> <br>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card shadow mb-4">
                        <div class="card">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Pendaftar Magang <span
                                        class="badge badge-primary ml-2 p-1">Mahasiswa</span></h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>Nama</th>
                                       
                                                <th>Status Penerimaan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $u)
                                                @if($u->role_id == 8 || $u->role_id == 6)
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->name }} <br> <span class="badge badge-primary p-2">{{
                                                    $u->status_user }}</span></td>
                                                    
                                                        <td  class="text-center">
                                                            @if($u->status_penerimaan == 'Diterima')
                                                            <span class="badge badge-info p-2">Diterima</span>
                                                            @elseif($u->status_penerimaan == 'Ditolak')
                                                            <span class="badge badge-danger p-2">Ditolak</span>
                                                            
                                                            @endif

                                                        </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="{{ url('proses_penerimaan/' . $u->id) }}">Detail <i
                                                            class="fas fa-info-circle ml-1"></i></a>
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

                <div class="col-sm-6">
                    <div class="card shadow mb-4">
                        <div class="card">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Pendaftar Magang <span
                                        class="badge badge-warning ml-2 p-1">SMK</span></h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 0;
                                            ?>
                                            @foreach ($usersSmk as $us)  
                                            @if($us->role_id == 7 || $us->role_id == 9)

                                            <tr>
                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->name }}</td>    
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $us->status_user }}</span></td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="{{ url('proses-penerimaan-smk/' . $us->id) }}">Detail <i
                                                            class="fas fa-info-circle ml-1"></i></a>
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
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>



</div>
<!-- End of Main Content -->

@endsection
