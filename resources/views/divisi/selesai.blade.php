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
               
                        <div class="card shadow mb-4">
                        
                                
                             
                                    <div class="table-responsive mt-4">
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
                                                @php $no = 1; @endphp
                                                @foreach ($users as $data)
                                                    <tr>
                                                        <td class="text-center">{{ $no++ }}.</td>
                                                        <td class="text-center">{{ $data->name }}</td>
                                                        @if ($data->status_user == 'Mahasiswa' || $data->status_user == 'Mahasiswa Kelompok')
                                                            <td class="text-center"><span
                                                                    class="badge badge-primary p-2">{{ $data->status_user }}</span>
                                                            </td>
                                                        @elseif ($data->status_user == 'SMK' || $data->status_user ==
                                                            'SMK Kelompok')
                                                            <td class="text-center"><span
                                                                    class="badge badge-warning p-2">{{ $data->status_user }}</span>
                                                            </td>
                                                        @endif
                                                        <td class="text-center">
                                                            @if ($data->role_id == 14)
                                                                <a class="badge badge-success p-2"
                                                                    href="{{ url('proses-mhs-selesai/' . $data->id) }}">Detail
                                                                    <i class="fas fa-info-circle ml-1"></i></a>
                                                            @endif
                                                            @if ($data->role_id == 15)
                                                                <a class="badge badge-success p-2"
                                                                    href="{{ url('proses-smk-selesai/' . $data->id) }}">Detail
                                                                    <i class="fas fa-info-circle ml-1"></i></a>
                                                            @endif

                                                            @if ($data->role_id == 19)
                                                                @if ($data->status_user == 'Mahasiswa')
                                                                    <a class="badge badge-danger p-2"
                                                                        href="{{ url('delete-selesai-mhs/' . $data->id) }}">Hapus
                                                                        Akun <i class="fas fa-info-circle ml-1"></i></a>
                                                                @elseif ($data->status_user == "Mahasiswa Kelompok")
                                                                    <a class="badge badge-danger p-2"
                                                                        href="{{ url('delete-selesai-mhs-kel/' . $data->id) }}">Hapus
                                                                        Akun <i class="fas fa-info-circle ml-1"></i></a>
                                                                @endif
                                                            @endif
                                                            @if ($data->role_id == 20)
                                                                @if ($data->status_user == 'SMK')
                                                                    <a class="badge badge-danger p-2"
                                                                        href="{{ url('delete-selesai-smk/' . $data->id) }}">Hapus
                                                                        Akun <i class="fas fa-info-circle ml-1"></i></a>
                                                                @elseif ($data->status_user == "SMK Kelompok")
                                                                    <a class="badge badge-danger p-2"
                                                                        href="{{ url('delete-selesai-smk-kel/' . $data->id) }}">Hapus
                                                                        Akun <i class="fas fa-info-circle ml-1"></i></a>
                                                                @endif
                                                            @endif

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
               
                     
                     
                    </div>

                    {{-- <div class="col-sm-6">
                        <div class="card shadow mb-4">
                            <div class="card">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Magang <span
                                            class="badge badge-warning text-dark ml-2 p-1">SMK</span></h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>Sekolah</th>
                                                    <th>Jurusan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 1; @endphp
                                                @foreach ($dataSmk as $dsmk)
                                                    <tr>
                                                        <td>{{ $no++ }}.</td>
                                                        <td>{{ $dsmk->nama }}</td>
                                                        <td>{{ $dsmk->sekolah }}</td>
                                                        <td>{{ $dsmk->jurusan }}</td>
                                                        <td class="text-center">
                                                            <a class="badge badge-success p-2"
                                                                href="{{ url('final-penerimaan-smk/' . $dsmk->user_id) }}">Detail
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
                </div> --}}



                </div>
                <!-- /.container-fluid -->
            </div>


        </div>
        <!-- End of Main Content -->

    @endsection
