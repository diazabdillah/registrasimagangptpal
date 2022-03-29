@extends('layouts.webBack')

@section('kontenWebBack')
    @if (session()->has('succes'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('succes') }}
        </div>
    @endif
    <h1 class="h3 mb-2 text-gray-800 mb-3"><b>{{ $ti }}</b></h1> <br>
    <div class="container">
        <div class="row">
            <!-- Page Heading -->
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mt-2">Form Kegiatan Magang Mahasiswa</h5>
                        <p class="card-text"><small>Mohon para admin divisi diisi kegiatan magang untuk
                                mahasiswa yang sedang melaksanakan magang di PT PAL</small>
                        </p>


                        <form method="POST" enctype="multipart/form-data" action="{{ route('tambahkegiatanmhs', [$user->id]) }}">
                            @csrf
                            <!-- Input Univ -->
                            <div class="form-group">
                                <small class="ml-2">Nama Pembuat Kegiatan</small>
                                <input type="text" class="form-control" id="" name="nama_pembimbing" required>
                            </div>
                            <div class="form-group">
                                <small class="ml-2">Judul Kegiatan</small>
                                <input type="text" class="form-control" id="" name="judul" required>
                            </div>
                            <div class="form-group">
                                <small class="ml-2">Deskripsi Kegiatan</small>
                                <textarea class="form-control" rows="10" name="deskripsi_tugas" required></textarea>
                            </div>
                            <div class="form-group">
                                <small class="ml-2">Jenis Tugas</small>
                                <div class="input-group mb-3">
                                    <select class="custom-select" name="jenis_tugas">
                                        <option value="Kelompok">Kelompok</option>
                                        <option value="Individu">Individu</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Input Strata (S1/d3) -->
                            <div class="form-group">
                                <small>Tanggal Mulai Kegiatan</small>
                                <input type="date" name="tanggal_mulai" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <small class="ml-2">Tanggal Selesai Kegiatan</small>
                                <input type="date" class="form-control" id="nilai" name="tanggal_selesai" required>
                            </div>
                            <div class="form-group">
                                <small class="ml-2">File Kegiatan</small>
                                <input type="file" class="form-control" id="nilai" name="file_tugas">
                            </div>
                        

                            <button type="submit" class="btn btn-primary btn-lg btn-block mt-5 p-1">Kirim <i
                                    class="fas fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daftar Kegiatan Magang Mahasiswa</h5>
                     
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Nama Pembuat Kegiatan</th>
                                    <th>Judul Kegiatan</th>
                                   <th>Deskripsi Kegiatan</th>
                                   <th>Jenis Kegiatan</th>
                                   <th>Status Kegiatan</th>
                                   <th>Tanggal Mulai</th>
                                   <th>Tanggal Selesai</th>
                                   <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $u)
                            
                                    <tr>
                                        <td class="text-center">{{ ++$i }}.</td>
                                        <td class="text-center">{{ $u->nama_pembimbing }}</td>
                                        <td class="text-center">{{ $u->judul }}</td>
                                        <td class="text-center">{{$u->deskripsi_tugas}}</td>
                                        <td class="text-center">{{ $u->jenis_tugas }}</td>
                                        <td class="text-center">{{ $u->status_kegiatan }}</td>
                                        <td class="text-center">{{$u->tanggal_mulai}}</td>
                                        <td class="text-center">{{$u->tanggal_selesai}}</td>
                                        <td>
                                            <a class="btn btn-danger"
                                            href="{{ asset('delete-kegiatan-magang-mhs/' . $u->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                  
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Hasil Kegiatan Magang Mahasiswa</h5>
                 
                </div>
                <div class="table-responsive">
                  
                    <table class="table table-bordered mt-4" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama Pelaksanaan</th>
                                <th>Tanggal Pelakasanaan</th>
                                <th>Judul Kegiatan</th>
                                <th>Deskripsi kegiatan</th>
                                <th>Dokumentasi Kegiatan</th>
                        
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $ams)
                                <tr>
                                    <th> {{ $ams->nama_anggota }} </th>

                                    <th>{{ date('H:i, d F Y', strtotime($ams->tanggal_kumpul)) }}</th>
                                    <th>{{ $ams->nama_kegiatan }}</th>
                                    <th>{{ $ams->deskripsi_kegiatan }}</th>
                                    <th>
                                        @if ($ams->foto_kegiatan != null)
                                            <img width="100px"
                                                src="{{ asset('file/foto-kegiatan-mhs/' . $ams->foto_kegiatan) }}">
                                        @endif
                                    </th>
                              
                                </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>
                <br>

            </div>
        </div>
    </div>


@endsection
