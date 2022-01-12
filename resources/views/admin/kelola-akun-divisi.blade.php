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
                    <h6 class="m-0 font-weight-bold text-primary">Data Akun Divisi</h6>
                </div>

                <div class="card-body">

                    <a class="btn btn-primary btn-sm mb-3" href="/tambah-akun-divisi" target="_blank" role="button"><i
                            class="fas fa-file-export"></i> Tambah Akun Divisi</a>

                    <div class="table-responsive">
                        <div class="scroll">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Email</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $akun)
@if($akun->role_id == 1 || $akun->role_id == 18)
    

                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $akun->name }}</td>
                                        <td>{{ $akun->email }}</td>

                                        <td>
                                            <a class="btn btn-warning" href="edit-akun-divisi/{{$akun->id}}">Edit</a>
                                            @if($akun->status_user !='Admin Pusat')
                                            <a class="btn btn-danger" href="delete-akun-divisi/{{$akun->id}}">Delete</a>
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
        <!-- /.container-fluid -->
    </div>


</div>
<!-- End of Main Content -->

@endsection
