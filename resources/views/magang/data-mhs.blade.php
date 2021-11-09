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

                        <div class="alert alert-info" role="alert">
                            <h5>Langkah 1 :</h5>
                            <p class="card-text"><b>Klik "Isi Data"</b><br> Jika sudah mengisi data pada form, maka data Anda akan tampil pada table dibawah.</p>
                            <a href="/input-data-mhs" class="btn btn-primary mb-3 mr-2">Isi Data <i class="fas fa-pencil-alt"></i></a>
                        </div>

                        <div class="table-responsive table-hover">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="text-center text-white bg-primary">
                                        <th>Nama</th>
                                        <th>Universitas</th>
                                        <th>Strata dan Jurusan</th>
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
                                        <td>{{ $d->strata }} {{ $d->jurusan }}</td>
                                        <td>{{ $d->alamat_rumah }}</td>
                                        <td>{{ $d->no_hp }}</td>
                                        <td>
                                            <a class="btn btn-warning p-1" href="{{ url('edit-data-mhs/' . $d->id) }}" onclick="return confirm('Yakin Edit?');"><i class="far fa-edit"></i> Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="alert alert-primary" role="alert">
                            <h5>Langkah 2 :</h5>
                            <p class="card-text"><b>Klik "Upload Berkas"</b><br>Jika sudah upload berkas pada form, maka berkas Anda akan tampil pada table dibawah.</p>
                            <a href="/berkas-mhs" class="btn btn-success mb-3">Upload Berkas <i class="fas fa-upload"></i></a>
                            <br>
                            <b>Kirim berkas berikut dalam bentuk PDF maksimal 2MB</b>
                            <ol>
                                <li>Proposal Magang</li>
                                <li>Surat Pengantar Magang dari universitas</li>
                                <li>Curriculum Vitae (opsional)</li>
                            </ol>
                        </div>
                        
                        <div class="table-responsive table-hover">
                            <a class="btn btn-danger mt-3 mb-3" href="/berkas-mhs-semua"><i class="fas fa-fw fa-file-pdf mr-2"></i>Buka Semua Berkas</a>
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
                                            <a class="btn btn-primary p-1" href="{{ asset('file/berkas-mahasiswa/'. $file->path) }}"><i class="fa fa-download"></i> Download</a>
                                            <a class="btn btn-danger p-1" href="{{ url('berkas-mhs/' . $file->id, $file->path) }}" onclick="return confirm('Yakin Hapus?');"><i class="far fa-trash-alt"></i> Hapus</a>
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