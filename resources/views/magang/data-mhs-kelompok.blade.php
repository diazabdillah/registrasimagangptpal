@extends('layouts.webBack')

@section('kontenWebBack')

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800 mb-3"><b>{{ $ti }}</b></h1>
            @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
            @endif

            {{-- Data yang sudah masuk --}}
            <div class="card shadow mb-3">
                <div class="card">
                    <div class="card-header">
                        Data Pemagang
                    </div>
                    <div class="card-body">



                        <div class="alert alert-info" role="alert">
                            <h5>Langkah 1 :</h5>
                            <p class="card-text"><b>Klik Tambah Anggota Kelompok Anda</b><br> Silahkan klik button
                                tambah anggota kelompok untuk kirimkan data-data kelompok anda. Jika sudah
                                mengisi data pada form data kelompok maka data kelompok anda akan tampil di tabel bawah.
                            </p>
                            <a href="/input-mhs-kelompok" class="btn btn-primary mb-3 mr-2">Tambah Anggota Kelompok
                                <i class="fas fa-user-plus"></i></a>

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
                                            <a class="btn btn-warning p-1" href="/edit-data-mhs-kelompok/{{$d->id}}" onclick="return confirm('yakin Edit?');"><i class="far fa-edit"></i> Edit</a>
                                            <a class="btn btn-danger p-1" href="/delete-data-mhs-kelompok/{{$d->id}}" onclick="return confirm('yakin Hapus?');"><i class="far fa-trash-alt"></i> Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="alert alert-primary" role="alert">
                            <h5>Langkah 2 :</h5>
                            <p class="card-text"><b>Klik Upload File Calon Magang</b>
                            </p>
                            <p> Silahkan klik button
                                upload file calon magang untuk kirimkan data-data kelompok anda. Jika sudah
                                mengirim file pada form maka file data kelompok anda akan tampil di tabel bawah.
                            </p>
                            <a href="/berkas-mhs-kelompok" class="btn btn-success mb-3 mr-2">Upload File <i class="fas fa-upload"></i></a> <br>
                            <b>Kirim file berikut dalam bentuk PDF maksimal 2MB</b>
                            <ol>
                                <li>Proposal Magang</li>
                                <li>Surat Pengantar Magang dari universitas</li>
                                <li>Curriculum Vitae (opsional)</li>
                            </ol>
                        </div>

                        <div class="table-responsive table-hover">
                            <a class="btn btn-danger mt-3 mb-3" href="/berkas-mhs-kelompok-semua"><i class="fas fa-fw fa-file-pdf mr-2"></i>Buka Semua Berkas</a>
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
                                            <a class="btn btn-primary p-1" href=" {{ url('/Data_mhs_lihat/' . $file->id) }}"><i class="far fa-eye"></i> Lihat</a>
                                            <a class="btn btn-danger p-1" href="{{ url('Data_mhs/' . $file->id, $file->path) }}" onclick="return confirm('yakin Hapus?');"><i class="far fa-trash-alt"></i> Hapus</a>

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