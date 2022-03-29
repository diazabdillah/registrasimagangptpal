@extends('layouts.webBack')

@section('kontenWebBack')

<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

            <!-- DataTales Example -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="card shadow mb-4">
                        <div class="card">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Penilaian Magang <span
                                        class="badge badge-primary ml-2 p-1">Mahasiswa</span></h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 0; @endphp
                                            @foreach ($users as $u)
                                            @if ($u->role_id != 1)

                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">
                                                    @if ($u->status_penilaian == null)
                                                    <a class="btn btn-danger p-2"
                                                        href="{{ url('isi-penilaian-magang/' . $u->id) }}">Belum
                                                        dinilai
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                    @else
                                                    <button class="btn btn-success" disabled>Sudah
                                                        dinilai</button>
                                                        <a class="btn btn-primary p-2"
                                                        href="{{ url('isi-penilaian-magang/' . $u->id) }}">Edit
                                                        Nilai
                                                       </a>
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
                </div>

                <div class="col-sm-6">
                    <div class="card shadow mb-4">
                        <div class="card">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Penilaian Magang <span
                                        class="badge badge-warning ml-2 p-1">SMK</span></h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>Nama</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 0; @endphp
                                            @foreach ($usersSmk as $us)
                                            <tr>
                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>

                                                <td class="text-center">
                                                    @if ($us->status_penilaian == null)
                                                    <a class="btn btn-danger"
                                                        href="{{ url('isi-penilaian-magang-smk/' . $us->id) }}">Belum
                                                        dinilai
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                    @else
                                                    <button class="btn btn-success" disabled>Sudah
                                                        dinilai</button>
                                                        <a class="btn btn-primary"
                                                        href="{{ url('isi-penilaian-magang-smk/' . $us->id) }}">Edit Nilai
                                                        </a>
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
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->


    </div>
</div>

@endsection
