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
            
                    <div class="card shadow mb-4">
                        <div class="card">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Pendaftar Magang Dan Penelitian</h6>
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
                                            @foreach ($users as $u)
                                                @if($u->role_id == 30)
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary">{{
                                                        $u->status_user }}</span></td>
                                                <td class="text-center">
                                                    <form action="proses-konfirmasi-akun-admin/{{$u->id}}" method="POST">
                                                        @method('put')
                                                        @csrf
                                                        <div class="form-group">
                                                            <small class="ml-2">Pilih Akun Pendaftar</small>
                                                            <div class="input-group mb-3">
                                                                <select class="custom-select" id="inputGroupSelect04" name="role_id" required>
                                                                    <option value="8">Mahasiswa Individu</option>
                                                                    <option value="6">Mahasiswa Kelompok</option>
                                                                    <option value="9">Smk Individu</option>
                                                                    <option value="7">Smk Kelompok</option>
                                                                    <option value="21">Penelitian</option>
                                                                    <option value="0">Kuota Penuh Magang</option>
                                                                    <option value="26">Kuota Penuh Penelitian</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    <input type="submit" value="Verifikasi Akun" class="btn btn-success p-2">
                                                        </form>
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
        <!-- /.container-fluid -->
    </div>



</div>
<!-- End of Main Content -->

@endsection
