{{-- Mengambil layout dari webBack.blade.php --}}
@extends('layouts.webBack')

@section('kontenWebBack')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-7">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><b>{{ $ti }}</b></h1>

                <div class="card shadow">
                    <div class="card">
                        <div class="card-header">
                            Upload Laporan
                        </div>
                        <div class="card-body">
                            <form action="/proses-laporan" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <small class="ml-2">Judul</small>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul">
                                    @error('judul')
                                    <div class="invalid-feedback mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <small class="ml-2">Jurusan</small>
                                    <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan">
                                    @error('jurusan')
                                    <div class="invalid-feedback mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <small class="ml-2">Divisi</small>
                                    <div class="input-group mb-3">
                                        <select class="custom-select" name="divisi">
                                            <option value="{{ $user->divisi }}" selected>{{ $user->divisi }}</option>
                                        </select>
                                   
                                    </div>
                                </div>


                                <div class="form-group">
                                    <small class="ml-2">Upload Laporan</small>
                                    <input type="file" class="form-control @error('file') is-invalid @enderror" id="path" name="path">
                                    @error('file')
                                    <div class="invalid-feedback mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>

                                <button type="submit" class="btn btn-primary mt-4">Upload Laporan</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->


        </div>
    </div>
    <!-- End of Main Content -->

@endsection
