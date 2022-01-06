@extends('layouts.webBack')

@section('kontenWebBack')

    <div class="container-fluid">

        <div class="row">
            <div class="col-lg">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

                <!-- DataTales Example -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card shadow mb-4">
                            <div class="card">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Penilaian Magang <span
                                            class="badge badge-primary ml-2 p-1">Mahasiswa</span></h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 0; @endphp
                                                @if (Auth::user()->status_user == 'Admin HCM')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Human Capital Management')
                                                            <tr>
                                                                <td class="text-center">{{ ++$i }}.</td>
                                                                <td class="text-center">{{ $u->nama }}</td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Sekretaris Perusahaan')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Sekretaris Perusahaan')
                                                            <tr>
                                                                <td class="text-center">{{ ++$i }}.</td>
                                                                <td class="text-center">{{ $u->nama }}</td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Satuan Pengawasan Intern')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Satuan Pengawasan Intern')
                                                            <tr>
                                                                <td class="text-center">{{ ++$i }}.</td>
                                                                <td class="text-center">{{ $u->nama }}</td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Naval Technology')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Naval Technology')
                                                            <tr>
                                                                <td class="text-center">{{ ++$i }}.</td>
                                                                <td class="text-center">{{ $u->nama }}</td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Pemasaran dan Penjualan Kapal')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Admin Pemasaran dan Penjualan Kapal')
                                                            <tr>
                                                                <td class="text-center">{{ ++$i }}.
                                                                </td>
                                                                <td class="text-center">{{ $u->nama }}</td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Penjualan REKUMHAR')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Penjualan REKUMHAR')
                                                            <tr>
                                                                <td class="text-center">{{ ++$i }}.
                                                                </td>
                                                                <td class="text-center">{{ $u->nama }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Desain')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Desain')
                                                            <tr>
                                                                <td class="text-center">
                                                                    {{ ++$i }}.</td>
                                                                <td class="text-center">
                                                                    {{ $u->nama }}</td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Jaminan Kualitas')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Jaminan Kualitas')
                                                            <tr>
                                                                <td class="text-center">
                                                                    {{ ++$i }}.</td>
                                                                <td class="text-center">
                                                                    {{ $u->nama }}</td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Supply Chain')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Supply Chain')
                                                            <tr>
                                                                <td class="text-center">
                                                                    {{ ++$i }}.</td>
                                                                <td class="text-center">
                                                                    {{ $u->nama }}</td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Kapal Perang')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Kapal Perang')
                                                            <tr>
                                                                <td class="text-center">
                                                                    {{ ++$i }}.</td>
                                                                <td class="text-center">
                                                                    {{ $u->nama }}</td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Kapal Selam')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Kapal Selam')
                                                            <tr>
                                                                <td class="text-center">
                                                                    {{ ++$i }}.
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $u->nama }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Kapal Niaga')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Kapal Niaga')
                                                            <tr>
                                                                <td class="text-center">
                                                                    {{ ++$i }}.
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $u->nama }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Rekayasa Umum')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Rekayasa Umum')
                                                            <tr>
                                                                <td class="text-center">
                                                                    {{ ++$i }}.
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $u->nama }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Pemeliharaan dan Perbaikan')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Pemeliharaan dan Perbaikan')
                                                            <tr>
                                                                <td class="text-center">
                                                                    {{ ++$i }}.
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $u->nama }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Akuntansi')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Akuntansi')
                                                            <tr>
                                                                <td class="text-center">
                                                                    {{ ++$i }}.
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $u->nama }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Perencanaan Strategis Perusahaan')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Perencanaan Strategis Perusahaan')
                                                            <tr>
                                                                <td class="text-center">
                                                                    {{ ++$i }}.
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $u->nama }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Perbendaharaan')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Perbendaharaan')
                                                            <tr>
                                                                <td class="text-center">
                                                                    {{ ++$i }}.
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $u->nama }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Teknologi Informasi')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Teknologi Informasi')
                                                            <tr>
                                                                <td class="text-center">
                                                                    {{ ++$i }}.
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $u->nama }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Kawasan')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Kawasan')
                                                            <tr>
                                                                <td class="text-center">
                                                                    {{ ++$i }}.
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $u->nama }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Keamanan & K3LH')
                                                    @foreach ($users as $u)
                                                        @if ($u->divisi == 'Keamanan & K3LH')
                                                            <tr>
                                                                <td class="text-center">
                                                                    {{ ++$i }}.
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $u->nama }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @if ($u->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Penilaian Magang <span
                                            class="badge badge-warning ml-2 p-1">SMK</span></h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No.</th>
                                                    <th>Nama</th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 0; @endphp
                                                @if (Auth::user()->status_user == 'Admin HCM')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Human Capital Management')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Sekretaris Perusahaan')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Admin Sekretaris Perusahaan')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Satuan Pengawasan Intern')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Satuan Pengawasan Intern')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Naval Technology')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Admin Naval Technology')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Pemasaran dan Penjualan Kapal')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Admin Pemasaran dan Penjualan Kapal')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Penjualan REKUMHAR')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Admin Penjualan REKUMHAR')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Desain')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Admin Desain')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Jaminan Kualitas')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Admin Jaminan Kualitas')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Supply Chain')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Admin Supply Chain')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Kapal Perang')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Admin Kapal Perang')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Kapal Selam')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Admin Kapal Selam')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Kapal Niaga')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Admin Kapal Niaga')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Rekayasa Umum')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Admin Rekayasa Umum')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Pemeliharaan dan Perbaikan')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Admin Pemeliharaan dan Perbaikan')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Akuntansi')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Admin Akuntansi')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Perencanaan Strategis Perusahaan')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Admin Perencanaan Strategis Perusahaan')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Perbendaharaan')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Admin Perbendaharaan')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Teknologi Informasi')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Admin Teknologi Informasi')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Kawasan')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Admin Kawasan')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if (Auth::user()->status_user == 'Admin Keamanan & K3LH')
                                                    @foreach ($usersSmk as $us)
                                                        @if ($us->divisi == 'Admin Keamanan & K3LH')
                                                            <tr>
                                                                <td class="text-center">{{ ++$no }}.</td>
                                                                <td class="text-center">{{ $us->nama }}</td>

                                                                <td class="text-center">
                                                                    @if ($us->status_penilaian == null)
                                                                        <a class="badge badge-danger p-2"
                                                                            href="{{ url('isi_penilaian_smk_divisi/' . $us->id) }}">Belum
                                                                            dinilai
                                                                            <i class="fas fa-info-circle ml-1"></i></a>
                                                                    @else
                                                                        <button class="btn btn-success" disabled>Sudah
                                                                            dinilai</button>
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

@endsection
