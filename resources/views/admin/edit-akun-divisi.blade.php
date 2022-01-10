{{-- Mengambil layout dari webBack.blade.php --}}
@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-7">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

            <div class="card shadow">
                <div class="card">
                    <div class="card-header">
                        Edit Akun Divisi
                    </div>
                    <div class="card-body">
                        <form action="/proses-edit-akun-divisi/{{ $data->id }}" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <small class="ml-2">Nama</small>
                                <input type="text" class="form-control" name="name" placeholder="cth: Admin HCM">
                            </div>
                            <div class="form-group">
                                <small class="ml-2">Email</small>
                                <input type="email" class="form-control" name="email">
                            </div>

                            <div class="form-group">
                                <small class="ml-2">Password</small>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class=" form-group">
                                <small class="ml-2">Status User</small>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="status_user">
                                        <option value="{{$data->status_user}}" selected>{{$data->status_user}}</option>

                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Tambah Akun</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->


    </div>
</div>
<!-- End of Main Content -->

@endsection
