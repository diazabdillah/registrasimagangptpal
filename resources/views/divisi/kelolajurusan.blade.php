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
                                <h6 class="m-0 font-weight-bold text-primary">Pendaftar Praktikan <span
                                        class="badge badge-primary ml-2 p-1">Mahasiswa</span></h6>
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
                                            @if (Auth::user()->status_user == 'Admin HCM')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Human Capital Management')
                                            
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Sekretaris Perusahaan')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Sekretaris Perusahaan')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Satuan Pengawasan Intern')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Satuan Pengawasan Intern')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Naval Technology')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Naval Technology')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Pemasaran dan Penjualan Kapal')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Pemasaran dan Penjualan Kapal')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Penjualan REKUMHAR')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Penjualan REKUMHAR')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Desain')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Desain')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Jaminan Kualitas')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Jaminan Kualitas')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Supply Chain')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Supply Chain')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Perang')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Kapal Perang')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Selam')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Kapal Selam')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Niaga')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Kapal Niaga')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Rekayasa Umum')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Rekayasa Umum')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Pemeliharaan dan Perbaikan')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Pemeliharaan dan Perbaikan')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Akuntansi')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Akuntansi')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Perencanaan Strategis Perusahaan')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Perencanaan Strategis Perusahaan')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Perbendaharaan')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Perbendaharaan')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Teknologi Informasi')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Teknologi Informasi')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kawasan')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Kawasan')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Keamanan & K3LH')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Keamanan & K3LH')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Legal')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Legal')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Office of The Board')
                                            @foreach ($users as $u)
                                            @if ($u->divisi == 'Office of The Board')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $u->name }}</td>
                                                <td class="text-center"><span class="badge badge-primary p-2">{{
                                                        $u->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-mhs/{{ $u->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                           
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
                                <h6 class="m-0 font-weight-bold text-primary">Pendaftar Praktikan <span
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
                                            @if (Auth::user()->status_user == 'Admin HCM')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Human Capital Management')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Sekretaris Perusahaan')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Sekretaris Perusahaan')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Satuan Pengawasan Intern')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Satuan Pengawasan Intern')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Naval Technology')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Naval Technology')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Pemasaran dan Penjualan Kapal')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Pemasaran dan Penjualan Kapal')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Penjualan REKUMHAR')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Penjualan REKUMHAR')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Desain')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Admin Desain')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Jaminan Kualitas')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Jaminan Kualitas')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Supply Chain')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Supply Chain')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Perang')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Admin Kapal Perang')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Selam')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Admin Kapal Selam')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Niaga')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Kapal Niaga')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Rekayasa Umum')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Rekayasa Umum')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Pemeliharaan dan Perbaikan')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Pemeliharaan dan Perbaikan')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Akuntansi')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Akuntansi')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Perencanaan Strategis Perusahaan')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Perencanaan Strategis Perusahaan')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Perbendaharaan')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Perbendaharaan')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Teknologi Informasi')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Teknologi Informasi')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kawasan')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Kawasan')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Keamanan & K3LH')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Keamanan & K3LH')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Legal')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Legal')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Office of The Board')
                                            @foreach ($usersSmk as $dsmk)
                                            @if ($dsmk->divisi == 'Office of The Board')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dsmk->name }}</td>
                                                <td class="text-center"><span class="badge badge-warning p-2">{{
                                                        $dsmk->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-smk/{{ $dsmk->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
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
                                <h6 class="m-0 font-weight-bold text-primary">Pendaftar Praktikan<span
                                        class="badge badge-danger ml-2 p-1">Penelitian</span></h6>
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
                                            @if (Auth::user()->status_user == 'Admin HCM')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Human Capital Management')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif

                                            @if (Auth::user()->status_user == 'Admin Sekretaris Perusahaan')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Sekretaris Perusahaan')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Satuan Pengawasan Intern')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Satuan Pengawasan Intern')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Naval Technology')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Naval Technology')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Pemasaran dan Penjualan Kapal')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Pemasaran dan Penjualan Kapal')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Penjualan REKUMHAR')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Penjualan REKUMHAR')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Desain')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Desain')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Jaminan Kualitas')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Jaminan Kualitas')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Supply Chain')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Supply Chain')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Perang')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Kapal Perang')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Selam')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Kapal Selam')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Niaga')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Kapal Niaga')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Rekayasa Umum')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Rekayasa Umum')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Pemeliharaan dan Perbaikan')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Pemeliharaan dan Perbaikan')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Akuntansi')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Akuntansi')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Perencanaan Strategis Perusahaan')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Perencanaan Strategis Perusahaan')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Perbendaharaan')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Perbendaharaan')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Teknologi Informasi')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Teknologi Informasi')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kawasan')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Kawasan')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Keamanan & K3LH')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Keamanan & K3LH')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Legal')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Legal')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Office of The Board')
                                            @foreach ($userspenelitian as $dpenelitian)
                                            @if ($dpenelitian->divisi == 'Office of The Board')
                                            <tr>
                                                <td>{{ ++$i }}.</td>
                                                <td>{{ $dpenelitian->name }}</td>
                                                <td class="text-center"><span class="badge badge-danger p-2">{{
                                                        $dpenelitian->status_user }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a class="badge badge-success p-2"
                                                        href="/proses-kelola-penelitian/{{ $dpenelitian->id }}">Detail
                                                        <i class="fas fa-info-circle ml-1"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
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
