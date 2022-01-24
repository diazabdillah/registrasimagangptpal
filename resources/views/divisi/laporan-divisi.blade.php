{{-- Mengambil layout dari webBack.blade.php --}}
@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

            <div class="row">
                <div class="col-sm-6">
                    <div class="card shadow mb-4">
                        <div class="card">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Magang <span
                                        class="badge badge-primary ml-2 p-1">Mahasiswa</span></h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Judul</th>
                                                <th>File</th>
                                                <th>Revisi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 0; @endphp
                                            @if (Auth::user()->status_user == 'Admin HCM')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Human Capital Management')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                               
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Sekretaris Perusahaan')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Sekretaris Perusahaan')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Satuan Pengawasan Intern')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Satuan Pengawasan Intern')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Naval Technology')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Naval Technology')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Pemasaran dan Penjualan Kapal')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Pemasaran dan Penjualan Kapal')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Penjualan REKUMHAR')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Penjualan REKUMHAR')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Desain')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Desain')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Jaminan Kualitas')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Jaminan Kualitas')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Supply Chain')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Supply Chain')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Perang')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Kapal Perang')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Selam')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Kapal Selam')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Niaga')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Kapal Niaga')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Rekayasa Umum')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Rekayasa Umum')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Pemeliharaan dan Perbaikan')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Pemeliharaan dan Perbaikan')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Akuntansi')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Akuntansi')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Perencanaan Strategis Perusahaan')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Perencanaan Strategis Perusahaan')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Perbendaharaan')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Perbendaharaan')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Teknologi Informasi')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Teknologi Informasi')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kawasan')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Kawasan')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Keamanan & K3LH')
                                            @foreach ($user as $u)
                                            @if ($u->divisi == 'Keamanan & K3LH')
                                            <tr>
                                                <td class="text-center">{{ ++$i }}.</td>
                                                <td class="text-center">{{ $u->nama }}</td>
                                                <td class="text-center">{{ $u->judul }}</td>
                                                <td class="text-center">{{ $u->path }}</td>
                                                <td class="text-center">{{ $u->revisi_divisi }}</td>
                                                <td>
                                                    @if ($u->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-mhs/' . $u->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporan-divisi/' . $u->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-mhs/' . $u->id) }}">Delete</a>
                                                    @endif
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
                                <h6 class="m-0 font-weight-bold text-primary">Magang <span
                                        class="badge badge-warning ml-2 p-1">SMK</span></h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Judul</th>
                                                <th>File</th>
                                                <th>Revisi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 0; @endphp
                                            @if (Auth::user()->status_user == 'Admin HCM')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Human Capital Management')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Sekretaris Perusahaan')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Sekretaris Perusahaan')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Satuan Pengawasan Intern')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Satuan Pengawasan Intern')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Naval Technology')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Naval Technology')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Pemasaran dan Penjualan Kapal')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Pemasaran dan Penjualan Kapal')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Penjualan REKUMHAR')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Penjualan REKUMHAR')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Desain')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Desain')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Jaminan Kualitas')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Jaminan Kualitas')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Supply Chain')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Supply Chain')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Perang')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Kapal Perang')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Selam')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Kapal Selam')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Niaga')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Kapal Niaga')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Rekayasa Umum')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Rekayasa Umum')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Pemeliharaan dan Perbaikan')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Pemeliharaan dan Perbaikan')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Akuntansi')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Akuntansi')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Perencanaan Strategis Perusahaan')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Perencanaan Strategis Perusahaan')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Perbendaharaan')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Perbendaharaan')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Teknologi Informasi')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Teknologi Informasi')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kawasan')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Kawasan')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Keamanan & K3LH')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Keamanan & K3LH')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Legal')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Legal')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Office Of The Board')
                                            @foreach ($userSmk as $us)
                                            @if ($us->divisi == 'Office Of The Board')
                                            <tr>

                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td class="text-center">{{ $us->nama }}</td>
                                                <td class="text-center">{{ $us->judul }}</td>
                                                <td class="text-center">{{ $us->path }}</td>
                                                <td class="text-center">{{ $us->revisi_divisi }}</td>
                                                <td>
                                                    @if ($us->path != null)
                                                    <a class="btn btn-primary"
                                                        href="{{ asset('file/laporan-smk/' . $us->path) }}">Download</a>
                                                    <a class="btn btn-warning"
                                                        href="{{ asset('editlaporansmk-divisi/' . $us->id) }}">Revisi</a>
                                                    <a class="btn btn-danger"
                                                        href="{{ asset('delete-laporan-smk/' . $us->id) }}">Delete</a>
                                                    @endif
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
