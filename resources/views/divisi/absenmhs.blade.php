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
                        <h6 class="m-0 font-weight-bold text-primary">Form Absensi Mahasiswa</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $absen)
                                        @if ($absen->role_id != 1)
                                            <tr>
                                                <td>{{ $absen->name }}</td>

                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/tambah_absenmhs/' . $absen->id) }}"
                                                        role="button">Bikin Absen</a>
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
