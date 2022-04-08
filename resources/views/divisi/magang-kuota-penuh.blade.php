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
                                            @if ($data->status_user == 'Mahasiswa' || $data->status_user == 'Mahasiswa Kelompok')
                                            <tr>
                                                <td>{{ $no++ }}.</td>
                                                <td>{{ $data->name }}</td>
                                                <td class="text-center">
                                                    <span class="badge badge-primary p-2">{{ $data->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2" href="{{ url('ubah-magang-penuh-mhs/' . $data->id) }}">Ubah
                                                        <i class="fas fa-user-edit ml-1"></i></a>
                                                    <a class="badge badge-danger p-2" href="{{ url('hapus-magang-penuh-mhs/' . $data->id) }}">Hapus
                                                        <i class="fas fa-user-minus ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @elseif($data->status_user == "SMK" || $data->status_user == "SMK Kelompok")
                                            <tr>
                                                <td>{{ $no++ }}.</td>
                                                <td>{{ $data->name }}</td>
                                                <td class="text-center">
                                                    <span class="badge badge-warning p-2">{{ $data->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2" href="{{ url('ubah-magang-penuh-smk/' . $data->id) }}">Ubah
                                                        <i class="fas fa-user-edit ml-1"></i></a>
                                                    <a class="badge badge-danger p-2" href="{{ url('hapus-magang-penuh-smk/' . $data->id) }}">Hapus
                                                        <i class="fas fa-user-minus ml-1"></i></a>
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


 
    <!-- End of Main Content -->

    @endsection