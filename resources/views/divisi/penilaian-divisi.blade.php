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
                                            @if (Auth::user()->name == 'Admin HCM')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->name == 'Admin Sekretaris Perusahaan')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->name == 'Admin Satuan Pengawasan Intern')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->name == 'Admin Naval Technology')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->name == 'Admin Pemasaran dan Penjualan Kapal')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->name == 'Admin Penjualan REKUMHAR')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->name == 'Admin Desain')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->name == 'Admin Jaminan Kualitas')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->name == 'Admin Supply Chain')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->name == 'Admin Kapal Perang')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->name == 'Admin Kapal Selam')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->name == 'Admin Kapal Niaga')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->name == 'Admin Rekayasa Umum')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->name == 'Admin Pemeliharaan dan Perbaikan')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->name == 'Admin Akuntansi')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->name == 'Admin Perencanaan Strategis Perusahaan')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->name == 'Admin Perbendaharaan')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->name == 'Admin Teknologi Informasi')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->name == 'Admin Kawasan')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if (Auth::user()->name == 'Admin Keamanan & K3LH')
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
                                                        <a class="badge badge-primary p-2"
                                                        href="{{ url('isi_penilaian_divisi/' . $u->id) }}">Edit Nilai</a>
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
                                            @if (Auth::user()->name == 'Admin HCM')
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
                                            @if (Auth::user()->name == 'Admin Sekretaris Perusahaan')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Sekretaris Perusahaan')
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
                                            @if (Auth::user()->name == 'Admin Satuan Pengawasan Intern')
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
                                            @if (Auth::user()->name == 'Admin Naval Technology')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Naval Technology')
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
                                            @if (Auth::user()->name == 'Admin Pemasaran dan Penjualan Kapal')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Pemasaran dan Penjualan Kapal')
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
                                            @if (Auth::user()->name == 'Admin Penjualan REKUMHAR')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Penjualan REKUMHAR')
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
                                            @if (Auth::user()->name == 'Admin Desain')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Desain')
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
                                            @if (Auth::user()->name == 'Admin Jaminan Kualitas')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Jaminan Kualitas')
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
                                            @if (Auth::user()->name == 'Admin Supply Chain')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Supply Chain')
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
                                            @if (Auth::user()->name == 'Admin Kapal Perang')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Kapal Perang')
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
                                            @if (Auth::user()->name == 'Admin Kapal Selam')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Kapal Selam')
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
                                            @if (Auth::user()->name == 'Admin Kapal Niaga')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Kapal Niaga')
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
                                            @if (Auth::user()->name == 'Admin Rekayasa Umum')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Rekayasa Umum')
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
                                            @if (Auth::user()->name == 'Admin Pemeliharaan dan Perbaikan')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Pemeliharaan dan Perbaikan')
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
                                            @if (Auth::user()->name == 'Admin Akuntansi')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Akuntansi')
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
                                            @if (Auth::user()->name == 'Admin Perencanaan Strategis Perusahaan')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Perencanaan Strategis Perusahaan')
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
                                            @if (Auth::user()->name == 'Admin Perbendaharaan')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Perbendaharaan')
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
                                            @if (Auth::user()->name == 'Admin Teknologi Informasi')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Teknologi Informasi')
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
                                            @if (Auth::user()->name == 'Admin Kawasan')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Kawasan')
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
                                            @if (Auth::user()->name == 'Admin Keamanan & K3LH')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Keamanan & K3LH')
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
                                            @if (Auth::user()->name == 'Admin Legal')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Legal')
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
                                            @if (Auth::user()->name == 'Admin Office Of The Board')
                                            @foreach ($usersSmk as $us)
                                            @if ($us->divisi == 'Office Of The Board')
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
