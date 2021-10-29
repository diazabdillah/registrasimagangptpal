@extends('layouts.webBack')

@section('kontenWebBack')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800 mb-3"><b>{{ $ti }}</b></h1>
                @if (session()->has('succes'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('succes') }}
                    </div>
                @endif

                {{-- Data yang sudah masuk --}}
                <div class="card shadow mb-3">
                    <div class="card">
                        <div class="card-header">
                            Data Pemagang
                        </div>
                        <div class="card-body">
                            <a href="/input-mhs-kelompok" class="btn btn-primary mb-3 mr-2">Tambah Anggota Kelompok <i
                                    class="fas fa-pencil-alt"></i></a>
                            <a href="/berkas-mhs-kel" class="btn btn-success mb-3 mr-2">Upload File <i
                                    class="fas fa-upload"></i></a>


                            <div class="alert alert-info" role="alert">
                                <p class="card-text"><b>Klik Isi Data</b> untuk mengirimkan data-data anda. Jika sudah
                                    mengisi data pada form maka data anda akan tampil di tabel
                                </p>
                            </div>
                            <div class="alert alert-primary" role="alert">
                                <p class="card-text"><b>Klik Upload File</b>
                                </p>
                                <b>Kirim file berikut dalam bentuk PDF maksimal 1MB</b>
                                <ol>
                                    <li>Proposal Magang</li>
                                    <li>Surat Pengajuan Magang</li>
                                    <li>Curriculum Vitae (jika ada)</li>
                                </ol>
                            </div>

                            <div class="table-responsive table-hover">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center text-white bg-primary">
                                            <th>Nama</th>
                                            <th>Universitas</th>
                                            <th>Strata</th>
                                            <th>Alamat Rumah</th>
                                            <th>No.HP</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr class="text-center">
                                                <td>{{ $d->nama }}</td>
                                                <td>{{ $d->univ }}</td>
                                                <td>{{ $d->strata }}</td>
                                                <td>{{ $d->alamat_rumah }}</td>
                                                <td>{{ $d->no_hp }}</td>

                                                <td>
                                                    <a class="btn btn-warning p-1"
                                                        href="{{ url('edit-data-mhskel/' . $d->id) }}"  onclick="return confirm('yakin Edit?');">Edit</a>
                                                        <a class="btn btn-danger p-1"
                                                        href="{{ url('delete-data-mhskel/' . $d->id) }}"  onclick="return confirm('yakin Hapus?');">Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <a class="btn btn-danger mt-3 mb-3" href="/openpdfkel"><i
                                        class="fas fa-fw fa-file-pdf mr-2"></i>Open all file</a>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center text-white bg-primary">
                                            <th>File</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($files as $file)
                                            <tr class="text-center">
                                                <td><i class="fas fa-fw fa-file-pdf mr-3"></i>{{ $file->path }}</td>
                                                <td>
                                                    <a class="btn btn-secondary p-1" href="{{ url('Data_mhs/' . $file->id, $file->path) }}" onclick="return confirm('yakin Hapus?');">Hapus</a>
                                                    <a class="btn btn-secondary p-1" href=" {{url('/Data_mhs_lihat/'.$file->id)}}">Lihat</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection
