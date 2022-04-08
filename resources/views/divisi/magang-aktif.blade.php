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

            <div class="row">
                <div class="col-sm-6">
                    <div class="card shadow mb-4">
                        <div class="card">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Magang <span class="badge badge-primary ml-2 p-1">Mahasiswa</span></h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Status Magang Aktif</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $d)
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $d->name }} <br> <span class="badge badge-primary p-2">{{ $d->status_user }}</span></td>
                                                <td class="text-center">
                                                    @if(date('Y-m-d', strtotime(now())) >= date('Y-m-d', strtotime($d->mulai)) && date('Y-m-d', strtotime(now())) <= date('Y-m-d', strtotime($d->selesai)))
                                                    <span class="badge badge-warning p-2">Mulai Magang</span>
                                                    @elseif(date('Y-m-d', strtotime(now())) >= date('Y-m-d', strtotime($d->selesai)))
                                                    <span class="badge badge-success p-2">Selesai Magang</span>
                                                    @elseif(date('Y-m-d', strtotime(now())) <= date('Y-m-d', strtotime($d->mulai)))
                                                    <span class="badge badge-danger p-2">Belum Mulai Magang</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-info p-2" href="{{ url('proses-magang-aktmhs/' . $d->id) }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
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
                                <h6 class="m-0 font-weight-bold text-primary">Magang <span class="badge badge-warning ml-2 p-1">SMK</span></h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Status Magang Aktif</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach ($dataSmk as $dsmk)
                                            <tr>
                                                <td class="text-center">{{ $no++ }}.</td>
                                                <td class="text-center">{{ $dsmk->name }} <br> <span class="badge badge-primary p-2">{{ $dsmk->status_user }}</span> </td>
                                                <td class="text-center">
                                                    @if(date('Y-m-d', strtotime(now())) >= date('Y-m-d', strtotime($dsmk->mulai)) && date('Y-m-d', strtotime(now())) <= date('Y-m-d', strtotime($dsmk->selesai)))
                                                    <span class="badge badge-warning p-2">Mulai Magang</span>
                                                    @elseif(date('Y-m-d', strtotime(now())) >= date('Y-m-d', strtotime($dsmk->selesai)))
                                                    <span class="badge badge-success p-2">Selesai Magang</span>
                                                    @elseif(date('Y-m-d', strtotime(now())) <= date('Y-m-d', strtotime($dsmk->mulai)))
                                                    <span class="badge badge-danger p-2">Belum Mulai Magang</span>
                                                    @endif
                                                    
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-info p-2" href="{{ url('proses-magang-aktsmk/' . $dsmk->id) }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
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