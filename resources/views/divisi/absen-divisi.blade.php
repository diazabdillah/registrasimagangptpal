@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>
            <a class="btn btn-primary p-1" href="/rekap-absenmhs">Rekap
                Absen Mahasiswa</a>
            <a class="btn btn-warning p-1" href="/rekap-absensmk">Rekap
                Absen Smk</a>
            <br>
            <br>
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
                                <h6 class="m-0 font-weight-bold text-primary">Form Absensi <span
                                        class="badge badge-primary ml-2 p-1">Mahasiswa</span></h6>
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
                                            @if (Auth::user()->status_user == 'Admin HCM')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Human Capital Management')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Sekretaris Perusahaan')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Sekretaris Perusahaan')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Satuan Pengawasan Intern')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Satuan Pengawasan Intern')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Naval Technology')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Naval Technology')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Pemasaran dan Penjualan Kapal')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Pemasaran dan Penjualan Kapal')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Penjualan REKUMHAR')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Penjualan REKUMHAR')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Desain')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Desain')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Jaminan Kualitas')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Jaminan Kualitas')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Supply Chain')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Supply Chain')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Perang')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Kapal Perang')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Selam')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Kapal Selam')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Niaga')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Kapal Niaga')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Rekayasa Umum')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Rekayasa Umum')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Pemeliharaan dan Perbaikan')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Pemeliharaan dan Perbaikan')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Akuntansi')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Akuntansi')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Perencanaan Strategis Perusahaan')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Perencanaan Strategis Perusahaan')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Perbendaharaan')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Perbendaharaan')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Perencanaan Strategis Perusahaan')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Perencanaan Strategis Perusahaan')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Teknologi Informasi')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Teknologi Informasi')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kawasan')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Kawasan')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Keamanan & K3LH')
                                            @foreach ($mahasiswa as $absen)
                                            @if ($absen->divisi == 'Keamanan & K3LH')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absenmhs/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

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
                                <h6 class="m-0 font-weight-bold text-primary">Form Absensi <span
                                        class="badge badge-warning ml-2 p-1">SMK</span></h6>
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

                                            @if (Auth::user()->status_user == 'Admin HCM')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Human Capital Management')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Sekretaris Perusahaan')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Sekretaris Perusahaan')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Satuan Pengawasan Intern')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Satuan Pengawasan Intern')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Naval Technology')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Naval Technology')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Pemasaran dan Penjualan Kapal')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Pemasaran dan Penjualan Kapal')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Penjualan REKUMHAR')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Penjualan REKUMHAR')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Desain')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Desain')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Jaminan Kualitas')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Jaminan Kualitas')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Supply Chain')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Supply Chain')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Perang')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Kapal Perang')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Selam')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Kapal Selam')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Niaga')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Kapal Niaga')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kapal Niaga')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Kapal Niaga')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Rekayasa Umum')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Rekayasa Umum')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Pemeliharaan dan Perbaikan')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Pemeliharaan dan Perbaikan')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Akuntansi')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Akuntansi')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Perencanaan Strategis Perusahaan')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Perencanaan Strategis Perusahaan')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Perbendaharaan')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Perbendaharaan')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Perencanaan Strategis Perusahaan')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Perencanaan Strategis Perusahaan')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Teknologi Informasi')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Teknologi Informasi')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Kawasan')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Kawasan')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->status_user == 'Admin Keamanan & K3LH')
                                            @foreach ($smk as $s)
                                            @if ($s->divisi == 'Keamanan & K3LH')
                                            <tr>
                                                <td>{{ $s->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat_absensmk/' . $s->id) }}"
                                                        role="button">Lihat Absen</a>

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
