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
                        Tambah Akun Divisi
                    </div>
                    <div class="card-body">
                        <form action="/proses-tambah-akun-divisi" method="POST">
                            @csrf
                            <div class="form-group">
                                <small class="ml-2">Nama</small>
                                <input type="text" class="form-control" name="name" placeholder="contoh : Human Capital  Management">
                            </div>
                            <div class="form-group">
                                <small class="ml-2">Email</small>
                                <input type="email" class="form-control" name="email">
                            </div>

                            <div class="form-group">
                                <small class="ml-2">Password</small>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <small class="ml-2">Status User</small>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="status_user">
                                        <option value="Admin HCM" selected>Admin HCM</option>
                                        <option value="Admin Sekretaris Perusahaan" selected>Admin Sekretaris Perusahaan
                                        </option>
                                        <option value="Satuan Pengawasan Intern" selected>Satuan Pengawasan Intern
                                        </option>
                                        <option value="Admin Naval Technology" selected>Admin Naval Technology</option>
                                        <option value="Admin Pemasaran dan Penjualan Kapal" selected>Admin Pemasaran dan
                                            Penjualan Kapal</option>
                                        <option value="Admin Penjualan REKUMHAR" selected>Admin Penjualan REKUMHAR
                                        </option>
                                        <option value="Admin Desain" selected>Admin Desain</option>
                                        <option value="Admin Jaminan Kualitas" selected>Admin Jaminan Kualitas</option>
                                        <option value="Admin Supply Chain" selected>Admin Supply Chain</option>
                                        <option value="Admin Kapal Perang" selected>Admin Kapal Perang</option>
                                        <option value="Admin Kapal Selam" selected>Admin Kapal Selam</option>
                                        <option value="Admin Kapal Niaga" selected>Admin Kapal Niaga</option>
                                        <option value="Admin Rekayasa Umum" selected>Admin Rekayasa Umum</option>
                                        <option value="Admin Pemeliharaan dan Perbaikan" selected>Admin Pemeliharaan dan
                                            Perbaikan</option>
                                        <option value="Admin Akuntansi" selected>Admin Akuntansi</option>
                                        <option value="Admin Perencanaan Strategis Perusahaan" selected>Admin
                                            Perencanaan Strategis Perusahaan</option>
                                        <option value="Admin Perbendaharaan" selected>Admin Perbendaharaan</option>
                                        <option value="Admin Teknologi Informasi" selected>Admin Teknologi Informasi
                                        </option>
                                        <option value="Admin Kawasan" selected>Admin Kawasan</option>
                                        <option value="Admin Keamanan & K3LH" selected>Admin Keamanan & K3LH</option>
                                        <option value="Admin Office Of The Board" selected>Admin Office Of The Board
                                        </option>
                                        <option value="Admin Legal" selected>Admin Legal</option>

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
