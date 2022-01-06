@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>
            <a class="btn btn-primary p-1" href="/rekap-absenpenelitian">Rekap
                Absen Penelitian</a>

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
                                        class="badge badge-danger ml-2 p-1">Penelitian</span></h6>
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
                                            @if(Auth::user()->status_user=='Admin HCM')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Human Capital Management')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if(Auth::user()->status_user=='Admin Sekretaris Perusahaan')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Sekretaris Perusahaan')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if(Auth::user()->status_user=='Admin Satuan Pengawasan Intern')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Satuan Pengawasan Intern')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if(Auth::user()->status_user=='Admin Naval Technology')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Naval Technology')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if(Auth::user()->status_user=='Admin Pemasaran dan Penjualan Kapal')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Pemasaran dan Penjualan Kapal')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if(Auth::user()->status_user=='Admin Penjualan REKUMHAR')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Penjualan REKUMHAR')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if(Auth::user()->status_user=='Admin Desain')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Desain')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if(Auth::user()->status_user=='Admin Jaminan Kualitas')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Jaminan Kualitas')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if(Auth::user()->status_user=='Admin Supply Chain')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Supply Chain')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if(Auth::user()->status_user=='Admin Kapal Perang')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Kapal Perang')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if(Auth::user()->status_user=='Kapal Selam')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Kapal Selam')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if(Auth::user()->status_user=='Admin Kapal Niaga')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Kapal Niaga')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if(Auth::user()->status_user=='Rekayasa Umum')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Rekayasa Umum')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if(Auth::user()->status_user=='Admin Pemeliharaan dan Perbaikan')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Pemeliharaan dan Perbaikan')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if(Auth::user()->status_user=='Admin Akuntansi')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Akuntansi')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if(Auth::user()->status_user=='Admin Perencanaan Strategis Perusahaan')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Perencanaan Strategis Perusahaan')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if(Auth::user()->status_user=='Admin Perbendaharaan')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Perbendaharaan')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if(Auth::user()->status_user=='Admin Teknologi Informasi')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Teknologi Informasi')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if(Auth::user()->status_user=='Kawasan')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Kawasan')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
                                                        role="button">Lihat Absen</a>

                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif
                                            @if(Auth::user()->status_user=='Admin Keamanan & K3LH')
                                            @foreach ($penelitian as $absen)
                                            @if ($absen->divisi=='Keamanan & K3LH')
                                            <tr>
                                                <td>{{ $absen->nama }}</td>
                                                <td>
                                                    <a class="btn btn-primary p-1"
                                                        href="{{ url('/lihat-absenpenelitian/' . $absen->id) }}"
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
