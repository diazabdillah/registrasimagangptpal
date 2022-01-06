{{-- Mengambil layout dari webBack.blade.php --}}
@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>


            <div class="card shadow mb-4">
                <div class="card">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Magang <span
                                class="badge badge-danger ml-2 p-1">Penelitian</span></h6>
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp
                                    @if(Auth::user()->status_user=='Admin HCM')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Human Capital Management')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif

                                    @if(Auth::user()->status_user=='Admin Sekretaris Perusahaan')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Sekretaris Perusahaan')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                    @if(Auth::user()->status_user=='Admin Satuan Pengawasan Intern')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Satuan Pengawasan Intern')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                    @if(Auth::user()->status_user=='Admin Naval Technology')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Naval Technology')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                    @if(Auth::user()->status_user=='Admin Pemasaran dan Penjualan Kapal')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Pemasaran dan Penjualan Kapal')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                    @if(Auth::user()->status_user=='Admin Penjualan REKUMHAR')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Penjualan REKUMHAR')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                    @if(Auth::user()->status_user=='Admin Desain')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Desain')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                    @if(Auth::user()->status_user=='Jaminan Kualitas')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Jaminan Kualitas')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                    @if(Auth::user()->status_user=='Admin Supply Chain')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Supply Chain')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                    @if(Auth::user()->status_user=='Admin Kapal Perang')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Kapal Perang')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                    @if(Auth::user()->status_user=='Admin Kapal Selam')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Kapal Selam')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                    @if(Auth::user()->status_user=='Admin Kapal Niaga')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Kapal Niaga')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                    @if(Auth::user()->status_user=='Admin Rekayasa Umum')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Rekayasa Umum')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                    @if(Auth::user()->status_user=='Admin Pemeliharaan dan Perbaikan')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Pemeliharaan dan Perbaikan')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                    @if(Auth::user()->status_user=='Admin Akuntansi')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Akuntansi')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                    @if(Auth::user()->status_user=='Admin Perencanaan Strategis Perusahaan')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Perencanaan Strategis Perusahaan')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                    @if(Auth::user()->status_user=='Admin Perbendaharaan')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Perbendaharaan')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                    @if(Auth::user()->status_user=='Admin Teknologi Informasi')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Teknologi Informasi')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                    @if(Auth::user()->status_user=='Admin Kawasan')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Kawasan')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endif
                                    @if(Auth::user()->status_user=='Admin Keamanan & K3LH')
                                    @foreach ($user as $u)
                                    @if ($u->divisi == 'Keamanan & K3LH')
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{ $u->path }}</td>
                                        <td>
                                            @if ($u->path != null)
                                            <a class="btn btn-warning"
                                                href="{{ asset('file/laporan-penelitian/' . $u->path) }}">Download</a>
                                            <a class="btn btn-danger"
                                                href="{{ asset('delete-laporan-penelitian/' . $u->id) }}">Delete</a>

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
        <!-- /.container-fluid -->

    </div>
</div>
<!-- End of Main Content -->
@endsection
